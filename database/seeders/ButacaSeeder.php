<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ButacaSeeder extends Seeder
{

	public $arrButaca = array();

    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function matrizSalaButaca($salaMax,$filaMax,$colMax){
    	
    	$salaMin = 1;
    	$filaMin = 1;
    	$colMin = 1;

		for($sala=$salaMin;$sala<=$salaMax;$sala++){
			$asiento = 1;
			$this->arrButaca[$sala] = array();

			for($fila=$filaMin;$fila<=$filaMax;$fila++){
				
				for($columna=$colMin;$columna<=$colMax;$columna++){

					//$arrButaca[$sala][] = array($fila, $columna, $asiento );
					$this->arrButaca[$sala][$asiento] = array(
						'fila' => $fila, 
						'columna' => $columna,
					);
					$asiento += 1;
				}//for Columna

			}// for Fila
		}// for Sala

		return $this->arrButaca;
    }// matrizSalaButaca

    public function run()
    {
    	$arrSalaButaca = $this->matrizSalaButaca(2,5,10);
    	foreach ($arrSalaButaca as $intSala => $arrSala){
    		foreach ($arrSala as $intAsiento => $arrButaca){ 

			 		DB::table('butacas')->insert([
					'sala' => $intSala,
					'estado' => 1,
					'asiento' => $intAsiento,
					'fila' => $arrButaca['fila'],
					'columna' => $arrButaca['columna'],		
					'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
					'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),	
					]);   				
    	
    		}// foreach
    	}// foreach
    }// run
}
