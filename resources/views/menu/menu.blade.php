@extends('layouts.app')

@section('title', 'Menu')

@section('content')
    <div class="fon" style="background: url({{asset('storage/img/room.jpg')}})">
        <div class="container">
            <div class="row mt-5">
                <div class="col mt-5">
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <a href="{{$menu->image_url}}" class="gallery-lightbox">
                                    <img src="{{$menu->image_url}}" class="img-fluid rounded-start"
                                         alt="{{$menu->name}}">
                                </a>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{$menu->name}}</h5>
                                    <p class="card-text">
                                        {{$menu->description}}<br>
                                        Вес: {{$menu->weight}} | {{$menu->kilocalories}} Ккал.<br>
                                        Стоимость: {{$menu->price}} &#8381;
                                    </p>
                                    <button class="basket book-a-table-btn" value="{{$menu->id}}"><i class="bi bi-cart4"
                                                                                                     style="font-size: 36px"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
