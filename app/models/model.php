<?php
include_once './config.php';
class Model {
    protected $db;

    public function __construct() {
        $this->db = new PDO("mysql:host=".MYSQL_HOST .";dbname=".MYSQL_DB.";charset=utf8", MYSQL_USER, MYSQL_PASS);
        $this->deploy();
    }

    private function deploy() {
        $query = $this->db->query('SHOW TABLES');
        $tables = $query->fetchAll();
        if(count($tables)==0){
            $sql=<<<END
            --
            -- Base de datos: `db_pelis`
            --

            -- --------------------------------------------------------

            --
            -- Estructura de tabla para la tabla `calificacion`
            --

            CREATE TABLE `calificacion` (
            `id` int(11) NOT NULL,
            `id_pelis` int(11) NOT NULL,
            `id_usuario` int(11) NOT NULL,
            `calificacion` varchar(45) NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

            -- --------------------------------------------------------

            --
            -- Estructura de tabla para la tabla `director`
            --

            CREATE TABLE `director` (
            `id` int(11) NOT NULL,
            `nombre` varchar(45) NOT NULL,
            `nacionalidad` varchar(45) NOT NULL,
            `fecha_nacimiento` date NOT NULL,
            `biografia` text NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

            --
            -- Volcado de datos para la tabla `director`
            --

            INSERT INTO `director` (`id`, `nombre`, `nacionalidad`, `fecha_nacimiento`, `biografia`) VALUES
            (1, 'David Fincher', 'Estadounidense', '1962-08-28', 'David Andrew Leo Fincher es un director estadounidense, sus películas son en su mayoría thrillers y recibió 40 nominaciones de la academia incluyendo 3 como mejor director'),
            (2, 'Martin Scorsese', 'Estadounidense', '1942-11-17', 'Martin Scorsese es un director, productor, escritor y actor estadounidense. Una de las mayores figuras del Hollywood moderno, es considerado uno de los directores más influyentes de la historia.'),
            (3, 'Quentin Tarantino', 'Estadounidense', '1963-03-27', 'Quentin Jerome Tarantino es un director, escritor, productor y actor estadounidense comenzo en 1990 como un director independiente con su primer pelicula Perros de la Calle y desde entonces carrera siempre fue exitosa.'),
            (4, 'Wes Anderson', 'Estadounidense', '1969-05-01', 'Wes Anderson es un cineasta estadounidense, sus películas son conocidas por su simetría, excentricismo y estilos de narrativa únicos.'),
            (5, 'David Lynch', 'Estadounidense', '1946-01-20', 'David Keith Lynch es un director, pintor, artista visual, escritor y músico estadounidense. Ha desarrollado su estilo cinematográfico único el cual es descripto por su no importa'),
            (6, 'David Cronenberg', 'Canadiense', '1943-03-15', 'David Paul Cronenberg es un director de cine y guionista canadiense.​ Junto a John Carpenter y Wes Craven, se le ha llegado a considerar dentro de un grupo denominado de \"las tres C\" del cine de horror contemporáneo.\r\nEs uno de los principales exponentes de lo que se ha denominado \"body horror\" el cual explora los miedos humanos ante la transformación física y la infección.​ Inaugura y abandera el concepto de la \"nueva carne\", eliminando las fronteras entre lo mecánico y lo orgánico.​ En sus películas usualmente se mezcla lo psicológico con lo físico y su obra se ha desarrollado desde los años 1960 hasta la actualidad.'),
            (7, 'John Carpenter', 'Estadounidense', '1948-01-16', 'John Howard Carpenter es un director de cine,​ guionista y compositor​ de bandas sonoras estadounidense.​ Es calificado, junto con David Cronenberg y Wes Craven,​ como uno de los realizadores del género de terror​ más importantes, especialmente en las décadas de 1970 y 1980.\r\nEn su filmografía se hallan películas que han obtenido grandes éxitos de taquilla como Halloween (1978), The Fog (La niebla) (1980) o Starman (1984). También ha dirigido influyentes títulos como Escape from New York (1997: Rescate en Nueva York) (1981),​ The Thing (La Cosa) (1982), Big Trouble in Little China (Golpe en la pequeña China) (1986) o They Live (Están vivos) (1987). A lo largo de su trayectoria ha obtenido 22 premios, incluyendo los Saturn o los del Festival de Cannes y Sitges, además de otras 20 nominaciones.'),
            (8, 'Damián Szifrón', 'Argentino', '1975-07-09', 'Damián David Szifron (Ramos Mejía; 9 de julio de 1975) es un director y guionista argentino de cine y televisión, creador de la serie Los simuladores (2002-2004). Ha dirigido los largometrajes El fondo del mar (2003), Tiempo de valientes (2005) y Relatos salvajes (2014), película que se transformó en una de las de mayor éxito de Argentina en los últimos tiempos y fue candidata a numerosos premios, incluyendo al Óscar a la mejor película internacional y a la Palma de Oro en el Festival Internacional de Cine de Cannes.'),
            (9, 'Juan José Campanella', 'Argentino', '1959-07-19', 'Juan José Campanella (Buenos Aires) es un director, guionista y productor de cine y televisión argentino. Una de las películas que dirigió, El secreto de sus ojos, ganó el premio Óscar como Mejor película de habla no inglesa en 2010.');

            -- --------------------------------------------------------

            --
            -- Estructura de tabla para la tabla `peliculas`
            --

            CREATE TABLE `peliculas` (
            `id` int(11) NOT NULL,
            `titulo` varchar(45) NOT NULL,
            `id_director` int(11) NOT NULL,
            `genero` varchar(45) NOT NULL,
            `year` year(4) NOT NULL,
            `sinopsis` varchar(255) NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

            --
            -- Volcado de datos para la tabla `peliculas`
            --

            INSERT INTO `peliculas` (`id`, `titulo`, `id_director`, `genero`, `year`, `sinopsis`) VALUES
            (3, 'Fight Club', 1, 'Drama', '1999', 'Edward Norton se vuelve loco loco loco loco'),
            (4, 'Pulp Fiction', 3, 'Accion', '1994', 'Falopa'),
            (6, 'Reservoir Dogs', 3, 'Accion', '1992', 'Se mueren todos'),
            (8, 'The Grand Budapest Hotel', 4, 'Drama', '2014', 'Voldemort maneja un hotel'),
            (9, 'Isle of Dogs', 4, 'Drama', '2018', 'Perritos perdidos stopmotion'),
            (10, 'Taxi Driver', 2, 'Drama', '1976', 'De Niro deja la mafia y se vuelve loco'),
            (11, 'Shutter Island', 2, 'Drama', '2010', 'DiCaprio se vuelve loco '),
            (12, 'Eraserhead', 5, 'Horror', '1977', 'Cosas raras'),
            (19, 'Zodiac', 1, 'Crimen', '2007', 'asesino serial nunca es encontrado y deja pistas raras con unos simbolos raros (caso real)'),
            (20, 'Se7en', 1, 'Crimen', '1995', 'asesino serial ataca y deja pistas en base a los siete pecados capitales'),
            (21, 'The Social Network', 1, 'Drama', '2010', 'origen de facebook'),
            (22, 'Goodfellas', 2, 'Crimen', '1990', 'buenos muchachos'),
            (23, 'The Wolf of Wall Street', 2, 'Comedia', '2013', 'di caprio millonario mucha joda'),
            (24, 'Killers of the Flower Moon', 2, 'Historica', '2023', 'de niro y dicaprio estafan a una familia de i');

            -- --------------------------------------------------------

            --
            -- Estructura de tabla para la tabla `usuarios`
            --

            CREATE TABLE `usuarios` (
            `id` int(11) NOT NULL,
            `username` varchar(45) NOT NULL,
            `password` varchar(255) NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

            --
            -- Volcado de datos para la tabla `usuarios`
            --

            INSERT INTO `usuarios` (`id`, `username`, `password`) VALUES
            (6, 'ro', '$2y$10$ gyCP3D0nNLmv7hkC2KekCOn7i8Wh8X5joWGyVJ8qmydC/wgz6SAhS'),
            (7, 'webadmin', '$2y$10$ NQ9kevGQWUFDGvqE6ix3kucKrq3ewITihd/79jTLx9dTmt.4/ZNJW'),
            (8, 'juani', '$2y$10$ UzPlsYAmJBWeOWqgd9IbTe4mskPgNx.C7IwU0N9pzPpQ99DucCPHi');

            --
            -- Índices para tablas volcadas
            --

            --
            -- Indices de la tabla `calificacion`
            --
            ALTER TABLE `calificacion`
            ADD PRIMARY KEY (`id`),
            ADD KEY `fk_calificacion_usuario` (`id_usuario`),
            ADD KEY `fk_calificacion_pelis` (`id_pelis`);

            --
            -- Indices de la tabla `director`
            --
            ALTER TABLE `director`
            ADD PRIMARY KEY (`id`);

            --
            -- Indices de la tabla `peliculas`
            --
            ALTER TABLE `peliculas`
            ADD PRIMARY KEY (`id`),
            ADD KEY `fk_pelis_director` (`id_director`);

            --
            -- Indices de la tabla `usuarios`
            --
            ALTER TABLE `usuarios`
            ADD PRIMARY KEY (`id`);

            --
            -- AUTO_INCREMENT de las tablas volcadas
            --

            --
            -- AUTO_INCREMENT de la tabla `calificacion`
            --
            ALTER TABLE `calificacion`
            MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

            --
            -- AUTO_INCREMENT de la tabla `director`
            --
            ALTER TABLE `director`
            MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

            --
            -- AUTO_INCREMENT de la tabla `peliculas`
            --
            ALTER TABLE `peliculas`
            MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

            --
            -- AUTO_INCREMENT de la tabla `usuarios`
            --
            ALTER TABLE `usuarios`
            MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

            --
            -- Restricciones para tablas volcadas
            --

            --
            -- Filtros para la tabla `calificacion`
            --
            ALTER TABLE `calificacion`
            ADD CONSTRAINT `fk_calificacion_pelis` FOREIGN KEY (`id_pelis`) REFERENCES `peliculas` (`id`),
            ADD CONSTRAINT `fk_calificacion_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

            --
            -- Filtros para la tabla `peliculas`
            --
            ALTER TABLE `peliculas`
            ADD CONSTRAINT `fk_pelis_director` FOREIGN KEY (`id_director`) REFERENCES `director` (`id`);
            COMMIT;
            END;
            $this->db->query($sql);
        }
    }
}