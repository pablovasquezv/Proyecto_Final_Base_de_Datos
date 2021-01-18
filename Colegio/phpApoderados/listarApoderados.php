<!--Creasmos la zona PHP para realizar con consulta listar Apoderados-->
<?php
//Incluimos la conexion
require_once('conexion.php');
//CREAMOS UN OBJETO DE LA CLASE CONEXIÓN.
$con = new Conexion();
//llamamos al método conectar
$llamarMetodo = $con->Conectar();
//Creamos la consulta a la base de datos
$sql = "SELECT * FROM APODERADOS";
//M
$stmt = $llamarMetodo->prepare($sql);
//Ejecutamos la consulta
$stmt->execute();
?>
<!--Creamos un div para los donde la tabla sera responsible-->
<div class="container">
    <div class="row">
        <div align="center" class="col-mod-12 table-responsive ">
            <!--Creamos la tabla para los Productos-->
            <table class="table display" id="AllDataTables_APODERADOS" style="width:100%">
                <!--Cabeza de la tabla-->
                <thead>
                    <!--Creamos las filas de Tabla APODERADOS-->
                    <tr>
                        <th><b>Código</b></th>
                        <th><b>Rut</b></th>
                        <th><b>Nombres</b></th>
                        <th><b>Paterno</b></th>
                        <th><b>Materno</b></th>
                        <th><b>Sexo</b></th>
                        <th><b>Celular</b></th>
                        <th><b>Nacimiento</b></th>
                        <th><b>Calle</b></th>
                        <th><b>Numero</b></th>
                        <th><b>Ciudad</b></th>
                        <th><b>Botón</b></th>
                        <th><b>Botón</b></th>
                    </tr>
                </thead>
                <!--Cuerpo de la tabla-->
                <tbody>
                    <?php
                    //Creamos un ciclo While que recorrera todas las filas hasta mostrar el último Apoderado
                    while ($filaApoderados = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                        <!--Creamos las columnas de Tabla APODERADOS-->
                        <tr>
                            <td><?php echo $filaApoderados['ID_APODERADO']; ?></td>
                            <td><?php echo $filaApoderados['RUT']; ?></td>
                            <td><?php echo $filaApoderados['NOMBRES']; ?></td>
                            <td><?php echo $filaApoderados['APELLIDO_PATERNO']; ?></td>
                            <td><?php echo $filaApoderados['APELLIDO_MATERNO']; ?></td>
                            <td><?php echo $filaApoderados['SEXO']; ?></td>
                            <td><?php echo $filaApoderados['CELULAR']; ?></td>
                            <td><?php echo $filaApoderados['FECHA_NACIMIENTO']; ?></td>
                            <td><?php echo $filaApoderados['CALLE']; ?></td>
                            <td><?php echo $filaApoderados['NUMERO']; ?></td>
                            <td><?php echo $filaApoderados['CIUDAD']; ?></td>
                            <!--Agregamos el el boton para que se muestre al lado de cada fila-->
                            <!--Editara cada fila donde este el id-->
                            <td> <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modificarModal" OnClick="cargarModalApoderados('<?php echo $filaApoderados['ID_APODERADO'] ?>')">
                                    Editar </button> </td>
                            <!--Agregamos el el boton para que se muestre al lado de cada fila-->
                            <!--Eliminara cada fila donde este el id-->
                            <td> <button OnClick="preguntarSiNoApoderado('<?php echo $filaApoderados['ID_APODERADO'] ?>')" class="btn btn-danger">Eliminar</button></td>
                        <?php } ?>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!--Agregamos la funcion para hacer la tabla dinamica-->
<script>
    $(document).ready(function() {
        //Creamos una clase para la tabla por eso se elimina el # y se reemplaza por un punto
        $('#AllDataTables_APODERADOS').DataTable({
            language: {
                "sProcessing": "Procesando...",
                "sLengthMenu": "Mostrar _MENU_ registros",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "Ningún dato disponible en esta tabla",
                "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix": "",
                "sSearch": "Buscar:",
                "sUrl": "",
                "sInfoThousands": ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            }
        });
    });
</script>