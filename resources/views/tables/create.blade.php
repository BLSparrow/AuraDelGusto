@extends('layouts.admin')
@section('title', 'table-create')

@section('content')
    <div class="my-3">
        @include('inc.errors')
        <div class="card mb-3">
            <form action="{{route('admin.tables.store')}}" method="post" enctype="multipart/form-data"
                  class="row g-0">
                @csrf
                <div class="col-md-8 d-flex flex-column justify-content-between">
                    <div class="card-body">
                        {{--Номер--}}
                        <div class="mb-3">
                            <label for="number" class="form-label">Номер стола</label>
                            <input type="text" class="form-control" id="number" name="number"
                                   placeholder="Введите номер..." value="{{old('number')}}">
                        </div>
                        {{--Кол. посад. мест--}}
                        <div class="mb-3">
                            <label for="quantity" class="form-label">Кол. посадочных мест</label>
                            <input type="number" class="form-control" id="quantity" name="quantity"
                                   placeholder="Введите количество..." value="{{old('quantity')}}">
                        </div>
                        {{--Изображение--}}
                        <div class="mb-3">
                            <label for="image" class="form-label">Выберите файл</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                        <div class="text-end">
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
