<header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-around">

        <div class="logo me-auto">
            <h1><a href="{{route('index')}}"><img style="width: 70px;"
                                                  src="{{asset('storage/logo_for_restoran.png')}}" alt="logo">
                    <span class="logo-name">AuraDelGusto</span></a></h1>
        </div>

        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <li><a class="nav-link scrollto" href="{{route('index')}}#about">О нас</a></li>
                <li><a class="nav-link scrollto" href="{{route('index')}}#menu">Меню</a></li>
                <li><a class="nav-link scrollto" href="{{route('index')}}#chefs">Повара</a></li>
                <li><a class="nav-link scrollto" href="{{route('index')}}#contact">Контакты</a></li>
                @guest()
                    <li><a class="nav-link" href="{{route('login')}}">Войти</a></li>
                @endguest
                @auth()
                    <li><a class="nav-link"
                           href="{{route('profile')}}">Личный кабинет</a></li>
                    <li><a class="nav-link" href="{{route('logout')}}">Выйти</a></li>
                    <li><a class="nav-link" href="{{route('basket')}}"><i class="bi bi-cart4"
                                                                          style="font-size: 36px"></i><span
                                class="position-absolute start-100 translate-middle badge rounded-pill bg-danger"
                                id="countBasket">{{\App\Models\Basket::totalCount()}}</span></a></li>
                @endauth
            </ul>
        </nav><!-- .navbar -->

        <!---------------------------------------->
        <div class="mobile">
            <nav>
                <ul class="cd-primary-nav d-flex flex-column list-unstyled"
                    style="background: url({{asset('storage/fon_for_mobile.jpg')}})">
                    <li>
                        <a href="{{route('index')}}"><img style="width: 100px;"
                                                          src="{{asset('storage/logo_for_restoran.png')}}"
                                                          alt="logo"></a>
                    </li>
                    <li><a href="{{route('index')}}#about">О нас</a></li>
                    <li><a href="{{route('index')}}#menu">Меню</a></li>
                    <li><a href="{{route('index')}}#chefs">Повара</a></li>
                    <li><a href="{{route('index')}}#contact">Контакты</a></li>
                    @guest()
                        <li><a href="{{route('login')}}">Войти</a></li>
                    @endguest
                    @auth()
                        <li><a
                                href="{{route('profile')}}">Личный кабинет</a></li>
                        <li><a href="{{route('logout')}}">Выйти</a></li>
                        <li><a href="{{route('basket')}}"><i class="bi bi-cart4"
                                                             style="font-size: 36px"></i><span
                                    class="position-absolute translate-middle badge rounded-pill bg-danger"
                                    id="countBasket">{{\App\Models\Basket::totalCount()}}</span></a></li>
                    @endauth
                </ul>
            </nav>

            <div class="cd-overlay-nav">
                <span></span>
            </div> <!-- cd-overlay-nav -->

            <div class="cd-overlay-content">
                <span></span>
            </div> <!-- cd-overlay-content -->

            <a href="#0" class="cd-nav-trigger">Menu<span class="cd-icon"></span></a>
        </div>

        <a href="{{route('bookings.create')}}" class="book-a-table-btn button-nav">Забронировать столик</a>

    </div>
</header>

@push('scripts')
    <script src="{{asset('/js/workWithElements.js')}}"></script>
    <script src="{{asset('/js/fetchPost.js')}}"></script>
    <script>

        async function totalCount() {
            $('countBasket').textContent = await getCount('{{route('basket.count')}}');
        }

        document.querySelectorAll('.basket').forEach(item => {
            item.addEventListener('click', async (e) => {
                e.preventDefault();
                await postData('{{route('basket.plus')}}', e.currentTarget.id, '{{csrf_token()}}');
                await totalCount()
            });
        });

    </script>
@endpush
