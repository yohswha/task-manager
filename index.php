<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
    <script src="js/jquery.min.js"></script>
    <script src="js/moment.min.js"></script>
    <link rel="stylesheet" href="css/fullcalendar.min.css">
    <script src="js/fullcalendar.min.js"></script>
    <script src="js/locale/es.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="js/bootstrap-clockpicker.js"></script>
    <link rel="stylesheet" href="css/bootstrap-clockpicker.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/functions.js"></script>
    <title>Calendar</title>
</head>
<body>


    <div class="container table-responsive">
        <div class="row">
            <div class="col"></div>
            <div class="col-sm-9 "><div id="Calendario"></div>
            </div>
            <div class="col"></div>
        </div>
    </div>
   

 <!-- Modal (insertar, actualizr y eliminar)-->
 <div class="modal fade" id="eventModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="tituloEvento">Tarea</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <input type="text" id="txtID" hidden name="txtID">
            <input type="text" id="txtFecha" hidden name="txtFecha">
            <div class="form-row">
                <div class="form-group col-md-8">
                    <label>Titulo: </label>
                    <input type="text" id="txtTitulo" class="form-control"name="txtTitulo">
                </div>
                <div class="form-group col-md-4">
                    <label>Hora:</label>
                    <div class="input-group clockpicker" data-autoclose="true">
                    <input type="text" id="txtHora" class="form-control" name="txtHora" value="10:30">
                    </div>

                </div>
            
                <div class="form-group col-12">
                    <label>Descripcion:</label>
                    <textarea id="txtDescription" rows="3" class="form-control"></textarea>
                </div>
                <div class="form-group col-12">
                <label>Color: </label>
                <input type="color" value="#ff0000" id="txtColor" class="form-control" name="txtColor">
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-success" id="btnAgregar">Crear</button>
            <button type="button" class="btn btn-secondary" id="btnActualizar">Actualizar</button>
            <button type="button" id="btnEliminar" class="btn btn-danger">Eliminar</button>
            <button type="button" class="btn btn-default">Cancelar</button>
        </div>
        </div>
    </div>
    </div>



</body>

</html>