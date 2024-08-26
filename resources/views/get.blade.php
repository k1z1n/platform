@include('includes.message')
<form action="{{ route('get.register') }}" method="post">
    @csrf
    <input type="submit" value="send">
</form>
@if(session('ss'))
    @php
        $response = json_decode(session('ss'), true);
    @endphp

    <pre>{{ print_r($response, true) }}</pre>
@endif
