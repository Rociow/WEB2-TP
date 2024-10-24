<?php
require_once 'libs/response.php';
require_once 'app/middlewares/session.auth.middleware.php';
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
        //PUEDE SER DIRECTORES O TOP5 PELIS POPULARES
        $controller->showTop5();
        break;
    
    //LADO N RELACION (PELICULAS)
    case 'showFilm':
        sessionAuthMiddleware($res);
        // Verifica que el usuario esté logueado y setea $res->user o redirige a login
        $controller = new FilmController();
        $id = $params[1];
        $controller->showFilm($id);
        break;
    case 'new':
        sessionAuthMiddleware($res);
        $controller = new FilmController();
        $controller->addFilm();
        break;
    case 'deleteFilm':
        sessionAuthMiddleware($res);
        $controller = new FilmController();
        $controller->deleteFilm($params[1]);
        break;
    case 'showFilmForm' :
        sessionAuthMiddleware($res);
        $controller = new FilmController();
        $controller->showFilmForm();
        break;
    case 'addFilm' :
        sessionAuthMiddleware($res);
        $controller = new FilmController();
        $controller->addFilm();
        break;
    case 'showModify' :
        sessionAuthMiddleware($res);
        $controller = new FilmController();
        $controller->showModify($params[1]);
        break;
    case 'modifyFilm' :
        sessionAuthMiddleware($res);
        $controller = new FilmController();
        $controller->modifyFilm($params[1]);
        break;  
        
    //LADO 1 RELACION (DIRECTOR)
    case 'showDirector':
        sessionAuthMiddleware($res);
        // Verifica que el usuario esté logueado y setea $res->user o redirige a login
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
        $controller = new DirectorController();
        $controller->deleteDirector($params[1]);
        break;
    case 'showDirForm' :
        sessionAuthMiddleware($res);
        $controller = new DirectorController();
        $controller->showDirForm();
        break;
    case 'addDirector' :
        sessionAuthMiddleware($res);
        $controller = new DirectorController();
        $controller->addDirector();
        break;
    case 'showModifyDirector' :
        sessionAuthMiddleware($res);
        $controller = new DirectorController();
        $controller->showModifyDirector($params[1]);
        break;
    case 'modifyDirector' :
        sessionAuthMiddleware($res);
        $controller = new DirectorController();
        $controller->modifyDirector($params[1]);
        break;

    //USUARIOS Y REGISTRO
    case 'showLogin':
        $controller = new AuthController();
        $controller->showLogin();
        break;
    case 'login':
        sessionAuthMiddleware($res);
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
        sessionAuthMiddleware($res);
        $controller = new FilmController();
        $error = "404 Page not found.";
        $controller->showError($error); 
        break;
}

