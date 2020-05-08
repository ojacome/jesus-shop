<?php

namespace App\Http\Controllers;

use auth;
use App\CartDetail;
use Illuminate\Http\Request;

class CartDetailController extends Controller
{
    public function store(Request $request){

        $cartDetail = new CartDetail();
        $cartDetail->cart_id = auth()->user()->cart->id;
        $cartDetail->product_id = $request->product_id;
        $cartDetail->quantity = $request->quantity;
        $cartDetail->save();

        return back();
    }
}
