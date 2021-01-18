<?php
//Incluimos la conexión.
require_once('conexion.php');
//CREAMOS UN OBJETO DE LA CLASE CONEXIÓN.
$con = new Conexion();
//Llamos al método conectar.
$llamarMetodo = $con->Conectar();
//Cargamos todos los datos del 	ID_PROFESORselecionado
$idProfesores = $_GET['ID_PROFESOR'];
//Realizamos la consulta donde nos mostrara todos lo datos donde el ID_PROFESORsea igual a=?  .
$Profesores = "SELECT * FROM PROFESORES WHERE ID_PROFESOR= '$idProfesores'";
//Realizamos la consulta
$stmt = $llamarMetodo->prepare($Profesores);
//Ejecutamos la consulta
$stmt->execute();
//Ejecutamos la consulta
$filaProfesores = $stmt->fetch(PDO::FETCH_ASSOC);
//Realizamos la consulta donde nos mostrara todos lo datos donde el Apoderado sea igual a=?  
$departamentos = "SELECT * FROM DEPARTAMENTOS";
$stmt = $llamarMetodo->prepare($departamentos);
//Ejecutamos la consulta
$stmt->execute();
?>
<!--Creamos el formulario para Editar Profesoress-->
<div align="center" class="table-responsive">
    <!--Creamos el formulario Modificar Profesores con validaciones-->
    <form id="frmProfesores" method="post">
        <table width="30%" class="table display alert-secondary ">
            <tr>
                <input type="text" id="txt_Modificar_CodigoProfesores" name="codigo" class="form-control my-3 text-black" value="<?php echo $filaProfesores['ID_PROFESOR']; ?>">
            </tr>
            <tr>
                <td align="center"><br><b>Departamentos</b></td>
                <td align="center">
                    <select name="" id="txt_Modificar_departamentos" class="form-control my-3 text-black">
                        <option value="<?php echo $filaProfesores['CODIGO_DEPARTAMENTO']; ?>">
                            <?php echo $filaProfesores['CODIGO_DEPARTAMENTO']; ?></option>
                        <!--Mostramos los ID de los departamentos-->
                        <?php while ($filaDepartamentos = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                            <option value="<?php echo $filaDepartamentos['D_DEPARTAMENTO']; ?>">
                                <?php echo $filaDepartamentos['D_DEPARTAMENTO'] . "  NOMBRE: " .  $filaDepartamentos['D_DESCRIPCION']; ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <input type="hidden" id="txt_Modificar_Rut" name="rut" class="form-control my-3 text-black" value="<?php echo $filaProfesores['RUT']; ?>">
            </tr>
            <tr>
                <td align="center"><br> <b>Nombre</b></td>
                <td><input type="text" id="txt_Modificar_Nombre" name="nombres" class="form-control my-3 text-black" value="<?php echo $filaProfesores['NOMBRES']; ?>"></td>
            </tr>
            <tr>
                <td align="center"><br><b>Apellido Paterno</b></td>
                <td><input type="text" id="txt_Modificar_ApellidoPaterno" name="apellido_Paterno" class="form-control my-3 text-black" value="<?php echo $filaProfesores['APELLIDO_PATERNO']; ?>"></td>
            </tr>
            <tr>
                <td align="center"><br><b>Apellido Materno</b></td>
                <td><input type="text" id="txt_Modificar_ApellidoMaterno" name="apellido_Materno" class="form-control my-3 text-black" value="<?php echo $filaProfesores['APELLIDO_MATERNO']; ?>"></td>
            </tr>
            <tr>
                <td align="center"><br><b>FechaNacimiento</b></td>
                <td><input type="text" id="txt_Modificar_FechaNacimiento" name="fecha" class="form-control my-3 text-black" value="<?php echo $filaProfesores['FECHA_NACIMIENTO']; ?>"></td>
            </tr>
            <tr>
                <td align="center"><br><b>Sexo</b></td>
                <td align="center">
                    <select name="" id="txt_Modificar_Sexo" class="form-control my-3 text-black">
                        <option value="<?php echo $filaProfesores['SEXO']; ?>">
                            <?php echo $filaProfesores['SEXO']; ?></option>
                        <!--Mostramos los Géneros-->
                        <option>Femenino</option>
                        <option>Masculino</option>
                    </select>
                </td>
            <tr>
                <td align="center"><br><b>Calle</b></td>
                <!--Mostramos la Dirección-->
                <td>
                    <textarea id="txt_Modificar_Calle" rows="4" name="calle" cols="40" value=""><?php echo $filaProfesores['CALLE']; ?></textarea>
                </td>
            </tr>
            <tr>
                <td align="center"><br><b>Número</b></td>
                <td><input type="text" id="txt_Modificar_Numero" name="numero" class="form-control my-3 text-black" value="<?php echo $filaProfesores['NUMERO']; ?>"></td>
            </tr>
            <tr>
                <td align="center"><br><b>Ciudad</b></td>

                <td><input type="text" id="txt_Modificar_Ciudad" name="ciudad" class="form-control my-3 text-black" value="<?php echo $filaProfesores['CIUDAD']; ?>"></td>
            </tr>
        </table>
        <br>
        <!-- BOTON creamos una funcion que muestre los datos-->
        <button onclick="editarProfesores('<?php echo $idProfesores ?>')" class="btn btn-primary my-3">
            <b>Modificar Profesores</b>
        </button>
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
        $.validator.addMethod('apellido_Paterno', function(value, element) {
            //Incluimos la expresion regular para los caracteres apellido_Paterno del input.
            return this.optional(element) || /^[a-záéóóúàèìòùäëïöüñ\s]+$/i.test(value);
        });
        $.validator.addMethod('apellido_Materno', function(value, element) {
            //Incluimos la expresion regular para los caracteres apellido_Materno del input.
            return this.optional(element) || /^[a-záéóóúàèìòùäëïöüñ\s]+$/i.test(value);
        });
        $.validator.addMethod('sexo', function(value, element) {
            //Incluimos la expresion regular para los caracteres sexo del input.
            return this.optional(element) || /^[a-záéóóúàèìòùäëïöüñ\s]+$/i.test(value);
        });
        $.validator.addMethod('calle', function(value, element) {
            //Incluimos la expresion regular para los caracteres calle del input.
            return this.optional(element) || /^[a-záéóóúàèìòùäëïöüñ\s]+$/i.test(value);
        });
        $.validator.addMethod('ciudad', function(value, element) {
            //Incluimos la expresion regular para los caracteres ciudad del input.
            return this.optional(element) || /^[a-záéóóúàèìòùäëïöüñ\s]+$/i.test(value);
        });
        //Agregamos el id del formulario para validarlo.
        $("#frmProfesores").validate({
            event: "blur",
            rules: {
                //Incluimos los métodos y propiedades para el campo codigo.
                'codigo': {
                    required: true,
                    number: true,
                    minlength: 1,
                    maxlength: 4
                },
                //Incluimos los métodos y propiedades para el campo rut.
                'rut': {
                    required: true,
                    number: true,
                    minlength: 9,
                    maxlength: 9
                },
                //Incluimos los métodos y propiedades para el campo nombre.
                'nombres': {
                    required: true,
                    nombres: true,
                    minlength: 4,
                    maxlength: 50
                },
                //Incluimos los métodos y propiedades para el campo Apellido Paterno.
                'apellido_Paterno': {
                    required: true,
                    apellido_Paterno: true,
                    minlength: 4,
                    maxlength: 50
                },
                //Incluimos los métodos y propiedades para el campo Apellido Materno.
                'apellido_Materno': {
                    required: true,
                    apellido_Materno: true,
                    minlength: 4,
                    maxlength: 50
                },
                //Incluimos los métodos y propiedades para el campo Fecha Nacimiento.
                'fecha': {
                    required: true,
                    fecha: true,
                    minlength: 4,
                    maxlength: 50
                },
                //Incluimos los métodos y propiedades para el campo Sexo.
                'sexo': {
                    required: true,
                    sexo: true,
                    minlength: 1,
                    maxlength: 10
                },
                //Incluimos los métodos y propiedades para el campo Calle.
                'calle': {
                    required: true,
                    calle: true,
                    minlength: 1,
                    maxlength: 10
                },
                //Incluimos los métodos y propiedades para el campo Número.
                'numero': {
                    required: true,
                    number: true,
                    minlength: 1,
                    maxlength: 6
                },
                //Incluimos los métodos y propiedades para el campo Ciudad.
                'ciudad': {
                    required: true,
                    ciudad: true,
                    minlength: 4,
                    maxlength: 19
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
                //Creamos el mensaje para el input del latino.
                rut: {
                    //Para mostrar que el campo es requerido.
                    required: 'EL CAMPO ES REQUERIDO!!',
                    //Para cuando no ingresen letras.
                    number: 'Ingrese Sólo Números!!',
                    //El mínimo de carácteres.
                    minlength: 'El Rut se compone de 9 Números',
                    //El máximo de carácteres.
                    maxlength: 'El máximo permitido de un Rut son 9 Números'
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
                //Creamos el mensaje para el input del Apellio Paterno.
                apellido_Paterno: {
                    //Para mostrar que el campo es requerido.
                    required: 'EL CAMPO ES REQUERIDO!!',
                    //Para cuando no ingresen letras.
                    apellido_Paterno: 'Ingrese Sólo letras!!',
                    //El mínimo de carácteres.
                    minlength: 'El mínimo permitido son: 4 carácteres',
                    //El máximo de carácteres.
                    maxlength: 'El máximo permitido son: 50 carácteres'
                },
                //Creamos el mensaje para el input del Apellio Paterno.
                apellido_Materno: {
                    //Para mostrar que el campo es requerido.
                    required: 'EL CAMPO ES REQUERIDO!!',
                    //Para cuando no ingresen letras.
                    apellido_Materno: 'Ingrese Sólo letras!!',
                    //El mínimo de carácteres.
                    minlength: 'El mínimo permitido son: 4 carácteres',
                    //El máximo de carácteres.
                    maxlength: 'El máximo permitido son: 50 carácteres'
                },
                //Creamos el mensaje para el input del Fecha Nacimiento.
                fecha: {
                    //Para mostrar que el campo es requerido.
                    required: 'EL CAMPO ES REQUERIDO!!',
                    //Para cuando no ingresen letras.
                    fecha: 'Formato de Fecha es asi 21-12-1999!!',
                    //El mínimo de carácteres.
                    minlength: 'El mínimo permitido son: 10 carácteres',
                    //El máximo de carácteres.
                    maxlength: 'El máximo permitido son: 10 carácteres'
                },
                //Creamos el mensaje para el input del Sexo.
                sexo: {
                    //Para mostrar que el campo es requerido.
                    required: 'EL CAMPO ES REQUERIDO!!',
                    //Para cuando no ingresen letras.
                    sexo: 'Ingrese Sólo letras!!',
                    //El mínimo de carácteres.
                    minlength: 'El mínimo permitido son: 1 carácteres',
                    //El máximo de carácteres.
                    maxlength: 'El máximo permitido son: 9 carácteres'
                },
                //Creamos el mensaje para el input del Calle.
                calle: {
                    //Para mostrar que el campo es requerido.
                    required: 'EL CAMPO ES REQUERIDO!!',
                    //Para cuando no ingresen letras.
                    calle: 'Ingrese Sólo letras!!',
                    //El mínimo de carácteres.
                    minlength: 'El mínimo permitido son: 1 carácteres',
                    //El máximo de carácteres.
                    maxlength: 'El máximo permitido son: 9 carácteres'
                },
                //Creamos el mensaje para el input del Número.
                numero: {
                    //Para mostrar que el campo es requerido.
                    required: 'EL CAMPO ES REQUERIDO!!',
                    //Para cuando no ingresen un números.
                    number: 'Ingrese Sólo Números!!',
                    //El mínimo de carácteres.
                    minlength: 'El mínimo permitido son: 2 Números',
                    //El máximo de carácteres.
                    maxlength: 'El máximo permitido son: 6 Números'
                },
                //Creamos el mensaje para el input del Ciudad.
                ciudad: {
                    //Para mostrar que el campo es requerido.
                    required: 'EL CAMPO ES REQUERIDO!!',
                    //Para cuando no ingresen letras.
                    ciudad: 'Ingrese Sólo letras!!',
                    //El mínimo de carácteres.
                    minlength: 'El mínimo permitido son: 4 carácteres',
                    //El máximo de carácteres.
                    maxlength: 'El máximo permitido son: 19 carácteres'
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