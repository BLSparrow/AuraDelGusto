@extends('layouts.admin')
@section('title', 'users')

@section('content')
    @include('inc.success')
    <p id="count_users"></p>
    <table class="table table-striped table-hover table-bordered">
        <thead class="table-light text-center">
        <tr>
            <th>
                <div class="d-flex justify-content-between align-items-center">
                    <span>Имя</span>
                </div>
            </th>
            <th>
                <div class="d-flex justify-content-between align-items-center">
                    <span>Email</span>
                </div>
            </th>
            <th>
                <div class="d-flex justify-content-between align-items-center">
                    <span>Адрес</span>
                </div>
            </th>
            <th>
                <div class="d-flex justify-content-between align-items-center">
                    <span>Телефон</span>
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
        @if(count($users)!=0)
            @foreach($users as $user)
                <tr>
                    <td id="full_name">{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->address}}</td>
                    <td>{{$user->tel}}</td>
                    <td class="text-center">
                        <form method="post" id="form" action="{{route('admin.users.destroy', $user)}}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger"
                                    onclick="return confirm('Вы действительно хотите удалить элемент?');">
                                Удалить
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @else
            <h3>Элементы отсутствуют!</h3>
        @endif
        </tbody>
    </table>
@endsection
@push('child-scripts')
    <script src="{{asset('/js/fetchGet.js')}}"></script>
    <script src="{{asset('/js/workWithElements.js')}}"></script>
    <script>
        start();
    </script>
@endpush
