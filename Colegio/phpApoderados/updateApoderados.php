<?php
//Incluimos la conexion
require_once ('conexion.php');
//CREAMOS UN OBJETO DE LA CLASE CONEXIÓN.
$con = new Conexion();
//llamamos al método conectar
 $llamarMetodo = $con->Conectar();
 //insercion de datos en la base de a
 $idApoderados = $_POST['ID_APODERADO'];
 $rut = $_POST['txt_mdRut']; 
 $nombre = $_POST['txt_mdNombre'];
 $apellido_Paterno = $_POST['txt_mdApellidoPaterno'];
 $apellido_Materno = $_POST['txt_mdApellidoMaterno'];
 $sexo = $_POST['txt_mdSexo'];
 $celular = $_POST['txt_mdCelular'];
 $fecha_Nacimiento = $_POST['txt_mdFechaNacimiento'];
 $calle = $_POST['txt_mdCalle'];
 $numero = $_POST['txt_mdNumero'];
 $ciudad = $_POST['txt_mdCiudad'];
 //Creamos la consulta de Actulización
 $sql ="UPDATE APODERADOS SET 
 RUT ='$rut',
 NOMBRES ='$nombre',
 APELLIDO_PATERNO ='$apellido_Paterno',
 APELLIDO_MATERNO ='$apellido_Materno', 
 SEXO ='$sexo', 
 CELULAR ='$celular', 
 FECHA_NACIMIENTO ='$fecha_Nacimiento', 
 CALLE ='$calle', 
 NUMERO ='$numero', 
 CIUDAD ='$ciudad'
 WHERE ID_APODERADO = '$idApoderados'";
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
