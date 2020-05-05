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
	            </div>

	        </div>
</div>

<footer class="footer">
	        <div class="container">
	            <nav class="pull-left">
	                <ul>
	                    <li>
	                        <a href="https://www.facebook.com/olmedo.jacome">
	                            Jesús Olmedo
	                        </a>
	                    </li>
						<li>
	                        <a href="https://www.linkedin.com/in/olmedo-jacome-oj/">
	                           ¿Quienes somos?
	                        </a>
	                    </li>
	                    <li>
	                        <a href="http://infolmedo.blogspot.com/">
	                           Blog
	                        </a>
	                    </li>
	                    <li>
	                        <a href="https://wa.me/593969786985">
	                            Contacto
	                        </a>
	                    </li>
	                </ul>
	            </nav>
	            <div class="copyright pull-right">
	                &copy; 2020, made with <i class="fa fa-heart heart"></i> by Jesús Olmedo
	            </div>
	        </div>
</footer>
@endsection