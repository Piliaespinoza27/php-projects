<?php
//Llamada al modelo
require("models/personas_model.php");
$per=new personas_model();
$datos=$per->get_personas();
 
//Llamada a la vista
require("views/personas_view.php");
?>
