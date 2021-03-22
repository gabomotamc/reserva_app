<form id="guardaReservaFrm" action="{{ url('/reserva/crear') }}" method="POST" >
	@csrf <!-- {{ csrf_field() }} -->
	<input type="hidden" name="nro_sala" value="{{ $sala }}">

	  <div class="form-group">
	    <label for="fecha">
	    	¿En que fecha deseas asistir a la obra?
	    </label>
	    
	    <input type="date" name="fecha" min="{{ $hoy }}" required="required">
	  </div>

	@include('reserva.table_hacer')
	<button id="guardaReservaBtn" type="button" class="btn btn-success btn-lg btn-block" name="guardaReserva" >Guardar reserva</button>
</form>
