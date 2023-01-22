@extends('layouts.admin')

@section('content')
    <div class="row row-cols-sm-2 row-cols-md-3  row-cols-lg-3 g-3">
        <div class="col">
            <div class="card text-white bg-info">
                <div class="card-header">Пользователи</div>
                <div class="card-body">
                    <h5 class="card-title">{{count($users)}} зап.</h5>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-white bg-warning">
                <div class="card-header">Ингредиенты</div>
                <div class="card-body">
                    <h5 class="card-title">{{count($ingredients)}} зап.</h5>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-white bg-primary">
                <div class="card-header">Категории</div>
                <div class="card-body d-flex">
                    <h5 class="card-title">{{count($categoryProducts)}} зап.</h5>
                    <h5 class="card-title mx-2">{{count($categoryIngredients)}} зап.</h5>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-white bg-danger">
                <div class="card-header">Блюда</div>
                <div class="card-body">
                    <h5 class="card-title">{{count($menus)}} зап.</h5>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-white bg-secondary">
                <div class="card-header">Столы</div>
                <div class="card-body">
                    <h5 class="card-title">{{count($tables)}} зап.</h5>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-white bg-success">
                <div class="card-header">Бронь</div>
                <div class="card-body">
                    <h5 class="card-title">{{count($bookings)}} зап.</h5>
                </div>
            </div>
        </div>
    </div>
@endsection
