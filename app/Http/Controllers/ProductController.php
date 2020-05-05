<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductImage;

class ProductController extends Controller
{
    public function index(){
        $products = Product::paginate(10);
        return view('admin.products.index')->with(compact('products'));//le pasamos a la vista los productos
    }

    public function create(){
        return view('admin.products.create');
    }

    public function store(Request $request){
        // dd($request->all());

        //validaciones
        $messages = [
            'name.required' => 'Es necesario ingresar el nombre del producto.',
            'name.min' => 'El nombre del producto debe tener al menos 3 caracteres.',            
            'description.required' => 'Es necesario ingresar la descripcion del producto.',
            'description.max' => 'La descripción del producto debe tener menos de 200 caracteres.',
            'price.required' => 'Es necesario ingresar el precio del producto.',
            'price.numeric' => 'El precio del producto debe tener sólo dígitos.',
            'price.min' => 'El precio del producto debe ser mayor a cero.'
        ];

        $rules = [
            'name' => 'required | min:3',
            'description' => 'required | max:200',
            'price' => 'required | numeric | min:0',
        ];
        $this->validate($request, $rules, $messages);

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

        //validaciones
        $messages = [
            'name.required' => 'Es necesario ingresar el nombre del producto.',
            'name.min' => 'El nombre del producto debe tener al menos 3 caracteres.',            
            'description.required' => 'Es necesario ingresar la descripcion del producto.',
            'description.max' => 'La descripción del producto debe tener menos de 200 caracteres.',
            'price.required' => 'Es necesario ingresar el precio del producto.',
            'price.numeric' => 'El precio del producto debe tener sólo dígitos.',
            'price.min' => 'El precio del producto debe ser mayor a cero.'
        ];

        $rules = [
            'name' => 'required | min:3',
            'description' => 'required | max:200',
            'price' => 'required | numeric | min:0',
        ];
        $this->validate($request, $rules, $messages);

        $product = Product::find($id);

        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->long_description = $request->input('long_description');
        $product->save();//update

        return redirect('/admin/products');
    }

    public function destroy($id){    
        //Product::where('product_id', $id)->delete();
        ProductImage::where('product_id', $id)->delete();
     
        $product = Product::find($id);
        $product->delete(); // DELETE
     
        return back();
        
    }
}
