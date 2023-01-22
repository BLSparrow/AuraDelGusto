@extends('layouts.app')
@section('title', 'profile')

@section('content')
    <section id="profile" class="fon" style="background: url({{asset('storage/events-bg.jpg')}})">
        <div class="container">
            @if(Auth::check())
                <h2 class="text-center text-light my-5">Здратвуйте {{Auth::user()->name}}. Это ваш личный кабинет</h2>
                <div class="d-flex flex-column mt-5 text-center m-auto" style="width: 360px;">
                    <a href="{{route('users.edit', Auth::user()->id)}}" class="btn-create mb-3">Редактировать мои
                        данные</a>
                    <a href="{{route('profile.index')}}" class="btn-create mb-3">Мои заказы</a>
                </div>
            @else
                <h3>Что-то пошло не так!</h3>
            @endif
        </div>
    </section>
@endsection
