@extends('master')

@section('public')
<div class="">
    <p>aici este master public</p>
    @include('public.banner')
</div>


<div class="d-flex bd-highlight ">
  <div class="p-2 flex-fill bd-highlight pink">
        @include('public.produse')
        <p>astai ala pink si aici o sa fie partea din stanga cu lista de produse</p>
  </div>
  <div class="p-2 flex-fill bd-highlight blue">
      @include('public.continut')
      <p>astai ala blue si aici o sa fie partea din dreapta cu continutul care se tot schimba</p>
  </div>
</div>


@endsection
