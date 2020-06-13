@extends('admin.master_admin')
@section('produse')


{{--
    @foreach($orders as $order)
    <div class="">
        <li>{{$order->name}}</li>
        @foreach($order->products as $product)
                <li>{{$product->name}}</li>
                <li>{{$product->pivot->product_amount}}</li>
        @endforeach
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
    </div>
    @endforeach
--}}


@foreach($orders as $order)
    <div class="my_order_container">
        <div class="order_id">
            <h3>Numele este: {{$order->name}}</h3>
        </div>
        @foreach($order->products as $product)
        <ul class="list-group">
          <li class="list-group-item d-flex justify-content-between align-items-center">
            {{$product->name}}
            <span class="badge badge-primary badge-pill">{{$product->pivot->product_amount}}</span>
          </li>
        </ul>
        @endforeach
    </div>
@endforeach














@endsection
