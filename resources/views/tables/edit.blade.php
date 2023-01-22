@extends('layouts.admin')
@section('title', 'table-update')

@section('content')
    <div class="my-3">
        <div class="text-end p-3">
            <a href="{{route('admin.tables.index')}}" class="btn btn-outline-primary">Назад</a>
        </div>
        <div class="card mb-3">
            <form action="{{route('admin.tables.update', $table)}}" method="post" enctype="multipart/form-data"
                  class="row g-0">
                @csrf
                @method('PATCH')
                <div class="col-md-8 d-flex flex-column justify-content-between">
                    <div class="card-body">
                        {{--Номер--}}
                        <div class="mb-3">
                            <label for="number" class="form-label">Номер стола</label>
                            <input type="text" class="form-control" id="number" name="number"
                                   placeholder="Введите номер..." value="{{old('number', $table->number)}}">
                            @error('number')
                            <p class="text-danger"><small>{{$message}}</small></p>
                            @enderror
                        </div>
                        {{--Кол. посад. мест--}}
                        <div class="mb-3">
                            <label for="quantity" class="form-label">Кол. посадочных мест</label>
                            <input type="number" class="form-control" id="quantity" name="quantity"
                                   placeholder="Введите количество..." value="{{old('quantity', $table->quantity)}}">
                            @error('quantity')
                            <p class="text-danger"><small>{{$message}}</small></p>
                            @enderror
                        </div>
                        {{--Изображение--}}
                        <div class="mb-3">
                            <label for="image" class="form-label">Выберите файл</label>
                            <input type="file" class="form-control" id="image" name="image"
                                   placeholder="Введите название..." value="{{old('image', $table->image_url)}}">
                            @error('image')
                            <p class="text-danger"><small>{{$message}}</small></p>
                            @enderror
                            <div class="mb-3 w-25">
                                <img src="{{old('image', $table->image_url)}}" alt="img"
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
