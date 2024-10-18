<?php

class FilmModel {

    private $db;

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=db_pelis;charset=utf8', 'root', '');
    }


    function getFilms(){
         // 2. Ejecuto la consulta
         $query = $this->db->prepare('SELECT * FROM peliculas');
         $query->execute();
     
         // 3. Obtengo los datos en un arreglo de objetos
         $films = $query->fetchAll(PDO::FETCH_OBJ); 
     
         return $films;
    }

    function getFilmByDirector($id_director){
        // 2. Ejecuto la consulta
        $query = $this->db->prepare('SELECT * FROM peliculas WHERE id_director = ?');
        $query->execute([$id_director]);
    
        // 3. Obtengo los datos en un arreglo de objetos
        $films = $query->fetchAll(PDO::FETCH_OBJ); 
    
        return $films;
   }

    function getDirectores(){
        $query = $this->db->prepare('SELECT * FROM director');
        $query->execute();
     
         // 3. Obtengo los datos en un arreglo de objetos
         $directors = $query->fetchAll(PDO::FETCH_OBJ); 
     
         return $directors;
    }

    function getDirectorName($id_director){
        $query = $this->db->prepare('SELECT nombre FROM director WHERE id = ?');
        $query->execute([$id_director]);
     
         // 3. Obtengo los datos en un arreglo de objetos
         $name = $query->fetchAll(PDO::FETCH_OBJ); 
     
         return $name;
    }

    public function getFilm($id) {    
        $query = $this->db->prepare('SELECT * FROM peliculas WHERE id = ?');
        $query->execute([$id]);   
    
        $film = $query->fetchAll(PDO::FETCH_OBJ);
    
        return $film;
    }

    function getDirectorIdByFilm($id){
        $query = $this->db->prepare('SELECT id_director FROM peliculas WHERE id = ?');
        $query->execute([$id]);
     
         // 3. Obtengo los datos en un arreglo de objetos
         $id_director = $query->fetchAll(PDO::FETCH_OBJ); 
     
         return $id_director;
    }

    public function getDirector($id) {    
        $query = $this->db->prepare('SELECT * FROM director WHERE id = ?');
        $query->execute([$id]);   
    
        $director = $query->fetchAll(PDO::FETCH_OBJ);
    
        return $director;
    }
 
    public function insertFilm($id_director, $title, $genero, $year, $sinopsis) { 
        $query = $this->db->prepare('INSERT INTO peliculas(titulo, id_director, genero, year, sinopsis) VALUES (?, ?, ?, ?, ?)');
        $query->execute([$title, $id_director, $genero, $year, $sinopsis]);
    
        $id = $this->db->lastInsertId();

        return $id;
    }

    function eraseFilm($film){
        $query = $this->db->prepare('DELETE FROM peliculas WHERE id = ?');
        $query->execute([$film]);
    }

    function eraseDirector($director){
        $query = $this->db->prepare('DELETE FROM director WHERE id = ?');
        $query->execute([$director]);
    }

    public function updateTask($id) {        
        $query = $this->db->prepare('UPDATE peliculas SET WHERE id = ?');
        $query->execute([$id]);
    }

    public function getTop5(){
        $query = $this->db->prepare('SELECT * FROM `peliculas` ORDER BY `year` DESC LIMIT 5');
        $query->execute();

        $top5 = $query->fetchAll(PDO::FETCH_OBJ); 
        return $top5;
    }

}