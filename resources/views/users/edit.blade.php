@extends('layouts.app')
@section('title', 'auth')
@section('content')
    <main class="fon"
          style="background: url({{asset('storage/img/events-bg.jpg')}})">
        <div class="container-fluid d-flex align-items-center justify-content-center mt-5">
            <div class="card col-10 col-xl-4 mt-5">
                <div class="card-header">
                    <h1 class="fs-3 text-center">Мои данные</h1>
                </div>
                <div class="card-body">
                    <form action="{{route('users.update', $user)}}" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="name"
                                   name="name" placeholder="Имя" value="{{old('name', $user->name)}}">
                            <label for="name">Имя</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="tel" class="form-control" id="tel"
                                   name="tel" placeholder="Телефон" value="{{old('tel', $user->tel)}}">
                            <label for="tel">Телефон</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="address"
                                   name="address" placeholder="Адрес" value="{{old('address', $user->address)}}">
                            <label for="address">Адрес</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="email"
                                   name="email" placeholder="name@example.com" value="{{old('email', $user->email)}}">
                            <label for="email">Почта</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" class="form-control"
                                   id="password" name="password" placeholder="password">
                            <label for="password">Старый пароль</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" class="form-control"
                                   id="newPassword" name="newPassword" placeholder="newPassword">
                            <label for="newPassword">Новый пароль</label>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <button class="btn-create text-center">Изменить</button>
                            <a href="{{route('profile')}}" class="btn-create">Назад</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
