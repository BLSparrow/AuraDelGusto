@extends('layouts.app')
@section('title', 'auth')
@section('content')
    <main class="d-flex align-items-center justify-content-center fon"
          style="background: url({{asset('storage/room.jpg')}})">
        <div class="container-fluid d-flex align-items-center justify-content-center mt-5">
            <div class="card col-10 col-xl-4">
                <div class="card-header">
                    <h1 class="fs-3 text-center">Регистрация</h1>
                </div>
                <div class="card-body">
                    <form action="{{route('register.store')}}" method="post">
                        @csrf

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                   name="name" placeholder="Введите своё имя" value="{{old('name')}}">
                            <label for="name">Имя</label>
                            @error('name')
                            <p><small class="text-danger">{{$message}}</small></p>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                   name="email" placeholder="name@example.com" value="{{old('email')}}">
                            <label for="email">Электронная почта</label>
                            @error('email')
                            <p><small class="text-danger">{{$message}}</small></p>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                   id="password" name="password" placeholder="password">
                            <label for="password">Пароль</label>
                            <p class="text-muted" style="font-size: 12px">(Латинские буквы и цифры. Одна заглавная
                                буква. Мин. 8 символов)</p>
                            @error('password')
                            <p><small class="text-danger">{{$message}}</small></p>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="password_confirmation"
                                   name="password_confirmation"
                                   placeholder="Password">
                            <label for="password_confirmation">Повторите пароль</label>
                            @error('password_confirmation')
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
                            <input type="checkbox" class="form-check-input" id="rules" name="rules" checked>
                            <label class="form-check-label" for="rules">Согласен/на с <a href="{{route('politics')}}">Политикой
                                    конфиденциальности</a></label>
                        </div>

                        <div class="d-flex justify-content-between my-3">
                            <button type="submit" class="btn btn-primary px-5" id="submitReg">Регистрация</button>
                            <a class="text-secondary font-medium text-decoration-none rounded-md p-2"
                               href="{{route('login')}}">Есть аккаунт</a>
                        </div>

                        @error('errorRegister')
                        <p><small class="text-danger">{{$message}}</small></p>
                        @enderror
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
@push('scripts')
    {!! NoCaptcha::renderJs() !!}
    <script src="{{asset('/js/workWithElements.js')}}"></script>
    <script>
        //Отключаем кнопку, если пользователь не согласен
        $('rules').addEventListener('change', (e) => {
            $('submitReg').disabled = !e.target.checked;
        });
    </script>
@endpush
