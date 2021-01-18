<?php
//Incluimos la conexión.
require_once('conexion.php');
//CREAMOS UN OBJETO DE LA CLASE CONEXIÓN.
$con = new Conexion();
//Llamos al método conectar.
$llamarMetodo = $con->Conectar();
//Cargamos todos los datos del 	ID_ALUMNO selecionado
$idAlumnos = $_GET['ID_ALUMNO'];
//Realizamos la consulta donde nos mostrara todos lo datos donde el ID_ALUMNO sea igual a=?  .
$Alumnos = "SELECT * FROM ALUMNOS WHERE ID_ALUMNO = '$idAlumnos'";
//Realizamos la consulta
$stmt = $llamarMetodo->prepare($Alumnos);
//Ejecutamos la consulta
$stmt->execute();
//Ejecutamos la consulta
$filaAlumnos = $stmt->fetch(PDO::FETCH_ASSOC);
//Realizamos la consulta donde nos mostrara todos lo datos donde el Apoderado sea igual a=?  
$Apoderados = "SELECT * FROM APODERADOS";
$stmt = $llamarMetodo->prepare($Apoderados);
//Ejecutamos la consulta
$stmt->execute();
?>
<!--Creamos el formulario para Editar Alumnoss-->
<div align="center" class="table-responsive">
    <!--Creamos el formulario Modificar Alumnos-->
    <table width="30%" class="table display ">

        <input type="hidden" id="txt_Modificar_CodigoAlumnos" class="form-control my-3 text-black" value="<?php echo $filaAlumnos['ID_ALUMNO']; ?>">

        <tr>
            <td align="center"><br><b>Apoderados</b></td>
            <td align="center">
                <select name="" id="txt_Modificar_Apoderados" class="form-control my-3 text-black">
                    <option value="<?php echo $filaAlumnos['CODIGO_APODERADO']; ?>">
                        <?php echo $filaAlumnos['CODIGO_APODERADO']; ?></option>
                    <!--Mostramos los ID de los Apoderados-->
                    <?php while ($filaApoderados = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                        <option value="<?php echo $filaApoderados['ID_APODERADO']; ?>">
                            <?php echo $filaApoderados['ID_APODERADO'] . " | " . $filaApoderados['NOMBRES']; ?></option>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <input type="hidden" id="txt_Modificar_Rut" class="form-control my-3 text-black" value="<?php echo $filaAlumnos['RUT']; ?>">

        <tr>
            <td align="center"><br><b>Nombre</b></td>
            <td><input type="text" id="txt_Modificar_Nombre" class="form-control my-3 text-black" value="<?php echo $filaAlumnos['NOMBRES']; ?>"></td>
        </tr>
        <tr>
            <td align="center"><br><b>Apellido Paterno</b></td>
            <td><input type="text" id="txt_Modificar_ApellidoPaterno" class="form-control my-3 text-black" value="<?php echo $filaAlumnos['APELLIDO_PATERNO']; ?>"></td>
        </tr>
        <tr>
            <td align="center"><br><b>Apellido Materno</b></td>
            <td><input type="text" id="txt_Modificar_ApellidoMaterno" class="form-control my-3 text-black" value="<?php echo $filaAlumnos['APELLIDO_MATERNO']; ?>"></td>
        </tr>
        <tr>
            <td align="center"><br><b>Fecha Nacimiento</b></td>
            <td><input type="text" id="txt_Modificar_FechaNacimiento" class="form-control my-3 text-black" value="<?php echo $filaAlumnos['FECHA_NACIMIENTO']; ?>"></td>
        </tr>
        <tr>
            <td align="center"><br><b>Sexo</b></td>
            <td align="center">
                <select name="" id="txt_Modificar_Sexo" class="form-control my-3 text-black">
                    <option value="<?php echo $filaAlumnos['SEXO']; ?>">
                        <?php echo $filaAlumnos['SEXO']; ?></option>
                    <!--Mostramos los Géneros-->
                    <option>Femenino</option>
                    <option>Masculino</option>
                </select>
            </td>
        </tr>
        <tr>
            <td align="center"><b>Calle</b></td>
            <!--Mostramos la Dirección-->
            <td>
                <textarea id="txt_Modificar_Calle" rows="4" cols="40" value=""><?php echo $filaAlumnos['CALLE']; ?></textarea>
            </td>
        </tr>
        <tr>
            <td align="center"><br><b>Número</b></td>
            <td><input type="text" id="txt_Modificar_Numero" class="form-control my-3 text-black" value="<?php echo $filaAlumnos['NUMERO']; ?>"></td>
        </tr>
        <tr>
            <td align="center"><br><b>Ciudad</b></td>

            <td><input type="text" id="txt_Modificar_Ciudad" class="form-control my-3 text-black" value="<?php echo $filaAlumnos['CIUDAD']; ?>"></td>
        </tr>
    </table>
    <br>
    <!-- BOTON creamos una funcion que muestre los datos-->
    <button onclick="editarAlumnos('<?php echo $idAlumnos ?>')" class="btn btn-primary my-3">
        <b>Modificar Alumnos</b>
    </button>
</div>