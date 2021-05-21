<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use Illuminate\Http\Request;
use Psy\Exception\ErrorException;

class CartController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cart= Cart::findOrFail($request['cart-id']);
        $pro = $cart->products()->where('product_id',$request['id'])->first();
        $arr = array(
            $request['id'] =>   [
              'quantity' => $request['quantity']
            ]
        );
        if ($pro){
           $pro->pivot->quantity = $request['quantity'];
           $pro->pivot->save();
        }else{
            $cart->products()->attach($arr);
        }
        return response()->json([
            'data' => $cart->products()->get()
        ],200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $cart= Cart::findOrFail($request['cart-id']);
        $pro = $cart->products()->where('product_id',$request['id'])->first();
        if ($pro){
            $pro->pivot->quantity = $request['quantity'];
            $pro->pivot->save();

            return response()->json([
                'data' => $cart->products()->get()
            ],200);
        }else{
            return response()->json([
                'error' => 'something wrong'
            ],500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $cart= Cart::findOrFail($request['cart-id']);
        $pro = $cart->products()->where('product_id',$request['id'])->first();
        $cart->products()->detach($pro);
        return response()->json([
            'data' => $cart->products()->get()
        ],200);
    }
}
