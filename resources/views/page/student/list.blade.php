@extends('includes.layout')
@section('h2-name', 'Главная')
@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.16/css/froala_editor.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.16/css/froala_style.min.css" rel="stylesheet" type="text/css" />
    @foreach($lists as $list)
        <div class="fr-view">
            {!! $list->mixed_content !!}
        </div>

    @endforeach
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.16/js/froala_editor.min.js"></script>
@endsection
