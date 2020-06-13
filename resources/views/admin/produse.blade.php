@extends('admin.master_admin')
@section('produse')

@if(session()->has('success'))
    <div class="row">
        <div class="col-12">
            <div class="alert alert-success">
                {{session()->get('success')}}
            </div>
        </div>
    </div>
@endif
{{--
@if(session()->has('logout'))
    <div class="row">
        <div class="col-12">
            <div class="alert alert-success">
                {{session()->get('logout')}}
            </div>
        </div>
    </div>
@endif
--}}

<table class="table">
  <thead>
    <tr>
      <th >ID produs</th>
      <th >Nume</th>
      <th >Descriere</th>
      <th >Pret</th>
    </tr>
  </thead>
  <tbody>
      {{--
    <div class="pink">

        <a href="admin/{{route('sorting',['sort' => 'asc'])}}" class="sorting">Sorteaza asc</a>
        <a href="{{route('sorting',['sort' => 'desc'])}}" class="sorting">Sorteaza Desc</a>

        <a href="/admin/?sort=asc" class="sorting">Sorteaza asc</a>
        <a href="/admin/?sort=desc" class="sorting">Sorteaza Desc</a>

    </div>
--}}
      @foreach($products as $product)
    <tr>
      <th>{{$product->id}}</th>
      <td><a href="/admin/{{$product->id}}">{{$product->name}}</a></td>
      <td>{{$product->description}}</td>
      <td>{{$product->price}}</td>
     {{-- <td><a href="{{route('product.addToCart', ['id' =>$product->id])}}" class="btn btn-default" role='button'>adauga</a></td>
      <td><a href="#"><img src="{{asset('storage/'. $product->pic)}}" alt=""></a></td>--}}
    </tr>
     @endforeach


  </tbody>
</table>
@endsection
