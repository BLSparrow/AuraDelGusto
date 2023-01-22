@extends('layouts.app')
@section('content')
    <section class="fon" style="background: url({{asset('storage/events-bg.jpg')}})">
        <div class="container py-5">
            <h1 class="text-center text-light mb-5">Ваши заказы</h1>
            <div class="row">
                <div class="d-flex justify-content-end align-items-center my-2">
                    <a href="{{route('profile')}}" class="btn-create text-center">Назад</a>
                </div>
                <table class="table text-light text-center">
                    <thead>
                    <tr>
                        <th scope="col">Количество</th>
                        <th scope="col">Наименования</th>
                        <th scope="col">К оплате</th>
                        <th scope="col">Статус</th>
                        <th scope="col">Действие</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td class="h4">{{$order->countOrder($order)}}</td>
                            <td>
                                @foreach($order->items as $product)
                                    <ul>
                                        <li class="list-unstyled">{{$product->menu->name}} ({{$product->count}})</li>
                                    </ul>
                                @endforeach
                            </td>
                            <td>{{$order->amount}} &#8381;</td>
                            <td>{{$order->status->name}}</td>
                            @if($order->status->id == 1)
                                <td class="border">
                                    <form method="post" class="m-0" id="form"
                                          action="{{route('order.destroy', $order)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger"
                                                onclick="return confirm('Вы действительно хотите удалить заказ?');">
                                            Удалить
                                        </button>
                                    </form>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
