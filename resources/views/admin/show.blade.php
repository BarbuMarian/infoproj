

aici este panoul de show a produselor

<div class="container">
<p><a href="/admin/{{$product->id}}/edit">edit product</a></p>

    <div class="row">
        <h1>details for {{$product->name}}</h1>
        <h1>details for {{$product->description}}</h1>
        <h2>pretul ii {{$product->price}}</h2>
        <hr>
        <form class="" action="/admin/{{$product->id}}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" name="delete">DELETE</button>
        </form>
    </div>
</div>
