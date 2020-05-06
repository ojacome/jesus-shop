<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // $product->category
    public function category(){

        return $this->belongsTo(Category::class);
    }

    // $product->images
    public function images(){

        return $this->hasMany(ProductImage::class);
    }

    // $product->featured_image_url
    public function getFeaturedImageUrlAttribute(){

        $featuredImage = $this->images()->where('featured',true)->first();
        if(!$featuredImage){
            $featuredImage = $this->images()->first();
        }

        if($featuredImage){
            return $featuredImage->url; //accessor en ProductImage
        }

        //imagen por defecto
        return '/images/products/no_image.png';
    }
}
