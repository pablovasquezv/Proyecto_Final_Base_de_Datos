<!--Creasmos la zona PHP para realizar con consulta listar Productos-->
<?php
//Incluimos la conexion
require_once('conexion.php');
//CREAMOS UN OBJETO DE LA CLASE CONEXIÓN.
$con = new Conexion();
//llamamos al método conectar
$llamarMetodo = $con->Conectar();
//Creamos la consulta a la base de datos
$sql = "SELECT * FROM PRODUCTO";
//M
$stmt = $llamarMetodo->prepare($sql);
//Ejecutamos la consulta
$stmt->execute();
?>
<!--Creamos un div para los donde la tabla sera responsible-->
<div class="container">
    <div class="row">
        <div class="col-mod-6 table-responsive ">
            <!--Creamos la tabla para los Productos-->
            <table class="table display" id="AllDataTables_Productos" style="width:100%">
                <!--Cabeza de la tabla-->
                <thead>
                    <!--Creamos las filas de Tabla Producto-->
                    <tr>
                        <th><b>Descripción</b></th>
                        <th><b>Precio</b></th>
                    </tr>
                </thead>
                <!--Cuerpo de la tabla-->
                <tbody>
                    <?php
                    //Creamos un ciclo While que recorrera todas las filas hasta mostrar el utimo producto
                    while ($filaProductos = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                        <!--Creamos las columnas de Tabla Producto-->
                        <tr>
                            
                            <td><?php echo $filaProductos['P_DESCRIPCION']; ?></td>
                            <td><?php echo $filaProductos['P_PRECIOVENTA']; ?></td>

                            <!--Agregamos el el boton para que se muestre al lado de cada fila-->
                            <!--Editara cada fila donde este el id-->

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
        $('#AllDataTables_Productos').DataTable({
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