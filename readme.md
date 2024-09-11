# TPE WEB 2
## Biblioteca de peliculas
### Rocio Wesenack Juan Delgado

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

