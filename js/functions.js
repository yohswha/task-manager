
$(document).ready(function(){
    $('#Calendario').fullCalendar({
        header:{
            left:'today,prev,next',
            center:'title',
            right:'month,basicWeek,basicDay,agendaWeek,agendaDay'
        },
        dayClick:function(date,jsEvent,view){
            //Desabilita Botones
            $('#btnAgregar').prop("disabled",false);
            $('#btnActualizar').prop("disabled",true);
            $('#btnEliminar').prop("disabled",true);

            limpiarForm();
            $('#txtFecha').val(date.format());
            $("#eventModal").modal();

        },
    
            events:'http://localhost/task_manager/events.php',
                
            
        
        eventClick:function(calEvent,jsEvent,view){

            $('#btnAgregar').prop("disabled",true);
            $('#btnActualizar').prop("disabled",false);
            $('#btnEliminar').prop("disabled",false);

            $("#txtID").val(calEvent.id);
            $("#tituloEvento").html(calEvent.title);
            $("#txtDescription").val(calEvent.description);
            $("#txtTitulo").val(calEvent.title);
            $("#txtColor").val(calEvent.color);

            FechaHora=calEvent.start._i.split(" ");
            $("#txtFecha").val(FechaHora[0]);
            $("#txtHora").val(FechaHora[1]);
            
           $("#eventModal").modal();
        },
        editable:true,
        eventDrop:function(calEvent){
            $("#txtID").val(calEvent.id);
            $("#tituloEvento").html(calEvent.title);
            $("#txtDescription").val(calEvent.description);
            $("#txtTitulo").val(calEvent.title);
            $("#txtColor").val(calEvent.color);

            FechaHora=calEvent.start.format().split("T");                   
            $("#txtFecha").val(FechaHora[0]);
            $("#txtHora").val(FechaHora[1]);

            RecoletarDatos();
            enviarInfo('actualizar',nuevoEvento,true);
        }

    });



/// Eventos y funciones
var nuevoEvento;
$("#btnAgregar").click(function(){
    RecoletarDatos();
    enviarInfo('agregar',nuevoEvento);
});
$("#btnEliminar").click(function(){
    RecoletarDatos();
    enviarInfo('eliminar',nuevoEvento);
});

$("#btnActualizar").click(function(){
    RecoletarDatos();
    enviarInfo('actualizar',nuevoEvento);
});
function RecoletarDatos(){      
    
    nuevoEvento={
    id:$('#txtID').val(),
    title:$('#txtTitulo').val(),
    start:$('#txtFecha').val()+" "+$('#txtHora').val(),
    color:$('#txtColor').val(),
    description:$('#txtDescription').val(),
    txtColor:('#FFFFFF'),
    end:$('#txtFecha').val()+" "+$('#txtHora').val()

    }

            
}

function enviarInfo(action, objEvent,modal ){
    
 // objEvent=JSON.stringify(objEvent);

    $.ajax({
        async:true,
        type:'POST',
        dataType:'HTML',
        url: 'events.php?action='+action,
        data:{objEvent},
        success:function(msj){

            if(msj){

                $('#Calendario').fullCalendar('refetchEvents');
               if (!modal) {
                    $("#eventModal").modal('toggle');
                    alert("Solicitud Efectuada Correctamente");

               }

            }
        },
        error:function() {
            $("#eventModal").modal('toggle');
            alert("Ooops hubo un error....");
        }

    });
}
$('.clockpicker').clockpicker();

function limpiarForm(){
    $("#txtID").val('');
    $("#tituloEvento").val('Nuevo Evento..');
    $("#txtDescription").val('');
    $("#txtTitulo").val('');
    $("#txtColor").val('');
}

});