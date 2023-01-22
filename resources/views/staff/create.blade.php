@extends('layouts.admin')
@section('title', 'Create manager')
@section('content')
    <div class="card offset-4 col-4 my-5">
        <div class="card-header">
            <h1 class="fs-3">Регистрация менеджера</h1>
        </div>
        <div class="card-body">
            <form action="{{route('admin.staff.store')}}" method="post">
                @csrf

                <div class="form-floating mb-3">
                    <input type="text" class="form-control @error('login') is-invalid @enderror" id="login"
                           name="login" placeholder="Введите логин" value="{{old('login')}}">
                    <label for="login">Логин</label>
                    @error('name')
                    <p><small class="text-danger">{{$message}}</small></p>
                    @enderror
                </div>

                <div class="form-floating mb-3">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                           name="email" placeholder="name@example.com">
                    <label for="email">Электронная почта</label>
                    @error('email')
                    <p><small class="text-danger">{{$message}}</small></p>
                    @enderror
                </div>

                <div class="form-floating mb-3">
                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                           id="password" name="password" placeholder="password">
                    <label for="password">Пароль</label>
                    @error('password')
                    <p><small class="text-danger">{{$message}}</small></p>
                    @enderror
                </div>


                <div class="d-flex justify-content-between my-3">
                    <button type="submit" class="btn btn-primary px-5">Регистрация</button>
                </div>

                @error('errorRegister')
                <p><small class="text-danger">{{$message}}</small></p>
                @enderror
            </form>
        </div>
    </div>
@endsection
