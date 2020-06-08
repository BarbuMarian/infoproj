@extends('admin.master_admin')
@section('produse')

aici este pagina de shopping cu poroduse
    @if(session()->has('cart'))
        <div class="row">
            <div class="col-12">
                <table  class="table">
                    <thead>
                      <tr>
                        <th>Cantitatea acestui produs este de:</th>
                        <th>Numele produsului este:</th>
                        <th>Pretul acestui produs este</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td> {{$product['qty']}}</td>
                        <td> {{$product['item']['name']}}</td>
                        <td> {{$product['price']}}</td>
                        <td><a href="#">reduce by 1</a></td>
                        <td><a href="#">reduce all</a></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-6">
                <strong>Total: {{$totalPrice}}</strong>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-6">
                <a href="{{ route('checkout')}}" class="btn btn-success">Checkout</a>
            </div>
        </div>
    @else
    <div class="row">
        <div class="col-6">
            <h2>no items in cart !!</h2>
        </div>
    </div>
    @endif
@endsection
