<?php

require_once './app/models/film.model.php';
require_once './app/view/film.view.php';

class FilmController {

    private $view;
    private $model;

    public function __construct() {
        $this->model = new FilmModel();
        $this->view = new FilmView();
    }

    function showDirectors(){
        $directores = $this->model->getDirectores();
        $this -> view -> showDirectores($directores);
    }   

    function showFilmsByDirector($id_director){
        $films= $this->model->getFilmByDirector($id_director);
        $director= $this->model->getDirectorName($id_director);
        $this -> view -> showFilms($films, $director);
    }

    public function addFilm() {
    if (!isset($_POST['title']) || empty($_POST['title'])) {
        return $this->view->showError('Falta completar el título');
    }

    if (!isset($_POST['genre']) || empty($_POST['genre'])) {
        return $this->view->showError('Falta completar la prioridad');
    }

    if (!isset($_POST['year']) || empty($_POST['year'])) {
        return $this->view->showError('Falta completar la prioridad');
    }

    if (!isset($_POST['synopsis']) || empty($_POST['synopsis'])) {
        return $this->view->showError('Falta completar la prioridad');
    }

    $title = $_POST['title'];
    $genre = $_POST['genre'];
    $year = $_POST['year'];
    $synopsis = $_POST['synopsis'];

    //$id = $this->model->insertFilm($title, $genre, $year, $synopsis); //$id_director, $genre, $year, $synopsis);

    // redirijo al home (también podriamos usar un método de una vista para motrar un mensaje de éxito)
    header('Location: ' . BASE_URL);
}


public function deleteFilm($id) {
    // obtengo la tarea por id
    $film = $this->model->getFilm($id);

    if (!$film) {
        return $this->view->showError("No existe la pelicula con el id=$id");
    }

    // borro la tarea y redirijo
    $this->model->eraseFilm($id);

    header('Location: ' . BASE_URL);
}

public function showError($error){
    $this->view->showError($error);
}

/*public function finishTask($id) {
    $task = $this->model->getTask($id);

    if (!$task) {
        return $this->view->showError("No existe la tarea con el id=$id");
    }

    // actualiza la tarea
    $this->model->updateTask($id);

    header('Location: ' . BASE_URL);
}*/
}



?>