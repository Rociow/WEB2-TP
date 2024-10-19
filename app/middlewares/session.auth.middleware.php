<?php
    function sessionAuthMiddleware($res) {
        session_start();
        if(isset($_SESSION['ID_USER'])){
            $res->user = new stdClass();
            $res->user->id = $_SESSION['USER_ID'];
            $res->user->username = $_SESSION['USER_USERNAME'];
            return;
        } else {
            //HACER QUE EN EL HOME SE VEA EL FORM DE LOGIN
            //TODO esta bien que te devuelva al home o al login pero solo
            //cuando queres entrar o realizar una accion para la cual si o si 
            //deberias estar logeado (ejemplo registrar una pelicula y manualmente escribir /showfilmform)
        }
    }
?>
