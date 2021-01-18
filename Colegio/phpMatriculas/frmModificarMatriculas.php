<?php
//Incluimos la conexión.
require_once('conexion.php');
//CREAMOS UN OBJETO DE LA CLASE CONEXIÓN.
$con = new Conexion();
//Llamos al método conectar.
$llamarMetodo = $con->Conectar();
//Cargamos todos los datos del idTrabajos selecionado
$idStock = $_GET['ID_MATRICULAS'];
//Realizamos la consulta donde nos mostrara todos lo datos donde el S_SUCURSAL sea igual a=?  .
$stock = "SELECT * FROM MATRICULAS WHERE ID_MATRICULAS = '$idStock'";
//Realizamos la consulta
$stmt = $llamarMetodo->prepare($stock);
//Ejecutamos la consulta
$stmt->execute();

//$stmt->execute(array(':S_SUCURSAL ' => $idStock));
$filaStock = $stmt->fetch(PDO::FETCH_ASSOC);

//Realizamos la consulta donde nos mostrara todos lo datos donde el PRODUCTO sea igual a=?  
$productos = "SELECT * FROM ALUMNOS";
$stmt = $llamarMetodo->prepare($productos);
//Ejecutamos la consulta
$stmt->execute();
//Realizamos la consulta donde nos mostrara todos lo datos donde el SUCURSAL sea igual a=?  
/*$sucursal = "SELECT * FROM SUCURSAL";
$stmt = $llamarMetodo->prepare($sucursal);
//Ejecutamos la consulta
$stmt->execute();*/

?>
<!--Creamos el formulario para Editar STOCK-->
<div align="center">
    <table border="2" width="30%" class="table table-bordered table-responsive">
        <tr>
            
            <input type="hidden" id="txt_MdCodigo_Sucursales" class="form-control my-3 text-black" 
            value="<?php echo $filaStock['ID_MATRICULAS']; ?>">
        </tr>
        <tr>
           
            <td align="center">
                <select name="" id="txt_MdCodigo_Productos" class="form-control my-3 text-black">
                    <option value="<?php echo  $filaStock['CODIGO_ALUMNO']; ?>">
                        <?php print  $filaStock['CODIGO_ALUMNO']; ?>
                    </option>

                    <!--Mostramos lo departmentos su nombre-->
                    <?php while ($filaProducto = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                        <option value="<?php echo $filaProducto['ID_ALUMNO']; ?>">
                            <?php echo $filaProducto['ID_ALUMNO']; ?></option>
                    <?php } ?>
                </select>
            </td>
        </tr>

        <tr>
            <td align="center">Fecha Matricula</td>
            <td>
                <input type="text" id="txt_mdCantidad_Stock" class="form-control my-3 text-black" 
                value="<?php echo $filaStock['FECHA']; ?>">
            </td>
        </tr>
    </table>
    <br>
    <!-- BOTON creamos una funcion que muestre los datos-->
    <button onclick="editarMatriculas('<?php echo $idStock ?>')" class="btn btn-primary">
        Modificar Stock
    </button>
</div>