<?php
class Conexion{
    $this->conenctar();
    public function conenctar(){
        try {
            $usuario='root';
            $contraseña='angelitho28s';
            $mbd = new PDO('mysql:host=localhost;dbname=mvcs', $usuario, $contraseña);
            if(!$mbd){
                $mbd = null;
            }
            
            return $mbd;
            /*   foreach($mbd->query('SELECT * from personas') as $fila) {
                print_r($fila);
            }*/
           
        } catch (PDOException $e) {
            print "¡Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}
?>