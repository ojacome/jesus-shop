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

        //validaciones
        $messages = [            
            'quantity.required' => 'Es necesario ingresar la cantidad del producto.',
            'quantity.numeric' => 'La cantidad debe tener sólo dígitos.',
            'quantity.min' => 'La cantidad debe ser mayor a cero.'
        ];

        $rules = [            
            'quantity' => 'required | numeric | min:0',
        ];
        $this->validate($request, $rules, $messages);

        $cartDetail = new CartDetail();
        $cartDetail->cart_id = auth()->user()->cart->id;
        $cartDetail->product_id = $request->product_id;
        $cartDetail->quantity = $request->quantity;
        $cartDetail->save();

        return back();
    }

    public function destroy(Request $request){
        $cartDetail = CartDetail::find($request->cart_detail_id);
        
        //validar que el cart_detail sea del usuario
        if($cartDetail->cart_id == auth()->user()->cart->id){
            $carDetail->delete();
        }        

        return back();
    }
}
