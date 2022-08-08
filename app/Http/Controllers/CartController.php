<?php

namespace App\Http\Controllers;

use App\Http\Resources\CartResource;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CartResource::collection(Cart::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'quantity' => 'required|min:1',
            'selectedColor' => 'required',
            'product_id' => 'required|unique:carts,product_id'
        ]);

        return new CartResource(Cart::create([
            'quantity' => intval($request->quantity),
            'selectedColor' => intval($request->selectedColor),
            'product_id' => intval($request->product_id),
            'user_id' => Auth::id()
        ]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        return new CartResource(Cart::find($cart->id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        $request->validate([
            'quantity' => 'required|min:1',
            'selectedColor' => 'required',
            'product_id' => 'required'
        ]);

        $cart = Cart::find($cart->id)->where('product_id', $request->product_id)
            ->update([
                'quantity' => $request->quantity,
                'selectedColor' => $request->selectedColor
            ]);

        return new CartResource(Cart::find($cart));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        return Cart::destroy($cart->id);
    }
}
