@extends('admin.master_admin')
@section('produse')
aici este pagina cu logara

<form class="" action="/logare" method="post">
    @csrf
<p>numele</p>
<input type="text" name="username" value="">
<p>parola</p>
<input type="text" name="password" value="">
<br>

<button type="submit" name="button">logare</button>
@if(session('message'))
<div class="red">
{{session('message')}}
</div>
@endif
</form>

@endsection
