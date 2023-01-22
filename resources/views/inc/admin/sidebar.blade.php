<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block collapse border border-1 min-vh-100">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            {{--Менеджеры--}}
            @if(auth('admin')->user()->role->name=='Админ')
                <li class="w-100">
                    <a href="{{route('admin.staff.index')}}" class="nav-link"> <span
                            class="d-none d-sm-inline">Менеджеры</span></a>
                </li>
            @endif

            {{--Посетители--}}
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.users.index')}}">Посетители</a>
            </li>

            {{--Категории--}}
            <li class="w-100">
                <a href="{{route('admin.categories.index')}}" class="nav-link"> <span
                        class="d-none d-sm-inline">Категории</span></a>
            </li>

            {{--Ингредиенты--}}
            <li class="w-100">
                <a href="{{route('admin.ingredients.index')}}" class="nav-link"> <span
                        class="d-none d-sm-inline">Ингредиенты</span></a>
            </li>

            {{--Блюда--}}
            <li class="w-100">
                <a href="{{route('admin.menus.index')}}" class="nav-link"> <span
                        class="d-none d-sm-inline">Блюда</span></a>
            </li>

            {{--Столы--}}
            <li class="w-100">
                <a href="{{route('admin.tables.index')}}" class="nav-link"> <span
                        class="d-none d-sm-inline">Столы</span></a>
            </li>

            {{--Бронь--}}
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.bookings.index')}}">Бронь</a>
            </li>

            {{--Заказы--}}
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.orders.index')}}">Заказы</a>
            </li>
        </ul>
    </div>
</nav>
