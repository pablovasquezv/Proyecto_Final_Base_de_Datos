
//Cargamos los datos abrir la pagina de todas la tablas
$(document).ready(function () {
    //Recargamos la pagina con todos lo Apoderado de la base de datos.
    $('#resultadosApoderados').load('phpApoderados/listarApoderados.php');
    //Recargamos la pagina con todos lo Alumnos de la base de datos.
    $('#resultadoAlumnos').load('phpAlumnos/listarAlumnos.php');
    //Recargamos la pagina con todos los Departamentos de la base de datos.
    $('#resultadoDepartamentos').load('phpDepartamentos/listarDepartamentos.php');
    //Recargamos la pagina con todos los Profesores de la base de datos.
    $('#resultadoProfesores').load('phpProfesores/listarProfesores.php');
    //Recargamos la pagina con todos las Matrícula de la base de datos.
    $('#resultadosMatriculas').load('phpMatriculas/listarMatriculas.php');
    //Recargamos la pagina con todos los Cursos de la base de datos.
    $('#resultadosCursos').load('phpCursos/listarCursos.php');
   
 
});

//////////////////////
//FUNCION PARA CARGAR EL MODAL de Agregar DEPARTAMENTOS.
function cargarModalAgregarDepartamentos() {
    
    $('#frmAgregar').load('phpDepartamentos/agregarDepartamentos.html');

}

//FUNCION PARA CARGAR EL MODAL de Departamentos.
function cargarModalDepartamento(D_DEPARTAMENTO) {
    $('#frmModificar').load('phpDepartamentos/frmModificarDepartamento.php?D_DEPARTAMENTO=' + D_DEPARTAMENTO);
}

//Creamos una funcion para agregar Departamento.
function agregarDepartamento() {
    //Capturamos las variables de los txtNotas
    codigo = $('#txt_CodigoDepartamento').val();
    //alert(codigo);
    nombre = $('#txt_NombreDepartamento').val();
    //alert(nombre);
    //Enviamos los datos a Php
    cadena = "txt_CodigoDepartamento=" + codigo +
        "&txt_NombreDepartamento=" + nombre;
    //alert(cadena);
    //enviamos lo datos a Ajax con la direccion del archivo php
    $.ajax({
        type: "POST",
        url: "phpDepartamentos/insertDepartamentos.php",
        data: cadena,
        success: function (datos) {
            //Si devuelve algo si inserta datos
            
                //Cargamos la pagina para verificar los resultados
                $('#resultadoDepartamentos').load('phpDepartamentos/listarDepartamentos.php');
                //LIMPIAMOS LOS TXT
                $('#txt_CodigoDepartamento').val("");
                $('#txt_NombreDepartamento').val("");
                //ENVIAMOS EL FOCO AL TXT DESPUES DE AGREGAR
                $("#txt_CodigoDepartamento").focus();
                $('#agregarModal').modal('hide');
                alertify.success("Agregado con exito :)");
            
        }
    });
}

//Creamos la funcion EDITAR Departamentos.
function editarDepartamentos(D_DEPARTAMENTO) {
    //Capturamos las variables de los txt del frmModoficar
    nombre = $('#txt_mdNombreDepartamentos').val();
    //alert(nombre);
    //Enviamos los datos a Php en una cadena
    cadena = "D_DEPARTAMENTO=" + D_DEPARTAMENTO +
        "&txt_mdNombreDepartamentos=" + nombre;
    //alert(cadena);
    //enviamos lo datos a Ajax con la direccion del archivo php
    //enviamos lo datos a Ajax con la direccion del archivo php

    $.ajax({
        type: "POST",
        url: "phpDepartamentos/updateDepartamentos.php",
        data: cadena,
        success: function (datos) {
            //Si devuelve algo si inserta datos
           
                $('#resultadoDepartament').html(datos);
                //Cargamos la pagina para verificar los resultados
                $('#resultadoDepartamentos').load('phpDepartamentos/listarDepartamentos.php');
                $('#modificarModal').modal('hide');
                //LIMPIAMOS LOS TXT
                $('#txt_CodigoDepartamento').val("");
                $('#txt_NombreDepartamento').val("");
                //ENVIAMOS EL FOCO AL TXT DESPUES DE AGREGAR
                $("#txt_CodigoDepartamento").focus();
                alertify.success("Agregado con exito :)");
        }
    });
}
//Funcion que preguntar si se desea eliminar con el D_DEPARTAMENTO
function preguntarSiNoDepartamento(D_DEPARTAMENTO) {
	//agregamos la libreria de confirmación de un mensaje
	alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?',
        //Llamamos a la función eliminarDepartamento.
		function () { eliminarDepartamento(D_DEPARTAMENTO) }
		//Si se cancela la eliminación
		, function () { alertify.error('Se cancelo') });
}
//Creamos la función Eliminar Departamentos.
function eliminarDepartamento(D_DEPARTAMENTO) {

    //Enviamos los datos a Php para eliminar
    cadena = "D_DEPARTAMENTO=" + D_DEPARTAMENTO;

    ////enviamos lo datos a Ajax con la direccion del archivo php
    $.ajax({
        type: "POST",
        url: "phpDepartamentos/deleteDepartamentos.php",
        data: cadena,
        success: function (datos) {
            $('#resultadoDepartam').html(datos);
            //Cargamos la pagina para verificar los resultados
            $('#resultadoDepartamentos').load('phpDepartamentos/listarDepartamentos.php');
            //LIMPIAMOS LOS TXT
            $('#txt_CodigoDepartamento').val("");
            $('#txt_NombreDepartamento').val("");
            //ENVIAMOS EL FOCO AL TXT DESPUES DE AGREGAR
            $("#txt_CodigoDepartamento").focus();
        }
    });
}
//FUNCION PARA CARGAR EL MODAL de Apoderados.
function cargarModalAgregarApoderados() {
    $('#frmAgregar').load('phpApoderados/agregrarApoderados.html');
}
//FUNCION PARA CARGAR EL MODAL de Editar PRODUCTOS.
function cargarModalApoderados(ID_APODERADO) {
    $('#frmModificar').load('phpApoderados/frmModificar.php?ID_APODERADO=' + ID_APODERADO);

}

//Creamos la funcion para agregar datos a la tabla Apoderados.
function agregrarApoderados() {
    //Capturamos las variables de los txtNotas
    codigo = $('#txt_codigo_Apoderado').val();
    //alert(codigo);
    rut = $('#txt_Rut').val();
    //alert(rut);
    nombre = $('#txt_Nombres').val();
    // alert(nombre);
    apellido_Paterno = $('#txt_Apellido_Paterno').val();
    //alert(apellido_Paterno);
    apellido_Materno = $('#txt_Apellido_Materno').val();
    //alert(apellido_Materno);
    sexo = $('#txt_Sexo').val();
    //alert(sexo);
    celular = $('#txt_Celular').val();
    //alert(celular);
    fecha_Nacimiento = $('#txt_Fecha_Nacimiento').val();
    //alert(fecha_Nacimiento);
    calle = $('#txt_Calle').val();
    //alert(calle);
    numero = $('#txt_Numero').val();
    //alert(numero);
    ciudad = $('#txt_Ciudad').val();
    //alert(ciudad);

    //Enviamos los datos a Php
    cadena = "txt_codigo_Apoderado=" + codigo +
        "&txt_Rut=" + rut +
        "&txt_Nombres=" + nombre +
        "&txt_Apellido_Paterno=" + apellido_Paterno +
        "&txt_Apellido_Materno=" + apellido_Materno +
        "&txt_Sexo=" + sexo +
        "&txt_Celular=" + celular +
        "&txt_Fecha_Nacimiento =" + fecha_Nacimiento +
        "&txt_Calle=" + calle +
        "&txt_Numero=" + numero +
        "&txt_Ciudad=" + ciudad;
    alert(cadena);
    //enviamos lo datos a Ajax con la direccion del archivo php
    $.ajax({
        type: "POST",
        url: "phpApoderados/insertApoderados.php",
        data: cadena,
        success: function (datos) {

            //Recargamos la pagina
            $('#resultadosApoderados').load('phpApoderados/listarApoderados.php');
            //LIMPIAMOS LOS IMPUT
            $('#txt_codigo').val("");
            $('#txt_Profesores').val("");
            $('#txt_descripcion').val("");
            $('#txt_precio').val("");
            $('#txt_costo').val("");
            //ENVIAMOS EL FOCO AL TXT DESPUES DE AGREGAR
            $("#txt_codigo").focus();
            $('#agregarModal').modal('hide');
            alertify.success("Agregado con exito :)");

        }
    });
}

//Creamos la funcion EDITAR trabajos.
function editarApoderados(ID_APODERADO) {
    //Capturamos las variables de los txt del frmModoficar
    rut = $('#txt_mdRut').val();
    //alert(rut);
    nombre = $('#txt_mdNombre').val();
    //alert(nombre);
    apellido_Paterno = $('#txt_mdApellidoPaterno').val();
    //alert(apellido_Paterno);
    apellido_Materno = $('#txt_mdApellidoMaterno').val();
    //alert(apellido_Materno);
    sexo = $('#txt_mdSexo').val();
    //alert(sexo);
    celular = $('#txt_mdCelular').val();
    //alert(celular);
    fecha_Nacimiento = $('#txt_mdFechaNacimiento').val();
    //alert(fecha_Nacimiento);
    calle = $('#txt_mdCalle').val();
    //alert(calle);
    numero = $('#txt_mdNumero').val();
    //alert(numero);
    ciudad = $('#txt_mdCiudad').val();
    //alert(ciudad);

    //Enviamos los datos a Php en una cadena
    cadena = "ID_APODERADO=" + ID_APODERADO +
        "&txt_mdRut=" + rut +
        "&txt_mdNombre=" + nombre +
        "&txt_mdApellidoPaterno=" + apellido_Paterno +
        "&txt_mdApellidoMaterno=" + apellido_Materno +
        "&txt_mdSexo=" + sexo +
        "&txt_mdCelular=" + celular +
        "&txt_mdFechaNacimiento=" + fecha_Nacimiento +
        "&txt_mdCalle=" + calle +
        "&txt_mdNumero=" + numero +
        "&txt_mdCiudad=" + ciudad;
    //alert(cadena);
    //enviamos lo datos a Ajax con la direccion del archivo php
    $.ajax({
        type: "POST",
        url: "phpApoderados/updateApoderados.php",
        data: cadena,
        success: function (datos) {
            //Si devuelve algo si inserta datos

            $('#resultadoProducts').html(datos);
            //Cargamos la pagina para verificar los resultados
            //Recargamos la pagina
            $('#resultadosApoderados').load('phpApoderados/listarApoderados.php');
            $('#modificarModal').modal('hide');
            //ENVIAMOS EL FOCO AL TXT DESPUES DE AGREGAR
            $("#txt_codigo").focus();
            alertify.success("Modificación con exitosa :)");

        }
    });
}

//Función que preguntar si se desea eliminar con el ID_APODERADO.
function preguntarSiNoApoderado(ID_APODERADO) {
    //agregamos la libreria de confirmación de un mensaje
    alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?',
        //Llamamos a la función eliminarApoderado.
        function () { eliminarApoderado(ID_APODERADO) }
        //Si se cancela la eliminación
        , function () { alertify.error('Se cancelo') });
}

//Creamos la funcion Eliminar un Apoderado.
function eliminarApoderado(ID_APODERADO) {

    //Enviamos los datos a Php para eliminar
    cadena = "ID_APODERADO=" + ID_APODERADO;

    ////enviamos lo datos a Ajax con la direccion del archivo php
    $.ajax({
        type: "POST",
        url: "phpApoderados/deleteApoderados.php",
        data: cadena,
        success: function (datos) {
            $('#resultadoProduct').html(datos);
            //Recargamos la pagina
            $('#resultadosApoderados').load('phpApoderados/listarApoderados.php');
            //ENVIAMOS EL FOCO AL TXT DESPUES DE AGREGAR
            $("#txt_codigo").focus();
        }
    });
}

/////////////////
//FUNCION PARA CARGAR EL MODAL de Agregar Alumnos.
function cargarModalAgregarAlumnos() {
    $('#frmAgregar').load('phpAlumnos/agregrarAlumnos.php');
}
//FUNCION PARA CARGAR EL MODAL de EDITAR una Sucursal.
function cargarModalAlumnos(ID_ALUMNO) {
    $('#frmModificar').load('phpAlumnos/frmModificarAlumnos.php?ID_ALUMNO=' + ID_ALUMNO);
}

//Creamos una funcion para agregar Alumnos.
function agregarAlumnos() {
    //Capturamos las variables de los txt.
    codigo_Alumno = $('#txt_codigo_Alumno').val();
    //alert(codigo_Alumno);
    codigo_Apoderado = $('#txt_codigo_Apoderados').val();
    //alert(codigo_Apoderado);
    rut = $('#txt_Rut').val();
    //alert(rut);
    nombre = $('#txt_Nombres').val();
    // alert(nombre);
    apellido_Paterno = $('#txt_Apellido_Paterno').val();
    //alert(apellido_Paterno);
    apellido_Materno = $('#txt_Apellido_Materno').val();
    //alert(apellido_Materno);
    fecha_Nacimiento = $('#txt_Fecha_Nacimiento').val();
    //alert(fecha_Nacimiento);
    sexo = $('#txt_Sexo').val();
    //alert(sexo);
    calle = $('#txt_Calle').val();
    //alert(calle);
    numero = $('#txt_Numero').val();
    //alert(numero);
    ciudad = $('#txt_Ciudad').val();
    //alert(ciudad);

    //Enviamos los datos a Php
    cadena = "txt_codigo_Alumno=" + codigo_Alumno +
        "&txt_codigo_Apoderados=" + codigo_Apoderado +
        "&txt_Rut=" + rut +
        "&txt_Nombres=" + nombre +
        "&txt_Apellido_Paterno=" + apellido_Paterno +
        "&txt_Apellido_Materno=" + apellido_Materno +
        "&txt_Fecha_Nacimiento=" + fecha_Nacimiento +
        "&txt_Sexo=" + sexo +
        "&txt_Calle=" + calle +
        "&txt_Numero=" + numero +
        "&txt_Ciudad=" + ciudad;
    //alert(cadena);
    //enviamos lo datos a Ajax con la direccion del archivo php
    $.ajax({
        type: "POST",
        url: "phpAlumnos/insertAlumnos.php",
        data: cadena,
        success: function (datos) {
            //Si devuelve algo si inserta datos

            $('#resultadoSucursale').html(datos);
            //Cargamos la pagina para verificar los resultados
            $('#resultadoAlumnos').load('phpAlumnos/listarAlumnos.php');
            //LIMPIAMOS LOS TXT
            $('#txt_codigoSucursal').val("");
            $('#txt_NombreSucursal').val("");
            //ENVIAMOS EL FOCO AL TXT DESPUES DE AGREGAR
            $("#txt_codigoSucursal").focus();
            $('#agregarModal').modal('hide');
            alertify.success("Agregado con exito :)");

        }
    });
}

//Creamos la funcion EDITAR Alumnos.
function editarAlumnos(ID_ALUMNO) {
    //Capturamos las variables de los txt del frmModoficar
    codigo_Apoderado = $('#txt_Modificar_Apoderados').val();
    //alert(codigo_Apoderado);
    rut = $('#txt_Modificar_Rut').val();
    //alert(rut);
    nombres = $('#txt_Modificar_Nombre').val();
    //alert(nombres);
    apellido_Paterno_A = $('#txt_Modificar_ApellidoPaterno').val();
    //alert(apellido_Paterno);
    apellido_Materno_A = $('#txt_Modificar_ApellidoMaterno').val();
    //alert(apellido_Materno_A);
    fecha_Nacimiento_A = $('#txt_Modificar_FechaNacimiento').val();
    //alert(fecha_Nacimiento_A);
    sexo = $('#txt_Modificar_Sexo').val();
    //alert(sexo);
    calle = $('#txt_Modificar_Calle').val();
    //alert(calle);
    numero = $('#txt_Modificar_Numero').val();
    //alert(numero);
    ciudad = $('#txt_Modificar_Ciudad').val();
    //alert(ciudad);

    //Enviamos los datos a Php
    cadena = "ID_ALUMNO=" + ID_ALUMNO +
        "&txt_Modificar_Apoderados=" + codigo_Apoderado +
        "&txt_Modificar_Rut=" + rut +
        "&txt_Modificar_Nombre=" + nombres +
        "&txt_Modificar_ApellidoPaterno=" + apellido_Paterno_A +
        "&txt_Modificar_ApellidoMaterno=" + apellido_Materno_A +
        "&txt_Modificar_FechaNacimiento=" + fecha_Nacimiento_A +
        "&txt_Modificar_Sexo=" + sexo +
        "&txt_Modificar_Calle=" + calle +
        "&txt_Modificar_Numero=" + numero +
        "&txt_Modificar_Ciudad=" + ciudad;
    //alert(cadena);
    //enviamos lo datos a Ajax con la direccion del archivo php
    $.ajax({
        type: "POST",
        url: "phpAlumnos/updateAlumnos.php",
        data: cadena,
        success: function (datos) {
            //Si devuelve algo si inserta datos
            $('#resultadoSucursale').html(datos);
            //Cargamos la pagina para verificar los resultados
            $('#resultadoAlumnos').load('phpAlumnos/listarAlumnos.php');
            $('#modificarModal').modal('hide');
            //LIMPIAMOS LOS TXT
            $('#txt_codigoSucursal').val("");
            $('#txt_NombreSucursal').val("");
            //ENVIAMOS EL FOCO AL TXT DESPUES DE AGREGAR
            $("#txt_codigoSucursal").focus();
            alertify.success("Modificación con exitosa :)");
        }
    });
}

//Función que preguntar si se desea eliminar con el ID_ALUMNO
function preguntarSiNoAlumnos(ID_ALUMNO) {
    //agregamos la libreria de confirmación de un mensaje
    alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?',
        //Llamamos a la función eliminarAlumnos.
        function () { eliminarAlumnos(ID_ALUMNO) }
        //Si se cancela la eliminación
        , function () { alertify.error('Se cancelo') });
}

//Creamos la funcion Eliminar  Alumnos..
function eliminarAlumnos(ID_ALUMNO) {

    //Enviamos los datos a Php para eliminar
    cadena = "ID_ALUMNO=" + ID_ALUMNO;

    ////enviamos lo datos a Ajax con la direccion del archivo php
    $.ajax({
        type: "POST",
        url: "phpAlumnos/deleteAlumnos.php",
        data: cadena,
        success: function (datos) {
            $('#resultadoSucursale').html(datos);
            //Cargamos la pagina para verificar los resultados
            $('#resultadoAlumnos').load('phpAlumnos/listarAlumnos.php');
            //LIMPIAMOS LOS TXT
            $('#txt_codigoSucursal').val("");
            $('#txt_NombreSucursal').val("");
            //ENVIAMOS EL FOCO AL TXT DESPUES DE ELIMINAR
            $("#txt_codigoSucursal").focus();
        }
    });
}

//////////////////////
//FUNCION PARA CARGAR EL MODAL de Agregar Profesores.
function cargarModalAgregarProfesores() {
    $('#frmAgregar').load('phpProfesores/agregrarProfesores.php');
}

//FUNCION PARA CARGAR EL MODAL de Profesores.
function cargarModalProfesores(ID_PROFESOR) {
    $('#frmModificar').load('phpProfesores/frmModificarProfesores.php?ID_PROFESOR=' + ID_PROFESOR);
}

//Creamos una funcion para agregar Profesores.
function agregarProfesores() {
    //Capturamos las variables de los txt.
    codigo_Profesores = $('#txt_codigo_Profesor').val();
    //alert(codigo_Profesores);
    codigo_Departamentos = $('#txt_codigo_Departamentos').val();
    //alert(codigo_Departameto);
    rut = $('#txt_Rut').val();
    //alert(rut);
    nombre = $('#txt_Nombres').val();
    // alert(nombre);
    apellido_Paterno = $('#txt_Apellido_Paterno').val();
    //alert(apellido_Paterno);
    apellido_Materno = $('#txt_Apellido_Materno').val();
    //alert(apellido_Materno);
    fecha_Nacimiento = $('#txt_Fecha_Nacimiento').val();
    //alert(fecha_Nacimiento);
    sexo = $('#txt_Sexo').val();
    //alert(sexo);
    calle = $('#txt_Calle').val();
    //alert(calle);
    numero = $('#txt_Numero').val();
    //alert(numero);
    ciudad = $('#txt_Ciudad').val();
    //alert(ciudad);

    //Enviamos los datos a Php
    cadena = "txt_codigo_Profesor=" + codigo_Profesores +
        "&txt_codigo_Departamentos=" + codigo_Departamentos +
        "&txt_Rut=" + rut +
        "&txt_Nombres=" + nombre +
        "&txt_Apellido_Paterno=" + apellido_Paterno +
        "&txt_Apellido_Materno=" + apellido_Materno +
        "&txt_Fecha_Nacimiento=" + fecha_Nacimiento +
        "&txt_Sexo=" + sexo +
        "&txt_Calle=" + calle +
        "&txt_Numero=" + numero +
        "&txt_Ciudad=" + ciudad;
   // alert(cadena);
    //enviamos lo datos a Ajax con la direccion del archivo php
    $.ajax({
        type: "POST",
        url: "phpProfesores/insertProfesores.php",
        data: cadena,
        success: function (datos) {
            //Si devuelve algo si inserta datos

            //Cargamos la pagina para verificar los resultados
            $('#resultadoProfesores').load('phpProfesores/listarProfesores.php');
            //LIMPIAMOS LOS TXT
            $('#txt_CodigoProfesores').val("");
            $('#txt_NombreProfesores').val("");
            //ENVIAMOS EL FOCO AL TXT DESPUES DE AGREGAR
            $("#txt_CodigoProfesores").focus();
            $('#agregarModal').modal('hide');
            alertify.success("Agregado con exito :)");

        }
    });
}

//Creamos la funcion EDITAR Profesores.
function editarProfesores(ID_PROFESOR) {
    //Capturamos las variables de los txt del frmModoficar
    codigo_Departamentos = $('#txt_Modificar_departamentos').val();
    //alert(codigo_Departamentos);
    rut = $('#txt_Modificar_Rut').val();
    //alert(rut);
    nombres = $('#txt_Modificar_Nombre').val();
    //alert(nombres);
    apellido_Paterno_A = $('#txt_Modificar_ApellidoPaterno').val();
    //alert(apellido_Paterno);
    apellido_Materno_A = $('#txt_Modificar_ApellidoMaterno').val();
    //alert(apellido_Materno_A);
    fecha_Nacimiento_A = $('#txt_Modificar_FechaNacimiento').val();
    //alert(fecha_Nacimiento_A);
    sexo = $('#txt_Modificar_Sexo').val();
    //alert(sexo);
    calle = $('#txt_Modificar_Calle').val();
    //alert(calle);
    numero = $('#txt_Modificar_Numero').val();
    //alert(numero);
    ciudad = $('#txt_Modificar_Ciudad').val();
    //alert(ciudad);

    //Enviamos los datos a Php
    cadena = "ID_PROFESOR=" + ID_PROFESOR +
        "&txt_Modificar_departamentos=" + codigo_Departamentos +
        "&txt_Modificar_Rut=" + rut +
        "&txt_Modificar_Nombre=" + nombres +
        "&txt_Modificar_ApellidoPaterno=" + apellido_Paterno_A +
        "&txt_Modificar_ApellidoMaterno=" + apellido_Materno_A +
        "&txt_Modificar_FechaNacimiento=" + fecha_Nacimiento_A +
        "&txt_Modificar_Sexo=" + sexo +
        "&txt_Modificar_Calle=" + calle +
        "&txt_Modificar_Numero=" + numero +
        "&txt_Modificar_Ciudad=" + ciudad;
    //alert(cadena);
    $.ajax({
        type: "POST",
        url: "phpProfesores/updateProfesores.php",
        data: cadena,
        success: function (datos) {
            //Si devuelve algo si inserta datos

            $('#resultadoDepartament').html(datos);
            //Cargamos la pagina para verificar los resultados
            $('#resultadoProfesores').load('phpProfesores/listarProfesores.php');
            $('#modificarModal').modal('hide');
            //LIMPIAMOS LOS TXT
            $('#txt_CodigoProfesores').val("");
            $('#txt_NombreProfesores').val("");
            //ENVIAMOS EL FOCO AL TXT DESPUES DE AGREGAR
            $("#txt_CodigoProfesores").focus();
            alertify.success("Agregado con exito :)");
        }
    });
}
//Funcion que preguntar si se desea eliminar con el ID_PROFESOR
function preguntarSiNoProfesores(ID_PROFESOR) {
    //agregamos la libreria de confirmación de un mensaje
    alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?',
        //Llamamos a la función eliminarProfesores.
        function () { eliminarProfesores(ID_PROFESOR) }
        //Si se cancela la eliminación
        , function () { alertify.error('Se cancelo') });
}
//Creamos la función Eliminar Profesores.
function eliminarProfesores(ID_PROFESOR) {

    //Enviamos los datos a Php para eliminar
    cadena = "ID_PROFESOR=" + ID_PROFESOR;

    ////enviamos lo datos a Ajax con la direccion del archivo php
    $.ajax({
        type: "POST",
        url: "phpProfesores/deleteProfesores.php",
        data: cadena,
        success: function (datos) {
            $('#resultadoDepartam').html(datos);
            //Cargamos la pagina para verificar los resultados
            $('#resultadoProfesores').load('phpProfesores/listarProfesores.php');
            //LIMPIAMOS LOS TXT
            $('#txt_CodigoProfesores').val("");
            $('#txt_NombreProfesores').val("");
            //ENVIAMOS EL FOCO AL TXT DESPUES DE AGREGAR
            $("#txt_CodigoProfesores").focus();
        }
    });
}

//////////////////////
//FUNCION PARA CARGAR EL MODAL de Agregar MATRICULAS.
function cargarModalAgregarMatriculas() {

    $('#frmAgregar').load('phpMatriculas/agregarMatriculas.php');

}

//FUNCION PARA CARGAR EL MODAL de MODIFICAR MATRICULAS.
function cargarModalStock(ID_MATRICULAS) {
    $('#frmModificar').load('phpMatriculas/frmModificarMatriculas.php?ID_MATRICULAS=' + ID_MATRICULAS);
}

//Creamos una función para agregar MATRICULAS.
function agregarMatriculas() {
    //Capturamos las variables de los txtNotas
    codigo_Sucursal = $('#txt_Codigo_Matricula').val();
    //alert(codigo_Sucursal);
    codigo_Producto = $('#txt_codigo_Alumnos').val();
    //alert(codigo_Producto);
    stock = $('#txt_fecha').val();
    //alert(stock);
    //Enviamos los datos a Php
    cadena = "txt_Codigo_Matricula=" + codigo_Sucursal +
        "&txt_codigo_Alumnos=" + codigo_Producto +
        "&txt_fecha=" + stock;
    //alert(cadena);
    //enviamos lo datos a Ajax con la direccion del archivo php
    $.ajax({
        type: "POST",
        url: "phpMatriculas/insertMatriculas.php",
        data: cadena,
        success: function (datos) {
            //Si devuelve algo si inserta datos

            $('#resultadoDepartament').html(datos);
            //Cargamos la pagina para verificar los resultados 
            $('#resultadosMatriculas').load('phpMatriculas/listarMatriculas.php');
            //LIMPIAMOS LOS TXT
            $('#txt_Codigo_Sucursales').val("");
            $('#txt_Codigo_Productos').val("");
            $('#txt_Cantidad_Stock').val("");
            //ENVIAMOS EL FOCO AL TXT DESPUES DE AGREGAR
            $("#txt_Codigo_Sucursales").focus();
            $('#agregarModal').modal('hide');
            alertify.success("Agregado con exito :)");

        }
    });
}

//Creamos la función EDITAR Departamentos.
function editarMatriculas(ID_MATRICULAS) {
    //Capturamos las variables de los txt del frmModoficar
    codigo_Producto = $('#txt_MdCodigo_Productos').val();
    //alert(codigo_Producto);
    stock = $('#txt_mdCantidad_Stock').val();
    //alert(stock);
    //Enviamos los datos a Php en una cadena
    cadena = "ID_MATRICULAS=" + ID_MATRICULAS +
        "&txt_MdCodigo_Productos=" + codigo_Producto +
        "&txt_mdCantidad_Stock=" + stock;
    //alert(cadena);

    //enviamos lo datos a Ajax con la direccion del archivo php

    $.ajax({
        type: "POST",
        url: "phpMatriculas/updateMatriculas.php",
        data: cadena,
        success: function (datos) {
            //Si devuelve algo si inserta datos
            
                //recargamos la pagina con los datos
                $('#resultadoDepartaments').html(datos);
                //Cargamos la pagina para verificar los resultados
                $('#resultadosMatriculas').load('phpMatriculas/listarMatriculas.php');
                $('#modificarModal').modal('hide');
                //LIMPIAMOS LOS TXT
                $('#txt_Codigo_Sucursales').val("");
                $('#txt_Codigo_Productos').val("");
                $('#txt_Cantidad_Stock').val("");
                //ENVIAMOS EL FOCO AL TXT DESPUES DE AGREGAR
                $("#txt_Codigo_Sucursales").focus();
                alertify.success("Modificación con exito :)");
          
        }
    });
}
//Funcion que preguntar si se desea eliminar con el eliminar la Matriculas
function preguntarSiNoStock(ID_MATRICULAS) {
	//agregamos la libreria de confirmacion de un mensaje
	alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?',
        //Llamamos a la funcion eliminarDatos
		function () { eliminarMatriculas(ID_MATRICULAS) }
		//Si se cancela la eliminación
		, function () { alertify.error('Se cancelo') });
}

//Creamos la función Eliminar Departamentos.
function eliminarMatriculas(ID_MATRICULAS) {

    //Enviamos los datos a Php para eliminar
    cadena = "ID_MATRICULAS=" + ID_MATRICULAS;

    ////enviamos lo datos a Ajax con la direccion del archivo php
    $.ajax({
        type: "POST",
        url: "phpMatriculas/deleteStock.php",
        data: cadena,
        success: function (datos) {
            $('#resultadoDepartaments').html(datos);
            //Cargamos la pagina para verificar los resultados
            $('#resultadosMatriculas').load('phpMatriculas/listarMatriculas.php');
            //LIMPIAMOS LOS TXT
            $('#txt_Codigo_Sucursales').val("");
            $('#txt_Codigo_Productos').val("");
            $('#txt_Cantidad_Stock').val("");
            //ENVIAMOS EL FOCO AL TXT DESPUES DE AGREGAR
            $("#txt_Codigo_Sucursales").focus();
        }
    });
}

/////////////////
//FUNCION PARA CARGAR EL MODAL de Agregar Curso.
function cargarModalAgregarCurso(){
    $('#frmAgregar').load('phpCursos/agregrarCursos.php');
}
//FUNCION PARA CARGAR EL MODAL de EDITAR una Sucursal.
function cargarModalCursos(ID_CURSO) {
    $('#frmModificar').load('phpCursos/frmModificarCursos.php?ID_CURSO=' + ID_CURSO);
}

//Creamos una funcion para agregar Cursos.
function agregrarCursos() {
    //Capturamos las variables de los txt.
    codigo_Curso = $('#txt_codigo_Curso').val();
    //alert(codigo_Curso);
    codigo_Sala = $('#txt_codigo_Sala').val();
    //alert(codigo_Sala);
    matricula = $('#txt_codigo_Matriculas').val();
    //alert(matricula);
    alumno = $('#txt_codigo_Alumno').val();
    // alert(alumno);
    profesor = $('#txt_codigo_Profesor').val();
    //alert(profesor);
    nombre = $('#txt_Nombre').val();
    //alert(nombre);
    //Enviamos los datos a Php
    cadena = "txt_codigo_Curso=" + codigo_Curso +
        "&txt_codigo_Sala=" + codigo_Sala +
        "&txt_codigo_Matriculas=" + matricula +
        "&txt_codigo_Alumno=" + alumno  +
        "&txt_codigo_Profesor=" + profesor +
        "&txt_Nombre=" + nombre;
    //alert(cadena);
    //enviamos lo datos a Ajax con la direccion del archivo php
    $.ajax({
        type: "POST",
        url: "phpCursos/insertCursos.php",
        data: cadena,
        success: function (datos) {
            //Si devuelve algo si inserta datos

            $('#resultadoSucursale').html(datos);
            //Cargamos la pagina para verificar los resultados
            $('#resultadosCursos').load('phpCursos/listarCursos.php');
            //Cerramos el modal
            $('#agregarModal').modal('hide');
            //enviamos un mensaje de agregado
            alertify.success("Agregado con exito :)");

        }
    });
}

//Creamos la funcion EDITAR Cursos.
function editarCursos(ID_CURSO) {
    //Capturamos las variables de los txt del frmModoficar
    codigo_Sala = $('#txt_Modificar_Sala').val();
    //alert(codigo_Sala);
    matricula = $('#txt_Modificar_Matricula').val();
    //alert(matricula);
    alumno = $('#txt_Modificar_Alumno').val();
    //alert(alumno);
    profesor = $('#txt_Modificar_Profesor').val();
    //alert(apellido_Paterno);
    nombre = $('#txt_Modificar_Nombre').val();
    //alert(nombre);
    //Enviamos los datos a Php
    cadena = "ID_CURSO=" + ID_CURSO +
        "&txt_Modificar_Sala=" + codigo_Sala +
        "&txt_Modificar_Matricula=" + matricula +
        "&txt_Modificar_Alumno=" + alumno +
        "&txt_Modificar_Profesor=" + profesor +
        "&txt_Modificar_Nombre=" + nombre;
    alert(cadena);
    //enviamos lo datos a Ajax con la direccion del archivo php
    $.ajax({
        type: "POST",
        url: "phpCursos/updateCursos.php",
        data: cadena,
        success: function (datos) {
            //Si devuelve algo si inserta datos
            $('#resultadoSucursale').html(datos);
            //Cargamos la pagina para verificar los resultados
            $('#resultadosCursos').load('phpCursos/listarCursos.php');
            $('#modificarModal').modal('hide');
            //LIMPIAMOS LOS TXT
            $('#txt_codigoSucursal').val("");
            $('#txt_NombreSucursal').val("");
            //ENVIAMOS EL FOCO AL TXT DESPUES DE AGREGAR
            $("#txt_codigoSucursal").focus();
            alertify.success("Modificación con exitosa :)");
        }
    });
}

//Función que preguntar si se desea eliminar con el ID_CURSO
function preguntarSiNoCursos(ID_CURSO) {
    //agregamos la libreria de confirmación de un mensaje
    alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?',
        //Llamamos a la función eliminarCurso.
        function () { eliminarCurso(ID_CURSO) }
        //Si se cancela la eliminación
        , function () { alertify.error('Se cancelo') });
}

//Creamos la funcion Eliminar  Curso..
function eliminarCurso(ID_CURSO) {

    //Enviamos los datos a Php para eliminar
    cadena = "ID_CURSO=" + ID_CURSO;

    ////enviamos lo datos a Ajax con la direccion del archivo php
    $.ajax({
        type: "POST",
        url: "phpCursos/deleteCursos.php",
        data: cadena,
        success: function (datos) {
            $('#resultadoSucursale').html(datos);
            //Cargamos la pagina para verificar los resultados
            $('#resultadosCursos').load('phpCursos/listarCursos.php');
            //LIMPIAMOS LOS TXT
            $('#txt_codigoSucursal').val("");
            $('#txt_NombreSucursal').val("");
            //ENVIAMOS EL FOCO AL TXT DESPUES DE ELIMINAR
            $("#txt_codigoSucursal").focus();
        }
    });
}