@extends('layouts.app')

@section('title','Bienvenido')

@section('body-class', 'landing-page')

@section('styles')
	<style>
		.team .row .col-md-4{
			margin-bottom: 5em;
		}

		.row {
			display: -webkit-box;
			display: -webkit-flex;
			display: -ms-flexbox;
			display: flex;
			flex-wrap: wrap;
		}

		.row > [class*='col-'] {
			display: flex;
			flex-direction: column;
		}
	</style>
@endsection

@section('content')
<div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">
    <div class="container">
        <div class="row">
			<div class="col-md-6">
				<h1 class="title">Bienvenido a la Tienda Virtual.</h1>
	            <h4>Realiza pedidos en linea y te contactaremos para coordinar la entrega.</h4>
	            <br />
	            <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="btn btn-danger btn-raised btn-lg">
					<i class="fa fa-play"></i>   ¿Cómo funciona?
				</a>
			</div>
        </div>
    </div>
</div>

<div class="main main-raised">
			<div class="container">
		    	<div class="section text-center section-landing">
	                <div class="row">
	                    <div class="col-md-8 col-md-offset-2">
	                        <h2 class="title">¿Qué es Tienda Virtual?</h2>
	                        <h5 class="description">Puedes revisar nuestra relacion completa de productos, comparar precios y realizar tus pedidos cuando estes seguro.</h5>
	                    </div>
	                </div>

					<div class="features">
						<div class="row">
		                    <div class="col-md-4">
								<div class="info">
									<div class="icon icon-primary">
										<i class="material-icons">chat</i>
									</div>
									<h4 class="info-title">Atendemos tus dudas</h4>
									<p>Atendemos rapidamente cualquier consulta que tengas via chat. No estas solo, sino que siempre estamos atentos a tus inquietudes.</p>
								</div>
		                    </div>
		                    <div class="col-md-4">
								<div class="info">
									<div class="icon icon-success">
										<i class="material-icons">verified_user</i>
									</div>
									<h4 class="info-title">Pago Seguro</h4>
									<p>Todo pedido que realices sera confirmado a traves de una llamada. Si no confias en los pagos en linea puedes pagar contra entrega el valor acordado.</p>
								</div>
		                    </div>
		                    <div class="col-md-4">
								<div class="info">
									<div class="icon icon-danger">
										<i class="material-icons">Información privada</i>
									</div>
									<h4 class="info-title">Third Feature</h4>
									<p>Los pedidos que realices solo los conoceras tu atraves de tu panel de usuario. Nadie mas tiene acceso a esta informacion.</p>
								</div>
		                    </div>
		                </div>
					</div>
	            </div>

	        	<div class="section text-center">
	                <h2 class="title">Productos disponibles</h2>

					<div class="team">
						<div class="row">

							@foreach($products as $product)
							<div class="col-md-4">
			                    <div class="team-player">
			                        <img src="{{$product->featured_image_url}}" alt="Imagen {{$product->name}}" class="img-raised img-circle">

			                        <h4 class="title">
										<a href="{{ url('/products/'.$product->id) }}">{{$product->name}}</a>
										<br>
										<small class="text-muted">{{$product->category->name}}</small>
									</h4>

			                        <p class="description">{{$product->description}}</p>
									
			                    </div>
			                </div>
			            	@endforeach		                
						</div>

						<div class="text-center">
						{{$products->links()}}
						</div>
						
					</div>
	            </div>


	        	<div class="section landing-section">
	                <div class="row">
	                    <div class="col-md-8 col-md-offset-2">
	                        <h2 class="text-center title">Dudas y sugerencias</h2>
							<h4 class="text-center description">Registrate ingresando tus datos basicos y podras realizar tus pedidos a traves de nmuestro carrito de coompras. Si aun no te decides de todas formas contu centa de usuario podras hacer todas tus consultas sin compromiso.</h4>
	                        <form class="contact-form">
	                            <div class="row">
	                                <div class="col-md-6">
										<div class="form-group label-floating">
											<label class="control-label">Nombre</label>
											<input type="email" class="form-control">
										</div>
	                                </div>
	                                <div class="col-md-6">
										<div class="form-group label-floating">
											<label class="control-label">Correo electrónico</label>
											<input type="email" class="form-control">
										</div>
	                                </div>
	                            </div>

								<div class="form-group label-floating">
									<label class="control-label">Tu mensaje</label>
									<textarea class="form-control" rows="4"></textarea>
								</div>

	                            <div class="row">
	                                <div class="col-md-4 col-md-offset-4 text-center">
	                                    <button class="btn btn-primary btn-raised">
											Enviar mensaje
										</button>
	                                </div>
	                            </div>
	                        </form>
	                    </div>
	                </div>

	            </div>
	        </div>

</div>

@include('includes.footer')

@endsection