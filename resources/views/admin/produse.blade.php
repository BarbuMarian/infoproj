@extends('admin.master_admin')
@section('produse')
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID produs</th>
      <th scope="col">Nume</th>
      <th scope="col">Descriere</th>
      <th scope="col">Pret</th>
      <th scope="col">Imagine Produs</th>
    </tr>
  </thead>
  <tbody>

      @foreach($products as $product)
    <tr>
      <th scope="row">{{$product->id}}</th>
      <td>{{$product->name}}</td>
      <td>{{$product->description}}</td>
      <td>{{$product->price}}</td>
      {{--<td><a href="#"><img src="{{asset('storage/'. $product->pic)}}" alt=""></a></td>--}}
    </tr>
     @endforeach

  </tbody>
</table>
@endsection
