@extends('layouts.admin')
@section('title', 'category-create')

@section('content')
    <div class="my-3">
        @include('inc.errors')
        <div class="card mb-3">
            <form action="{{route('admin.categories.store')}}" method="post" enctype="multipart/form-data"
                  class="row g-0">
                @csrf
                <div class="col-md-8 d-flex flex-column justify-content-between">
                    <div class="card-body">
                        {{--Название--}}
                        <div class="mb-3">
                            <label for="name" class="form-label">Название</label>
                            <input type="text" class="form-control" id="name" name="name"
                                   placeholder="Введите название..." value="{{old('name')}}">
                        </div>
                        {{--Описание--}}
                        <div class="mb-3">
                            <label for="description" class="form-label">Описание</label>
                            <textarea type="text" class="form-control" id="description" name="description"
                                      rows="3">{{old('description')}}</textarea>
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
                    <img src="{{old('image', asset('/storage/img/no-foto.jpg'))}}" alt="img"
                         class="img-fluid rounded-start img-create" id="showImage">
                </div>
            </form>
        </div>
    </div>
@endsection
