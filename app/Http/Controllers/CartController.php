<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function update(){

        $cart = auth()->user()->cart;
        $cart->status = 'Pending';
        $result = $cart->save();

        if($result){
            $notification = "Pedido realizado con éxito. Pronto te contactaremos para coordinar la entrega";
        }
        
        return back()->with(compact('notification'));

    }
}
