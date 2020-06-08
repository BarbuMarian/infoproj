@extends('admin.master_admin')
@section('produse')

aici este panoul de show a produselor

<div class="container">
<p><a href="/admin/{{$product->id}}/edit">edit product</a></p>

    <div class="row">
        <ul>
            <li><div><h3>numele este :  {{$product->name}}</h3></div></li>
            <li><div><h3>descrirea produsului este : {{$product->description}}</h3></div></li>
            <li><div><h3>pretul este: {{$product->price}}</h3></div></li>
        </ul>

        <hr>
        <form class="" action="/admin/{{$product->id}}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" name="delete" class="btn btn-danger">DELETE</button>
        </form>
    </div>
</div>
@endsection
