@extends('template.master')
@section('content')
  <h3>Hacer reservas</h3>

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
    <div class="container">
      <!-- Example row of columns -->
      <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
          <h2>Sala 1</h2>
          <p>Podras disfrutar de músicales. </p>
          <p><a class="btn btn-default" href="{{ route('reservaButaca', 1) }}" role="button">Reservar asiento &raquo;</a></p>
       </div>

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
          <h2>Sala 2</h2>
          <p>Podras disfrutar de tragicomedias.</p>
          <p><a class="btn btn-default" href="{{ route('reservaButaca', 2) }}" role="button">
          Reservar asiento &raquo;</a></p>
        </div>

      </div>

  </div>      
		

  </div><!-- ./ row -->  
@stop