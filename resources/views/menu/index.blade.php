@extends('layouts.admin')
@section('title', 'Menus')

@section('content')
    @include('inc.success')
    <div class="container">
        <a href="{{route('admin.menus.create')}}" class="btn btn-primary my-4">Добавить блюдо</a>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-3 g-3">
            @if(count($menus)!=0)
                @foreach($menus as $menu)
                    @include('menu.menus')
                @endforeach
            @else
                <h3>Элементы отсутствуют!</h3>
            @endif
        </div>
    </div>
@endsection
