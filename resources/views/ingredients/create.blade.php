@extends('layouts.admin')
@section('title', 'ingredient-create')

@section('content')
    <div class="my-3">
        @include('inc.errors')
        <div class="card mb-3">
            <form action="{{route('admin.ingredients.store')}}" method="post" enctype="multipart/form-data"
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

                        {{--Цена за 1кг--}}
                        <div class="mb-3">
                            <label for="price" class="form-label">Цена за 1кг</label>
                            <input type="number" class="form-control" id="price" name="price"
                                   placeholder="Введите стоимость..." value="{{old('price')}}">
                        </div>

                        {{--Ккал. на 100г--}}
                        <div class="mb-3">
                            <label for="kcal" class="form-label">Ккал. на 100г</label>
                            <input type="number" class="form-control" id="kcal" name="kcal"
                                   placeholder="Введите Ккал..." value="{{old('kcal')}}">
                        </div>

                        {{--Категория--}}
                        <div class="mb-3">
                            <select class="form-select" id="category_id" name="category_id" aria-label="category_id">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="text-end">
                            <button class="btn btn-outline-primary">Создать</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

