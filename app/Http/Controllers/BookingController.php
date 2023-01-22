<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookingRequest;
use App\Http\Resources\BookingResource;
use App\Mail\BookingShipped;
use App\Models\Booking;
use App\Models\Table;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use function PHPUnit\Framework\isEmpty;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::all();
        return view('bookings.index', ['bookings' => $bookings]);
    }

    public function bookingsFind(Request $request)
    {
        [$dateOrder, $timeOrder] = [$request->dateOrder, $request->timeOrder];

        $tempDate = strtotime("$dateOrder $timeOrder");
        $newDate = date("Y-m-d H:i:s", $tempDate);

        $bookings = Booking::where([
            ['dateStart', '<=', $newDate],
            ['dateEnd', '>=', $newDate]
        ])->get();
        return BookingResource::collection($bookings);
    }

    public function bookingsSave(Request $request)
    {
        $dateOrder = $request->data['dOrder'];
        $timeOrder = $request->data['tOrder'];
        $tempDate = strtotime("$dateOrder $timeOrder");
        $newDate = date("Y-m-d H:i:s", $tempDate);

        Booking::where([
            ['user_id', '=', Auth::user()->id],
            ['table_id', '=', $request->data['table']]
        ])->delete();


        $booking = Auth::user()->bookings()->create([
            'table_id' => $request->data['table'],
            'dateStart' => $newDate,
            'dateEnd' => Carbon::parse($newDate)->addHours($request->data['countHours']),
            'prepayment' => 250,
        ]);
        $newBooking = new BookingResource($booking);


        if ($newBooking) {

            $name = $booking->user->name;
            $numberTable = $booking->table->number;
            $dateStart = $booking->new_date_start;
            $dateEnd = $booking->new_date_end;
            Mail::to($booking->user->email)->send(new BookingShipped($name, $numberTable, $dateStart, $dateEnd));

            return $newBooking;
        } else {
            return back()->withErrors([
                'errorLogin' => 'Что-то не так! Давай по новой',
            ]);
        }
    }

    public function create()
    {
        $tables = Table::all();
        return view('bookings.create', compact('tables'));
    }

    public function store(StoreBookingRequest $request)
    {

        Booking::create([
            'user_id' => Auth::user()->id,
            'table_id' => $request->input('table_id'),
            'dateStart' => $request->input('dateStart'),
            'dateEnd' => Carbon::parse($request->input('dateStart'))->addHours($request->input('countHours')),
            'prepayment' => 250,
        ]);

        return redirect()->route('admin.bookings.create')
            ->with('success', 'Данные успешно сохранены');
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();

        return redirect()->route('admin.bookings.index')
            ->with('success', 'Данные успешно удалены');
    }

}
