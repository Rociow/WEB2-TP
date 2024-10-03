<?php

class AuthView {
    private $user = null;

    function showLogin($error = null) {
        require 'templates/form_login.phtml';
    }

    function showFormRegister($error = null) {
        require 'templates/form_register.phtml';
    }


}
