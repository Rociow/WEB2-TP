# TPE WEB 2
## Biblioteca de peliculas
### Rocio Wesenack (roociow@gmail.com)
### Juan Delgado (juan00ignacio@gmail.com)

El dominio de la página consistirá principalmente en mostrar información de películas y sus respectivos directores, y en un futuro se buscará expandir y agregarle funcionalidades de reseña y calificación de usuarios que a su vez deberan registrarse.


Por el momento contaremos con 4 entidades (tablas) que serán:
- peliculas
- directores
- usuarios
- reseña/calificacion

### Películas
Esta tabla contará con los atributos: **id**, **nombre**, **id_director**, **genero**, **año** y **sinopsis**.
En este caso la relación se encuentra en la columna id_director con la id de la tabla "directores".

### Directores
Esta tabla contará con los atributos: **id** y **nombre** del director. El id estará vinculado con la tabla peliculas.

### Usuarios
Esta tabla contará con los atributos: **id**, **nombre** y **contraseña**. 

### Reseña
Esta tabla contará con los atributos: **id**, **id_pelis**, **id_usuario** y **reseña/calificación**. Tentativamente establecimos la relación de id_usuario con la tabla usuario (su id) y id_pelis con la tabla peliculas (con su respectivo id)

### Breve explicación del sitio
Desarrollamos un sistema web que funciona a partir de peticiones de usuarios y un programa que genera recursos dinamicamente a partir de informacion de la base de datos. El router se encarga de atender todas las peticiones del usuario y tambien implementamos el patron de arquitectura de software que divide la lógica del programa en tres elementos inter-relacionados: el modelo, que se encarga del acceso a los datos; la vista, que se encarga de la interfaz del usuario; y el controlador, que funciona como coordinador de la vista y el modelo.
A su vez tambien creamos una interfaz para el inicio de sesion, con su respectiva autenticacion, y un usuario administrador que será el unico con la posibilidad de modificar y eliminar items.
