@extends('layouts.admin')
@section('title', 'Ingredients')

@section('content')
    @include('inc.success')
    <div class="container">
        <a href="{{route('admin.ingredients.create')}}" class="btn btn-primary my-4">Добавить ингредиент</a>
        @if(count($ingredients)!=0)
            @foreach($ingredients as $ingredient)
                <ul class="list-group">
                    <li class="list-group-item">{{$ingredient->name}} ({{$ingredient->category->name}})
                        Ккал:{{$ingredient->kcal}} Цена:{{$ingredient->price}}
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{route('admin.ingredients.edit', $ingredient)}}"
                               class="btn btn-outline-warning">Изменить</a>
                            <form method="post" id="form" action="{{route('admin.ingredients.destroy', $ingredient)}}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger"
                                        onclick="return confirm('Вы действительно хотите удалить элемент?');">
                                    Удалить
                                </button>
                            </form>
                        </div>
                    </li>
                </ul>
            @endforeach
        @else
            <h3>Элементы отсутствуют!</h3>
        @endif
    </div>
@endsection
