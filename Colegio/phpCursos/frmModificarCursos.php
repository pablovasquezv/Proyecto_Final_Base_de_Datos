<?php
//Incluimos la conexión.
require_once('conexion.php');
//CREAMOS UN OBJETO DE LA CLASE CONEXIÓN.
$con = new Conexion();
//Llamos al método conectar.
$llamarMetodo = $con->Conectar();
//Cargamos todos los datos del 	ID_CURSO selecionado
$idCurso = $_GET['ID_CURSO'];
//Realizamos la consulta donde nos mostrara todos lo datos donde el ID_CURSO sea igual a=?  .
$Cursos = "SELECT * FROM CURSOS WHERE ID_CURSO = '$idCurso'";
//Realizamos la consulta
$stmt = $llamarMetodo->prepare($Cursos);
//Ejecutamos la consulta
$stmt->execute();
//Ejecutamos la consulta
$filaCursos = $stmt->fetch(PDO::FETCH_ASSOC);
//Realizamos la consulta donde nos mostrara todos lo datos donde el Apoderado sea igual a=?  
$Salas = "SELECT * FROM SALAS";
$stmt_S = $llamarMetodo->prepare($Salas);
//Ejecutamos la consulta
$stmt_S->execute();
//Realizamos la consulta donde nos mostrara todos lo datos de la Matriculas sea igual a=?  
$Matriculas = "SELECT * FROM MATRICULAS";
$stmt_M = $llamarMetodo->prepare($Matriculas);
//Ejecutamos la consulta
$stmt_M->execute();
//Realizamos la consulta donde nos mostrara todos de los Alumnos.  
$Alumnos = "SELECT * FROM ALUMNOS";
$stmt_A = $llamarMetodo->prepare($Alumnos);
//Ejecutamos la consulta
$stmt_A->execute();
//Realizamos la consulta donde nos mostrará todos lo datos de los Profesores.  
$Profesores = "SELECT * FROM PROFESORES";
$stmt_P = $llamarMetodo->prepare($Profesores);
//Ejecutamos la consulta
$stmt_P->execute();
?>
<!--Creamos el formulario para Editar Alumnoss-->
<div align="center" class="table-responsive">
    <!--Creamos el formulario Modificar Alumnos-->
    <table width="30%" class="table display ">
        <tr>
            <td align="center"><br><b>Salas:</b></td>
            <td align="center">
                <select name="" id="txt_Modificar_Sala" class="form-control my-3 text-black">
                    <option value="<?php echo $filaCursos['CODIGO_SALA']; ?>">
                        <?php echo $filaCursos['CODIGO_SALA']; ?></option>
                    <!--Mostramos los ID de las Salas-->
                    <?php while ($filaSalas = $stmt_S->fetch(PDO::FETCH_ASSOC)) { ?>
                        <option value="<?php echo $filaSalas['ID_SALA']; ?>">
                            <?php echo $filaSalas['ID_SALA'] . " | " . $filaSalas['NUMERO'] . "  " . $filaSalas['DESCRIPCION']; ?></option>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td align="center"><br><b>Matrículas:</b></td>
            <td align="center">
                <select name="" id="txt_Modificar_Matricula" class="form-control my-3 text-black">
                    <option value="<?php echo $filaCursos['CODIGO_MATRICULA']; ?>">
                        <?php echo $filaCursos['CODIGO_MATRICULA']; ?></option>
                    <!--Mostramos los ID de las Salas-->
                    <?php while ($filaMatriculas = $stmt_M->fetch(PDO::FETCH_ASSOC)) { ?>
                        <option value="<?php echo $filaMatriculas['ID_MATRICULAS']; ?>">
                            <?php echo $filaMatriculas['ID_MATRICULAS'] . " | ID ALUMNO " . $filaMatriculas['CODIGO_ALUMNO'] . " FECHA " . $filaMatriculas['FECHA']; ?></option>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td align="center"><br><b>Alumno:</b></td>
            <td align="center">
                <select name="" id="txt_Modificar_Alumno" class="form-control my-3 text-black">
                    <option value="<?php echo $filaCursos['CODIGO_ALUMNO']; ?>">
                        <?php echo $filaCursos['CODIGO_ALUMNO']; ?></option>
                    <!--Mostramos los ID de las Alumno-->
                    <?php while ($filaAlumnos = $stmt_A->fetch(PDO::FETCH_ASSOC)) { ?>
                        <option value="<?php echo $filaAlumnos['ID_ALUMNO']; ?>">
                            <?php echo $filaAlumnos['ID_ALUMNO'] . " | " . $filaAlumnos['NOMBRES'] . "  " . $filaAlumnos['APELLIDO_PATERNO']; ?></option>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td align="center"><br><b>Profesor Jefé:</b></td>
            <td align="center">
                <select name="" id="txt_Modificar_Profesor" class="form-control my-3 text-black">
                    <option value="<?php echo $filaCursos['C_PROFESOR_JEFE']; ?>">
                        <?php echo $filaCursos['C_PROFESOR_JEFE']; ?></option>
                    <!--Mostramos los ID del Profesor-->
                    <?php while ($filaProfesores = $stmt_P->fetch(PDO::FETCH_ASSOC)) { ?>
                        <option value="<?php echo $filaProfesores['ID_PROFESOR']; ?>">
                            <?php echo $filaProfesores['ID_PROFESOR'] . " | " . $filaProfesores['NOMBRES'] . "  " . $filaProfesores['APELLIDO_PATERNO']; ?></option>
                    <?php } ?>
                </select>
            </td>
        </tr>

        <tr>
            <td align="center"><br><b>Nombre:</b></td>
            <td><input type="text" id="txt_Modificar_Nombre" class="form-control my-3 text-black" value="<?php echo $filaCursos['NOMBRE']; ?>"></td>
        </tr>
    </table>
    <br>
    <!-- BOTON creamos una funcion que muestre los datos-->
    <button onclick="editarCursos('<?php echo $idCurso ?>')" class="btn btn-primary my-3">
        <b>Actualizar</b>
    </button>
</div>