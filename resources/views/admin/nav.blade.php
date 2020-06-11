<div class="container-fluid">
    <div class="row">
        <div class="col-12 pink">
            <p>aici este adminul</p>
            <p><a href="/logare">logare</a></p>
            <p><a href="#">deconectare</a></p>
             <p><a href="{{route('product.shoppingCart')}}"><i class="fas fa-shopping-cart"></i>
                <span class="badge">{{session()->has('cart') ? session()->get('cart')->totalQty : ''}}</span>
            </a></p>
            <p><a href="/admin">vezi produse</a></p>
            <p><a href="">vezi comenzi</a></p>
            <p><a href="/admin/create">baga produse</a></p>
        </div>
    </div>
    <div class="row">

    </div>
</div>
