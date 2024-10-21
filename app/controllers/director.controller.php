<?php
require_once './app/models/director.model.php';
require_once './app/models/film.model.php';
require_once './app/view/director.view.php';

class DirectorController {
    private $model;
    private $view;

    private $filmModel;

    public function __construct() {
        $this->model = new DirectorModel();
        $this->view = new DirectorView();

        $this->filmModel = new FilmModel();
    }

    //1. LISTAR

    function showDirectors(){
        $directores = $this->model->getDirectores();
        $this -> view -> showDirectores($directores);
    }  

    function showFilmsByDirector($id_director){
        $films= $this->filmModel->getFilmByDirector($id_director);
        $director= $this->model->getDirector($id_director);
        $this->view-> showDirector($films, $director);
    }

    //2. AGREGAR

    function showDirForm() {
        $this->view->showDirForm();
    }

    function addDirector() {
        if (!isset($_POST['name']) || empty($_POST['name'])) {
            return $this->view->showError('Falta completar el nombre');
        }
        if (!isset($_POST['nationality']) || empty($_POST['nationality'])) {
            return $this->view->showError('Falta la nacionalidad');
        }
        if (!isset($_POST['bdate']) || empty($_POST['bdate'])) {
            return $this->view->showError('Falta la fecha de nacimiento');
        }
        if (!isset($_POST['bio']) || empty($_POST['bio'])) {
            return $this->view->showError('Falta la biografía');
        }

        $name = $_POST['name'];
        $nationality = $_POST['nationality'];
        $bdate = $_POST['bdate'];
        $bio = $_POST['bio'];

        $this->model->addDirector($name, $nationality, $bdate, $bio);

        // redirijo al listado de directores
        header('Location: showDirectors');
    }

    //3. MODIFICAR

    function showModifyDirector($id) {
        $director = $this->model->getDirector($id);
        $this->view->showModifyDirector($director);
    }

    function modifyDirector($id){
        if (!isset($_POST['name']) || empty($_POST['name'])) {
            return $this->view->showError('Falta completar el nombre');
        }
        if (!isset($_POST['nationality']) || empty($_POST['nationality'])) {
            return $this->view->showError('Falta la nacionalidad');
        }
        if (!isset($_POST['bdate']) || empty($_POST['bdate'])) {
            return $this->view->showError('Falta la fecha de nacimiento');
        }
        if (!isset($_POST['bio']) || empty($_POST['bio'])) {
            return $this->view->showError('Falta la biografía');
        }

        $name = $_POST['name'];
        $nationality = $_POST['nationality'];
        $bdate = $_POST['bdate'];
        $bio = $_POST['bio'];

        $this->model->modifyDirector($id, $name, $nationality, $bdate, $bio);

        header('Location: ' . BASE_URL );
    }

    //4. ELIMINAR

    public function deleteDirector($id) {
        // obtengo la tarea por id
        $director = $this->model->getDirector($id);

        if (!$director) {
            return $this->view->showError("No existe director con el id=$id");
            var_dump($director);
        }
        
        // borro la tarea y redirijo
        $this->model->deleteDirector($id);

        header('Location: ');
    }
}