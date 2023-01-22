@extends('layouts.admin')
@section('title', 'Managers')

@section('content')
    @include('inc.success')
    <a href="{{route('admin.staff.create')}}" class="btn btn-primary my-4">Добавить менеджера</a>
    <table class="table table-striped table-hover table-bordered">
        <thead class="table-light text-center">
        <tr>
            <th>
                <div class="d-flex justify-content-between align-items-center">
                    <span>Логин</span>
                </div>
            </th>
            <th>
                <div class="d-flex justify-content-between align-items-center">
                    <span>Email</span>
                </div>
            </th>
            <th>
                <div class="d-flex justify-content-between align-items-center">
                    <span>Действия</span>
                </div>
            </th>
        </tr>
        </thead>
        <tbody>
        @if(count($managers)!=0)
            @foreach($managers as $manager)
                @if($manager->role->id==2)
                    <tr>
                        <td>{{$manager->login}}</td>
                        <td>{{$manager->email}}</td>
                        <td class="text-center">
                            <div class="d-grid gap-2 d-md-flex justify-content-center">
                                <a href="{{route('admin.staff.edit', $manager)}}"
                                   class="btn btn-outline-warning">Изменить</a>
                                <form method="post" id="form"
                                      action="{{route('admin.staff.destroy', $manager)}}">
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
                @endif
            @endforeach
        @else
            <h3>Элементы отсутствуют!</h3>
        @endif
        </tbody>
    </table>
@endsection
