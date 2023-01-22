@extends('layouts.admin')
@section('title', 'menu-create')

@section('content')
    <div class="my-3">
        @include('inc.errors')
        <div class="card mb-3">
            <form action="{{route('admin.menus.store')}}" method="post" enctype="multipart/form-data"
                  class="row g-0">
                @csrf
                <div class="col-md-8 d-flex flex-column justify-content-between">
                    <div class="card-body">
                        {{--Название--}}
                        <div class="mb-3">
                            <label for="name" class="form-label">Название</label>
                            <input type="text" class="form-control" id="name" name="name"
                                   placeholder="Введите название..." value="{{old('name')}}">
                            @error('name')
                            <p class="text-danger"><small>{{$message}}</small></p>
                            @enderror
                        </div>
                        {{--Описание--}}
                        <div class="mb-3">
                            <label for="description" class="form-label">Описание</label>
                            <textarea type="text" class="form-control" id="description" name="description"
                                      rows="3">{{old('description')}}</textarea>
                            @error('description')
                            <p class="text-danger"><small>{{$message}}</small></p>
                            @enderror
                        </div>
                        {{--Изображение--}}
                        <div class="mb-3">
                            <label for="image" class="form-label">Выберите файл</label>
                            <input type="file" class="form-control" id="image" name="image">
                            @error('image')
                            <p class="text-danger"><small>{{$message}}</small></p>
                            @enderror
                        </div>
                        {{--Категории--}}
                        <div class="mb-3">
                            <select name="category_id" class="form-select" aria-label="category_id">
                                @foreach($categories as $category)
                                    <option id="category_id"
                                            value="{{$category->id}}">{{$category->name}}</option>
                                    @error('category_id')
                                    <p class="text-danger"><small>{{$message}}</small></p>
                                    @enderror
                                @endforeach
                            </select>
                        </div>

                        {{--Состав--}}
                        <h4>Состав</h4>
                        @foreach($ingredients as $ingredient)
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch"
                                           id="ingredient_id" name="ingredient_id[]" value="{{$ingredient->id}}">
                                    <label class="form-check-label"
                                           for="ingredient_id">{{$ingredient->name}}</label>
                                </div>

                                <div class="mb-1">
                                    <input class="form-control" type="number" id="weightIng" name="weightIng[]"
                                           value="{{old('weightIng')}}" aria-label="weightIng"
                                           placeholder="Вес на порцию">
                                </div>
                            </div>
                        @endforeach
                        <div class="text-end mt-2">
                            <button class="btn btn-outline-primary">Создать</button>
                        </div>
                    </div>
                </div>
                <div class="mb-4 w-25">
                    <img src="{{old('image', asset('/storage/no-foto.jpg'))}}" alt="img"
                         class="img-fluid rounded-start img-create" id="showImage">
                </div>
            </form>
        </div>
    </div>
@endsection
