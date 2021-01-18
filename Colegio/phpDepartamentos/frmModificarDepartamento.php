<?php
//Incluimos la conexión.
require_once('conexion.php');
//CREAMOS UN OBJETO DE LA CLASE CONEXIÓN.
$con = new Conexion();
//Llamos al método conectar.
$llamarMetodo = $con->Conectar();
//Cargamos todos los datos del idTrabajos selecionado
$D_DEPARTAMENTO = $_GET['D_DEPARTAMENTO'];
//Realizamos la consulta donde nos mostrara todos lo datos donde el D_DEPARTAMENTOsea igual a=?  .
$departamentos = "SELECT * FROM DEPARTAMENTOS WHERE D_DEPARTAMENTO = '$D_DEPARTAMENTO'";
//Realizamos la consulta
$stmt = $llamarMetodo->prepare($departamentos);
//Ejecutamos la consulta
$stmt->execute();
?>

<!--Creamos el formulario para Editar departamentos-->
<div align="center">
    <form id="frmDepartamentos" method="post">
        <table width="30%" class="table display alert-secondary table-responsive">
            <tr>
                <td align="center"><input type="hidden" id="txt_mdCodigodepartamentos" name="codigoDepartamento" class="form-control my-3 text-black" value="<?php echo $_GET['D_DEPARTAMENTO']; ?>"></td>
            </tr>
            <tr>
                <td align="center"> <br><b>Nombre:</b></td>
                <?php
                while ($filaDepartamentos = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                    <td align="center"><input type="text" name="Departamento" id="txt_mdNombreDepartamentos" class="form-control my-3 text-black" value="<?php echo $filaDepartamentos['D_DESCRIPCION']; ?>"></td>
                <?php } ?>
            </tr>
        </table>
        <br>
        <!-- BOTON creamos una funcion que muestre los datos-->
        <button onclick="editarDepartamentos('<?php echo $D_DEPARTAMENTO ?>')" class="btn btn-primary">
            Modificar departamentos
        </button>
    </form>
</div>
<!--Script para validar los input-->
<script>
    /**INICIAMOS EL DOCUMENTO AL LLAMAR EL MODAL */
    $(document).ready(function() {
        //Creamos un método para la expresion regular para los caracteres Departamento del input.
        $.validator.addMethod('Departamento', function(value, element) {
            //Incluimos la expresion regular para los caracteres Departamento del input.
            return this.optional(element) || /^[a-záéóóúàèìòùäëïöüñ\s]+$/i.test(value);
        });
        //Agregamos el id del formulario para validarlo.
        $("#frmDepartamentos").validate({
            event: "blur",
            //Creamos las reglas para los input.
            rules: {
                //Incluimos los metodos y propiedades para el campo codigoDepartamento.
                'codigoDepartamento': {
                    required: true,
                    number: true,
                    minlength: 1,
                    maxlength: 9
                },
                //Incluimos los metodos y propiedades para el campo Departamento.
                'Departamento': {
                    required: true,
                    Departamento: true,
                    minlength: 4,
                    maxlength: 49
                },

            },
            //Creamos lo mensajes para cada una de las celdas.
            messages: {
                /*'codigoDepartamento': "Ingrese Sólo números",
                'Departamento': "Por favor ingrese sólo Letras"*/
                //Creasmos el mensaje para el input del email.

                //Creasmos el mensaje para el input del codigoDepartamento.
                codigoDepartamento: {
                    //Para mostrar quel campo es requerido.
                    required: 'EL CAMPO ES REQUERIDO',
                    //Para cuando no ingresen un números.
                    number: 'Sólo Números',
                    minlength: 'El minimo permitido son: 2 caracteres',
                    //El máximo de caracteres.
                    maxlength: 'El maximo permitido son 10 caracteres'
                },
                //Creasmos el mensaje para el input del latino.
                Departamento: {
                    //Para mostrar quel campo es requerido.
                    required: 'EL CAMPO ES REQUERIDO',
                    //Para cuando no ingresen letras.
                    Departamento: 'Sólo letras',
                    //El minimo de caracteres.
                    minlength: 'El minimo permitido son: 2 caracteres',
                    //El máximo de caracteres.
                    maxlength: 'El maximo permitido son 50 caracteres'
                }
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