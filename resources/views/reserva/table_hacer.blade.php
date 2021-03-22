 @if( !empty($arrButaca) && !empty($arrFilaCol) )
	 <table class="table table-sm table-bordered">
	  <thead>
	  	<tr>
	  		<th colspan="{{ $arrFilaCol['cantCol']+1 }}" >Butacas de la sala #{{ $sala }}</th>
	  	</tr>
	  	
	    <tr>
	    	<th></th>
			<th colspan="{{ $arrFilaCol['cantCol'] }}">Columna</th>
	    </tr>

	    <tr>
	    	<th>Fila</th>
	    	@for($col=1; $col <= $arrFilaCol['cantCol'] ; $col++)
				<th>{{ $col }}</th>
	    	@endfor
	    </tr>

	  </thead>
	  <tbody>
	    	@for($fila=1; $fila <= $arrFilaCol['cantFila'] ; $fila++)
	    	<tr>
	    		<td> {{ $fila }} </td>
	    		@foreach($arrButaca[$fila] as $intColumna => $arrAsiento)

	    			@if($arrAsiento['disponible'] === 'disabled')
	    				<td style="background-color: #ffe5e5">
	    			@else
	    				<td style="background-color: #ecffec">
	    			@endif
	    				<div class="form-check form-switch">
		    				<input type="checkbox" class="form-check-input" name="butaca[]" 
		    				value="{{ $arrAsiento['idButaca'] }}" 
		    				{{ $arrAsiento['disponible'] }}>

		    				<label for="butaca" class="form-check-label">
		    					{{ $arrAsiento['nroButaca'] }}
		    				</label>
	    				</div>
	    			</td>

	    		@endforeach
	    	</tr>
	    	@endfor	  	
	  </tbody>
	</table>   
 @else
 	<p>No se encontraron butacas en esta sala...</p>
 @endif