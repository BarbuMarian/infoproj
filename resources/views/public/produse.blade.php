@extends('public.master_public')

@section('continut')
@if(session()->has('success'))
    <div class="row">
        <div class="col-12">
            <div class="alert alert-success">
                {{session()->get('success')}}
            </div>
        </div>
    </div>
@endif
<div class="container-fluid">
    <div class="row">

        @foreach($products as $product)
            <div class="col-3">
                <div class="card" style="width: 18rem;">
                    <a href="/guest/{{$product->id}}"><img class="card-img-top img-thumbnail img-responsive myimg" src="{{asset('storage/'. $product->pic)}}"></a>
                    <div class="card-body">
                        <h5 class="card-title">{{$product->name}}</h5>
                        <p class="card-text">{{$product->description}}</p>
                        <p class="card-text">{{$product->price}}</p>
                        <a href="{{route('product.addToCart', ['id' =>$product->id])}}" class="btn btn-primary" role='button'>Add to cart</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
