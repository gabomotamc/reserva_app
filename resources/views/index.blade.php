@extends('template.master')
@section('content')
  <div class="row">
  	<h3> Inicio </h3>
	@if($errors->any())
	    <div class="alert alert-danger">
	        @foreach($errors->all() as $error)
	            <p>{{ $error }}</p>
	        @endforeach
	    </div>
	@endif
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

    <div class="jumbotron">
    
      <div class="container">

        <h1>Teatro de la ciudad</h1>

        <p>Puedes hacer reservas de butacas luego de registrarte.La creación de tu cuenta lleva pocos pasos. Te invitamos a revisar las salas disponibles para tu entretenimiento.</p>

        <p>
        	<a class="btn btn-primary btn-lg" href="{{ route('acceder') }}" role="button">Acceder a mi cuenta&raquo;</a>
        </p>

      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">

        <div class="col-md-4">
          <h2>Crear mi cuenta</h2>
          <p>
          	Te pediremos datos básicos para el registro. No te pediremos información personal como datos bancarios o claves.
          </p>
          <p>
          	<a class="btn btn-default" href="{{ route('acceder') }}" role="button">Ir &raquo;</a>
          </p>
        </div>

        <div class="col-md-4">
          <h2>Ver salas</h2>
          <p>Para mejorar tu experiencia nuestras salas estan adaptadas y destinadas a un tipo de obra particular. </p>
          <p><a class="btn btn-default" href="{{ route('reservaSala') }}" role="button">Ir &raquo;</a></p>
       </div>

        <div class="col-md-4">
          <h2>FAQS</h2>
          <p>Esclarecemos ciertas dudas sobre el uso de nuestro sitio web.</p>
          <p><a class="btn btn-default" href="#" role="button">
          Ir &raquo;</a></p>
        </div>

      </div>

	</div>
  </div><!-- ./ row -->  
@stop