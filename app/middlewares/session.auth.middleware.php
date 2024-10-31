<?php
    function sessionAuthMiddleware($res) {
        session_start();
        if(isset($_SESSION['USER_ID'])){
            $res->user = new stdClass();
            $res->user->id = $_SESSION['USER_ID'];
            $res->user->username = $_SESSION['USER_USERNAME'];
            return;
        }
    }
?>
