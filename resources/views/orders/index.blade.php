@extends('layouts.admin')
@section('content')

    <div class="d-flex my-4">
        <strong>Фильтрация: </strong>
        <a class="text-decoration-none btn btn-sm btn-outline-primary mx-2" href="{{route('admin.orders.index')}}">Все
            заказы</a>
        @foreach($statuses as $status)
            <a class="text-decoration-none btn btn-sm btn-outline-primary mx-2"
               href="{{route('admin.orders.filter', $status)}}">{{$status->name}}</a>
        @endforeach
    </div>

    <table class="table text-center">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Таймстамп</th>
            <th scope="col">Имя</th>
            <th scope="col">Комментарий</th>
            <th scope="col">Количество</th>
            <th scope="col">Блюда</th>
            <th scope="col">Статус</th>
        </tr>
        </thead>
        <tbody id="tableOrder">
        @foreach($orders as $order)
            <tr>
                <th scope="row">{{$order->id}}</th>
                <td>{{$order->created_at->format('d.m.Y H:i')}}</td>
                <td>{{$order->user->name}}</td>
                <td>{{$order->comment}}</td>
                <td>{{$order->countOrder($order)}}</td>
                <td>
                    <ul>
                        @foreach($order->items as $product)
                            <li class="list-unstyled">{{$product->menu->name}} ({{$product->count}})</li>
                        @endforeach
                    </ul>
                </td>
                <td>
                    <form action="{{route('admin.orders.update', $order)}}"
                          method="post"
                          enctype="multipart/form-data"
                          class="row g-0">
                        @csrf
                        @method('PATCH')
                        <div class="col-md-8 d-flex flex-column justify-content-center align-items-center">
                            <select name="status" id="status" aria-label="status"
                                    onchange="changeStatus(this, {{$order}})">
                                @foreach($statuses as $status)
                                    <option {{$order->status->id == $status->id ? 'selected' : ''}}
                                            value="{{$status->id}}">
                                        {{$status->name}}
                                    </option>
                                @endforeach
                            </select>

                            @include('inc.modal-orderUpdate')

                            <div class="text-center mt-1">
                                <button class="btn btn-sm btn-outline-primary">Обновить</button>
                            </div>

                        </div>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

@push('scripts')
    <script src="{{asset('/js/workWithElements.js')}}"></script>
    <script>

        let myModal = new bootstrap.Modal($('OrderUpdate'));

        function changeStatus(target, order) {
            let element1 = document.querySelector('.modal-order').querySelector('.order_id')
            let element2 = document.querySelector('.modal-order').querySelector('.status_id');
            element1.value = order.id;
            element2.value = target.value;
            if (target.value == 3) {
                myModal.show();
            }
        }

    </script>
@endpush
