<?php
 require_once ('conexionpdo.php');
 $con = new Conexion();
 $llamarMetodo = $con->StartUp();
 
 $sql ="SELECT * FROM PRODUCTO";
 $stmt = $llamarMetodo->prepare($sql);
 $stmt->execute();

  while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
  {
      echo "NOMBRE: " .$row ['P_PRODUCTO']."<br>";
      echo "DEPARTAMENTO: " .$row ['P_DEPARTAMENTO']."<br>";
      echo "NOMBRE: " .$row ['P_DESCRIPCION']."<br>";
  }
?>