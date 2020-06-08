@extends('admin.master_admin')

aici este pagina de shopping cu poroduse

@section('produse')
    @if(session()->has('cart'))
        <div class="row">
            <div class="col-6">
                <ul>
                    @foreach($products as $product)
                        <li>
                            <span>{{$product['qty']}}</span>
                            <span>{{ $product['item']['title']}}</span>
                            <span class="label label-success"> {{$product['price']}}</span>
                            <div class="">
                                <button type="button" name="button" class="button btn btn-primary">action</button>
                                <ul>
                                    <li><a href="#">reduce by 1</a></li>
                                    <li><a href="#">reduce all</a></li>
                                </ul>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <strong>Total: {{$totalPrice}}</strong>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-6">
                <button type="button" name="button" class="btn btn-succes">Checkout</button>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-6">
            <h2>no items in cart !!</h2>
        </div>
    </div>
@endsection
