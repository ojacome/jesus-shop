@extends('layouts.app')

@section('title','Imágenes de productos')

@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">    
</div>

<div class="main main-raised">
    <div class="container">
        

        <div class="section text-center">
            <h2 class="title">Imágenes de {{$product->name}}</h2>
            
            <form action="" method="post"> <!-- como no le indicamos action será la misma ruta q se encuentra -->
            @csrf
                <input type="file" name="photo" required> 

                <button type="submit" class="btn btn-primary btn-round">
                Subir imagen
                </button>

                <a href="{{ url('/admin/products') }}" type="button" class="btn btn-default btn-round">
                Volver
                </a>
            </form>                        
            
            <hr>

            <div class="row">
            @foreach($images as $image)
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <img src="{{$image->image}}" alt="imagen de {{$product->name}}">

                            <button type="submit" class="btn btn-danger btn-round">
                            Eliminar 
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>           
        </div>        
    </div>
</div>

@include('includes.footer')

@endsection