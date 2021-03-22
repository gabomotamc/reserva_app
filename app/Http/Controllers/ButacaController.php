<?php

namespace App\Http\Controllers;

use App\Models\Butaca;
use Illuminate\Http\Request;

class ButacaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /*
        * 1: Libre
        * 2: Pre-reserva
        * 3: Reservado
    */
    public function getButacaPorSala($nroSala){

        $arrButaca = array();
        $arrFilaCol = array();
        $intFila = 0;
        $intCol = 0;
        $objButaca = Butaca::where('sala', $nroSala)->get();
        foreach ($objButaca as $key => $butaca) {

            $intFila = $butaca->fila;
            $intCol = $butaca->columna;
            $strButacaDisponible = ( $butaca->estado === 1 ) ? '' : 'disabled';

            $arrFilaCol= array(
                'cantFila' => $intFila,
                'cantCol' => $intCol
            );

            $arrButaca[$butaca->fila][$butaca->columna] = array(
                'idButaca' => $butaca->id,
                'nroButaca' => $butaca->asiento,
                'disponible' => $strButacaDisponible,
            );
            
        }// foreach
        $dateHoy = date("Y-m-d");
        return view('reserva.hacer',compact('arrButaca'),compact('arrFilaCol'),)->withSala($nroSala)->withHoy($dateHoy);

    }// getButacaPorSala

     public function getDetalleButacaPorReserva($objReserva)
    {

        if(!$objReserva->isEmpty()){
            $arrDetalleButaca = array();
            foreach($objReserva[0]->butaca as $intClaveArray => $idButaca){

                $objButaca = Butaca::where('id', $idButaca)->get();
                 $arrDetalleButaca[$objButaca[0]->asiento] = array(
                    'fila' => $objButaca[0]->fila , 
                    'columna' => $objButaca[0]->columna
                );                    
            }// foreach
        }// if

         return $arrDetalleButaca;
    }// getDetalleButacaPorReserva

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Butaca  $butaca
     * @return \Illuminate\Http\Response
     */
    public function show(Butaca $butaca)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Butaca  $butaca
     * @return \Illuminate\Http\Response
     */
    public function edit(Butaca $butaca)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Butaca  $butaca
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Butaca $butaca)
    {
        //
    }

    public function updateEstadoPorId($idButaca, $disponibilidad){

        Butaca::where('id', $idButaca)->update( ['estado' => $disponibilidad] );

    }// updateEstadoPorId
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Butaca  $butaca
     * @return \Illuminate\Http\Response
     */
    public function destroy(Butaca $butaca)
    {
        //
    }
}
