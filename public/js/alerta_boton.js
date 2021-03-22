document.getElementById("guardaReservaBtn").addEventListener("click", function(){ 
  
  swal({
    title: "¿Todos los datos son correctos?",
    text: "Se creará una reserva con los datos que agregaste. Luego de crearla, solo podrás cancelar o eliminar la reserva.",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
      swal("Creando reserva... Espere un momento por favor.", {
        icon: "success",
      });
      document.getElementById("guardaReservaFrm").submit();
    } else {
      swal("Está bien. Elige con calma.");
    }
  });

}); 

function cancelaReserva(){

   swal({
    title: "¿Realmente deseas cancelar la reserva?",
    text: "Si lo haces todos los asientos volverán a quedar libres. Y no podrás revertir los cambios, deberás crear una nueva reserva",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
      swal("Cancelando reserva... Espere un momento por favor.", {
        icon: "success",
      });
      document.getElementById("cancelaReservaFrm").submit();
    } else {
      swal("¡Uf! Tu reserva está a salvo");
    }
  }); 

}//cancelaReserva

function eliminaReserva(){

  swal({
    title: "¿Realmente deseas eliminar los datos de la reserva?",
    text: "Si lo haces, no podrás volver a visualizar los datos de tu reserva.",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
      swal("Eliminando reserva... Espere un momento por favor.", {
        icon: "success",
      });
      document.getElementById("eliminaReservaFrm").submit();
    } else {
      swal("¡Uf! Los datos de tu reserva estan a salvo.");
    }
  });  

}

