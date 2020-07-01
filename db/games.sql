-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-06-2020 a las 09:49:32
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `games`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'accion'),
(2, 'terror'),
(3, 'aventura'),
(4, 'estrategia'),
(5, 'rol/rpg'),
(6, 'simulacion'),
(7, 'conduccion'),
(8, 'lucha'),
(123, 'prueba');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `commentary`
--

CREATE TABLE `commentary` (
  `id` int(11) NOT NULL,
  `id_game` int(11) NOT NULL,
  `user` varchar(80) NOT NULL,
  `comentario` varchar(500) NOT NULL,
  `fecha` date NOT NULL,
  `calificacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `commentary`
--

INSERT INTO `commentary` (`id`, `id_game`, `user`, `comentario`, `fecha`, `calificacion`) VALUES
(5, 57, 'admin', 'juegaso', '0000-00-00', 8),
(6, 57, 'admin', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '0000-00-00', 19),
(23, 63, 'tudai', 'sdasdasda', '0000-00-00', 4),
(24, 63, 'tudai', 'me parece un juego agradable', '0000-00-00', 5),
(25, 63, 'tudai', 'este juego es una cagada ', '0000-00-00', 1),
(26, 63, 'tudai', 'Is this the real life? Is this just fantasy? Caught in a landslide No escape from reality Open your eyes Look up to the skies and see I\'m just a poor boy I need no sympathy Because I\'m easy come, easy go Little high, little low Anyway the wind blows doesn\'t really matter to me, to me', '0000-00-00', 5),
(27, 61, 'tudai', 'Mama, just killed a man Put a gun against his head pulled my trigger, now he\'s dead', '0000-00-00', 5),
(87, 59, 'gabriel', 'hola', '0000-00-00', 3),
(88, 59, 'gabriel', 'sin comentarios la verdad estoy probando que tal es', '0000-00-00', 5),
(89, 59, 'gabriel', 'dcdscscsd', '0000-00-00', 2),
(103, 56, 'tudai', 'easddfsddfsdfsdfsd', '0000-00-00', 4),
(107, 56, 'tudai', 'gdfgdfgd', '0000-00-00', 4),
(115, 64, 'tudai', 'asdfas', '0000-00-00', 2),
(142, 58, 'gabriel', 'vhvhbhjn', '0000-00-00', 7),
(143, 58, 'gabriel', 'asdasd', '0000-00-00', 3),
(144, 58, 'gabriel', 'sdsa', '0000-00-00', 0),
(145, 58, 'gabriel', 'sadddddddddda', '0000-00-00', 3),
(166, 56, 'tudai', '32423', '2020-06-26', 3),
(167, 61, 'lucila', 'la verdad me parece una cagada el juego', '2020-06-26', 4),
(168, 61, 'lucila', 'se puede comentar', '2020-06-26', 5),
(172, 71, 'gabriel', 'sadasdas', '2020-06-26', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `game`
--

CREATE TABLE `game` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `detail` text DEFAULT NULL,
  `id_category` int(11) NOT NULL,
  `image` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `game`
--

INSERT INTO `game` (`id`, `name`, `detail`, `id_category`, `image`) VALUES
(55, 'watch dogs 2', 'Watch Dogs 2 es un muy popular videojuego de acción y mundo abierto secuela del primer Watch Dogs. El juego combina Sigilo y disparos en tercera persona estando ambientado en la ciudad de San Francisco. El jugador toma el papel de Marcus Holloway, un hacker que se une al grupo hacktivista para descubrir y revelar al público los manejos del Sistema Operativo «ctOS» e investigar como las empresas y el estado utilizan la información recolectada para controlar a la población. Explora un mundo abierto y dinámico, lleno de posibilidades. Hackea todos los dispositivos conectados y hazte con el control de la infraestructura de la ciudad. Desarrolla habilidades según tu estilo de juego y mejora tus herramientas de hacker.', 1, 'img/portada/5edc25c3834a1.jpg'),
(56, 'halo', 'Halo The Master Chief Collection Después de varios años por fin llega la saga más emblemática de HALO a PC, la Master Chief Collection, una serie que cambió la forma de jugar en consola. Seis juegos increíbles en una experiencia épica con lanzamientos periódicos y cada juego disponible de forma individual. esta colección Incluye Halo: Reach, Halo: Combat Evolved Anniversary, Halo 2: Anniversary, Halo 3, la campaña de Halo 3: ODST y Halo 4. Totalmente optimizada para PC compatible con teclado y ratón, características nativas para PC y hasta 4K UHD y HDR. Cada juego incluirá nuevos mapas multijugador, modos y tipos de juego, lo que creará una nueva experiencia multijugador que irá creciendo con el tiempo', 1, 'img/portada/5edc26106d909.jpg'),
(57, 'metro exodus', 'Metro Exodus es un nuevo videojuego de acción y disparos en primera persona del genero survival horror post apocalíptico. además de contener elementos de exploración y sigilo. Es el tercer juego de la saga Metro. Nuevamente, el jugador toma el control de Artyom, un explorador del ejército ruso. En el papel de este explorador podremos buscar recursos para modificar y mejorar nuestras armas, teniendo que hacerle frente a bestias mutantes y humanos hostiles en diferentes condiciones climáticas. El juego también cuenta con un ciclo de día y noche. aun que el juego cuenta con mucha libertad para explorar similar a titulos de mundo abierto seguirá teniendo un estilo lineal similar al de los dos juegos anteriores.​ Al igual que su predecesor, Metro: Last Light, el jugador deberá tomar decisiones importantes para salvar a sus compañeros y amigos, teniendo como resultado múltiples finales.', 1, 'img/portada/5edc26f001fe8.jpg'),
(58, 'state of decay 2', 'State Of Decay 2 es un videojuego de acción y supervivencia en tercera persona exclusivo del sistema operativo windows 10 y xbox one. el juego se ambienta en un entorno de mundo abierto infestado por zombis y presenta un modo de juego en solitario y cooperativo con hasta 4 jugadores. Construye tu base, desarrolla tus personajes y gestiona los recursos a tu alrededor para sobrevivir como grupo en este mundo zombi postapocalíptico. Desarrolla las habilidades de cada superviviente para mejorar su capacidad y fortalecer tu grupo. En el apocalipsis zombi, debes crear tu propio código de moral. Cada decisión tiene consecuencias que debes afrontar. Cómo decidas sobrevivir puede que te sorprenda.\r\n\r\n', 1, 'img/portada/5edc273089841.jpg'),
(59, 'world war z', 'World War Z es un videojuego de acción y disparos en tercera persona que se basa en la supervivencia durante un apocalipsis zombi. Tu objetivo es sobrevivir a las hordas de zombis que azotan el mundo y además acabar con todos los que puedas. El juego está inspirado pero no basado en la película y novela del mismo nombre de la empresa Paramount. El juego es cooperativo y es posible jugarlo hasta de 4 jugadores. El juego tiene lugar en diferentes lugares del planeta como Nueva York, Moscú o Jerusalén.', 1, 'img/portada/5edc27d41a0d2.jpg'),
(60, 'call of duty wwii', 'Call of Duty vuelve a sus raíces con Call of Duty: WWII, una experiencia que redefine la Segunda Guerra Mundial para toda una nueva generación de jugadores. Desembarca en Normandía el Día D y combate por toda Europa en algunos de los escenarios más emblemáticos de la guerra más conocida de la historia. Vive el combate clásico de Call of Duty, los lazos de camaradería y la naturaleza imperdonable de la guerra contra una potencia global que sume al mundo en la tiranía. Call of Duty: WWII acerca la experiencia definitiva de la Segunda Guerra Mundial a la nueva generación con tres modos de juego diferentes: campaña, multijugador y cooperativo. La campaña y sus espectaculares gráficos trasladan a los jugadores al teatro europeo para sumergirse en una nueva historia de Call of Duty ambientada en las icónicas batallas de la Segunda Guerra Mundial.', 1, 'img/portada/5edc282d9aeeb.jpg'),
(61, ' grand theft auto 5', 'Grand Theft Auto: V es una especie de secuela del cláisco GTA: San Andreas. Regresarás a la mítica ciudad de Los Santos para embarcarte en una aventura con tres protagonistas: Franklin, Michael y Trevor. Franklin es un gánster del gueto, Michael es un atracador de bancos y Trevor es un psicópata de la América Profunda. Grand Theft Auto V o GTA 5 es un videojuego de acción y aventura de mundo abierto (sandbox) desarrollado por Rockstar North y distribuido por Rockstar Games. Este ultimo quiso cambiar la jugabilidad de GTA V en comparación a las anteriores entregas. En esta ocasión la compañía combinó los movimientos fluidos del juego Red Dead Redemption, como por ejemplo correr o cubrirse, y los efectos del juego Max Payne 3 como el bullet time, para esa sensación de primera persona en un juego de tercera persona.', 1, 'img/portada/5edc289de12e5.jpg'),
(62, 'sniper 3', 'Sniper: Ghost Warrior 3 es un videojuego FPS de acción y tercer videojuego de la serie Sniper Ghost Warrior. Los jugadores toman el papel de un francotirador estadounidense en una misión en Georgia, cerca de la frontera rusa. Las misiones se pueden completar de diferentes formas a lo largo de un grandioso mundo abierto. Ataca a tus enemigos desde lejos. Ten en cuenta la elevación de la mira, la velocidad y la dirección del viento, el control de la respiración y la postura, junto con la elección del arma y la munición. Sistema inteligente de sigilo incluye el reconocimiento con dron. Gran variedad de armas avanzadas y modifícalas según las necesidades de la misión y tu estilo personal.', 1, 'img/portada/5edc28f38cf96.jpg'),
(63, 'assassin’s creed odyssey', 'Assassin’s Creed Odyssey es la nueva entrega de la tan popular saga de videojuegos Assassin’s Creed. Embárcate en una odisea para descubrir los secretos del pasado y cambiar el destino de la antigua Grecia. Recorre islas volcánicas, frondosos bosques y ciudades bulliciosas en un viaje de exploración y encuentros en un mundo ya en guerra forjado por Dioses y hombres. Tus decisiones influirán en el devenir de tu odisea. Tu juego puede tener distintos finales gracias al nuevo sistema de diálogos y a las decisiones que tomes. Personaliza tu equipo, el barco y tus habilidades especiales para convertirte en leyenda. Demuestra tus habilidades de lucha en batallas a gran escala entre Atenas y Esparta con cientos de soldados. Embiste y ábrete paso a través de flotas enteras en las batallas navales del mar Egeo. La función de vision extendida te ofrece una perspectiva más amplia. La iluminación dinámica y los efectos de luz solar te sumergen en las arenosas dunas dependiendo de cuál sea tu objetivo.\r\n\r\n', 1, 'img/portada/5edc296fb9059.jpg'),
(64, ' doom', 'Doom 2016 es un videojuego del genero FPS (shooter en primera persona) y cuarto titulo de la saga Doom. En esta entrega los jugadores toman el papel de un marine espacial desconocido mientras pelea contra las fuerzas demoníacas del infierno que han sido liberadas por la Unión Aerospace Corporation en Marte, ahora colonizado. La jugabilidad vuelve a un ritmo más rápido con más niveles abiertos, más cerca de los primeros 2 juegos que el enfoque más lento de terror de supervivencia de Doom 3. También cuenta con recorrido de entorno, mejoras de personaje y la capacidad de realizar ejecuciones conocidas como «muertes gloriosas». El juego también es compatible con un componente multijugador en línea y un editor de niveles conocido como «SnapMap».', 1, 'img/portada/5edc2a1d64384.jpg'),
(68, 'aaaa', 'sadadasdas', 1, 'img/portada/5ef59a0d1d5f6.jpg'),
(70, 'asdasdas', 'asdasdasd', 123, 'img/portada/5ef5988b0ee5a.jpg'),
(71, 'prueba', 'zxcxzczxczxc', 123, 'img/portada/5ef5a61db2376.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registry`
--

CREATE TABLE `registry` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `priority` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `registry`
--

INSERT INTO `registry` (`id`, `username`, `email`, `password`, `priority`) VALUES
(8, 'gabriel', 'gabrielmatiasquattrini@gmail.com', '$2y$10$xXs3P1WiE7V03V1tK/r3..BtthlgtJTZkptTmEgFFUQafv8gt3VoK', 1),
(24, 'admin', '366@fff', '$2y$10$BYnJqDGPnDYRnKOE0pHkzu9Sk/f//dlZDEnBeO3.d9ZE2r4hRfjU2', 0),
(25, '1234', '1234@1234', '$2y$10$/3zSAPikdJlVxsjIbCmP1eBtztHS776ZwDav.VZrbU4ndYSLO/aTi', 0),
(26, 'tudai', 'tudai@gmail', '$2y$10$.cpYb3FSYzzGSsd4XRh/XegL2jxKIRpoxd/T7FdAXsbAk/kV2PERK', 0),
(27, 'tudai2', 'tudai2@gmail', '$2y$10$LKMavs54RdXh0IMEOfnapezlxV61qhvAoICBpFTSXy./S8KRA9TMS', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `commentary`
--
ALTER TABLE `commentary`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_game` (`id_game`);

--
-- Indices de la tabla `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tablas` (`id_category`);

--
-- Indices de la tabla `registry`
--
ALTER TABLE `registry`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT de la tabla `commentary`
--
ALTER TABLE `commentary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;

--
-- AUTO_INCREMENT de la tabla `game`
--
ALTER TABLE `game`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT de la tabla `registry`
--
ALTER TABLE `registry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `commentary`
--
ALTER TABLE `commentary`
  ADD CONSTRAINT `commentary_ibfk_1` FOREIGN KEY (`id_game`) REFERENCES `game` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `game`
--
ALTER TABLE `game`
  ADD CONSTRAINT `tablas` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
