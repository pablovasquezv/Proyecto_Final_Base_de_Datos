/*Creamos las validaciones para los input del formulario*/
$(function () {
    //Creamos un método para la expresion regular para los caracteres latino en  txt_descripcion del input.
    $.validator.addMethod('descripcion', function (value, element) {
        //Incluimos la expresion regular para los caracteres descripcion del input.
        return this.optional(element) || /^[a-záéóóúàèìòùäëïöüñ\s]+$/i.test(value);
    }
    );
    
    //Capturamos el evento clic para el boton.
    $("#btn").on("click", function () {
        //Agregamos el id del formulario para validarlo.
        $("#formulario").validate
            ({
                //Creamos las reglas para los input.
                rules:
                {   
                    //Incluimos los métodos y propiedades para el campo código.
                    codigo: { required: true, digits: true, minlength: 2, maxlength: 10 },
                    departamento: { required: true, descripcion: true, minlength: 4, maxlength: 10 },
                    //Incluimos los métodos y propiedades para el campo descripcion.
                    descripcion: { required: true, descripcion: true, minlength: 4, maxlength: 50 },
                    //Incluimos los métodos y propiedades para el campo precio.
                    precio: { required: true, digits: true, precio: true, minlength: 4, maxlength: 10 },
                    //Incluimos los métodos y propiedades para el campo precio.
                    costo:{required: true, digits: true, precio: true, minlength: 4, maxlength: 10}
                },
                //Creamos lo mensajes para cada una de las celdas.
                messages:
                {
                    //Creamos el mensaje para el input del departamento.
                    departamento: {
                        //Para mostrar quel campo es requerido.
                        required: 'EL CAMPO ES REQUERIDO',
                        //Para cuando no ingresen un Número.
                        digits: 'Ingrese sólo números',
                        //El minimo de caracteres.
                        minlength: 'El minimo permitido son: 8 carácteres',
                        //El máximo de caracteres.
                        maxlength: 'El máximo permitido son: 80 caráteres'
                    },
                    //Creamos el mensaje para el input del código.
                    codigo: {
                        //Para mostrar quel campo es requerido.
                        required: 'EL CAMPO ES REQUERIDO',
                        //Para cuando no ingresen un números.
                        digits: 'Ingrese Sólo Números',
                        //El minimo de caracteres.
                        minlength: 'Minimo 2 Números',
                        //El máximo de caracteres.
                        maxlength: 'El máximo permitido son: 9 Números'
                    },
                    //Creamos el mensaje para el input del latino.
                    descripcion: {
                        //Para mostrar quel campo es requerido.
                        required: 'EL CAMPO ES REQUERIDO',
                        //Para cuando no ingresen letras.
                        descripcion: 'Ingrese Sólo letras',
                        //El minimo de caracteres.
                        minlength: 'El minimo permitido son: 4 carácteres',
                        //El máximo de caracteres.
                        maxlength: 'El máximo permitido son: 50 carácteres'
                    },
                    //Creamos el mensaje para el input del precio.
                    precio: {
                        //Para mostrar quel campo es requerido.
                        required: 'EL CAMPO ES REQUERIDO',
                        //Para cuando no ingresen letras.
                        digits: 'Ingrese Sólo Números',
                        //El minimo de caracteres.
                        minlength: 'El minimo es 2 Números',
                        //El máximo de caracteres.
                        maxlength: 'El máximo permitido son: 10 Números'
                    },
                    //Creamos el mensaje para el input del precio.
                    costo: {
                        //Para mostrar quel campo es requerido.
                        required: 'EL CAMPO ES REQUERIDO',
                        //Para cuando no ingresen letras.
                        digits: 'Ingrese Sólo Números',
                        //El minimo de caracteres.
                        minlength: 'Ingrese sólo 4 carácteres',
                        //El máximo de caracteres.
                        maxlength: 'El máximo permitido son: 4 carácteres'
                    }
                }
            });
    });
});

