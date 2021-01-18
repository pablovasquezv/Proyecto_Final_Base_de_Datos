<?php
//Creamos un clase para realizara la conexión con PDO.
class Conexion
{
  /*Creamos variables para realizar la conexión*/
  private $db = 'oci:dbname=XE';
  private $user = "COLEGIO";
  private $pass = "123456";
  /**Creamos el constructor de la clase conexión */
  public function Conectar()
  {
    try {
      //Creamos la conexion a la base de datos Oracle.
      $base = new PDO($this->db, $this->user, $this->pass);
      //PARA QUE GUARDE CARACTERES COMO ACENTO.
      $base->exec("SET CARACTER SET utf8");

      //Retornamos la conexión hecha de la base de datos.
      return $base;
      //Verificamos si la conexion se ejecuto correctamente.    
    } catch (Exception $e) {
      /**En caso de fallar la conexión */
      die("Error de Conexión : " . $e->getMessage());
      /**Mensaje del error */
      die("Falló de Conexión Linea: " . $e->getLine());
      /**Linea del error */
    } finally {
      /**Cerramos la conexión */
      $base = null;
    }
  }
}
