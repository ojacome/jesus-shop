@extends('layouts.app')

@section('title','Dashboard')

@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">
    
</div>

<div class="main main-raised">
			<div class="container">		    	
	        	<div class="section">
	                <h2 class="title text-center"> Dashboard</h2>

					@if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif                   

                    <ul class="nav nav-pills nav-pills-primary" role="tablist">
                        <li>
                            <a href="#dashboard" role="tab" data-toggle="tab">
                                <i class="material-icons">dashboard</i>
                                Carrito de compras
                            </a>
                        </li>                        
                        <li>
                            <a href="#tasks" role="tab" data-toggle="tab">
                                <i class="material-icons">list</i>
                                Pedidos realizados
                            </a>
                        </li>
                    </ul>         

                    <hr>
                    <p> Tu carrito de compras presenta {{auth()->user()->cart->details->count()}} productos.</p>                               

                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">imagen</th>
                                <th class="text-center">Nombre</th>
                                <th class="text-right">Precio</th>
                                <th class="text-right">Cantidad</th>
                                <th class="text-right">Subtotal</th>
                                <th class="text-right">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(auth()->user()->cart->details as $detail)
                            <tr>
                                <td class="text-center">
                                    <img src="{{$detail->product->featured_image_url}}" alt="imagen {{$detail->product->name}}" height="50">
                                </td>
                                <td>
                                    <a href="{{ url('/admin/products/'.$detail->product->id) }}" rel="tooltip" title="Ver">{{$detail->product->name}}</a>
                                </td>                                 
                                <td class="text-right">$ {{$detail->product->price}}</td>
                                <td class="text-right">{{$detail->quantity}}</td>
                                <td class="text-right">$ {{$detail->quantity * $detail->product->price }}</td>
                                <td class="td-actions text-right">
                                    <form method="post" action="{{ url('/cart') }}">
                                    @method('DELETE')
                                    @csrf                                    
                                        <input type="hidden" name="cart_detail_id" value="{{ $detail->id }}">

                                        <a href="{{ url('/admin/products/'.$detail->product->id) }}" rel="tooltip" title="Ver" class="btn btn-info btn-simple btn-xs">
                                            <i class="fa fa-info"></i>
                                        </a>                                        
                                        																								
                                        <button type="submit" rel="tooltip" title="Eliminar" class="btn btn-danger btn-simple btn-xs" onclick="return confirm('¿Seguro que deseas eliminar este producto?');">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </form>                                           
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
	            </div>

	        </div>
</div>

@include('includes.footer')

@endsection