<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('admin.products.index')->with(compact('products'));//le pasamos a la vista los productos
    }

    public function create(){
        return view('admin.products.create');//
    }

    public function store(){
        return view('');//
    }
    
}
