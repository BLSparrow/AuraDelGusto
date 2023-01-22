@extends('layouts.app')
@section('title', 'auth')
@section('content')
    <main class="fon"
          style="background: url({{asset('storage/room.jpg')}})">
        <div class="container-fluid d-flex align-items-center justify-content-center mt-5">
            <div class="card col-10 col-xl-4 mt-5">
                <div class="card-header">
                    <h1 class="fs-3 text-center">Авторизация</h1>
                </div>
                <div class="card-body">
                    <form action="{{route('login.check')}}" method="post">
                        @csrf

                        <div class="form-floating mb-3">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                   name="email" placeholder="name@example.com" value="{{old('email')}}">
                            <label for="email">Почта</label>
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

                        <div class="form-floating mb-3">
                            {!! NoCaptcha::display() !!}
                            @error('g-recaptcha-response')
                            <p><small class="text-danger">{{$message}}</small></p>
                            @enderror
                        </div>

                        <div class="form-check">
                            <input type="checkbox" class="form-check-input"
                                   id="remember" name="remember" {{old('remember')?'checked':''}}>
                            <label class="form-check-label" for="remember">Запомнить меня</label>
                        </div>
                        @error('errorLogin')
                        <p><small class="text-danger">{{$message}}</small></p>
                        @enderror


                        <div class="d-flex justify-content-between my-3">
                            <button type="submit" class="btn btn-primary px-5">Войти</button>
                            <a class="text-secondary font-medium text-decoration-none rounded-md p-2"
                               href="{{route('register.index')}}">Регистрация</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
@push('scripts')
    {!! NoCaptcha::renderJs() !!}
@endpush
