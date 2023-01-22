@extends('layouts.admin')
@section('title', 'menu-update')

@section('content')
    <div class="my-3">
        <div class="text-end p-3">
            <a href="{{route('admin.menus.index')}}" class="btn btn-outline-primary">Назад</a>
        </div>

        @if($message = session()->get('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <p>{{$message}}</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif


        <div class="card mb-3">
            <form action="{{route('admin.menus.update', $menu)}}" method="post"
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
                                   placeholder="Введите название..." value="{{old('name', $menu->name)}}">
                            @error('name')
                            <p class="text-danger"><small>{{$message}}</small></p>
                            @enderror
                        </div>
                        {{--Описание--}}
                        <div class="mb-3">
                            <label for="description" class="form-label">Описание</label>
                            <textarea type="text" class="form-control" id="description" name="description"
                                      rows="3">{{old('description', $menu->description)}}</textarea>
                            @error('description')
                            <p class="text-danger"><small>{{$message}}</small></p>
                            @enderror
                        </div>
                        {{--Изображение--}}
                        <div class="mb-3">
                            <label for="image" class="form-label">Выберите файл</label>
                            <input type="file" class="form-control" id="image" name="image"
                                   placeholder="Введите название..." value="{{old('image', $menu->image_url)}}">
                            @error('image')
                            <p class="text-danger"><small>{{$message}}</small></p>
                            @enderror
                            <div class="mb-3 w-25">
                                <img src="{{old('image', $menu->image_url)}}" alt="img"
                                     class="img-fluid rounded-start img-create" id="showImage"
                                     onchange="loadImage(this)">
                            </div>
                        </div>
                        {{--Категории--}}
                        <div class="mb-3">
                            <select name="category_id" class="form-select" aria-label="category_id">
                                <option value="{{$menu->category->id}}" selected>{{$menu->category->name}}</option>
                                @foreach($categories as $category)
                                    <option id="category_id"
                                            value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <p class="text-danger"><small>{{$message}}</small></p>
                            @enderror
                        </div>
                        {{--Вес--}}
                        <div class="mb-3">
                            <label for="weight" class="form-label">Вес (г.)</label>
                            <input type="number" class="form-control" id="weight" name="weight"
                                   value="{{old('weight', $menu->weight)}}">
                            @error('weight')
                            <p class="text-danger"><small>{{$message}}</small></p>
                            @enderror
                        </div>
                        {{--Цена--}}
                        <div class="mb-3">
                            <label for="price" class="form-label">Цена (руб.)</label>
                            <input type="number" class="form-control" id="price" name="price"
                                   value="{{old('price', $menu->price)}}">
                            @error('price')
                            <p class="text-danger"><small>{{$message}}</small></p>
                            @enderror
                        </div>
                        {{--Калории--}}
                        <div class="mb-3">
                            <label for="kilocalories" class="form-label">Количество Ккал</label>
                            <input type="number" class="form-control" id="kilocalories" name="kilocalories"
                                   value="{{old('kilocalories', $menu->kilocalories)}}">
                            @error('kilocalories')
                            <p class="text-danger"><small>{{$message}}</small></p>
                            @enderror
                        </div>
                        {{--Состав--}}
                        <h4>Состав</h4>
                        @foreach($ingredients as $ingredient)
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch"
                                       id="ingredient_id" name="ingredient_id[]"
                                       {{ in_array($ingredient->id, $menu->ingredients->pluck('id')->toArray()) ? 'checked' : '' }}
                                       value="{{old('ingredient_id', $ingredient->id)}}">
                                <label class="form-check-label"
                                       for="ingredient_id">{{$ingredient->name}}</label>
                            </div>
                        @endforeach
                        <div class="text-end">
                            <button class="btn btn-outline-primary">Изменить</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
