<?php
//Incluimos la conexión.
require_once('conexion.php');
//CREAMOS UN OBJETO DE LA CLASE CONEXIÓN.
$con = new Conexion();
//Llamos al método conectar.
$llamarMetodo = $con->Conectar();
//Realizamos la consulta donde nos mostrara todos lo datos donde el Apoderado sea igual a=?  
$Alumnos = "SELECT * FROM ALUMNOS";
$stmt = $llamarMetodo->prepare($Alumnos);
//Ejecutamos la consulta
$stmt->execute();
?>
<!--Mostramos el formulario para ingresar un STOCK-->
<div align="center" class="col-sm-12">
    <!--Creamos un formulario para ingresar un Alumno con validaciones-->
    <form id="frmMatriculas" method="post">
        <table whited="30%" class="table display alert-secondary  mt-3">
            <!--Cabeza de la tabla-->
            <thead>
                <!--Creamos las filas de Tabla Stock-->
                <tr>

                    <td align="center">
                        <!--Creamos el txt nombre con un id y un nombre-->
                        <input type="text" class="form-control my-3 text-black" id="txt_Codigo_Matricula" name="codigo" placeholder="Ingrese Codigo" autofocus>
                    </td>
                </tr>
                <tr>
                    <td align="center">
                        <select name="" id="txt_codigo_Alumnos" class="form-control my-3 text-black">
                            <option value="">Seleccione un Alumno...</option>
                            <!--Mostramos los ID de los Apoderados-->
                            <?php while ($filaAlumnos = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                                <option value="<?php echo $filaAlumnos['ID_ALUMNO']; ?>">
                                    <?php echo $filaAlumnos['ID_ALUMNO'] . " | " . $filaAlumnos['NOMBRES'] . " | " . $filaAlumnos['APELLIDO_PATERNO']; ?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <!--Creamos el txt teléfono con un id y un nombre-->
                        <input type="date" class="form-control my-3" id="txt_fecha" name="fecha" placeholder="Ingrese la fecha">
                    </td>
                </tr>
            </thead>
        </table>
        <!-- BOTON QUE TIENE EL EVENTO QUE DISPARA LA FUNCION PARA VALIDAR-->
        <button onclick="agregarMatriculas()" class="btn btn-primary mt-3" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Guardar</button>
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
        $("#frmMatriculas").validate({
            event: "blur",
            rules: {
                //Incluimos los métodos y propiedades para el campo codigo.
                'codigo': {
                    required: true,
                    number: true,
                    minlength: 1,
                    maxlength: 4
                },
                //Incluimos los métodos y propiedades para el campo Fecha Nacimiento.
                'fecha': {
                    required: true,
                    fecha: true,
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