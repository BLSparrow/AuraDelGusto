<div class="col">
    <div class="card h-100">
        <img src="{{$menu->image_url}}" class="card-img-top" alt="img">
        <div class="card-body d-flex flex-column justify-content-between">
            <h3 class="card-title text-center">{{$menu->name}} ({{$menu->category->name}})</h3>
            <p class="card-text">{{$menu->description}}</p>
            <p class="d-flex flex-column">
                <span>Вес: {{$menu->weight}} г.</span>
                <span>Цена: {{$menu->price}} руб.</span>
                <span>Калорийность: {{$menu->kilocalories}} Ккал.</span>
            </p>
            <div>
                <h4>Состав:</h4>
                @foreach($menu->ingredients as $ingredient)
                    <ul>
                        <li>{{$ingredient->name}}</li>
                    </ul>
                @endforeach
            </div>
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="{{route('admin.menus.edit', $menu)}}" class="btn btn-outline-warning">Изменить</a>
            <form method="post" id="form" action="{{route('admin.menus.destroy', $menu)}}">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger"
                        onclick="return confirm('Вы действительно хотите удалить элемент?');">
                    Удалить
                </button>
            </form>
        </div>
    </div>
</div>
