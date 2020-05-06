<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductImage;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index($id){
        $product= Product::find($id);
        $images = $product->images;

        return view('admin.products.images.index')->with(compact('product','images'));
    }

    public function store(Request $request, $id){

        //validaciones
        $messages = [
            'photo.max' => 'La imagen debe ser menor de 1 MB.'
        ];

        $rules = [
            'photo' => 'max:1024'            
        ];
        $this->validate($request, $rules, $messages);

        //guardar img en nuestro proyecto
        $file = $request->file('photo');//obtiene el archivo o imagen del request
        $path = public_path().'/images/products';
        $fileName = uniqid().$file->getClientOriginalName();
        $file->move($path, $fileName);

        //crear registro en tabla product_images
        $productImage = new ProductImage();
        $productImage->image = $fileName;
        // $productImage->featured = ;
        $productImage->product_id = $id;
        $productImage->save(); //INSERT

        return back();
    }

    public function destroy(){

    }
}
