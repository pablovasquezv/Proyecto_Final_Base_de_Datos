<?php
//Incluimos la conexion
require_once('conexion.php');
//CREAMOS UN OBJETO DE LA CLASE CONEXIÓN.
$con = new Conexion();
//llamamos al método conectar
$llamarMetodo = $con->Conectar();
//Variables
$codigo = $_POST['txt_CodigoDepartamento'];
$nombre = $_POST['txt_NombreDepartamento'];
//Creamos la consulta de Inserción
$sql = "INSERT INTO DEPARTAMENTOS (D_DEPARTAMENTO,D_DESCRIPCION)
VALUES('$codigo','$nombre')";
//Raelizamos la inserción
$stmt = $llamarMetodo->prepare($sql);
//Ejecutamos la consulta
$stmt->execute();
//Creamos un ciclo If para verificar la inserción
/*if($stmt){
     echo"Datos guardados";

 } else{
     echo "No se realizo la Insercion erro capa 8";
 }*/

?>


<!--aNTERIOR A MODIFICACION
$query = "SELECT * FROM DEPARTAMENTO WHERE D_DEPARTAMENTO = '$codigo' OR D_DESCRIPCION = '$nombre' ";
$result  = $llamarMetodo->prepare($query);
//Ejecutamos la consulta
$stmt->execute(array(':D_DEPARTAMENTO ' => $codigo));

if ($stmt > 0) {
    $alert = '<p class="msg_error">El correo o el usuario ya existe.</p>';
} else {

    $query_insert = "INSERT INTO DEPARTAMENTO (D_DEPARTAMENTO,D_DESCRIPCION)
                VALUES('$codigo','$nombre')";
    if ($query_insert) {

        
        $alert = '<p class="msg_save">Usuario creado correctamente.</p>';
        //Relizamos la insercion
        $stmt = $llamarMetodo->prepare($sql);
        $stmt = $llamarMetodo->prepare($sql);
        //Ejecutamos la consulta
        $stmt->execute();
        echo "iNSERATADO CORRECTAMENTE";
    } else {
        $alert = '<p class="msg_error">Error al crear el usuario.</p>';
        echo "Error al crear";
    }
}

  FALTA EN INICIO DEL PHP DESPUES DE ESTA LINEA
//Incluimos la conexion 

 require_once ('conexion.php');
 //CREAMOS UN OBJETO DE LA CLASE CONEXIÓN.
 $con = new Conexion();
 //llamamos al método conectar
 $llamarMetodo = $con->Conectar();
 //Variables
 $codigo = $_POST['txt_CodigoDepartamento'];
 $nombre = $_POST['txt_NombreDepartamento'];
 //Creamos la consulta de Insercion
 $sql ="INSERT INTO DEPARTAMENTO (D_DEPARTAMENTO,D_DESCRIPCION)
 VALUES('$codigo','$nombre')";
 //Relizamos la insercion
 $stmt = $llamarMetodo->prepare($sql);
 //Ejecutamos la consulta
 $stmt->execute();
 //Creamos un ciclo If para verificar la inserción
 /*if($stmt){
     echo"Datos guardados";

 } else{
     echo "No se realizo la Insercion erro capa 8";
 }*/

?>
*/
-->