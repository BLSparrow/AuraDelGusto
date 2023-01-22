<div class="col">
    <div class="card h-100">
        <img src="{{$table->image_url}}" class="card-img-top" alt="img">
        <div class="card-body d-flex flex-column justify-content-between">
            <h5 class="card-title">Номер стола: {{$table->number}}</h5>
            <p class="card-text">Кол. посадочных мест: {{$table->quantity}}</p>
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="{{route('admin.tables.edit', $table)}}" class="btn btn-outline-warning">Изменить</a>
            <form method="post" id="form" action="{{route('admin.tables.destroy', $table)}}">
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
