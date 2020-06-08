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


    public function index()
    {
            $products = Product::all();
            return view('admin.produse',compact('products'));
         /*  return view('admin.master_admin', [
                'products' => $products,
            ]);*/
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
    public function show($product)
    {
        //$product = Product::first($product);
        //$product = Product::where('id', $product)->firstOrFail();
        $product = Product::where('id', $product)->firstOrFail();

        return view('admin.show', compact('product'));

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
        return redirect('admin');
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

        return view('shop.checkout', ['total'=> $total]);
    }

    public function postCheckout(){
        $data = request()->validate([
               'name' => 'required|min:3',
               'phone' => 'required|int|min:4',
               'address' =>'required|min:5',
           ]);

        /*$order = new Order();
        $order->name = $request->input('name');
        $order->phone = $request->input('phone');
        $order->address = $request->input('address');*/
        //$order->save();
        if (!session()->has('cart')) {
            //return redirect()->route('shop.shoppingCart');
            //return redirect()->route('shop.shopping-cart');
            return redirect('admin');
        }
        $oldCart = session()->get('cart');
        $cart = new Cart($oldCart);

        session()->forget('cart');
        //return redirect()->route('admin.produse')->with('success', 'Successfuly prurchased');
        return redirect('admin')->with('success', 'Successfuly prurchased');
    }


}
