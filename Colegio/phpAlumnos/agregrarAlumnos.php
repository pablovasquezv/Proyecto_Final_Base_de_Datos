<?php
//Incluimos la conexión.
require_once('conexion.php');
//CREAMOS UN OBJETO DE LA CLASE CONEXIÓN.
$con = new Conexion();
//Llamos al método conectar.
$llamarMetodo = $con->Conectar();
//Realizamos la consulta donde nos mostrara todos lo datos donde el Apoderado sea igual a=?  
$Apoderados = "SELECT * FROM APODERADOS";
$stmt = $llamarMetodo->prepare($Apoderados);
//Ejecutamos la consulta
$stmt->execute();
?>
<!--Mostramos el formulario para ingresar un Alumno-->
<div align="center" class="col-sm-12">
    <!--Creamos un formulario para ingresar un Alumno con validaciones-->
    <form id="frmAlumnos" method="post">
        <table whited="30%" class="table display alert-secondary mt-3">
            <tr>
                <td align="center">
                    <!--Creamos el txt nombre con un id y un nombre-->
                    <input type="text" class="form-control input-sm  text-black" id="txt_codigo_Alumno" name="codigo" placeholder="Ingrese el Código" autofocus>
                </td>
            </tr>
            <tr>
                <td align="center">
                    <select name="" id="txt_codigo_Apoderados" class="form-control input-sm  my-3 text-black">
                        <option value="">Seleccione un Apoderado...</option>
                        <!--Mostramos los ID de los Apoderados-->
                        <?php while ($filaApoderados = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                            <option value="<?php echo $filaApoderados['ID_APODERADO']; ?>">
                                <?php echo $filaApoderados['ID_APODERADO'] . " || " . $filaApoderados['NOMBRES'] . "  " . $filaApoderados['APELLIDO_PATERNO']; ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td align="center">
                    <!--Creamos el txt nombre con un id y un nombre-->
                    <input type="text" class="form-control input-sm  my-3 text-black" id="txt_Rut" name="rut" placeholder="Ingrese el Rut" autofocus>
                </td>
            </tr>
            <tr>
                <td align="center">
                    <!--Creamos el txt nombre con un id y un nombre-->
                    <input type="text" id="txt_Nombres" name="nombres" class="form-control input-sm  my-3 text-black" placeholder="Ingrese los Nombres" autofocus>
                </td>
            </tr>
            <tr>
                <td align="center">
                    <!--Creamos el txt nombre con un id y un nombre-->
                    <input type="text" id="txt_Apellido_Paterno" name="apellido_Paterno" class="form-control input-sm  my-3 text-black" placeholder="Ingrese el Apellido Paterno" autofocus>
                </td>
            </tr>
            <tr>
                <td>
                    <!--Creamos el txt email con un id y un nombre-->
                    <input type="text" id="txt_Apellido_Materno" name="apellido_Materno" class="form-control input-sm  my-3" placeholder="Ingrese el Apellido Materno"></td>
            </tr>
            <tr>
                <td>
                    <!--Creamos el txt pais con un id y un nombre-->
                    <input type="date" class="form-control input-sm  my-3" id="txt_Fecha_Nacimiento" name="fecha" placeholder="el mes dia y año de Nacimiento">
                </td>
            </tr>
            <tr>
                <td align="center">
                    <!--Creamos el Select Genéro con un id y un nombre-->
                    <select name="" id="txt_Sexo" class="form-control input-sm  my-3 text-black">
                        <option value="">Seleccione un Genéro...</option>
                        <!--Mostramos los ID de-->
                        <option >Femenino</option>
                        <option>Masculino</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <!--Creamos el txt pais con un id y un nombre-->
                    <input type="text" class="form-control input-sm  my-3" id="txt_Calle" name="calle" placeholder="Ingrese el Nombre de la calle"></td>
            </tr>
            <tr>
                <td>
                    <!--Creamos el txt pais con un id y un nombre-->
                    <input type="text" class="form-control input-sm  my-3" id="txt_Numero" name="numero" placeholder="Ingrese el Número de la Vivienda"></td>
            </tr>
            <tr>
                <td>
                    <!--Creamos el txt pais con un id y un nombre-->
                    <input type="text" class="form-control input-sm  my-3" id="txt_Ciudad" name="ciudad" placeholder="Ingrese el nombre de la Ciudad"></td>
            </tr>
        </table>
        <!-- BOTON QUE TIENE EL EVENTO QUE DISPARA LA FUNCION PARA VALIDAR-->
        <button onclick="agregarAlumnos()" class="btn btn-primary mt-3" id="btn">
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
        $("#frmAlumnos").validate({
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