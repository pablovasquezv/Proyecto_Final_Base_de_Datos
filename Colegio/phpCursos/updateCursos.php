<?php
//Incluimos la conexion
require_once ('conexion.php');
//CREAMOS UN OBJETO DE LA CLASE CONEXIÓN.
$con = new Conexion();
//llamamos al método conectar
 $llamarMetodo = $con->Conectar();
 //insercion de datos en la base de a
 $idCurso = $_POST['ID_CURSO'];
 $codigo_Sala = $_POST['txt_Modificar_Sala'];
 $matricula = $_POST['txt_Modificar_Matricula']; 
 $alumno  = $_POST['txt_Modificar_Alumno'];
 $profesor = $_POST['txt_Modificar_Profesor'];
 $nombre = $_POST['txt_Modificar_Nombre'];
 //Creamos la consulta de Actulización
 $sql ="UPDATE CURSOS SET 
 CODIGO_SALA ='$codigo_Sala',
 CODIGO_MATRICULA ='$matricula', 
 CODIGO_ALUMNO ='$alumno ',
 C_PROFESOR_JEFE ='$profesor',
 NOMBRE ='$nombre'
 WHERE ID_CURSO = '$idCurso'";
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
