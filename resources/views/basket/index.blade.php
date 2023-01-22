@extends('layouts.app')
@section('title', 'Basket')
@section('content')
    <section class="fon" style="background: url({{asset('storage/room.jpg')}})">
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-4 order-1 order-lg-2">
                    <div class="card">
                        <div class="card-body">
                            <p>Итого: <span id="totalPrice"></span> &#8381;</p>
                            <p>В корзине <span id="countBasket"></span> эл.</p>
                            <form method="post" action="{{route('order.create')}}" id="formLogin">
                                @csrf
                                <div class="mb-2">
                                    <input type="tel" id="tel" name="tel" placeholder="Телефон"
                                           class="form-control form-control-sm @error('tel') is-invalid @enderror"
                                           aria-label="tel" value="{{old('tel')}}"/>
                                    @error("tel")
                                    <p><small class="text-danger">{{ $message }}</small></p>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <input type="text" id="address" name="address" placeholder="Адрес"
                                           class="form-control form-control-sm @error('address') is-invalid @enderror"
                                           aria-label="address" value="{{old('address')}}"/>
                                    @error("address")
                                    <p><small class="text-danger">{{ $message }}</small></p>
                                    @enderror
                                </div>
                                <div class="form-floating mb-2">
                                    <textarea class="form-control" placeholder="Напишите свой комментарий"
                                              id="comment" name="comment">{{old('comment')}}</textarea>
                                    <label for="comment">Комментарий (необязательно)</label>
                                </div>

                                <div class="mb-2">
                                    {!! NoCaptcha::display() !!}
                                    @error('g-recaptcha-response')
                                    <p><small class="text-danger">{{$message}}</small></p>
                                    @enderror
                                </div>

                                <div class="mb-2">
                                    <input type="password" id="password" name="password" placeholder="Пароль"
                                           class="form-control form-control-sm @error('password') is-invalid @enderror"
                                           aria-label="password"/>
                                    @error("password")
                                    <p><small class="text-danger">{{ $message }}</small></p>
                                    @enderror
                                </div>
                                <button type="submit" class="btn-create w-100">Заказать</button>
                            </form>
                        </div>
                    </div>

                </div>
                <div class="col-lg-8 order-2 order-lg-1 pt-5 pt-lg-0 content" id="baskets">
                    @foreach($basketMenus as $key => $product)
                        <div class="col" id="card-{{$product->id}}">
                            <div class="card rounded-3 mb-4">
                                <div class="card-body">
                                    <div class="row d-flex justify-content-between align-items-center">
                                        <div class="col-md-2 col-lg-2 col-xl-2 p-0">
                                            <img src="{{$product->menu->image_url}}"
                                                 class="img-fluid rounded-3" alt="{{$product->menu->name}}">
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-xl-3">
                                            <p class="lead fw-normal mb-2">{{$product->menu->name}}</p>
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-xl-3 d-flex">

                                            <button type="button" class="btn btn-sm btn-outline-secondary"
                                                    onclick="calcDec({{$key}}, {{$product->menu_id}})">-
                                            </button>
                                            <span><strong
                                                    id="count-{{$product->menu_id}}"
                                                    class="mx-2">{{$product->count}}</strong></span>
                                            <button class="btn btn-sm btn-outline-secondary"
                                                    onclick="calcInc({{$key}}, {{$product->menu_id}})">+
                                            </button>

                                        </div>
                                        <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                            <h5 class="mb-0"><strong
                                                    id="price-{{$product->menu_id}}">{{$product->price_in_rub}}</strong>
                                                &#8381;</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </section>
@endsection
@push('scripts')
    {!! NoCaptcha::renderJs() !!}
    <script src="{{asset('/js/workWithElements.js')}}"></script>
    <script src="{{asset('/js/fetchPost.js')}}"></script>
    <script>

        let basketMenus = @JSON($basketMenus);

        getTotalPrice(basketMenus);

        function showResult(product_id, product) {
            $('count-' + product_id).textContent = product.count;
            $('price-' + product_id).textContent = product.price;

            getTotalPrice(basketMenus);
        }

        function getTotalPrice(basketMenus) {
            let totalPrice = basketMenus.reduce((sum, item) => sum + item.menu.price * item.count, 0);
            let totalCount = basketMenus.reduce((sum, item) => sum + item.count, 0);
            document.querySelectorAll('#countBasket').forEach(el => {
                if (totalCount !== 0) {
                    el.textContent = totalCount;
                } else {
                    el.innerText = '0';
                }
            })
            $('totalPrice').textContent = `${parseInt(totalPrice).toLocaleString()}`;
        }

        async function calcDec(key, product_id) {
            let product = await postData('{{route('basket.minus')}}', product_id, '{{ csrf_token() }}');
            basketMenus[key].count = product.count;
            showResult(product_id, product);
        }

        async function calcInc(key, product_id) {
            let product = await postData('{{route('basket.plus')}}', product_id, '{{ csrf_token() }}');
            basketMenus[key].count = product.count;
            showResult(product_id, product);
        }

    </script>
@endpush
