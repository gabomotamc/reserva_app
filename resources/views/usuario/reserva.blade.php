@extends('template.master')
@section('content')
  <h3>Mis reservas</h3>

  <div class="row">
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

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

    	@if( !$objReservaUsuario->isEmpty() )

    		@include('usuario.table_reserva')

	   @else

		   	<div class="alert alert-info">
		        <p>Aún no has reservado butacas</p>
		    </div>
		    <a href="{{ route('reservaSala') }}"  class="btn btn-primary btn-lg btn-block" >Ver salas para reservar butacas</a>
		    
		@endif
	</div>

  </div><!-- ./ row -->  
@stop	