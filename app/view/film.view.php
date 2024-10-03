<?php


class FilmView {

    function showError ($error){
        require_once './templates/mostrar_error.phtml';
    }

    function showDirectores ($directores){
        $count = count($directores);
        require_once './templates/listar_directores.phtml';
    }

    function showFilms ($films, $director){
        $nombreDirector = $director;
        
        $count = count($films);
        require_once './templates/listar_peliculas.phtml';
    }

    function showFormulario () {
        require_once './templates/agregar_pelis.phtml';
    }



}