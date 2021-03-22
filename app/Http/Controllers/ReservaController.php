<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ButacaController;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view( 'reserva.index' );
    }

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

        $request->validate([
            'fecha' => 'required',
        ]);

        $arrButaca = $request->input('butaca');
        $sesionUsuario = Auth::user();

        $reserva = new Reserva;
    
        $reserva->id_usuario = $sesionUsuario->id;
        $reserva->disponibilidad = 1;
        $reserva->fecha =  $request->input('fecha');
        $reserva->nro_sala =  $request->input('nro_sala');        
        $nroPersona = count( $request->input('butaca') );
        $reserva->nro_persona =  $nroPersona;
        $reserva->butaca = $arrButaca;

        $reserva->save();

        // Editar la disponibilidad de la butaca
        // Disponibilidad 2 (Reserva - No disponible)
        $butaca = new ButacaController;
        foreach ($arrButaca as $key => $id_butaca) {
            $butaca->updateEstadoPorId($id_butaca, $disponibilidad = 2);
        }// foreach
        
        return redirect()->route('reservaSala')->with('success', 'Reserva guardada.');

    }// store

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reserva  $reserva
     * @return \Illuminate\Http\Response
     */
    public function show(Reserva $reserva)
    {
        //
    }

    public function reservaUsuarioActual(){

        $sesionUsuario = Auth::user();
        $objReservaUsuario = Reserva::where('id_usuario', $sesionUsuario->id)->get();
        return view( 'usuario.reserva', compact('objReservaUsuario') );            

    }// reservaUsuarioActual

    public function detalleReservaUsuarioActual($idReserva){

        $objReserva = Reserva::where('id', $idReserva)->get();

        $butaca = new ButacaController;
        $arrDetalleButaca = $butaca->getDetalleButacaPorReserva($objReserva);
        return view( 'usuario.detalle_reserva', compact('objReserva'), compact('arrDetalleButaca'));
    }// detalleReservaUsuarioActual
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reserva  $reserva
     * @return \Illuminate\Http\Response
     */
    public function edit(Reserva $reserva)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reserva  $reserva
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reserva $reserva)
    {

    }

    public function updateCancelaReserva($idReserva){

        $disponibilidad = 2; // Reserva cancelada
        Reserva::where('id', $idReserva)->update( ['disponibilidad' => $disponibilidad] );

        $objReserva = Reserva::where('id', $idReserva)->get();
        $butaca = new ButacaController;

        foreach($objReserva[0]->butaca as $intClaveArray => $idButaca){
            $butaca->updateEstadoPorId($idButaca, $disponibilidad = 1);
        }      

        return redirect()->route('verMiReserva')->with('success', 'Reserva cancelada.');  

    }// updateCancelaReserva

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reserva  $reserva
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reserva $reserva)
    {

        //

    }// destroy

    public function eliminarReservaPorId($idReserva){

        // Restablecer la disponibilidad de las butacas
        // Disponibilidad 1 (No reservada - Disponible)        
        $objReserva = Reserva::where('id', $idReserva)->get();
        $butaca = new ButacaController;

        foreach($objReserva[0]->butaca as $intClaveArray => $idButaca){
            $butaca->updateEstadoPorId($idButaca, $disponibilidad = 1);
        }

        // Eliminar reserva
        $eliminaReserva = Reserva::where('id', $idReserva)->delete();

        return redirect()->route('verMiReserva')->with('success', 'Reserva eliminada.');        

    }
}
