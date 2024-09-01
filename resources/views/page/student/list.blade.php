@extends('includes.layout')
@section('h2-name', 'Главная')
@section('content')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <div class="container">
        <h1>Список Контента</h1>

        @foreach($lists as $content)
            <div class="content-item">
                <h2>Контент {{ $content->id }}</h2>
                <!-- Здесь просто выводим HTML контент, сохраненный в базе данных -->
                <div class="editor">
                    {!! $content->mixed_content !!}
                </div>
            </div>
        @endforeach
    </div>
@endsection
