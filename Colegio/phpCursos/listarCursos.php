<!--Creasmos la zona PHP para realizar con consulta listar Cursos-->
<?php
//Incluimos la conexion
require_once('conexion.php');
//CREAMOS UN OBJETO DE LA CLASE CONEXIÓN.
$con = new Conexion();
//llamamos al método conectar
$llamarMetodo = $con->Conectar();
//Creamos la consulta a la base de datos
$sql = "SELECT * FROM Cursos";
//M
$stmt = $llamarMetodo->prepare($sql);
//Ejecutamos la consulta
$stmt->execute();
?>
<!--Creamos un div para los donde la tabla sera responsible-->
<div class="container">
    <div class="row">
        <div class=" table-responsive ">
            <!--Creamos la tabla para los Cursos-->
            <table class="table display" id="AllDataTables_Cursos" style="width:100%">
                <!--Cabeza de la tabla-->
                <thead>
                    <!--Creamos las filas de Tabla Cursos-->
                    <tr>
                        <th><b>Código Curso</b></th>
                        <th><b>Código Sala</b></th>
                        <th><b>Código Matrícula</b></th>
                        <th><b>Código Alumno</b></th>
                        <th><b>Cófigo Profesor Jefe</b></th>
                        <th><b>Nombre del Curso</b></th>
                        <th><b>Botón</b></th>
                        <th><b>Botón</b></th>
                    </tr>
                </thead>
                <!--Cuerpo de la tabla-->
                <tbody>
                    <?php
                    //Creamos un ciclo While que recorrera todas las filas hasta mostrar el último Curso
                    while ($filaCursos = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                        <!--Creamos las columnas de Tabla Cursos-->
                        <tr><td><?php echo $filaCursos['ID_CURSO']; ?></td>
                            <td><?php echo $filaCursos['CODIGO_SALA']; ?></td>
                            <td><?php echo $filaCursos['CODIGO_MATRICULA']; ?></td>
                            <td><?php echo $filaCursos['CODIGO_ALUMNO']; ?></td>
                            <td><?php echo $filaCursos['C_PROFESOR_JEFE']; ?></td>
                            <td><?php echo $filaCursos['NOMBRE']; ?></td>
                            <!--Agregamos el el boton para que se muestre al lado de cada fila-->
                            <!--Editara cada fila donde este el id-->
                            <td> <button type="button" class="btn btn-warning" data-toggle="modal"
                             data-target="#modificarModal" OnClick="cargarModalCursos('<?php echo $filaCursos['ID_CURSO'] ?>')">
                                    Editar </button> </td>
                            <!--Agregamos el el boton para que se muestre al lado de cada fila-->
                            <!--Eliminara cada fila donde este el id-->
                            <td> <button OnClick="preguntarSiNoCursos('<?php echo $filaCursos['ID_CURSO'] ?>')" class="btn btn-danger">Eliminar</button></td>
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
        $('#AllDataTables_Cursos').DataTable({
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