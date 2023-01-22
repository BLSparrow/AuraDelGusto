@extends('layouts.admin')
@section('title', 'Staff-update')

@section('content')
    <div class="my-3">
        <div class="text-end p-3">
            <a href="{{route('admin.staff.index')}}" class="btn btn-outline-primary">Назад</a>
        </div>
        <div class="card mb-3">
            <form action="{{route('admin.staff.update', $staff)}}" method="post" enctype="multipart/form-data"
                  class="row g-0">
                @csrf
                @method('PATCH')
                <div class="col-md-8 d-flex flex-column justify-content-between">
                    <div class="card-body">

                        {{--login--}}
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('login') is-invalid @enderror" id="login"
                                   name="login"
                                   placeholder="Введите логин..." value="{{old('login', $staff->login)}}">
                            <label for="login" class="form-label">Название</label>
                            @error('login')
                            <p class="text-danger"><small>{{$message}}</small></p>
                            @enderror
                        </div>
                        {{--email--}}
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                   name="email" placeholder="name@example.com" value="{{old('email', $staff->email)}}">
                            <label for="email">Электронная почта</label>
                            @error('email')
                            <p><small class="text-danger">{{$message}}</small></p>
                            @enderror
                        </div>
                        {{--password--}}
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                   id="password" name="password" placeholder="password">
                            <label for="password">Пароль</label>
                            @error('password')
                            <p><small class="text-danger">{{$message}}</small></p>
                            @enderror
                        </div>

                        <div class="text-end">
                            <button class="btn btn-outline-primary">Изменить</button>
                        </div>

                        @error('updateError')
                        <p><small class="text-danger">{{$message}}</small></p>
                        @enderror

                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

