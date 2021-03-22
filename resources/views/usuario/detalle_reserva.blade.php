@extends('template.master')
@section('content')
  
  <div class="row">
  	<h3>Detalles de reserva</h3>
  </div>

  <div class="row">

	@if($errors->any())
	    <div class="alert alert-danger">
	        @foreach($errors->all() as $error)
	            <p>{{ $error }}</p>
	        @endforeach
	    </div>
	@endif

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	@if(!$objReserva->isEmpty())

    <div class="jumbotron">
      <div class="container">

        <h1>Hola, {{ Auth::user()->nombre_apellido }} </h1>
        <h2> ¡Nos alegra que haya reservado
        	@if( count($objReserva[0]->butaca) > 1)
        		sus asientos! 
        	@else
        		su asiento!
        	@endif
    	</h2>
    	<h3>Detalles de reserva</h3>
	 <table class="table table-sm table-bordered">
	  <thead>

	  		<tr>
	  			<th> Nº Butaca</th>
	  			<th> Fila </th>
	  			<th> Columna </th>
	  		</tr>

	  </thead>
	  <tbody>
	    	@foreach($arrDetalleButaca as $intNroAsiento => $arrAsiento)
	    	<tr>
	    		<td>{{ $intNroAsiento }}</td>
	    		<td>{{ $arrAsiento['fila'] }}</td>	
	    		<td>{{ $arrAsiento['columna'] }}</td>		    		    		
	    	</tr>
	    	@endforeach  	
	  </tbody>
	</table> 

	@if( $objReserva[0]->disponibilidad === 1)

		<form id="cancelaReservaFrm" class="form-inline" action="{{ url('/reserva/cambia', ['idReserva' => $objReserva[0]->id]) }}" method="post">
			@csrf <!-- {{ csrf_field() }} -->
			@method('put') <!--{{ method_field('PUT') }}-->
			<div class="form-group mb-2">
				<!--<input type="hidden" name="_method" value="update" />-->
				<input type="hidden" name="idReserva" value="{{ $objReserva[0]->id }}">
				<button onclick="cancelaReserva()" id="cancelaReservaBtn" class="btn btn-warning btn-lg" type="button" name="cambiarReserva" >	Cancelar reserva </button>	
			</div>
		</form>

	@else

		<form id="eliminaReservaFrm" class="form-inline" action="{{ url('/reserva/elimina', ['idReserva' => $objReserva[0]->id]) }}" method="post">
			@csrf <!-- {{ csrf_field() }} -->
			@method('delete') <!--{{ method_field('delete') }} -->
			<div class="form-group mb-2">
				<!--<input type="hidden" name="_method" value="delete" />-->
				<input type="hidden" name="idReserva" value="{{ $objReserva[0]->id }}">
				<button onclick="eliminaReserva()" id="eliminaReservaBtn" class = "btn btn-danger btn-lg" type="button" name="eliminarReserva"  style="display: inline-block;vertical-align: top;">	Eliminar </button>	
			</div>
		</form>


	@endif

      </div>
    </div>

    	@else
    		<p>Tenemos problemas para mostrar los detalles de esta reserva...</p>
    	@endif
	</div>

  </div><!-- ./ row -->  
@stop	