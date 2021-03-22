 
	 <table class="table table-sm table-bordered">
	  <thead>
	  	<tr>
	  		<th colspan="6">Mis reservas</th>
	  	</tr>
	    <tr>
	      <th scope="col">Cod</th>
	      <th scope="col">Sala</th>
	      <th scope="col">Fecha</th>
	      <th scope="col">Estado de reserva</th>
	      <th scope="col">Cant. Personas</th>	
	      <th scope="col">Butacas</th>	      
	    </tr>
	  </thead>
	  <tbody>
    	@foreach($objReservaUsuario as $key => $reserva)
		    <tr>
				<th scope="row">{{ $reserva->id }}</th>			      
				<td>{{ $reserva->nro_sala }}</td>
				<td>{{ $reserva->fecha->format('d/m/Y') }}</td>
				@if( $reserva->disponibilidad === 1)
					<td> Habilitada </td>
				@else
					<td> Cancelada </td>				
				@endif
				<td>{{ $reserva->nro_persona }}</td>
				<td>
					
					<a href="{{ route('verDetalleReserva', $reserva->id) }}" 
					class="btn btn-primary" style="display: inline-block;vertical-align: top;">
						Ver
					</a>	

				</td>					
				</tr>
    	@endforeach
	  </tbody>
	</table>   
