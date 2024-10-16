<?php

class UserModel {
    private $db;

    public function __construct() {
       $this->db = new PDO('mysql:host=localhost;dbname=db_pelis;charset=utf8', 'root', '');
    }
 
    public function getUserByName($username) {    
        $query = $this->db->prepare("SELECT * FROM usuarios WHERE username = ?");
        $query->execute([$username]);
    
        $user = $query->fetch(PDO::FETCH_OBJ);
    
        return $user;
    }

    public function getAllUsers(){
        $query = $this->db->prepare('SELECT * FROM usuarios');
        $query->execute();

        $users = $query->fetchAll(PDO::FETCH_OBJ);
        return $users;
    }

    public function addUser($username, $hash){
        $query = $this->db->prepare('INSERT INTO usuarios(username, password) VALUES(?,?)');
        $query->execute([$username,$hash]);

        return $this->db->lastInsertId();
        
    }
}
