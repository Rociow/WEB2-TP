<?php

class DirectorView {

    function showDirectores ($directores){
        $count = count($directores);
        require_once './templates/listar_directores.phtml';
    }

    function showDirector ($films, $director){        
        $count = count($films);
        require_once './templates/director.phtml';
    }

    function showDirForm() {
        require_once './templates/agregar_director.phtml';
    }

    function showModifyDirector($director) {
        require_once './templates/modificar_director.phtml';
    }

    function showError ($error){
        require_once './templates/mostrar_error.phtml';
    }
}