-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-07-2020 a las 04:04:04
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Estructura de tabla para la tabla `capturas`
--

CREATE TABLE `capturas` (
  `id` int(11) NOT NULL,
  `id_game_fk` int(11) NOT NULL,
  `captura` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `capturas`
--

INSERT INTO `capturas` (`id`, `id_game_fk`, `captura`) VALUES
(17, 85, 'img/capturas/5f090f9fc3e84.jpg'),
(18, 85, 'img/capturas/5f090f9fc9a72.jpg'),
(19, 85, 'img/capturas/5f090f9fca7ca.jpg'),
(20, 85, 'img/capturas/5f090f9fcace8.jpg'),
(21, 86, 'img/capturas/5f09103fc7743.jpg'),
(22, 86, 'img/capturas/5f09103fc828d.jpg'),
(23, 86, 'img/capturas/5f09103fc8a87.jpg'),
(24, 86, 'img/capturas/5f09103fc9d04.jpg'),
(25, 87, 'img/capturas/5f09124605a5e.jpg'),
(26, 87, 'img/capturas/5f09124606b88.jpg'),
(27, 87, 'img/capturas/5f091246078de.jpg'),
(28, 88, 'img/capturas/5f0912e91a7b0.jpg'),
(29, 88, 'img/capturas/5f0912e91ad1c.jpg'),
(30, 88, 'img/capturas/5f0912e91b1f4.jpg'),
(31, 89, 'img/capturas/5f091373aa4d0.jpg'),
(32, 89, 'img/capturas/5f091373aab63.jpg'),
(33, 89, 'img/capturas/5f091373aafd7.jpg'),
(34, 90, 'img/capturas/5f09140d64856.jpg'),
(35, 90, 'img/capturas/5f09140d64dc1.jpg'),
(36, 90, 'img/capturas/5f09140d65237.jpg'),
(37, 91, 'img/capturas/5f0914b834694.jpg'),
(38, 91, 'img/capturas/5f0914b834cd2.jpg'),
(39, 91, 'img/capturas/5f0914b8351a8.jpg'),
(40, 92, 'img/capturas/5f09158ec9b4e.jpg'),
(41, 92, 'img/capturas/5f09158ecbaab.jpg'),
(42, 92, 'img/capturas/5f09158ecc393.jpg'),
(43, 93, 'img/capturas/5f09163935678.jpg'),
(44, 93, 'img/capturas/5f09163935cb3.jpg'),
(45, 93, 'img/capturas/5f091639361e9.jpg'),
(46, 94, 'img/capturas/5f0916da68808.jpg'),
(47, 94, 'img/capturas/5f0916da68d76.jpg'),
(48, 94, 'img/capturas/5f0916da691e6.jpg'),
(49, 95, 'img/capturas/5f09178609a6d.jpg'),
(50, 95, 'img/capturas/5f0917860a116.jpg'),
(51, 95, 'img/capturas/5f0917860a734.jpg'),
(52, 96, 'img/capturas/5f091824aa52b.jpg'),
(53, 96, 'img/capturas/5f091824aad18.jpg'),
(54, 96, 'img/capturas/5f091824ab1dc.jpg'),
(55, 97, 'img/capturas/5f09189ba5aa8.jpg'),
(56, 97, 'img/capturas/5f09189ba61f9.jpg'),
(57, 97, 'img/capturas/5f09189ba73de.jpg'),
(58, 98, 'img/capturas/5f09192c2374a.jpg'),
(59, 98, 'img/capturas/5f09192c23d09.jpg'),
(60, 98, 'img/capturas/5f09192c2486e.jpg'),
(61, 99, 'img/capturas/5f091a352077e.jpg'),
(62, 99, 'img/capturas/5f091a3520eb8.jpg'),
(63, 99, 'img/capturas/5f091a35213df.jpg');

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
  `calificacion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(85, 'fallout 4 ', 'allout 4 es un videojuego de acción con toques de rol en un mundo abierto post apocalíptico, es la 4ta entrega de la saga de videojuegos Fallout de Bethesda Game Studios, Creadores también del galardonado The Elder Scrolls V: Skyrim. Eres el único superviviente del Refugio 111 en un mundo desolado y destruido por la guerra nuclear. En tus manos estarán todas las decisiones. Solo tú puedes reconstruir el lo que queda y decidir su futuro. Podrás Hacer lo que quieras en un gigantesco mundo abierto con cientos de ubicaciones, personajes y misiones. Únete a diversas facciones que ansían hacerse con el poder o vete por tu cuenta', 1, 'img/portada/5f090f8d34cf9.jpg'),
(86, 'f.e.a.r. 2: project origin', 'F.E.A.R. 2: Project Origin es el nombre de la secuela del videojuego F.E.A.R., desarrollado por Monolith Productions, para Xbox 360, PlayStation 3 y PC. La historia comienza 30 minutos antes de que finalizara la primera entrega y se centra en Michael Becket, que forma parte de un comando Delta Force enviado a capturar a Genevieve Aristide, ejecutiva de Armacham, para interrogarla ya que fue la responsable de, en la primera entrega, reabrir la cámara donde estaba Alma que fue lo que desató el caos en la ciudad. Una vez allí sufren los efectos de la explosión que afecta la ciudad (originada por Pointman en el final del primer juego) y los integrantes del comando Delta quedan inconscientes. En ATC ha tomado el poder la junta directiva y ha ordenado destruir todas las instalaciones y liquidar a cualquier sobreviviente para dejar así sin pruebas de lo sucedido. Luego de la explosión y quedar inconsciente, Becket despierta en un hospital de Armachan donde Genevieve planea experimentar con el sujeto para aumentar sus poderes psíquicos, como parte del Proyecto Harbinger, objetivo que logra luego de enfrentar a la gente de Armachan que planea destruir el lugar.', 2, 'img/portada/5f09102785d49.jpg'),
(87, ' tomb raider', 'Tomb Raider 2013 es un videojuego de acción-aventura y plataformas desarrollado por Crystal Dynamics. Es el noveno título de la serie Tomb Raider y el quinto título desarrollado por Crystal Dynamics. El juego relata los intensos y conflictivos orígenes de Lara Croft y su transformación de joven asustadiza a endurecida superviviente. Al principio de la historia Lara muestra miedo ante el peligro, pues carece de confianza en sus propias capacidades y juicio. Aun así, ya vemos gérmenes de lo que será la futura Lara. El juego transcurre en Yamatai, una isla del Triángulo del Dragón en la costa de Japón. La isla y el reino que una vez existió ahí está rodeada de misterio, debido a las tormentas y corrientes marítimas que la rodean. Yamatai fue gobernada por la Reina del Sol, llamada Himiko, quien acorde a la leyenda, tenía poderes místicos que la permitían controlar el tiempo atmosférico. El jugador toma el rol de Lara Croft, una joven y ambiciosa arqueóloga cuyas teorías acerca del reino perdido de Yamatai convencieron a los descendientes de Nishimura que eran parientes de la gente de Yamatai, así que organiza una expedición para buscar el reino.', 3, 'img/portada/5f09122ed044f.jpg'),
(88, 'blasphemous', 'Blasphemous es un videojuego muy esperado por los amantes del genero metroidvania. En este videojuego de acción con gráficos pixel detallados de gran calidad explorarás un mundo terrible con una religión retorcida y descubrirás los secretos que aguardan. Realiza increíbles combos y ejecuciones brutales para castigar a las hordas de monstruos deformes y jefes titánicos dispuestos a exterminarte. Encuentra y equípate reliquias, cuentas de rosario y plegarias que te darán los poderes fervorosos para ayudarte a acabar con tu maldición.', 1, 'img/portada/5f0912d96f946.jpg'),
(89, 'age of empires: definitive edi', 'Age Of Empires: Definitive Edition es una gran remasterización del clásico Age of Empire desarrollado por Microsoft Games. Una revisión que llega tras el 20 aniversario del lanzamiento original. Uno de los primeros videojuegos de estrategia para PC que definió el género vuelve con soporte 4K y adaptado a los nuevos tiempos. En Age of Empires: Definitive Edition tomamos las riendas de las grandes civilizaciones clásicas: egipcios, babilonios, fenicios, persas, griegos, romanos o cartagineses entre otros. Gestiona los recursos, construye edificios y luego crea un ejército para vencer a las otras civilizaciones. Disfruta de las diversas campañas para un jugador o mide tu destreza con otros jugadores en el modo multijugador. Una oportunidad para demostrar el poder de nuestra civilización.', 4, 'img/portada/5f09133027461.jpg'),
(90, 'resident evil 5', 'Resident Evil 5 (abreviado comúnmente como RE5) conocido en Japón como Biohazard 5. Es un videojuego de acción-aventura del estilo survival horror desarrollado por Capcom y distribuido por la misma en colaboración con THQ Asia Pacific. La historia del juego sigue a Chris Redfield, uno de los supervivientes del desastre de la mansión Spencer. Éste es enviado junto con Sheva Alomar a investigar una amenaza terrorista en Kijuju, un pueblo ficticio ubicado en el continente africano. Al llegar a dicho lugar, son atacados por sus habitantes que han sido infectados por una extraña especie de virus que los vuelve violentos. Al igual que otros títulos de la serie, el videojuego es de acción-aventura del estilo survival horror. Siguiendo los pasos de su antecesor, incluye inmensos y dinámicos escenarios debido a que la trama se basa en una aldea africana. El sistema de juego es similar a Resident Evil 4, con la diferencia de que se ha añadido un personaje que acompaña al protagonista en toda la historia. Esto puede favorecer o perjudicar en ciertos aspectos al jugador, siendo uno de los beneficios la ayuda que brinda Sheva en ciertas ocasiones, mientras que uno de sus contras es el racionamiento de la munición para ambos personajes. Por otro lado, incluye una gran variedad de contenido desbloqueable como minijuegos, trajes secretos, armas infinitas, texturas para los escenarios y otros extras disponibles.', 2, 'img/portada/5f0913c0193a4.jpg'),
(91, 'ark: survival evolved', 'ARK: Survival Evolved es un increíble videojuego que mezcla varios géneros como la acción, el rol, el mundo abierto, crafting y la supervivencia y que se a hecho muy popular en estos últimos años. Puedes jugar como un personaje femenino o masculino que llega a un mundo prehistórico en una isla misteriosa. Al principio estaremos desnudos y con hambre, para sobrevivir tendremos que cazar, cultivar, crear objetos, y construir refugios para protegernos de los peligrosos dinosaurios y criaturas que habitan la isla. Lo mejor es que podremos, criar, domesticar y cabalgar dinosaurios y otras criaturas primitivas.', 5, 'img/portada/5f0914aa76c5b.jpg'),
(92, 'grand theft auto: v', 'Grand Theft Auto: V es una especie de secuela del cláisco GTA: San Andreas. Regresarás a la mítica ciudad de Los Santos para embarcarte en una aventura con tres protagonistas: Franklin, Michael y Trevor. Franklin es un gánster del gueto, Michael es un atracador de bancos y Trevor es un psicópata de la América Profunda. Grand Theft Auto V o GTA 5 es un videojuego de acción y aventura de mundo abierto (sandbox) desarrollado por Rockstar North y distribuido por Rockstar Games. Este ultimo quiso cambiar la jugabilidad de GTA V en comparación a las anteriores entregas. En esta ocasión la compañía combinó los movimientos fluidos del juego Red Dead Redemption, como por ejemplo correr o cubrirse, y los efectos del juego Max Payne 3 como el bullet time, para esa sensación de primera persona en un juego de tercera persona', 5, 'img/portada/5f09156f5a685.jpg'),
(93, 'tropico 6', 'Tropico 6 es la ultima entrega de la saga tropico, nuevamente encarnaremos «al presidente» el cual tendremos la libertad de volvernos un dictador o un gobernante honesto. Elige el futuro de tu nación durante cuatro eras diferentes. Por primera vez en la saga, podremos jugar en archipiélagos enormes. Gobernar varias islas al mismo tiempo y enfrentarnos a nuevos desafíos. Envía a tus hombres a tierras extranjeras para hurtar las maravillas del mundo y otros monumentos para agregarlos a tu colección en tu bello país. construye puentes, túneles y transporta a tus ciudadanos y turistas en taxis, autobuses y teleféricos. Tropico 6 ofrece medios de transporte e infraestructuras totalmente nuevas.', 6, 'img/portada/5f0915d20d985.jpg'),
(94, ' one punch man', 'One Punch Man: A Hero Nobody Knows es un videojuego de lucha basado en el Anime/Manga «One Punch Man» en el cual podrás elegir a tu personaje favorito de la serie o crear uno propio gracias al «creador de heroes». Crea tu propio avatar de y elige tu propio conjunto de habilidades y poderes.', 8, 'img/portada/5f09169490352.jpg'),
(95, 'snowrunner a mudrunner', 'SnowRunner: A MudRunner Game es un videojuego de simulación y conducción de camiones de carga sobre un terreno montañoso nevado. Conduce vehículos potentes de marcas como Ford y Chevrolet, mientras conquistas entornos abiertos extremos de terreno más avanzado de la historia. Supere el lodo, las aguas torrenciales, la nieve y los lagos congelados mientras asume peligrosos contratos y misiones. Expande y personaliza tu flota con muchas mejoras y accesorios, incluido un tubo de escape para aguas pesadas o llantas de cadena para combatir la nieve. Viaja solo o juega con otros jugadores en el modo cooperativo para 4 jugadores y amplía tu experiencia con mods creados por la comunidad. 40 vehículos únicos para desbloquear, actualizar y personalizar. Completa docenas de misiones desafiantes en un mundo interconectado.', 7, 'img/portada/5f091772c4b3a.jpg'),
(96, 'state of decay 2: juggernaut', 'State Of Decay 2 es un videojuego de acción y supervivencia en tercera persona exclusivo del sistema operativo windows 10 y xbox one. el juego se ambienta en un entorno de mundo abierto infestado por zombis y presenta un modo de juego en solitario y cooperativo con hasta 4 jugadores. Construye tu base, desarrolla tus personajes y gestiona los recursos a tu alrededor para sobrevivir como grupo en este mundo zombi postapocalíptico. Desarrolla las habilidades de cada superviviente para mejorar su capacidad y fortalecer tu grupo. En el apocalipsis zombi, debes crear tu propio código de moral. Cada decisión tiene consecuencias que debes afrontar. Cómo decidas sobrevivir puede que te sorprenda.', 1, 'img/portada/5f091812e7282.jpg'),
(97, ' mafia ii', 'Mafia II Definitive Edition es una remasterización del segundo videojuego de la saga Mafia. El juego cuenta con mejora de texturas. Juega como un mafioso en una Empire Bay, Nueva York de los Años 40 y 50. Date la gran vida de gánster en una edad de oro en donde el crimen organizado tiene el control. El jugador toma el papel de Vito Scaletta un sujeto que se une a la mafia para pagar las deudas de su padre. Junto a su colega Joe, intentará ascender en la familia por medio de crímenes de recompensas.', 1, 'img/portada/5f09188c974a1.jpg'),
(98, 'blair witch ', 'Blair Witch es un videojuego del genero de Terror y Supervivencia ambientado en el universo cinematográfico de La Bruja de Blair que te mantendrá con los nervios de punta y sacará a flote tus reacciones al miedo y al estrés. La trama del juego transcurre durante el año 1996. Un niño ha desaparecido en el bosque de Black Hills, a las afueras de Burkitsville, Maryland. El jugador tomará el papel de Ellis el cual se ha unido a la búsqueda del niño, Ellis es un ex-agente de policía con un pasado turbio. Lo que empieza como una investigación policial normal, pronto se convertirá en una pesadilla sin fin a medida que te enfrentes a tus miedos y a la bruja de Blair, una misteriosa entidad que habita el bosque.', 2, 'img/portada/5f0919126ab72.jpg'),
(99, ' outward ', 'Outward es un videojuego del tipo Acción y RPG Cooperativo o en Solitario que se desarrolla en un basto mundo abierto. Un juego que ofrece profundos desafíos satisfactorios para los jugadores más exigentes. Como un aventurero, no solo tendrás que ocultarte o defenderte de peligrosas criaturas, ademas deberás desafiar las cambiantes condiciones del clima, asegurarte de que duermes lo necesario y mantente hidratado, no valla a ser que te contagies de una enfermedad infecciosa. Encaminate en arriesgadas expediciones a lo largo de tierras salvajes para llegar a nuevas ciudades, descubre mazmorras ocultas repletas de terribles enemigos.', 3, 'img/portada/5f091a170c9c7.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registry`
--

CREATE TABLE `registry` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `priority` int(11) NOT NULL,
  `token` varchar(25) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `registry`
--

INSERT INTO `registry` (`id`, `username`, `email`, `password`, `priority`, `token`, `date`) VALUES
(8, 'gabriel', 'gabrielmatiasquattrini@gmail.com', '$2y$10$jXToOoVKpQvIT2ynpJD4XeVnX8a5Pzw8tbOLy1X/eadpklm7cC6Ki', 1, 'WLfUN2iQqdr9AKsk', '2020-07-12'),
(31, 'gabriel', '2262314366@kk', '$2y$10$jXToOoVKpQvIT2ynpJD4XeVnX8a5Pzw8tbOLy1X/eadpklm7cC6Ki', 0, 'WLfUN2iQqdr9AKsk', NULL),
(33, 'FAUSTO', '1234@1234', '$2y$10$JNNoM/7jqqXBFN.wbvZYy.xNbc1nhI5lwUrMp0MtF2Mcw5O7y/WE6', 1, '0', NULL),
(35, 'admintudai', 'pure@conmilanesas', '$2y$10$HX4/KgWMcqGSzIaLMVgZGOPkGkNyNz5DyCI6eZbStW//LQHqy161q', 1, '', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `capturas`
--
ALTER TABLE `capturas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `capturas` (`id_game_fk`);

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
-- AUTO_INCREMENT de la tabla `capturas`
--
ALTER TABLE `capturas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT de la tabla `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT de la tabla `commentary`
--
ALTER TABLE `commentary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=210;

--
-- AUTO_INCREMENT de la tabla `game`
--
ALTER TABLE `game`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT de la tabla `registry`
--
ALTER TABLE `registry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `capturas`
--
ALTER TABLE `capturas`
  ADD CONSTRAINT `capturas` FOREIGN KEY (`id_game_fk`) REFERENCES `game` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
