@extends('layout')

@section('title', 'List')

@section('content')

    <div class="text-center">
        {{ $books->links() }}
    </div>

    <div class="row row-conformity">
        @if (!empty($books))
            @foreach ($books as $book)
                <div class="col-sm-4">
                    <h3><b>{{ $book->name }}</b></h3>
                    <i><h4>Автор: {{ $book->author }} </h4></i>
                    <img src="/public/images/{{ $book->image }}" width="200" height="250"><br><br>
                    <b>Страниц: </b> {{ $book->pages }} <br>
                    <b>Описание: </b>{{ $book->description }}
                </div>
            @endforeach
        @endif
    </div>

@endsection

