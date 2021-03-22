@extends('template.master')
@section('content')

 
  <div class="row">

  	<h3> Registrarse ó Iniciar sesión</h3>

	@if($errors->any())
	    <div class="alert alert-danger">
	        @foreach($errors->all() as $error)
	            <p>{{ $error }}</p>
	        @endforeach
	    </div>
	@endif

	@if ($message = Session::get('success'))
	    <div class="alert alert-success">
	        <p>{{ $message }}</p>
	    </div>
	@endif

	@if( Auth::check() )

	<h1>Ya iniciaste sesión. Puedes hacer reservas desde las opciones del menú.</h1>

	@else
	    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
	    	<h3> Registrarse </h3>
	    	@include('usuario.form_registro')	
		</div>
	    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
	    	<h3> Iniciar sesión </h3>
	    	@include('usuario.form_logueo')	
		</div>
	@endif

  </div><!-- ./ row -->  
@stop