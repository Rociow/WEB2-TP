<?php

class DirectorModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=db_pelis;charset=utf8', 'root', '');
    }

    //1. LISTAR

    function getDirectores(){
        $query = $this->db->prepare('SELECT * FROM director');
        $query->execute();
     
        $directors = $query->fetchAll(PDO::FETCH_OBJ); 
    
        return $directors;
    }

    function getDirectorName($id_director){
        $query = $this->db->prepare('SELECT nombre FROM director WHERE id = ?');
        $query->execute([$id_director]);
     
        $name = $query->fetchAll(PDO::FETCH_OBJ); 
    
        return $name;
    }

    public function getDirector($id) {    
        $query = $this->db->prepare('SELECT * FROM director WHERE id = ?');
        $query->execute([$id]);   
    
        $director = $query->fetchAll(PDO::FETCH_OBJ);
    
        return $director;
    }

    //2. AGREGAR

    function addDirector($name, $nationality, $bdate, $bio) {
        $query = $this->db->prepare('INSERT INTO director(nombre, nacionalidad, fecha_nacimiento, biografia) VALUES (?,?,?,?)');
        $query->execute([$name, $nationality, $bdate, $bio]);

        $id = $this->db->lastInsertId();

        return $id;
    }

    //3. MODIFICAR

    function modifyDirector($id, $name, $nationality, $bdate, $bio) {
        $query = $this->db->prepare('UPDATE director SET nombre=?, nacionalidad=?, fecha_nacimiento=?, biografia=? WHERE id = ?');
        $query->execute([$name, $nationality, $bdate, $bio, $id]);

        $id = $this->db->lastInsertId();

        return $id;
    }

    //4. ELIMINAR

    function deleteDirector($director){
        $query = $this->db->prepare('DELETE FROM director WHERE id = ?');
        $query->execute([$director]);
    }
}