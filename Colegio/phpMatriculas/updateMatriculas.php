<?php
//Incluimos la conexion
require_once ('conexion.php');
//CREAMOS UN OBJETO DE LA CLASE CONEXIÓN.
$con = new Conexion();
//llamamos al método conectar
 $llamarMetodo = $con->Conectar();
 //insercion de datos en la base de a
 $idStock = $_POST['ID_MATRICULAS'];
 $codigo_Producto = $_POST['txt_MdCodigo_Productos']; 
 $stock = $_POST['txt_mdCantidad_Stock'] ;
 //Creamos la consulta de eliminacio
 $sql ="UPDATE MATRICULAS SET 
 CODIGO_ALUMNO ='$codigo_Producto',
 FECHA ='$stock' 
 WHERE ID_MATRICULAS='$idStock'";
 //Relizamos la insercion
 $stmt = $llamarMetodo->prepare($sql);
 //Ejecutamos la consulta
 $stmt->execute();
 /*Creamos un ciclo If para verificar la inserción
 if($stmt){
     echo"Datos Actualizados correctamente";
 } else{
     echo "No se realizo la Insercion erro capa 8";
 }*/
