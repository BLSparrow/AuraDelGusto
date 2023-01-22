@extends('layouts.admin')
@section('title', 'ingredient-update')

@section('content')
    <div class="my-3">
        <div class="text-end p-3">
            <a href="{{route('admin.ingredients.index')}}" class="btn btn-outline-primary">Назад</a>
        </div>
        <div class="card mb-3">
            <form action="{{route('admin.ingredients.update', $ingredient)}}" method="post"
                  enctype="multipart/form-data"
                  class="row g-0">
                @csrf
                @method('PATCH')
                <div class="col-md-8 d-flex flex-column justify-content-between">
                    <div class="card-body">
                        {{--Название--}}
                        <div class="mb-3">
                            <label for="name" class="form-label">Название</label>
                            <input type="text" class="form-control" id="name" name="name"
                                   placeholder="Введите название..." value="{{old('name', $ingredient->name)}}">
                            @error('name')
                            <p class="text-danger"><small>{{$message}}</small></p>
                            @enderror
                        </div>

                        {{--Цена за 1кг--}}
                        <div class="mb-3">
                            <label for="price" class="form-label">Цена за 1кг</label>
                            <input type="number" class="form-control" id="price" name="price"
                                   placeholder="Введите стоимость..." value="{{old('price', $ingredient->price)}}">
                            @error('price')
                            <p class="text-danger"><small>{{$message}}</small></p>
                            @enderror
                        </div>

                        {{--Ккал. на 100г--}}
                        <div class="mb-3">
                            <label for="kcal" class="form-label">Ккал. на 100г</label>
                            <input type="number" class="form-control" id="kcal" name="kcal"
                                   placeholder="Введите Ккал..." value="{{old('kcal', $ingredient->kcal)}}">
                            @error('kcal')
                            <p class="text-danger"><small>{{$message}}</small></p>
                            @enderror
                        </div>

                        {{--Категория--}}
                        <div class="mb-3">
                            <select class="form-select" id="category_id" name="category_id" aria-label="category_id">
                                <option
                                    value="{{old('category_id', $ingredient->category_id)}}"
                                    selected>{{old('category_id', $ingredient->category->name)}}</option>
                                @foreach($categories as $category)
                                    <option class="{{$category->id==$ingredient->category_id?'d-none':''}}"
                                            value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            @error('name')
                            <p class="text-danger"><small>{{$message}}</small></p>
                            @enderror
                        </div>
                        <div class="text-end">
                            <button class="btn btn-outline-primary">Изменить</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

