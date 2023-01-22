@extends('layouts.admin')
@section('title', 'category-update')

@section('content')
    <div class="my-3">
        <div class="text-end p-3">
            <a href="{{route('admin.categories.index')}}" class="btn btn-outline-primary">Назад</a>
        </div>
        <div class="card mb-3">
            <form action="{{route('admin.categories.update', $category)}}" method="post" enctype="multipart/form-data"
                  class="row g-0">
                @csrf
                @method('PATCH')
                <div class="col-md-8 d-flex flex-column justify-content-between">
                    <div class="card-body">
                        {{--Название--}}
                        <div class="mb-3">
                            <label for="name" class="form-label">Название</label>
                            <input type="text" class="form-control" id="name" name="name"
                                   placeholder="Введите название..." value="{{old('name', $category->name)}}">
                            @error('name')
                            <p class="text-danger"><small>{{$message}}</small></p>
                            @enderror
                        </div>
                        {{--Описание--}}
                        <div class="mb-3">
                            <label for="description" class="form-label">Описание</label>
                            <textarea type="text" class="form-control" id="description" name="description"
                                      rows="3">{{old('description', $category->description)}}</textarea>
                            @error('description')
                            <p class="text-danger"><small>{{$message}}</small></p>
                            @enderror
                        </div>
                        {{--Изображение--}}
                        <div class="mb-3">
                            <label for="image" class="form-label">Выберите файл</label>
                            <input type="file" class="form-control" id="image" name="image"
                                   placeholder="Введите название..." value="{{old('image', $category->image_url)}}">
                            @error('image')
                            <p class="text-danger"><small>{{$message}}</small></p>
                            @enderror
                            <div class="mb-3 w-25">
                                <img src="{{old('image', $category->image_url)}}" alt="img"
                                     class="img-fluid rounded-start img-create" id="showImage"
                                     onchange="loadImage(this)">
                            </div>
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
