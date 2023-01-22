<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Mail\OrderShipped;
use App\Models\Basket;
use App\Models\Order;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function index()
    {
        return view('orders.index', ['orders' => Order::all(), 'statuses' => Status::all()]);
    }

    public function destroy(Order $order)
    {

        $order->delete();

        return redirect()->route('profile')
            ->with('success', 'Данные успешно удалены');
    }

    public function update(Request $request, Order $order)
    {
        $order->update([
            'status_id' => $request->input('status_id'),
            'reason' => $request->input('reason'),
        ]);

        Mail::to($order->user->email)->send(new OrderShipped($order));

        return redirect()->route('admin.orders.index')
            ->with('success', 'Данные успешно обновлены');
    }

    public function ordersFilter(Status $status)
    {
        $orders = Order::where('status_id', '=', $status->id)->get();
        return view('orders.index', ['orders' => $orders, 'statuses' => Status::all()]);
    }

    public function getOrderInProfile()
    {
        $orders = Order::where('user_id', '=', auth()->user()->id)->latest()->get();
        return view('profile.index', ['orders' => $orders]);
    }

    public function createOrder(OrderRequest $request)
    {
        $baskets = Basket::userBasketAllMenus()->where('count', '!=', 0)->get();
        if (count($baskets) > 0) {
            $order = Order::create([
                'user_id' => auth()->user()->id,
                'status_id' => 1,
                'amount' => Basket::totalPrice(),
                'comment' => $request->input('comment'),
            ]);
            $order->items()->createMany($baskets->toArray());
            auth()->user()->update([
                'tel' => $request->input('tel'),
                'address' => $request->input('address'),
            ]);

            Basket::userBasketAllMenus()->delete();

            Mail::to($order->user->email)->send(new OrderShipped($order));

            return redirect()->route('profile');
        }
        return redirect()->route('index');
    }
}
