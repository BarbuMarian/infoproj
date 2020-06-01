@extends('master')

@section('admin')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 pink">
            <p>aici este adminul</p>
            <p>aici o sa fie numele adminului</p>
            <p><a href="#">deconectare</a></p>
            <p><a href="/admin/produse">vezi produse</a></p>
            <p><a href="#">vezi comenzi</a></p>
        </div>
    </div>
</div>
@include('admin.create')
@endsection
