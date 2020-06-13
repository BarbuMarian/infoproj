    {{--
<div class="container-fluid">
    <div class="row">
        <div class="col-12 pink">
            @if(session()->has('admin'))
                <p>Numle tau este : {{session()->get('admin')}} </p>
                <p><a href="/logout">deconectare</a></p>
                <p><a href="/admin">vezi produse</a></p>
                <p><a href="/comenzi">vezi comenzi</a></p>
                <p><a href="/admin/create">adauga/modifica produse</a></p>




            <p><a href="/login">logare</a></p>
             <p><a href="{{route('product.shoppingCart')}}"><i class="fas fa-shopping-cart"></i>
                <span class="badge">{{session()->has('cart') ? session()->get('cart')->totalQty : ''}}</span>
            </a></p>

        </div>
    </div>
</div>
--}}
@if(session()->has('admin'))
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
    <a class="nav-item nav-link" href="/admin">home</a>
      <a class="nav-item nav-link" href="/logout">deconectare</a>
      <a class="nav-item nav-link" href="/comenzi">vezi comenzi</a>
      <a class="nav-item nav-link" href="/admin/create">adauga</a>
       <a class="nav-item nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Numele tau: : {{session()->get('admin')}}</a>
    </div>
  </div>
</nav>
@endif
