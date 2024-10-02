<?php


class FilmView {

    function showError ($error){
        echo $error;
    }

    function showDirectores ($directores){
        $count = count($directores);
        require_once './templates/listar_directores.php';
    }

    function showFilms ($films, $director){
        $nombreDirector = $director;
        
        $count = count($films);
        require_once './templates/listar_peliculas.php';
    }

    function showFormulario () {
        require_once './templates/agregar_pelis.php';
    }



}