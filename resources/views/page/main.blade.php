@extends('includes.layout')
@section('content')
    @include('includes.header')
    <div class="grid grid-cols-5 mt-5">
        <a href="{{ route('page.cycle') }}" class="block box-shadow-light text-center">Циклы</a>
    </div>
@endsection
