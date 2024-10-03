<?php

require_once './app/models/user.model.php';
require_once './app/view/user.view.php';

class UserController {

    private $view;
    private $model;

    public function __construct() {
        $this->model = new UserModel();
        $this->view = new UserView();
    }
    
    public function showLogin() {
        // Muestro el formulario de login
        return $this->view->showLogin();
    }

    public function login() {
        if (!isset($_POST['email']) || empty($_POST['email'])) {
            return $this->view->showLogin('Falta completar el nombre de usuario');
        }
    
        if (!isset($_POST['password']) || empty($_POST['password'])) {
            return $this->view->showLogin('Falta completar la contraseña');
        }
    
        $email = $_POST['email'];
        $password = $_POST['password'];
    
        // Verificar que el usuario está en la base de datos
        $userFromDB = $this->model->getUserByEmail($email);


            //SE FIJA SI LA CONTRASEÑA QUE INGRESA EL USUARIO COINCIDE CON EL HASH
        // password: 123456
        // $userFromDB->password: $2y$10$xQop0wF1YJ/dKhZcWDqHceUM96S04u73zGeJtU80a1GmM.H5H0EHC
        if($userFromDB && password_verify($password, $userFromDB->password)){
            // Guardo en la sesión el ID del usuario
            session_start();
            $_SESSION['ID_USER'] = $userFromDB->id;
            $_SESSION['EMAIL_USER'] = $userFromDB->email;
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
}
