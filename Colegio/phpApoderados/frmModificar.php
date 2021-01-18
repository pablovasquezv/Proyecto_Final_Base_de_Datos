<?php
//Incluimos la conexión.
require_once('conexion.php');
//CREAMOS UN OBJETO DE LA CLASE CONEXIÓN.
$con = new Conexion();
//Llamos al método conectar.
$llamarMetodo = $con->Conectar();
//Cargamos todos los datos del 	ID_APODERADO selecionado
$idApoderados = $_GET['ID_APODERADO'];
//Realizamos la consulta donde nos mostrara todos lo datos donde el ID_APODERADO sea igual a=?  .
$Apoderados = "SELECT * FROM APODERADOS WHERE ID_APODERADO = '$idApoderados'";
//Realizamos la consulta
$stmt = $llamarMetodo->prepare($Apoderados);
//Ejecutamos la consulta
$stmt->execute();
//Ejecutamos la consulta
$filaApoderados = $stmt->fetch(PDO::FETCH_ASSOC);

?>
<!--Creamos el formulario para Editar Apoderadoss-->
<div align="center" class="table-responsive">
    <!--Creamos el formulario Modificar Apoderados-->
    <table width="30%" class="table display alert-secondary ">

        <input type="hidden" id="txt_mdCodigoApoderados" class="form-control my-3 text-black" value="<?php echo $filaApoderados['ID_APODERADO']; ?>">
        <input type="hidden" id="txt_mdRut" class="form-control my-3 text-black" value="<?php echo $filaApoderados['RUT']; ?>">
        <tr>
            <td align="center"><br><b>Nombre</b></td>
            <td><input type="text" id="txt_mdNombre" class="form-control my-3 text-black" value="<?php echo $filaApoderados['NOMBRES']; ?>"></td>
        </tr>
        <tr>
            <td align="center"><br><b>Apellido Paterno</b></td>
            <td><input type="text" id="txt_mdApellidoPaterno" class="form-control my-3 text-black" value="<?php echo $filaApoderados['APELLIDO_PATERNO']; ?>"></td>
        </tr>
        <tr>
            <td align="center"><br><b>Apellido Materno</b></td>
            <td><input type="text" id="txt_mdApellidoMaterno" class="form-control my-3 text-black" value="<?php echo $filaApoderados['APELLIDO_MATERNO']; ?>"></td>
        </tr>
        <tr>
            <td align="center"><br><b>Sexo</b></td>
            <td align="center">
                <select name="" id="txt_mdSexo" class="form-control my-3 text-black">
                    <option value="<?php echo $filaApoderados['SEXO']; ?>">
                        <?php echo $filaApoderados['SEXO']; ?></option>
                    <!--Mostramos los Géneros-->
                    <option>Femenino</option>
                    <option>Masculino</option>
                </select>
            </td>
        </tr>
        <tr>
            <td align="center"><br><b>Celular</b></td>
            <td>
                <input type="text" id="txt_mdCelular" class="form-control my-3 text-black" value="<?php echo $filaApoderados['CELULAR']; ?>">
            </td>
        </tr>
        <tr>
            <td align="center"><br><b>FechaNacimiento</b></td>
            <td><input type="text" id="txt_mdFechaNacimiento" class="form-control my-3 text-black" value="<?php echo $filaApoderados['FECHA_NACIMIENTO']; ?>"></td>
        </tr>

        <tr>
            <td align="center"><b>Calle</b></td>
            <!--Mostramos la Dirección-->
            <td>
                <textarea id="txt_mdCalle" rows="4" cols="40" value=""><?php echo $filaApoderados['CALLE']; ?></textarea>
            </td>
        </tr>
        <tr>
            <td align="center"><br><b>Número</b></td>
            <td><input type="text" id="txt_mdNumero" class="form-control my-3 text-black" value="<?php echo $filaApoderados['NUMERO']; ?>"></td>
        </tr>
        <tr>
            <td align="center"><br><b>Ciudad</b></td>

            <td><input type="text" id="txt_mdCiudad" class="form-control my-3 text-black" value="<?php echo $filaApoderados['CIUDAD']; ?>"></td>
        </tr>
    </table>
    <br>
    <!-- BOTON creamos una funcion que muestre los datos-->
    <button onclick="editarApoderados('<?php echo $idApoderados ?>')" class="btn btn-primary my-3">
        Modificar Apoderadoss
    </button>
</div>