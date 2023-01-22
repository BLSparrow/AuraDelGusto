@extends('layouts.app')

@section('title', 'Menu')

@section('content')
    <section class="fon" style="background: url({{asset('storage/room.jpg')}})">
        <div class="container-fluid">
            <h1 class="text-light text-center mt-5">{{$category->name}}</h1>
            <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3 g-3 mt-5 justify-content-around">
                @foreach($menus as $menu)
                    <div class="col mt-5">

                        <div class="card bg-secondary bg-gradient bg-opacity-75 text-light h-100 m-2">
                            <div class="block overflow-hidden position-relative d-block">
                                <img src="{{$menu->image_url}}" class="card-img-top d-block position-relative"
                                     alt="{{$menu->name}}">
                                <div class="block-text text-center">
                                    @foreach($menu->ingredients as $ingredient)
                                        {{$ingredient->name}} |
                                    @endforeach
                                </div>
                            </div>

                            <div class="card-body d-flex flex-column justify-content-between">

                                <div class="text-center">
                                    <h3 class="card-title text-center">{{$menu->name}}</h3>
                                    <p class="card-text">{{$menu->description}}</p>
                                    <span>Вес: {{$menu->weight}} г. | {{$menu->kilocalories}} Ккал.</span>
                                </div>

                                <div class="d-flex justify-content-around align-items-center mt-1">
                                    <span class="h4 overall-color">{{$menu->price}} &#8381;</span>
                                    @auth()
                                        <button class="basket mb-2" id="{{$menu->id}}"><i class="bi bi-cart4"
                                                                                          style="font-size: 46px"></i>
                                        </button>
                                    @endauth
                                </div>

                            </div>


                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
