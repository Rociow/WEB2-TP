<?php
require_once 'libs/response.php';
require_once 'app/middlewares/session.auth.middleware.php';
require_once 'app/middlewares/verify.auth.middleware.php';
require_once 'app/controllers/film.controller.php';
require_once 'app/controllers/director.controller.php';
require_once 'app/controllers/auth.controller.php';

// base_url para redirecciones y base tag
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$res = new Response();

$action = 'home'; // accion por defecto si no se envia ninguna
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}

// parsea la accion para separar accion real de parametros
$params = explode('/', $action);

switch ($params[0]) {
    //HOME
    case 'home':
        sessionAuthMiddleware($res);
        $controller = new FilmController();
        $controller->showTop5();
        break;
    
    //LADO N RELACION (PELICULAS)
    case 'showFilms':
        sessionAuthMiddleware($res);
        $controller = new FilmController();
        $controller->showFilms();
        break;
    case 'showFilm':
        sessionAuthMiddleware($res);
        $controller = new FilmController();
        $id = $params[1];
        $controller->showFilm($id);
        break;
    case 'new':
        sessionAuthMiddleware($res); // Setea $res->user si existe session
        verifyAuthMiddleware($res); // Verifica que el usuario esté logueado o redirecciona al login
        $controller = new FilmController();
        $controller->addFilm();
        break;
    case 'showFilmForm' :
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res);
        $controller = new FilmController();
        $controller->showFilmForm();
        break;
    case 'addFilm' :
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res);
        $controller = new FilmController();
        $controller->addFilm();
        break;
    case 'showModify' :
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res);
        $controller = new FilmController();
        $controller->showModify($params[1]);
        break;
    case 'modifyFilm' :
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res);
        $controller = new FilmController();
        $controller->modifyFilm($params[1]);
        break;  
    case 'deleteFilm':
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res);
        $controller = new FilmController();
        $controller->deleteFilm($params[1]);
        break;  

    //LADO 1 RELACION (DIRECTOR)
    case 'showDirector':
        sessionAuthMiddleware($res);
        $controller = new DirectorController();
        $id = $params[1];
        $controller->showFilmsByDirector($id);
        break;
    case 'showDirectors':
        sessionAuthMiddleware($res);
        $controller = new DirectorController();
        $controller->showDirectors();
        break;
    case 'deleteDirector':
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res);
        $controller = new DirectorController();
        $controller->deleteDirector($params[1]);
        break;
    case 'showDirForm' :
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res);
        $controller = new DirectorController();
        $controller->showDirForm();
        break;
    case 'addDirector' :
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res);
        $controller = new DirectorController();
        $controller->addDirector();
        break;
    case 'showModifyDirector' :
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res);
        $controller = new DirectorController();
        $controller->showModifyDirector($params[1]);
        break;
    case 'modifyDirector' :
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res);
        $controller = new DirectorController();
        $controller->modifyDirector($params[1]);
        break;

    //USUARIOS Y REGISTRO
    case 'showLogin':
        $controller = new AuthController();
        $controller->showLogin();
        break;
    case 'login':
        $controller = new AuthController();
        $controller->login();
        break;
    case 'showRegister':
        $controller = new AuthController();
        $controller->showRegister();
        break;
    case 'register':
        $controller = new AuthController();
        $controller->authRegister();
        break;
    case 'logout':
        $controller = new AuthController();
        $controller->logout();
        break;
    default: 
        $controller = new FilmController();
        $error = "404 Page not found.";
        $controller->showError($error); 
        break;
}

