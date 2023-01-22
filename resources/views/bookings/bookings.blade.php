<tr>
    <td><a href="{{route('admin.users.index')}}">{{$booking->user->name}}</a></td>
    <td>{{$booking->table->number}}</td>
    <td>{{$booking->new_date_start}}</td>
    <td>{{$booking->new_date_end}}</td>
    <td>{{$booking->prepayment}}</td>
    <td>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <form method="post" id="form" action="{{route('admin.bookings.destroy', $booking)}}">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger"
                        onclick="return confirm('Вы действительно хотите удалить элемент?');">
                    Удалить
                </button>
            </form>
        </div>
    </td>
</tr>
