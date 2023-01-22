@extends('layouts.admin')
@section('title', 'Bookings')

@section('content')
    @include('inc.success')
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-3 g-3">
            @if(count($bookings)!=0)
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Пользователь</th>
                        <th scope="col">№ Столика</th>
                        <th scope="col">Время начала</th>
                        <th scope="col">Время окончания</th>
                        <th scope="col">Сумма предоплаты</th>
{{--                        <th scope="col">Действия</th>--}}
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($bookings as $booking)
                        @include('bookings.bookings')
                    @endforeach
                    </tbody>
                </table>
            @else
                <h3>Элементы отсутствуют!</h3>
            @endif
        </div>
    </div>
@endsection
