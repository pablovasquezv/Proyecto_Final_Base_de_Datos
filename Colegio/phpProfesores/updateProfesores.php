<?php
//Incluimos la conexion
require_once ('conexion.php');
//CREAMOS UN OBJETO DE LA CLASE CONEXIÓN.
$con = new Conexion();
//llamamos al método conectar
 $llamarMetodo = $con->Conectar();
 //insercion de datos en la base de a
 $idProfesor = $_POST['ID_PROFESOR'];
 $codigo_Departamentos = $_POST['txt_Modificar_departamentos'];
 $rut = $_POST['txt_Modificar_Rut']; 
 $nombres = $_POST['txt_Modificar_Nombre'];
 $apellido_Paterno = $_POST['txt_Modificar_ApellidoPaterno'];
 $apellido_Materno = $_POST['txt_Modificar_ApellidoMaterno'];
 $fecha_Nacimiento = $_POST['txt_Modificar_FechaNacimiento'];
 $sexo = $_POST['txt_Modificar_Sexo'];
 $calle = $_POST['txt_Modificar_Calle'];
 $numero = $_POST['txt_Modificar_Numero'];
 $ciudad = $_POST['txt_Modificar_Ciudad'];
 //Creamos la consulta de Actulización
 $sql ="UPDATE PROFESORES SET 
 CODIGO_DEPARTAMENTO ='$codigo_Departamentos',
 RUT ='$rut', 
 NOMBRES ='$nombres',
 APELLIDO_PATERNO ='$apellido_Paterno',
 APELLIDO_MATERNO ='$apellido_Materno',
 FECHA_NACIMIENTO ='$fecha_Nacimiento',  
 SEXO ='$sexo', 
 CALLE ='$calle', 
 NUMERO ='$numero', 
 CIUDAD ='$ciudad'
 WHERE ID_PROFESOR = '$idProfesor'";
 //Relizamos la insercion
 $stmt = $llamarMetodo->prepare($sql);
 //Ejecutamos la consulta
 $stmt->execute();
 //Creamos un ciclo If para verificar la inserción
 /*if($stmt){
     echo"Datos Actualizados correctamente";
 } else{
     echo "No se realizo la Insercion erro capa 8";
 }*/
