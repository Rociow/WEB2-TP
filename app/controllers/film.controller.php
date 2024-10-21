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

    function showTop5(){
        $top5 = $this->model->getTop5();
        $this->view->showTop5($top5);
    }

    function showFilmsByDirector($id_director){
        $films= $this->model->getFilmByDirector($id_director);
        $director= $this->model->getDirector($id_director);
        $this -> view -> showDirector($films, $director);
    }

    function showFilm($id){
        $film = $this->model->getFilm($id);
        $id_director = $this->model->getDirectorIdByFilm($id);
   
        $director= $this->model->getDirectorName($id_director[0]->id_director);

        $this -> view -> showFilm($film, $director[0]->nombre);
    }  

    public function showFilmForm() {
        $directores=$this->model->getDirectores();
        $this->view->showFilmForm($directores);
    }

    public function addFilm() {
    if (!isset($_POST['title']) || empty($_POST['title'])) {
        return $this->view->showError('Falta completar el título');
    }
    if (!isset($_POST['director']) || empty($_POST['director'])) {
        return $this->view->showError('Falta el director');
    }
    if (!isset($_POST['year']) || empty($_POST['year'])) {
        return $this->view->showError('Falta el año');
    }
    if (!isset($_POST['genre']) || empty($_POST['genre'])) {
            return $this->view->showError('Falta el genero');
        }
    if (!isset($_POST['synopsis']) || empty($_POST['synopsis'])) {
        return $this->view->showError('Falta la sinopsis');
    }

    $title = $_POST['title'];
    $id_director = $_POST['director'];
    $genre = $_POST['genre'];
    $year = $_POST['year'];
    $synopsis = $_POST['synopsis'];

    $this->model->insertFilm($title, $id_director, $genre, $year, $synopsis);

    //$id = $this->model->insertFilm($title, $genre, $year, $synopsis); //$id_director, $genre, $year, $synopsis);

    // redirijo al home (también podriamos usar un método de una vista para motrar un mensaje de éxito)
    header('Location: ' . BASE_URL);
}

function showModify($id) {
    $film = $this->model->getFilm($id);
    $directores = $this->model->getDirectores();
    
    $this->view->showModifyFilm($film, $directores);
}

public function modifyFilm($id) {
    if (!isset($_POST['title']) || empty($_POST['title'])) {
        return $this->view->showError('Falta completar el título');
    }
    if (!isset($_POST['director']) || empty($_POST['director'])) {
        return $this->view->showError('Falta el director');
    }
    if (!isset($_POST['year']) || empty($_POST['year'])) {
        return $this->view->showError('Falta el año');
    }
    if (!isset($_POST['genre']) || empty($_POST['genre'])) {
            return $this->view->showError('Falta el genero');
        }
    if (!isset($_POST['synopsis']) || empty($_POST['synopsis'])) {
        return $this->view->showError('Falta la sinopsis');
    }

    $title = $_POST['title'];
    $id_director = $_POST['director'];
    $genre = $_POST['genre'];
    $year = $_POST['year'];
    $synopsis = $_POST['synopsis'];

    $this->model->modifyFilm($id, $title, $id_director, $genre, $year, $synopsis);

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

public function deleteDirector($id) {
    // obtengo la tarea por id
    $director = $this->model->getDirector($id);

    if (!$director) {
        return $this->view->showError("No existe director con el id=$id");
        var_dump($director);
    }
    
    // borro la tarea y redirijo
    $this->model->eraseDirector($id);

    header('Location: ');
    
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