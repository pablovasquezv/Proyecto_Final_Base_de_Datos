<?php
//Incluimos la conexion
require_once('conexion.php');
//CREAMOS UN OBJETO DE LA CLASE CONEXIÓN.
$con = new Conexion();
//llamamos al método conectar
$llamarMetodo = $con->Conectar();

//Creamos la consulta a la base de datos
$sql = "SELECT * FROM STOCK";
//M
$sentencia = $llamarMetodo->prepare($sql);
//Ejecutamos la consulta
$sentencia->execute();
//
?>
<!--Creamos un div para los donde la tabla sera responsible-->
<div class="container">
    <div class="row">
        <div class="table-responsive col-mod-6">
            <!--<h3 class="mt-3">STOCK</h3> -->
            <!--Creamos la tabla para los Stock-->
            <table class="table display" id="AllDataTables" style="width:100%">
                <!--Cabecera de la tabla-->
                <thead>
                    <!--Creamos las filas de Tabla Stock-->
                    <tr>
                        <th><b>Código Sucursal</b></th>
                        <th><b>Código Producto</b></th>
                        <th><b>Stock</b></th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    //Creamos un ciclo While que recorrera todas las filas hasta mostrar el utimo producto
                    while ($filaStock = $sentencia->fetch(PDO::FETCH_ASSOC)) { ?>
                        <!--Creamos las columnas de Tabla Stock-->
                        <tr>
                            <td><?php echo $filaStock['S_SUCURSAL']; ?></td>
                            <td><?php echo $filaStock['S_PRODUCTO']; ?></td>
                            <td><?php echo $filaStock['S_STOCK']; ?></td>
                        <?php } ?>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        //Creamos una clase para la tabla por eso se elimina el # y se reemplaza por un punto
        $('#AllDataTables').DataTable({
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