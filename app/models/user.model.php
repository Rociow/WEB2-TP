<?php

class UserModel {
    private $db;

    public function __construct() {
       $this->db = new PDO('mysql:host=localhost;dbname=db_pelis;charset=utf8', 'root', '');
    }
 

    //NO TENEMOS FILA EMAIL PODRIAMOS AGREGARLE
    public function getUserByEmail($email) {    
        $query = $this->db->prepare("SELECT * FROM usuarioS WHERE email = ?");
        $query->execute([$email]);
    
        $user = $query->fetch(PDO::FETCH_OBJ);
    
        return $user;
    }
}
