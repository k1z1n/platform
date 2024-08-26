@include('includes.message')
<form action="{{ route('api.register') }}" method="post">
    @csrf
    <input type="submit" value="send">
</form>
@if(session('ss'))
{{ session('ss') }}
@endif
