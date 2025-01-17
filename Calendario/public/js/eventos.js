$(document).ready(function(){
    $('#tablaEventos').load('eventos/tabla_eventos1.php');
});

function buscarPorFecha() {
    let fecha = $('#fechaBuscar').val();
    $('#tablaEventos').load('eventos/tabla_eventos1.php?fecha=' + fecha);
}

function agregarEvento(){

    $.ajax({
        type:"POST",
        data:$('#frmAgregarEvento').serialize(),
        url:"../servidor/eventos/agregar1.php",
        success:function(respuesta) {
            if (respuesta == 1) {
                $('#tablaEventos').load('eventos/tabla_eventos1.php');
                $('#frmAgregarEvento')[0].reset();
                Swal.fire({
                    title: 'Exito!',
                    text: 'Agregado',
                    icon: 'success'
                })
            } else {
                Swal.fire({
                    title: 'Error!',
                    text: 'Fallo con ' + respuesta,
                    icon: 'error'
                })
            }
        }
    });

    return false;
}

function eliminarEvento(id_evento) {
    Swal.fire({
        title: 'Estas seguro de eliminar este evento?',
        text: "Una vez eliminado, no podra ser recuperado",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Eliminar'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type:"POST",
                data:'id_evento=' + id_evento,
                url:"../servidor/eventos/eliminar1.php",
                success:function(respuesta) {
                    if (respuesta == 1) {
                        $('#tablaEventos').load('eventos/tabla_eventos1.php');
                        Swal.fire({
                            title: 'Exito!',
                            text: 'Eliminado',
                            icon: 'success'
                        })
                    } else {
                        Swal.fire({
                            title: 'Error!',
                            text: 'Fallo con ' + respuesta,
                            icon: 'error'
                        })
                    }
                }
            });
        }
      })
}

function editarEvento(id_evento){
    $.ajax({
        type: "POST",
        url: "../servidor/eventos/editar1.php",
        data: "id_evento=" + id_evento,
        success : function(respuesta) {
            respuesta = jQuery.parseJSON( respuesta );
            
            $('#nombre_eventou').val(respuesta[0].evento);
            $('#hora_iniciou').val(respuesta[0].hora_inicio);
            $('#hora_finu').val(respuesta[0].hora_fin);
            $('#estadou').val(respuesta[0].estado);
            $('#fechau').val(respuesta[0].fecha);
            $('#id_evento').val(respuesta[0].id_evento);
        }
    });
}

function actualizarEvento() {
    $.ajax({
        type: "POST",
        data: $('#frmEditarEvento').serialize(),
        url: "../servidor/eventos/actualizar1.php",
        success : function(respuesta) {
            if (respuesta == 1) {
                $('#tablaEventos').load('eventos/tabla_eventos1.php');
                Swal.fire({
                    title: 'Exito!',
                    text: 'Actualizado',
                    icon: 'success'
                })
            } else {
                Swal.fire({
                    title: 'Error!',
                    text: 'Fallo con ' + respuesta,
                    icon: 'error'
                })
            }
        }
    });

    return false;

}