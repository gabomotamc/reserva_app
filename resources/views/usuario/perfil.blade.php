@extends('template.master')
@section('content')
  <div class="row">
  	<h3>Mis datos</h3>
	@if($errors->any())
	    <div class="alert alert-danger">
	        @foreach($errors->all() as $error)
	            <p>{{ $error }}</p>
	        @endforeach
	    </div>
	@endif

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

          <img class="img-circle" src="{{ URL::asset('img/user.png') }}" alt="Generic placeholder image" width="140" height="140">
          <h3>Nombre y apellido: {{ Auth::user()->nombre_apellido }}</h3>
          <h3>Correo : {{ Auth::user()->correo }}</h3>

	</div>

  </div><!-- ./ row -->  
@stop	


