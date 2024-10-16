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
        }
    }
?>
