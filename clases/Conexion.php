<?php
class conectar{
    private $servidor="localhost";
    private $usuario="root";
    private $password="";
    private $bd="ventas";

    public function conexion (){
        $conexion = mysqli_connect($this->servidor,
                                   $this->usuario,
                                   $this->password, 
                                   $this->bd);
        return $conexion;

    }

}
/*
//Let's proof the conexion 
$obj = new conectar();
//var_dump($obj->conexion()) ;
//we can also include an if to verify the connection, 
// once we 
 if($obj->conexion()){
     echo "Conectado";
 }
*/

?>