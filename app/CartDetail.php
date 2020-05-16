<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    //cartDetails N     1 Product
    public function product(){

        return $this->belongsTo(Product::class);
    }

    public function calcularTotal(){
        return $this->price * $this->quantity;
    }

    public function validar($id){
        if($this->product_id == $id)
            return false;
        return true;
    }
}
