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
        if (!isset($_POST['name']) || empty($_POST['name'])) {
            return $this->view->showLogin('Falta completar el nombre de usuario');
        }
    
        if (!isset($_POST['password']) || empty($_POST['password'])) {
            return $this->view->showLogin('Falta completar la contraseña');
        }
    
        $name = $_POST['name'];
        $password = $_POST['password'];
    
        // Verificar que el usuario está en la base de datos
        $userFromDB = $this->model->getUserByName($name);

        // password: 123456
        // $userFromDB->password: $2y$10$xQop0wF1YJ/dKhZcWDqHceUM96S04u73zGeJtU80a1GmM.H5H0EHC
        if($userFromDB && password_verify($password, $userFromDB->password)){
            // Guardo en la sesión el ID del usuario
            session_start();
            $_SESSION['ID_USER'] = $userFromDB->id;
            $_SESSION['NAME_USER'] = $userFromDB->name;
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

