<?php
//Incluimos la conexión.
require_once('conexion.php');
//CREAMOS UN OBJETO DE LA CLASE CONEXIÓN.
$con = new Conexion();
//Llamos al método conectar.
$llamarMetodo = $con->Conectar();
//Realizamos la consulta donde nos mostrara todos lo datos de la Salas. 
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
<!--Mostramos el formulario para ingresar un Alumno-->
<div align="center" class="col-sm-12">
    <!--Creamos un formulario para ingresar un Alumno con validaciones-->
    <form id="frmCursos" method="post">
        <table whited="30%" class="table display alert-secondary mt-3">
            <tr>
                <td align="center">
                    <!--Creamos el txt nombre con un id y un nombre-->
                    <input type="text" class="form-control input-sm  text-black" id="txt_codigo_Curso" name="codigo" placeholder="Ingrese el Código" autofocus>
                </td>
            </tr>
            <tr>
                <td align="center">
                    <select name="" id="txt_codigo_Sala" class="form-control input-sm my-3 text-black">
                        <option value="">Seleccione una Sala...</option>
                        <!--Mostramos los ID de las Salas-->
                        <?php while ($filaSalas = $stmt_S->fetch(PDO::FETCH_ASSOC)) { ?>
                            <option value="<?php echo $filaSalas['ID_SALA']; ?>">
                                <?php echo $filaSalas['ID_SALA'] . " | " . $filaSalas['NUMERO'] . "  " . $filaSalas['DESCRIPCION']; ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td align="center">
                    <select name="" id="txt_codigo_Matriculas" class="form-control input-sm  my-3 text-black">
                        <option value="">Seleccione una Matricula...</option>
                        <!--Mostramos los ID de las Salas-->
                        <?php while ($filaMatriculas = $stmt_M->fetch(PDO::FETCH_ASSOC)) { ?>
                            <option value="<?php echo $filaMatriculas['ID_MATRICULAS']; ?>">
                                <?php echo $filaMatriculas['ID_MATRICULAS'] . " | " . $filaMatriculas['CODIGO_ALUMNO'] . "  " . $filaMatriculas['FECHA']; ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td align="center">
                    <select name="" id="txt_codigo_Alumno" class="form-control input-sm  my-3 text-black">
                        <option value="">Seleccione un Alumno...</option>
                        <!--Mostramos los ID de las Alumno-->
                        <?php while ($filaAlumnos = $stmt_A->fetch(PDO::FETCH_ASSOC)) { ?>
                            <option value="<?php echo $filaAlumnos['ID_ALUMNO']; ?>">
                                <?php echo $filaAlumnos['ID_ALUMNO'] . " | " . $filaAlumnos['NOMBRES'] . "  " . $filaAlumnos['APELLIDO_PATERNO']; ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td align="center">
                    <select name="" id="txt_codigo_Profesor" class="form-control input-sm  my-3 text-black">
                        <option value="">Seleccione un Profesor...</option>
                        <!--Mostramos los ID del Profesor-->
                        <?php while ($filaProfesores = $stmt_P->fetch(PDO::FETCH_ASSOC)) { ?>
                            <option value="<?php echo $filaProfesores['ID_PROFESOR']; ?>">
                                <?php echo $filaProfesores['ID_PROFESOR'] . " | " . $filaProfesores['NOMBRES'] . "  " . $filaProfesores['APELLIDO_PATERNO']; ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <!--Creamos el txt pais con un id y un nombre-->
                    <input type="text" class="form-control input-sm  my-3" id="txt_Nombre" name="nombres" placeholder="Ingrese el nombrel curso"></td>
            </tr>
        </table>
        <!-- BOTON QUE TIENE EL EVENTO QUE DISPARA LA FUNCION PARA VALIDAR-->
        <button onclick="agregrarCursos()" class="btn btn-primary mt-3" id="btn">
            <b>Guardar</b></button>
    </form>
</div>
<!--Agregamos el Script para validar las celdas-->
<script>
    /**INICIAMOS EL DOCUMENTO AL LLAMAR EL MODAL */
    $(document).ready(function() {
        //Creamos un método para la expresion regular para los caracteres Nombres del input.
        $.validator.addMethod('nombres', function(value, element) {
            //Incluimos la expresion regular para los caracteres Nombres del input.
            return this.optional(element) || /^[a-záéóóúàèìòùäëïöüñ\s]+$/i.test(value);
        });
        //Agregamos el id del formulario para validarlo.
        $("#frmCursos").validate({
            event: "blur",
            rules: {
                 //Incluimos los métodos y propiedades para el campo codigo.
                 'codigo': {
                    required: true,
                    number: true,
                    minlength: 1,
                    maxlength: 4
                },
                //Incluimos los métodos y propiedades para el campo nombre.
                'nombres': {
                    required: true,
                    nombres: true,
                    minlength: 4,
                    maxlength: 50
                },
            },
            //Creamos lo mensajes para cada una de las celdas.
            messages: {
                //Creamos el mensaje para el input del código.
                codigo: {
                    //Para mostrar que el campo es requerido.
                    required: 'EL CAMPO ES REQUERIDO!!!',
                    //Para cuando no ingresen un números.
                    number: 'Ingrese Sólo Números!!',
                    //El mínimo de carácteres.
                    minlength: 'El minimo permitido son: 2 Números',
                    //El máximo de carácteres.
                    maxlength: 'El máximo permitido son 4 Números'
                },
                //Creamos el mensaje para el input del nombre.
                nombres: {
                    //Para mostrar que el campo es requerido.
                    required: 'EL CAMPO ES REQUERIDO!!',
                    //Para cuando no ingresen letras.
                    nombres: 'Ingrese Sólo letras!!',
                    //El mínimo de carácteres.
                    minlength: 'El mínimo permitido son: 4 carácteres',
                    //El máximo de carácteres.
                    maxlength: 'El máximo permitido son: 50 carácteres'
                },
            },
            debug: true,
            errorElement: "label",
            errorContainer: $("#errores"),

            submitHandler: function(form) {
                $("#mensaje").html("El mensaje se ha enviado correctamente");
            }
        });
    });
</script>