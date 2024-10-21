<?php


class FilmView {

    function showError ($error){
        require_once './templates/mostrar_error.phtml';
    }

    function showDirectores ($directores){
        $count = count($directores);
        require_once './templates/listar_directores.phtml';
    }

    function showDirector ($films, $director){        
        $count = count($films);
        require_once './templates/director.phtml';
    }

    function showFilm ($film, $director){
        require_once './templates/pelicula.phtml';
    }

    function showFilmForm ($directores) {
        require_once './templates/agregar_pelis.phtml';
    }

    function showModifyFilm($film, $directores) {
        require_once './templates/modificar_peli.phtml';
    }

    function showDirForm() {
        require_once './templates/agregar_director.phtml';
    }

    function showModifyDirector($director) {
        require_once './templates/modificar_director.phtml';
    }

    function showLogin () {
        require_once './templates/form_login.phtml';
    }

    function showTop5($top5) {
        $films = $top5;
        $count = count($films);
        require_once './templates/top5.phtml';
    }


}