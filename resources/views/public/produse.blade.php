
{{--
<div class="d-flex bd-highlight ">
  <div class="p-2 flex-fill bd-highlight pink">Flex item with a lot of content
<p>astai ala pink</p>
  </div>
  <div class="p-2 flex-fill bd-highlight blue">Flex item
      <p>astai ala blue</p>
  </div>
</div>
--}}

<p>stanga pink lista produse</p>

<div class="container">
    <div class="jumbotron">
        <table class="table table-stripped table-bordered">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Price</th>
                    <th scope="col">Pic</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->price}}</td>
                    <td><img src="{{asset('uploads/product/' . $product->pic)}}" width="100px" height="100px"></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
