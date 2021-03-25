<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
use Stripe;


class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'qty'=>'required | numeric | min:1'
        ]);

        $cart = new Cart(session()->get('cart'));
        $cart->updateQty($product->id, $request->qty);
        session()->put('cart', $cart);

        notify()->success('You have updated the Cart successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $cart = new Cart(session()->get('cart'));
        $cart->remove($product->id);
        if ($cart->totalQty <= 0) {
            session()->forget('cart');
            return redirect()->route('show.cart');
        } else {
            session()->put('cart', $cart);
            notify()->success('You have updated the Cart successfully');
            return redirect()->back();
        }
    }

    public function showCart(){
        if (session()->has('cart')){
            $cart = new Cart(session()->get('cart'));
        } else {
            $cart = null;
        }
        return view('cart', compact('cart'));
    }
    
    public function addToCart(Product $product){
        if (session()->has('cart')){
            $cart = new Cart(session()->get('cart'));
        } else {
            $cart = new Cart();
        }
        $cart->add($product);
        session()->put('cart', $cart);

        notify()->success('You have added a Product successfully');
        return redirect()->back();
    }

    public function checkout($amount){
        if (session()->has('cart')){
            $cart = new Cart(session()->get('cart'));
        } else {
            $cart = null;
        }
        return view('checkout', compact('amount', 'cart'));
    }

    public function charge(Request $request){
        $charge = Stripe::charges()->create([
            'currency' => 'EUR',
            'source' => $request->stripeToken,
            'amount' => $request->amount,
            'description' => 'test'
        ]);

        $chargeId = $charge['id'];
        if ($chargeId) {
            auth()->user()->orders()->create([
                'cart' => serialize(session()->get('cart'))
            ]);
            session()->forget('cart');
            notify()->success('You have purchased successfully');
            return redirect()->to('/');
        } else {
            return redirect()->back();
        }
    }
}
