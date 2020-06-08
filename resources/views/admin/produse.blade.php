@extends('admin.master_admin')
@section('produse')
<table class="table">
  <thead>
    <tr>
      <th >ID produs</th>
      <th >Nume</th>
      <th >Descriere</th>
      <th >Pret</th>
      <th >adauga Produs</th>
      <th >Imagine Produs</th>
    </tr>
  </thead>
  <tbody>

      @foreach($products as $product)
    <tr>
      <th>{{$product->id}}</th>
      <td><a href="/admin/{{$product->id}}">{{$product->name}}</a></td>
      <td>{{$product->description}}</td>
      <td>{{$product->price}}</td>
      <td><a href="{{route('product.addToCart', ['id' =>$product->id])}}" class="btn btn-default" role='button'>adauga</a></td>
      {{--<td><a href="#"><img src="{{asset('storage/'. $product->pic)}}" alt=""></a></td>--}}
    </tr>
     @endforeach


  </tbody>
</table>
@endsection
