<?php

namespace App\Http\Controllers;

use auth;
use App\CartDetail;
use Illuminate\Http\Request;

class CartDetailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request){

        $cartDetail = new CartDetail();
        $cartDetail->cart_id = auth()->user()->cart->id;
        $cartDetail->product_id = $request->product_id;
        $cartDetail->quantity = $request->quantity;
        $cartDetail->save();

        return back();
    }

    public function destroy(Request $request){
        $cartDetail = CartDetail::find($request->cart_detail_id);
        
        $cartDetail->delete();

        return back();
    }
}
