@extends('layouts.app')

@section('title', 'AuraDelGusto')

@section('content')

    <section id="hero">
        <div class="hero-container">
            <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

                <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

                <div class="carousel-inner" role="listbox">

                    <!-- Slide 1 -->
                    <div class="carousel-item active"
                         style="background-image: url({{asset('storage/slide/slide-1.jpg')}});">
                        <div class="carousel-container">
                            <div class="carousel-content">
                                <h2 class="animate__animated animate__fadeInDown">Aura<span>Del</span>Gusto</h2>
                                <p class="animate__animated animate__fadeInUp">Здесь царит прекрасная атмосфера,
                                    идеально подходящая для веселых встреч с друзьями, теплых семейных обедов и ужинов,
                                    а также для романтического свидания со своей второй половинкой.</p>
                                <div>
                                    <a href="#menu" class="btn-menu animate__animated animate__fadeInUp scrollto">Сделать
                                        заказ</a>
                                    <a href="{{route('bookings.create')}}"
                                       class="btn-book animate__animated animate__fadeInUp scrollto">Забронировать
                                        столик</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 2 -->
                    <div class="carousel-item"
                         style="background-image: url({{asset('storage/slide/slide-2.jpg')}});">
                        <div class="carousel-container">
                            <div class="carousel-content">
                                <h2 class="animate__animated animate__fadeInDown">Aura<span>Del</span>Gusto</h2>
                                <p class="animate__animated animate__fadeInUp">Здесь царит прекрасная атмосфера,
                                    идеально подходящая для веселых встреч с друзьями, теплых семейных обедов и ужинов,
                                    а также для романтического свидания со своей второй половинкой.</p>
                                <div>
                                    <a href="#menu" class="btn-menu animate__animated animate__fadeInUp scrollto">Сделать
                                        заказ</a>
                                    <a href="{{route('bookings.create')}}"
                                       class="btn-book animate__animated animate__fadeInUp scrollto">Забронировать
                                        столик</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <a class="carousel-control-prev text-decoration-none" href="#heroCarousel" role="button"
                   data-bs-slide="prev">
                    <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
                </a>

                <a class="carousel-control-next text-decoration-none" href="#heroCarousel" role="button"
                   data-bs-slide="next">
                    <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
                </a>

            </div>
        </div>
    </section>

    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container-fluid">

                <div class="row">

                    <div
                        class="col-lg-5 align-items-stretch video-box m-0 m-lg-auto animate__animated animate__fadeInLeft"
                        style='background-image: url({{asset('storage/about.jpg')}});'>
                    </div>

                    <div
                        class="col-lg-6 d-flex flex-column justify-content-center align-items-stretch  animate__animated animate__fadeInRight">

                        <div class="content">
                            <h3><strong>" L’appetito vien mangiando "</strong> - " Аппетит приходит во время еды "</h3>
                            <p>Это любимая фраза всех итальянцев и наш Шеф-повар не исключение. Он считает, что
                                приготовление блюд - это искусство и блюдо должно приносить не только физическое
                                наслаждение, но и духовное</p>
                            <p class="fst-italic">Помимо аппетитных и красивых блюд наш ресторан сможет Вас
                                удивить:</p>
                            <ul>
                                <li><i class="bx bx-check-double"></i>авторским интеръером, который перенесёт Вас в
                                    Италию;
                                </li>
                                <li><i class="bx bx-check-double"></i>профессионализмом наших официантов и поваров;</li>
                                <li><i class="bx bx-check-double"></i>приятными ценами на блюда и напитки.</li>
                            </ul>
                            <p>Авторский интеръер, домашняя паста, римская и классическая пиццы - перенесут Вас в
                                атмосферу
                                калоритной и
                                солничной Италии, прямиком на берега Сарренто. Наш ресторан рассположен очень удобно и
                                до него можно добраться из любой точки города. Также к ресторану имеется подъезд со всех
                                сторон.</p>
                        </div>

                    </div>

                </div>
            </div>
        </section>

        <!-- ======= sub ======= -->
        <section id="sub" class="sub" style="background: url({{asset('storage/event-birthday.jpg')}});">
            <div class="container">

                <div class="section-title">
                    <h2><span>Подпишись</span> на рассылку</h2>
                </div>

                <div class="row d-flex flex-column">
                    <div
                        class="col-12 col-sm-12 col-lg-10 col-md-8 col-xl-6 m-auto mb-5 d-flex justify-content-center align-items-center">
                        <i class="bi bi-gift text-warning mx-3" style="font-size: 46px"></i>
                        <span>Мы представляем специальные акции и предложения только для подписчиков рассылки</span>
                    </div>

                    <div class="col-12 col-sm-12 col-lg-10 col-md-8 col-xl-6 m-auto">
                        <form>
                            <div class="d-flex justify-content-between align-items-center">
                                <input class="form-control" type="email" placeholder="Ваша почта" aria-label="email">
                                <a href="#" class="book-a-table-btn mx-1">Подписаться</a>
                            </div>

                            <div class="mt-2">
                                Нажимая кнопку "Подписаться" вы соглашаетесь с <a href="{{route('politics')}}">политикой
                                    конфиденциальности</a>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

        </section>

        <!-- ======= Gallery Section ======= -->
        <section id="gallery" class="gallery">
            <div class="container-fluid">

                <div class="section-title">
                    <h2><span>Категории блюд</span></h2>
                </div>
                <div class="row g-0">
                    @foreach($categories as $category)
                        <div class="col-lg-4 col-md-4">
                            <div class="gallery-item">
                                <a href="{{route('menus.filter', $category)}}"
                                   class="position-relative">
                                        <span
                                            class="position-absolute text-light bg-light bg-opacity-50 w-100 text-center py-2 h3">{{$category->name}}</span>
                                    <img src="{{$category->image_url}}" alt="{{$category->name}}" class="img-fluid">
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </section><!-- End Gallery Section -->

        <!-- ======= Menu Section ======= -->
        <section id="menu" class="menu">
            <div class="container">

                <div class="section-title">
                    <h2><span>Menu</span></h2>
                </div>

                <div class="row">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <ul id="menu-flters">
                            <li data-filter="*" class="filter-active">Всё</li>
                            @foreach($categories as $category)
                                <li data-filter=".filter-{{$category->name}}">{{$category->name}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @include('inc.modal-menu')
                <div class="row menu-container">
                    @foreach($menus as $menu)
                        <div class="col-lg-6 menu-item filter-{{$menu->category->name}}">
                            <div class="menu-content">
                                <a href="##" class="menuId" id="{{$menu->id}}">{{$menu->name}}</a><span>{{$menu->price}} &#8381;</span>
                            </div>
                            <div class="menu-ingredients w-75">
                                @foreach($menu->ingredients as $ingredient)
                                    {{$ingredient->name}} |
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- ======= Chefs Section ======= -->
        <section id="chefs" class="chefs" style="background: url({{asset('storage/chefs-bg.jpg')}});">
            <div class="container">

                <div class="section-title">
                    <h2>Наши <span>повара</span></h2>
                    <p>Эти люди точно смогут удивить и взбудоражить Ваши вкусовые ощущения</p>
                </div>

                <div class="row">
                    @foreach($cooks as $cook)
                        <div class="col-lg-4 col-md-6">
                            <div class="member">
                                <div class="pic"><img src="{{$cook->image_url}}" class="img-fluid"
                                                      alt="{{$cook->name}}">
                                </div>
                                <div class="member-info">
                                    <h4>{{$cook->name}}</h4>
                                    <span>{{$cook->position}}</span>
                                    <div class="social">
                                        <a href="#"><i class="bi bi-discord"></i></a>
                                        <a href="#"><i class="bi bi-whatsapp"></i></a>
                                        <a href="#"><i class="bi bi-telegram"></i></a>
                                        <a href="#"><i class="bi bi-github"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </section><!-- End Chefs Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container">

                <div class="section-title">
                    <h2>Контакты</h2>
                </div>
            </div>

            <div class="map">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2711.805954872025!2d61.4484098948728!3d55.14219038405764!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x43c5f2a5350307f3%3A0x8ca910620d48c42d!2z0J_QvtC70LjRgtC10YXQvdC40YfQtdGB0LrQuNC5INC60L7QvNC_0LvQtdC60YEg0K7QttC90L4t0KPRgNCw0LvRjNGB0LrQvtCz0L4g0LPQvtGB0YPQtNCw0YDRgdGC0LLQtdC90L3QvtCz0L4g0YLQtdGF0L3QuNGH0LXRgdC60L7Qs9C-INC60L7Qu9C70LXQtNC20LA!5e0!3m2!1sru!2sru!4v1654026246967!5m2!1sru!2sru"
                    style="border:0; width: 100%; height: 350px;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

            <div class="container mt-5">

                <div class="info-wrap">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 info">
                            <i class="bi bi-geo-alt"></i>
                            <h4>Адрес:</h4>
                            <p class="fs-6"><span class="color-info">г. Челябинск<br>ул. Гагарина 7</span></p>
                        </div>

                        <div class="col-lg-3 col-md-6 info mt-4 mt-lg-0">
                            <i class="bi bi-clock"></i>
                            <h4>Часы работы:</h4>
                            <p class="fs-6"><span class="color-info">Понедельник-Воскресенье:<br>11:00 - 23:00</span>
                            </p>
                        </div>

                        <div class="col-lg-3 col-md-6 info mt-4 mt-lg-0">
                            <i class="bi bi-envelope"></i>
                            <h4>Email:</h4>
                            <p>
                                <a class="text-decoration-none color-info fs-6" href="mailto:info@example.com">info@example.com</a><br>
                                <a class="text-decoration-none color-info fs-6" href="mailto:contact@example.com">contact@example.com</a>
                            </p>
                        </div>

                        <div class="col-lg-3 col-md-6 info mt-4 mt-lg-0">
                            <i class="bi bi-phone"></i>
                            <h4>Телефон:</h4>
                            <p><a class="text-decoration-none color-info fs-6" href="tel:+7(919) 137-15-65"> +7(919)
                                    137-15-65</a></p>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End Contact Section -->

    </main>
@endsection
@push('scripts')
    <script src="{{asset('/js/workWithElements.js')}}"></script>
    <script src="{{asset('/js/fetchPost.js')}}"></script>
    <script>
        async function showModal(id) {
            let myModal = new bootstrap.Modal(document.getElementById('exampleModalToggle'));
            let data = await postData('/menus/menu-show', id, '{{ csrf_token() }}');
            if (data != null) {
                let res = data;
                $('infoMenu').innerHTML = `
                            <div class="h-100 p-0">
                                <img src="${res.image}" class="card-img-top" alt="${res.name}">
                                <div class="card-body d-flex flex-column justify-content-between">

                                    <div class="text-center">
                                        <h3 class="card-title text-center">${res.name}</h3>
                                        <p class="card-text">${res.description}</p>
                                        <span>Вес: ${res.weight} г. | ${res.kilocalories} Ккал.</span>
                                    </div>

                                    <div class="d-flex justify-content-around align-items-center mt-1">
                                        <span class="h4 overall-color">${res.price} &#8381;</span>
                                        @auth()
                <button class="basket mb-2" value="${res.id}"><i class="bi bi-cart4" style="font-size: 46px"></i></button>
                                        @endauth
                </div>

            </div>
</div>`;
                myModal.show();
            }
        }

        async function totalCount() {
            $('countBasket').textContent = await getCount('{{route('basket.count')}}');
        }

        document.querySelectorAll('.menuId').forEach(item => {
            item.addEventListener('click', async (e) => {
                let data = {menuId: e.target.id,}
                await showModal(data);
                document.querySelector('.basket').addEventListener('click', async (e) => {
                    e.preventDefault();
                    await postData('{{route('basket.plus')}}', e.currentTarget.value, '{{csrf_token()}}');
                    await totalCount()
                });
            });
        });
    </script>
@endpush
