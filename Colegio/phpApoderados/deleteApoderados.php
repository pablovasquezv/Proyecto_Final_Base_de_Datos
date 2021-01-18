<?php
//Incluimos la conexion
require_once('conexion.php');
//CREAMOS UN OBJETO DE LA CLASE CONEXIÓN.
$con = new Conexion();
//llamamos al método conectar
$llamarMetodo = $con->Conectar();
//variable 
$idApoderado = $_POST['ID_APODERADO'];
//Creamos la consulta de eliminación.
 //$sql ="DELETE FROM PRODUCTO WHERE P_PRODUCTO ='$idApoderado'";
/*
 $sql ="DELETE FROM PRODUCTO WHERE P_PRODUCTO =(SELECT *
 FROM Stock WHERE S_PRODUCTO = '$idApoderado')" INNER JOIN SUCURSAL ON SUCURSA.C_SUCURSAL = STOCK.S_SUCURSAL	  
  INNER JOIN STOCK ON PRODUCTO.P_PRODUCTO = STOCK.S_PRODUCTO;*/
/*$sql = "DELETE PRODUCTO, DEPARTAMENTO
   FROM PRODUCTO
   INNER JOIN DEPARTAMENTO
   ON PRODUCTO.P_DEPARTAMENTO = DEPARTAMENTO.D_DEPARTAMENTO
   WHEREC'$idApoderado'";*/
/*$sql= "DELETE FROM PRODUCTO
WHERE EXISTS
  ( SELECT DEPARTAMENTO.D_DEPARTAMENTO
    FROM DEPARTAMENTO
    WHERE PRODUCTO.P_DEPARTAMENTO = DEPARTAMENTO.D_DEPARTAMENTO
    AND PRODUCTO.P_PRODUCTO ='$idApoderado')";*/
/*$sql="DELETE PRODUCTO,STOCK,SUCURSAL
FROM PRODUCTO
INNER JOIN STOCK 
ON PRODUCTO.P_PRODUCTO = STOCK.S_PRODUCTO
INNER JOIN SUCURSAL 
ON SUCURSA.C_SUCURSAL = STOCK.S_SUCURSAL	
WHERE PRODUCTO.P_PRODUCTO ='$idApoderado'";*/
$sql="DELETE FROM APODERADOS
WHERE ID_APODERADO ='$idApoderado'";
/*$sql="DELETE FROM PRODUCTO,STOCK 
WHERE P_PRODUCTO=
( SELECT STOCK.S_PRODUCTO
  FROM STOCK
  INNER JOIN PRODUCTO
  ON  STOCK.S_PRODUCTO = PRODUCTO.P_PRODUCTO 
  WHERE PRODUCTO.P_PRODUCTO ='$idProducto')";*/
     
//Realizamos la inserción.
$stmt = $llamarMetodo->prepare($sql);
//Ejecutamos la consulta.
$stmt->execute();
 /*
 //Creamos la consulta de eliminación.
 //$sql ="DELETE FROM PRODUCTO WHERE P_PRODUCTO ='$idProducto'";
 //Realizamos la eliminación.
 $stmt = $llamarMetodo->prepare($sql);
 //Ejecutamos la consulta
 $stmt->execute();
 //Creamos un ciclo If para verificar la inserción
 /*if($stmt){
     echo"Datos Eliminado correctamente";
 } else{
     echo "No se realizo la Insercion erro capa 8";
 }*/
