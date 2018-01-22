@extends('layout')

@section('title', 'Home')

@section('content')

    <h3>Add new book</h3>

        {{ Form::open(['class' => 'form-horizontal', 'files' => 'true', 'method' => 'post', 'route' => 'addBook']) }}
        {{ csrf_field() }}

            <input type="text" class="form-control" name="author" style="width: 500px" placeholder="author">
            <input class="form-control" type="text" name="name" style="width: 500px" placeholder="name">
            <input class="form-control" type="number" name="pages" style="width: 500px" placeholder="count">
            <textarea class="form-control" name="description" style="width: 500px; height: 100px" placeholder="desc"></textarea>
            <input type="file" name="input_image" accept="image/*">
            <button type="submit" class="btn btn-primary" onclick="addBook()">Submit</button>

        {{ Form::close() }}

        <script src="/public/js/main.js"></script>

@endsection

