<?php
require_once './app/models/user.model.php';
require_once './app/view/auth.view.php';

class AuthController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new UserModel();
        $this->view = new AuthView();
    }

    public function showLogin() {
        // Muestro el formulario de login
        return $this->view->showLogin();
    }

    public function login() {
        if (!isset($_POST['username']) || empty($_POST['username'])) {
            return $this->view->showLogin('Falta completar el nombre de usuario');
        }
    
        if (!isset($_POST['password']) || empty($_POST['password'])) {
            return $this->view->showLogin('Falta completar la contraseña');
        }
    
        $username = $_POST['username'];
        $password = $_POST['password'];
    
        // Verificar que el usuario está en la base de datos
        $user = $this->model->getUserByName($username);
        var_dump($user);

        var_dump($password);
        //HASTA ACA TODO BIEN
        
        var_dump(password_verify($password, $user->password));

        if($user && password_verify($password, $user->password)){
            // Guardo en la sesión el ID del usuario
            session_start();
            $_SESSION['USER_ID'] = $user->id;
            $_SESSION['USER_USERNAME'] = $user->username;
            $_SESSION['LAST_ACTIVITY'] = time();
    
            // Redirijo al home
            header('Location: ' . BASE_URL);
        } else {
            return $this->view->showLogin('Credenciales incorrectas');
        }
    }

    public function logout() {
        session_start(); // Va a buscar la cookie
        session_destroy(); // Borra la cookie que se buscó
        header('Location: ' . BASE_URL);
    }

    function showRegister() {
        $this->view->showFormRegister();
    }

    function authRegister() {
        if (empty($_POST['username']) || empty($_POST['password'])) {
            $this->view->showFormRegister("ERROR, no pudimos verificar tu identidad, AMBOS campos deben estar completos.");
            return;
        }

        $username = $_POST['username'];

        $users = $this->model->getAllUsers();
        foreach ($users as $usuario) {
            if ($usuario->username == $username) {
                $this->view->showFormRegister("El nombre de usuario ya existe! Intenta otra vez...");
                return;
            }
        }

        $password = $_POST['password'];
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $id = $this->model->addUser($username, $hash);

        if($id){
            header('Location: ' . BASE_URL);
        } else {
            $this->view->showFormRegister("Error. No se pudo registrar");
        }
    }
}

