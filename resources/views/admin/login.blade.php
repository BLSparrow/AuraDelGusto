@extends('layouts.app')
@section('content')
    <main class="fon"
          style="background: url({{asset('storage/room.jpg')}})">
        <div class="container d-flex justify-content-center align-items-center mt-5">
            <form class="col col-md-8 col-lg-5" method="post" action="{{ route('admin.login.check') }}">
                @csrf
                <div class="text-center">
                    <a href="/"><img class="mb-4" src="{{ asset('storage/logo_for_restoran.png') }}"
                                     alt="img" width="150" height="150"></a>
                    <h1 class="h3 mb-3 fw-normal text-white">Вход для администратора</h1>
                </div>

                <div class="form-floating">
                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                           name="email" id="email" placeholder="name@example.com">
                    <label for="email">Email - адрес</label>
                </div>
                @error("email")
                <p><small class="text-danger">{{ $message }}</small></p>
                @enderror

                <div class="form-floating mb-3">
                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                           name="password" id="password" placeholder="Пароль">
                    <label for="password">Пароль</label>
                </div>
                @error("password")
                <p><small class="text-danger">{{ $message }}</small></p>
                @enderror

                @error("errorLogin")
                <p><small class="text-danger">{{ $message }}</small></p>
                @enderror

                <button class="w-100 btn btn-lg btn-primary" type="submit">Войти</button>
            </form>
        </div>
    </main>
@endsection
