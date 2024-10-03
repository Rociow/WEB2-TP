<?php
//require_once 'libs/response.php';
//require_once 'app/middlewares/session.auth.middleware.php';
require_once 'app/controllers/film.controller.php';
require_once 'app/controllers/user.controller.php';

// base_url para redirecciones y base tag
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'home'; // accion por defecto si no se envia ninguna
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}

// parsea la accion para separar accion real de parametros
$params = explode('/', $action);

switch ($params[0]) {
    case 'home':
        //sessionAuthMiddleware($res); // Verifica que el usuario esté logueado y setea $res->user o redirige a login
        $controller = new FilmController();
        $controller->showDirectors();
        break;
    case 'showFilms':
         //sessionAuthMiddleware($res); // Verifica que el usuario esté logueado y setea $res->user o redirige a login
        $controller = new FilmController();
        $id = $params[1];
        $controller->showFilmsByDirector($id);
        break;
    case 'new':
        //sessionAuthMiddleware($res);
        $controller = new FilmController();
        $controller->addFilm();
        break;
    case 'delete':
        //sessionAuthMiddleware($res);
        $controller = new FilmController();
        $controller->deleteFilm($params[1]);
        break;
    case 'showLogin':
        //sessionAuthMiddleware($res);
        $controller = new UserController();
        $controller->showLogin();
        break;
    case 'login':
        //sessionAuthMiddleware($res);
        $controller = new UserController();
        $controller->login();
        break;
    default: 
        $controller = new FilmController();
        $error = "404 Page not found.";
        $controller->showError($error); 
        break;
}

