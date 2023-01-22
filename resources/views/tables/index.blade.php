@extends('layouts.admin')
@section('title', 'Tables')

@section('content')
    @include('inc.success')
    <div class="container">
        <a href="{{route('admin.tables.create')}}" class="btn btn-primary my-4">Добавить стол</a>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-3 g-3">
            @if(count($tables)!=0)
                @foreach($tables as $table)
                    @include('tables.tables')
                @endforeach
            @else
                <h3>Элементы отсутствуют!</h3>
            @endif
        </div>
    </div>
@endsection
