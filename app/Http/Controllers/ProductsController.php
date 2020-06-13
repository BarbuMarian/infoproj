<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use App\Order;
use Session;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function sort(){
    /*    $products = new Product;
        $products = $products->where('name', 'like', '%' . $request->session()->get('search') . '%')
                            ->orderBy($request->get('field'), $request)
        return view('admin.produse', compact('products'));*/
        $products = new Product();
        $sort = request('sort');

        if ($sort == 'desc') {
            $products = Product::all()->sortByDesc("name");

        }else {
            $products = Product::all()->sortBy("name");

        }

        return view('public.produse',[
            'sort' => $sort,
            ])->with('products', $products);
    }


    public function index(Request $request)
    {
            //$products = Product::all()->sortBy("name");
            $products = Product::all()->sortByDesc("name");
            //return view('admin.produse',compact('products'));
         /*  return view('admin.master_admin', [
                'products' => $products,
            ]);*/
            if ($request->session()->get('admin') === null) {
                // user value cannot be found in session
                return view('public.produse',compact('products'));
            }else {
                return view('admin.produse',compact('products'));
            }
    }

    public function getorders(){
        //$products = Product::all();
        $orders = \App\Order::with('products')->get();
        return view('admin.comenzi',compact('orders'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return view('admin.create',compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $product = Product::create($this->validateRequest());
        $this->storeImage($product);
        return redirect('admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $product)
    {
        //$product = Product::first($product);
        //$product = Product::where('id', $product)->firstOrFail();
        $product = Product::where('id', $product)->firstOrFail();

    //    return view('admin.show', compact('product'));

    if ($request->session()->get('admin') === null) {
        return view('public.detalii',compact('product'));
    }else {
        return view('admin.show',compact('product'));
    }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($product)
    {
        $product = Product::where('id', $product)->firstOrFail();
        return view('admin.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( $product)
    {
        $product = Product::where('id', $product)->firstOrFail();
        $product->update($this->validateRequest());
        $this->storeImage($product);
        return redirect('admin/'. $product->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($product)
    {
        $product = Product::where('id', $product)->firstOrFail();
        $product->delete();
        return redirect('admin');
    }

    public function validateRequest()
    {

        return request()->validate([

            'name' => 'required|min:3',
            'description' => 'required',
            'price' => 'required',
            'pic' =>'required|file|image|max:5000',
        ]);

    }

    public function storeImage($product){
        if (request()->has('pic')) {
            $product->update([
                'pic' => request()->pic->store('uploads', 'public'),
            ]);

        }
    }

    public function getAddToCart(Request $request, $id){
        $product = Product::find($id);
        //$oldCart = Session::has('cart') ? Session::get('cart') : null;
        $oldCart = session()->has('cart') ? session()->get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);

        //return redirect()->route('admin.master_admin');
        //return redirect('guest');
        return back();
    }

    public function getReduceByOne($id){
        $oldCart = session()->has('cart') ? session()->get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);

        if (count($cart->items) > 0) {
            session()->put('cart', $cart);
        }else {
            session()->forget('cart');
        }

        return redirect()->route('product.shoppingCart');
        //return view('shop.shopping-cart');
    }

    public function getRemoveItem($id){
        $oldCart = session()->has('cart') ? session()->get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);

        if (count($cart->items) > 0) {
            session()->put('cart', $cart);
        }else {
            session()->forget('cart');
        }


        return redirect()->route('product.shoppingCart');
    }

    public function getCart(){
        if (!session()->has('cart')) {
            return view('shop.shopping-cart');
        }
        $oldCart = session()->get('cart');
        $cart = new Cart($oldCart);
        return view('shop.shopping-cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function getCheckout(){
        if (!session()->has('cart')) {
            return view('shop.shopping-cart');
        }
        $oldCart = session()->get('cart');
        $cart = new Cart($oldCart);
        $total= $cart->totalPrice;
        /*
        aici testez eu diverse
        */

         //dd($cart);
         //return $cart->items;

        //oprire testare
        return view('shop.checkout', ['total'=> $total]);
    }

    public function postCheckout(Request $request){
        $order = new Order();
        //$product = new Product();


        $data = request()->validate([
               'name' => 'required|min:3',
               'phone' => 'required|numeric|min:4',
               'address' =>'required|min:5',
           ]);

        $order->name = $request->input('name');
        $order->phone = $request->input('phone');
        $order->address = $request->input('address');
        //return $order->name ." +" . $order->phone . " +" . $order->address;

        //$order->save();
        if (!session()->has('cart')) {
            //return redirect()->route('shop.shoppingCart');
            //return redirect()->route('shop.shopping-cart');
            return redirect('admin');
        }
        $oldCart = session()->get('cart');
        $cart = new Cart($oldCart);

        $product_list = array_keys($cart->items);
        /*return $test;
        dd($cart->items);*/
        //teste incep
        $cart->items;
        $cart->totalQty;
        $cart->totalPrice;
        //return  is_array($cart->items) ? 'Array' : 'not an Array';
        //dd($order);
        $order->save();

        //dd($cart->items);
        $last_order = $order->id;

        //$order->products()->attach($product_list);

        foreach ($cart->items as $key => $list) {
            $order->products()->attach([
                    $last_order => ['product_id' => $key,
                                    'product_amount' => $list['qty']
                                     ],
            ]);

        }





        //dd($cart->items);
    /*    $order->products()->attach([
                $last_order = ['product_amount' => $product_list],
        ]);*/


        //dd($cart->items);
            //dd($cart->items);



        //teste gata

        session()->forget('cart');
        //return redirect()->route('admin.produse')->with('success', 'Successfuly prurchased');
        return redirect('/')->with('success', 'Successfuly prurchased');
    }


}
