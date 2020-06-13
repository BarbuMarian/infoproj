@extends('admin.master_admin')
@section('produse')
{{--
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
--}}

<div class="container">
    <form  action="/logare" method="post">
        @csrf
      <div class="form-group">
        <label>Utilizator</label>
        <input type="text" class="form-control" name="username" value="">
      </div>
      <div class="form-group">
        <label>Parola</label>
        <input type="password" class="form-control"  name="password">
      </div>

      <button type="submit" class="btn btn-primary" name="button">Logare</button>
    </form>

    @if(session('message'))
    <div class="red">
    {{session('message')}}
    </div>
    @endif
</div>


@endsection
