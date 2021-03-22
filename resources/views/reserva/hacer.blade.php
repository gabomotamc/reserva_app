@extends('template.master')
@section('content')
 
  <div class="row">

  	<h3> Reservar butacas </h3>

	@if($errors->any())
	    <div class="alert alert-danger">
	        @foreach($errors->all() as $error)
	            <p>{{ $error }}</p>
	        @endforeach
	    </div>
	@endif

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		@if ($message = Session::get('success'))
		    <div class="alert alert-success">
		        <p>{{ $message }}</p>
		    </div>
		@endif
    	@include('reserva.form_hacer')	
	</div>

  </div><!-- ./ row -->  
@stop