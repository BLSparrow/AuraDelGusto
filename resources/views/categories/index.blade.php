@extends('layouts.admin')
@section('title', 'Categories')

@section('content')
    @include('inc.success')
    <div class="container">
        <a href="{{route('admin.categories.create')}}" class="btn btn-primary my-4">Добавить категорию</a>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-3 g-3">
            @if(count($categories)!=0)
                @foreach($categories as $category)
                    @include('categories.categories')
                @endforeach
            @else
                <h3>Элементы отсутствуют!</h3>
            @endif
        </div>
    </div>
@endsection
