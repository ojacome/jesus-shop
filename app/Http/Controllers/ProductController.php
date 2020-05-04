<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function index(){
        $products = Product::paginate(10);
        return view('admin.products.index')->with(compact('products'));//le pasamos a la vista los productos
    }

    public function create(){
        return view('admin.products.create');//
    }

    public function store(Request $request){
        // dd($request->all());

        $product = new Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->long_description = $request->input('long_description');
        $product->save();//insert

        return redirect('/admin/products');
    }
    
    //id es un párametro de ruta
    public function edit($id){        
        $product = Product::find($id);//busca producto
        return view('admin.products.edit')->with(compact('product'));
    }


    public function update(Request $request, $id){
        // dd($request->all());

        $product = Product::find($id);

        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->long_description = $request->input('long_description');
        $product->save();//update

        return redirect('/admin/products');
    }
}
