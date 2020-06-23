-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-06-2020 a las 06:39:58
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
(117, 'prueba');

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `game`
--

CREATE TABLE `game` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `detail` text DEFAULT NULL,
  `id_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `game`
--

INSERT INTO `game` (`id`, `name`, `detail`, `id_category`) VALUES
(1, 'Amnesia: A Machine for Pigs', 'Amnesia: A Machine for Pigs\r\nDetalles:', 2),
(2, 'world war z ', 'World War Z es un videojuego de acción y disparos en tercera persona que se basa en la supervivencia durante un apocalipsis zombi. Tu objetivo es sobrevivir a las hordas de zombis que azotan el mundo y además acabar con todos los que puedas. El juego está inspirado pero no basado en la película y novela del mismo nombre de la empresa Paramount. El juego es cooperativo y es posible jugarlo hasta de 4 jugadores. El juego tiene lugar en diferentes lugares del planeta como Nueva York, Moscú o Jerusalén', 1),
(3, ' Mafia II ', 'Mafia II Definitive Edition es una remasterización del segundo videojuego de la saga Mafia. El juego cuenta con mejora de texturas. Juega como un mafioso en una Empire Bay, Nueva York de los Años 40 y 50. Date la gran vida de gánster en una edad de oro en donde el crimen organizado tiene el control. El jugador toma el papel de Vito Scaletta un sujeto que se une a la mafia para pagar las deudas de su padre. Junto a su colega Joe, intentará ascender en la familia por medio de crímenes de recompensas.', 1),
(4, 'Half-Life: Alyx ', 'Half-Life Alyx es el nuevo shooter de acción y aventura en primera persona de Valve, diseñado en esta ocasión para la realidad virtual. En esta entrega tomaremos el papel de Alyx Vance, la conocida hacker que descubrimos en la segunda entrega de la saga y que será la protagonista principal de esta entrega que tiene lugar, cronológicamente, justo antes de los sucesos ocurridos en Half-Life 2. De nuevo, viviremos luchas contra los Combine y demás en un terreno postapocalíptico. Es compatible con Valve Index, el nuevo headset de laempresa.', 1),
(5, 'Half-Life 2', 'Este título de PC es la secuela de la primera entrega de la saga Half Life. Este segundo juego destaca por su diseño y el reto que representa cada problema de la historia. Un shooter en primera persona que transcurre dos décadas después de la historia del primer Half Life. Gordon Freeman despierta de su estado de hibernación y se convierte en el símbolo de la resistencia humana frente a la Alianza. Acción en una aventura cuya historia profundiza mucho más allá del conflicto. ', 1),
(6, 'bioshock', 'La ciudad subacuática de Rapture fue construida en los años 40 como el sueño de un visionario. Una ciudad donde el hombre sería libre, y donde no habría ni dioses ni reyes: solo la ciencia y la libertad. Años después, un soldado americano llega a la ciudad para comprobar que algo ha ido mal. Los mutantes proliferan, los antaño gloriosos edificios de Art Decó están en ruinas, y la única autoridad parecen ser unos gigantescos hombres mecánicos armados con taladros que responden al nombre de Big Daddy. Versión PC.\r\n', 1),
(7, ' 	 Grand Theft Auto V', 'La quinta parte de Grand Theft Auto para PC vuelve a la costa oeste americana, ambientándose en la ciudad de Los Santos (Los Ángeles) y sus alrededores, con una historia ambientada en la actualidad, especialmente en las consecuencias de la crisis económica. Está protagonizada por Michael, Franklin y Trevor, tres criminales con diferentes habilidades, pudiendo cambiar de personaje en todo momento y vivir cada una de sus vidas, así como aprovechar sus habilidades en las misiones.', 1),
(8, 'Dark Souls III ', 'Tercera entrega de la saga Dark Souls para PC, Xbox One y PS4, que combina elementos de los juegos de aventura y acción y tercera persona, con tintes de rol para mejorar a nuestro personaje. El tercer capítulo de la serie de títulos de From Software será el primero en ser desarrollado íntegramente en consolas como Xbox One y PlayStation 4. En esta nueva entrega, visitaremos el oscuro y amplio reino de Lothric, aprenderemos nuevas habilidades vinculadas a las armas que empuñemos y combatiremos contra duras y ásperas criaturas, que en esta ocasión serán más peligrosas y rápidas que nunca.', 1),
(9, ' 	 Metal Gear Solid V: The Pha', 'Metal Gear Solid continúa en PC con una nueva entrega posterior a Metal Gear Solid: Peace Walker y anterior a los sucesos de los dos primeros Metal Gear y toda la subsaga Solid posterior. Big Boss, el \'padre\' de Solid Snake, se despierta nueve años después de los sucesos de Ground Zeroes y tendrá que acabar con sus enemigos en Afganistán y África, con un enorme mundo abierto a nuestros pies.', 1),
(10, 'Metro 2033 redux', 'Se trata de un recopilatorio para PC que contiene versiones remasterizadas de Metro 2033, lanzado originalmente en marzo de 2010 para PC y Xbox 360, y Metro: Last Light, que se lanzó hace un tres años después en PS3, X360 y PC. Una remasterización que en boca de sus responsables es la mejor que jamás se ha hecho, y que nos permite disfrutar de estos títulos con mejor calidad que nunca.', 1),
(11, 'Alien Isolation', 'Alien Isolation no sólo es un juego magnífico que ya deberías haber probado, el retorno  de los bichos de Giger (o mejor dicho, el bicho) poco tiene que ver con  los desvaríos de Prometheus y es una obra maestra que maneja la tensión y el miedo ante la muerte  de una forma tan bestial que conseguirá hacértelas pasar canutas durante  toda la noche.', 2),
(12, 'Amnesia: A Machine for Pigs', 'Hay algo que da más miedo que encontrarte con un peligro de frente, y  es saber que está constantemente acechándote y nunca aparece ante tus  ojos. Si hay algo que domina la saga Amnesia es esa sensación de terror orquestada a base de cambios de música, puertas que se cierran solas y silencios incómodos.', 1),
(13, 'Dead by Daylight', 'Lo malo de enfrentarte a juegos en los que el terror está apoyado por  un guión y una IA es que tarde o temprano acabarás cogiéndole el truco a  sus giros de miedo, pero si llevas toda esa idea hasta un multijugador la cosa cambia por completo. Aquí el susto vendrá de la mano de un  asesino controlado por ti u otro jugador, así que verlas venir no será  nunca una opción.', 2),
(14, 'Dead Space', ' juego mítico que abrazaba el terror de forma magistral era Dead Space. Después la saga se fue un poco por las ramas y centró su odisea más en la acción que en el terror psicológico, pero pese a ello sigue siendo una franquicia que siempre vale la pena recomendar. ', 2),
(15, 'Resident Evil 2 Remake', 'Resident Evil 2 BIOHAZARD RE:2 2019 es un videojuego de acción y terror además de ser una remasterización del juego original del año 1998, Resident Evil 2. Conocido como uno de los juegos más icónicos de todos los tiempos y amado por muchos fans de la saga. En esta entrega podrás jugar campañas individuales tanto para Leon como para Claire con una flamante vista en tercera persona mientras exploras los sitios infestados por muertos vivientes que azotan las calles de Raccoon City, ahora reconstruido increíblemente con el motor RE Engine de Capcom. Nuevos puzles, tramas y áreas para que tanto los fans nuevos como los más veteranos descubran terroríficas nuevas sorpresas.\r\n\r\n', 2),
(16, ' Blair Witch', 'Blair Witch es un videojuego del genero de Terror y Supervivencia ambientado en el universo cinematográfico de La Bruja de Blair que te mantendrá con los nervios de punta y sacará a flote tus reacciones al miedo y al estrés. La trama del juego transcurre durante el año 1996. Un niño ha desaparecido en el bosque de Black Hills, a las afueras de Burkitsville, Maryland. El jugador tomará el papel de Ellis el cual se ha unido a la búsqueda del niño, Ellis es un ex-agente de policía con un pasado turbio. Lo que empieza como una investigación policial normal, pronto se convertirá en una pesadilla sin fin a medida que te enfrentes a tus miedos y a la bruja de Blair, una misteriosa entidad que habita el bosque.', 2),
(17, ' SOMA', '\r\nSOMA es un videojuego de temática de terror y ciencia ficción hecho por los mismos creadores del juego Amnesia: The Dark Descent. Se trata de una historia sobre la conciencia, la identidad y lo que significa el ser un humano.\r\nEn este juego tu radio no funciona, la comida escasea y las máquinas han comenzado a creerse que son humanos. La instalación sumergida «PATHOS-II» ha sufrido un aislamiento terrible y se tendrán que tomar decisiones difíciles. Entra en el mundo de SOMA y enfréntate a los horrores sumergidos en las profundidades del océano. Explora entre terminales cerradas y documentos secretos para descubrir la verdad que se oculta tras el caos.', 2),
(18, ' Outlast 2 ', 'Outlast 2 es la secuela del videojuego de terror psicológico y survival descrito por muchos como uno de los juegos más terroríficos de los últimos tiempos. En este juego conocerás a Sullivan Knoth y sus seguidores, que dejaron atrás nuestro despiadado mundo para fundar el «Temple Gate», un pueblo alejado de la civilización. Knoth y su rebaño se preparan para las tribulaciones del fin de los tiempos y tú te encuentras en medio de todo. Eres Blake Langermann, un cámarografo que trabaja con su mujer, Lynn. Ambos periodistas de investigación dispuestos a correr riesgos y escarbar a fondo para sacar a la luz historias que nadie más quisiera investigar.', 2),
(19, 'The Long Dark', 'The Long Dark es un videojuego de supervivencia en un mundo abierto azotado por el frió. Este juego ofrece una experiencia de exploración y supervivencia que desafía a los jugadores a pensar por sí mismos en territorios fríos y salvajes tras las consecuencias de un desastre geomagnético. Aquí no hay zombis, solo tú, el frío y cualquier amenaza que la madre naturaleza pueda ponerte. El modo historia es por episodios de The Long Dark, WINTERMUTE, se estrena con dos de los cinco episodios que componen la primera temporada.', 3),
(20, ' Minecraft: Story Mode Episodi', '\r\nEl popular juego de crafting y exploración tridimensional, Minecraft, recibe un modo historia independiente y alternativo a cargo de Telltale Games, responsables de revitalizar el género narrativo cercano a la aventura gráfica. Minecraft: Story Mode será a una aventura episódica al estilo de otros juegos de Telltale Games, en el que nuestras decisiones tendrán impacto en el pixelado mundo del juego de Mojang. En esta serie de cinco partes episódica, se embarcará en una peligrosa aventura a través del supramundo, a través de la abisal, y más allá. Tú y tus amigos reverencian la Orden legendaria de la Piedra: Guerrero, Redstone Ingeniero, Griefer y Arquitecto; asesinos del Dragón Ender. Mientras que en EnderCon tiene la esperanza de conocer al guerrero Gabriel, usted y sus amigos descubren que algo está mal … algo terrible. El terror se desatara, y debes emprender una búsqueda para encontrar a la Orden de la piedra y asi salvar al mundo del olvido.', 3),
(21, 'Batman Arkham Origins', 'Batman: Arkham Origins es un videojuego de acción y aventura en tercera persona protagonizado por el popular super heroe de DC, Batman. Es el sucesor al videojuego de 2011 Batman: Arkham City y la tercera entrega de la serie Batman: Arkham. El juego cuenta con un énfasis en las habilidades de detective de Batman: Batman puede analizar una escena del crimen usando su visión de detective para resaltar los puntos de interés y los hologramas representan los escenarios teóricos del crimen que se produjo. Los crímenes se pueden revisar en el Batordenador en la Batcueva a voluntad, permitiendo que el jugador vea la escena desde diferentes ángulos, en cámara lenta o pausarlo mientras busca pistas para avanzar y resolver el crimen. Las escenas del crimen tanto pequeñas como grandes están repartidas en Gotham City. Arkham Origins ofrece misiones secundarias, incluyendo: «Delito en Progreso», donde Batman puede ayudar al Cuerpo de Policía de Gotham City (CPGC) para aumentar su reputación al cumplir tareas como el rescate de agentes de policía de una banda o prevenir que un informante sea lanzado a su muerte; «Más Buscados» permite a Batman perseguir villanos fuera de la historia principal, como Anarquía, que planta bombas alrededor de la ciudad.', 3),
(22, ' Life Is Strange: Before The S', 'Life Is Strange: Before The Storm es un videojuego de aventura narrativa que salió después del primer videojuego Life Is Strange pero ambientado 3 años antes, es decir actúa como precuela. El juego ha sido galardonada con un premio BAFTA. En este juego tomas el papel de Chloe Price, una adolescente rebelde que entabla una inesperada amistad con Rachel Amber, una chica guapa y popular destinada al éxito. Cuando Rachel descubre un secreto en su familia capaz de hacer que su mundo se desmorone, la nueva amistad que ha entablado con Chloe le da fuerzas para seguir adelante. Unidas tendrán que enfrentarse a sus problemas personales y encontrar una forma de superarlos. Aventura narrativa con elecciones y consecuencias. Diferentes finales dependiendo de las elecciones que tomes.', 3),
(23, ' Spider-Man: The Amazing', 'Spider-Man: The Amazing Collection es una compilación con los dos juegos de la saga The Amazing Spider-Man para PC con todo el contenido adicional desbloqueado, todo en una sola instalación. Los videojuego se ambientan en un mundo abierto en tercera persona, y son un tie-in de la película del mismo nombre. El primer juego se sitúa unos meses después de los eventos de la película. Mientras el segundo tiene lugar en el mismo universo que la película, pero existe en su propia continuidad.', 3),
(24, ' Splinter Cell 6: Blacklist ', 'Tom Clancy’s Splinter Cell: Blacklist es el sexto videojuego de la serie Splinter Cell el cual es un juego de acción, aventura y sigilo en tercera persona. En este titulo Sam Fisher y su amigo Victor Coste están a punto de partir de la Base Aérea Andersen en Guam, cuando una fuerza enemiga desconocida destruye toda la base. Cuando varios países están en desacuerdo con que EEUU tenga bases militares en un tercio del planeta por esta razón aparece un grupo terrorista autodenominado los Ingenieros y estos han lanzado un ultimátum al que llaman la Lista Negra, una serie de ataques en escala contra intereses del país norte americano. El agente Sam Fisher es el líder del recién formado 4th Echelon, una unidad clandestina que solo responde ante el presidente de Estados Unidos, y cuya misión será dar caza a los Ingenieros y detener la cuenta atrás de la Lista antes de que llegue a 0.', 3),
(25, ' The Forest', 'The Forest es un videojuego del género survival horror en primera persona desarrollado por la empresa Endnight Games. El juego es de tipo mundo abierto, donde no hay misiones y el único objetivo que tiene el jugador es sobrevivir y rescatar a su hijo desaparecido, después de que el avión en el que viajaban se estrellara en una isla llena de nativos mutantes. En The Forest, el jugador dispone de un libro de supervivencia que lo guiará para sobrevivir en una isla boscosa después de convertirse en el único sobreviviente de un accidente aéreo mediante la creación de un refugio, armas y otras herramientas de supervivencia, desde cócteles mólotov, trampas, hasta un arco de flechas. También es necesario satisfacer tanto el hambre como la sed y no enfriarse mucho por la noche, ya que esto llevará a la muerte. El jugador habita la isla junto con varias misteriosas y aterradoras criaturas, una tribu de caníbales y mutantes nocturnos, que habitan en cuevas profundas debajo de la isla y en poblados sobre su superficie', 3),
(26, ' Gears Tactics ', 'Gears Tactics es un videojuego de estrategia por turnos, algo diferente a lo que estábamos acostumbrados en la serie Gears. Los hechos del juego tienen lugar 12 años antes del primer Gears of War. Detén la amenaza de Ukkon, El poderoso e implacable líder del ejército Locust el cual tiene en caos las ciudades del planeta Sera. Tu deber como recluta del último pelotón de supervivientes de la humanidad será dar caza a este poderoso enemigo. Burla a tus enemigos en un frenético combate táctico por turnos y desafía todo pronóstico en tu lucha por la supervivencia. El jugador toma el papel de Gabe Diaz, un rebelde soldado que rescatará y formará un escuadrón en una trayectoria en la que destacará el liderazgo, la supervivencia y el sacrificio.', 4),
(27, ' Praetorians HD Remaster', 'Praetorians HD Remaster Otro clásico de la vieja escuela remasterizado con muchas mejoras respecto a reimaginado en alta definición y con controles rediseñados para consolas. Prueba tres ejércitos diferentes, cada uno con sus fortalezas y debilidades únicas: Galos, egipcios y romanos. Más de 20 misiones de campaña ambientadas en Galia, Egipto e Italia. Conjuntos únicos de habilidades y formaciones para tipos de unidades y personajes diferentes. Praetorians está ambientado en el período de maquinaciones políticas del Imperio romano. Para salir victorioso tendrás que aprender a combinar tus unidades y a explotar las debilidades de tus enemigos. Praetorians se diferencia a otros juegos de estrategia en el que no es necesario construir bases para salir victorioso', 4),
(28, 'John Wick Hex', 'John Wick Hex es un videojuego del genero de estrategia dinámico que se centra en la acción el cual te hace pensar y atacar como John Wick, el asesino profesional de la franquicia cinematográfica del mismo nombre. El juego fue Desarrollado en cercana cooperación con los equipos creativos realizadores de las películas, La combinación característica de pelea a puño limpio y armas de fuego de la serie. Mediante una fusión única de combate estratégico basado en la inercia, John Wick Hex integra el estilo del combate táctico único de las películas y desvanece la línea entre los géneros de juegos de estrategia y acción', 4),
(29, ' Stronghold Crusader 2', 'Stronghold Crusader II es la esperada secuela de Stronghold: Crusader, el «simulador de castillos» original. Stronghold regresa tras 12 años a los desiertos de Oriente Medio, en torno al año 1189, con un nuevo motor 3D y un sistema de destrucción de castillos realista provisto por Havok Physics. Crusader 2 recuperará la jugabilidad adictiva y frenética del juego original y la auténtica simulación de castillos. Fiel a sus raíces, este nuevo Stronghold definirá la estrategia en tiempo real de la vieja escuela, combinando la jugabilidad de los RTS y los «city builders». Jugando como un brutal Caballero Cruzado o como un revolucionario Árabe, tendrás que emplear una mortífera variedad de tropas y maquinaria de asedio destructiva para decidir el destino de Tierra Santa. Lidera tus tropas hacia la batalla como Ricardo Corazón de León o el Sultán de Siria en dos históricas campañas individuales, con la presencia de eventos dinámicos como tornados y plagas de langostas. Conviértete en el Señor más poderoso gestionando la economía del desierto y haciéndote con el control de los vitales oasis. Para dominar el campo de batalla necesitarás comandar más de 25 tipos de unidades únicas, aprendiendo sus habilidades especiales. Incrementa la moral con el Sargento de Armas, lánzate a la carga con el Caballero Sasánido, usa Arqueros para lanzar un tiro largo o escala los muros del castillo con el mortal Asesino. Una vez hayas perfeccionado tus habilidades ponlas a prueba en el modo escaramuza o lleva la batalla en línea con hasta ocho jugadores. ¡Crea equipos, elige diferentes oponentes de la IA y diseña tu propio mapa en el definitivo modo escaramuza o multijugador!', 4),
(30, ' Age Of Empires II Definitive ', 'Age Of Empires II Definitive Edition el legendario videojuego de estrategia en tiempo real regresa en su versión definitiva por motivo de su 20º aniversario, ahora con gráficos 4K Ultra HD, una nueva banda sonora remasterizada y la expansión «Los últimos kanes», que cuenta con 3 campañas nuevas y 4 nuevas civilizaciones. Todas las campañas originales como nunca las haz visto, juega a las mejores expansiones y sumérgete en más de 200 horas de juego que abarcan mil años de historia. Juega en línea y enfréntate a otros jugadores con 35 civilizaciones diferentes para dominar el mundo.', 4),
(31, ' Sid Meier’s Civilization VI', 'Sid Meier’s Civilization VI, es la ultima entrega de la saga de videojuegos de estrategia Civilization creado por el aclamado diseñador de videojuegos Sid Meier. Civilization VI es un juego de estrategia por turnos en el que el objetivo es construir un imperio que aguante el paso del tiempo. Conquistar el mundo entero estableciendo y liderando una propia civilización desde la Edad de Piedra hasta la Era de la Información y la tecnología futurista. Libra guerras, utiliza la diplomacia, fomenta el progreso de tu cultura y enfréntate a los líderes más importantes de la historia para crear la civilización más grande jamás conocida. El juego ofrece nuevas maneras de interactuar con tu mundo, como por ejemplo, ahora las ciudades se expanden físicamente en el mapa, la investigación activa de tecnología y cultura desbloquea nuevos potenciales y los líderes actúan en función de sus rasgos históricos mientras intentas conseguir la victoria de una de las 5 maneras posibles', 4),
(32, ' Final Fantasy III', 'Final Fantasy III versión oficial de PC del popular tercer juego de la saga Final Fantasy, uno de los juegos más apreciados de la épica serie RPG. Interfaz completamente renovada. Optimización con mandos y se ha mejorado la compatibilidad con teclado y ratón. Ahora es posible jugar a pantalla completa hasta 21:9. Nuevo modo Galería: ahora podrás ver ilustraciones del juego y los personajes, así como escuchar la banda sonora. Batalla automática: los personajes repetirán su último movimiento mientras la batalla se desarrolla al doble de velocidad. Gráficos 3D y escenas cinemáticas mejoradas y muchisimas cosas más.', 5),
(33, ' Iratus: Lord Of The Dead', 'Iratus: Lord Of The Dead es un videojuego del genero de estrategia «roguelike» táctico ambientado en un oscuro universo de fantasía. El jugador deberá ayudar al nigromante Iratus en su misión de alcanzar la superficie y destruir a los mortales. Para esto contaremos con un ejercito de muertos vivientes, entre los 18 tipos de estos se encuentran: esqueletos, momias, zombis, banshees y muchos más. Crea soldados a partir de las partes del cuerpo de los enemigos muertos. Estudia rituales secretos para fortalecer a tus lacayos. Explora catacumbas subterráneas, y enfréntate a enemigos como enanos y mercenarios corruptos.', 5),
(34, 'Torchlight II', 'Torchlight II es un videojuego de Rol desarrollado por Runic Games el 20 de septiembre del 2012, Es la continuación de Torchlight, que incluye grandes novedades y mejoras sustanciales respecto a su primera entrega. Entre ellas, el esperado modo de juego cooperativo. Torchlight II te lleva de vuelta al peculiar y acelerado mundo de monstruos sedientos de sangre, abundantes tesoros y siniestros secretos, y una vez más, ¡el destino del mundo está en tus manos! Torchlight II captura todo el sabor y la emoción del juego original, a la vez que amplía el mundo y añade las características que más querían los jugadores, incluyendo juego cooperativo online y por LAN. Torchlight II es rápido, divertido y lleno a rebosar de acción y botín.', 5),
(35, ' The Witcher: Enhanced', 'The Witcher: Enhanced Edition Director’s Cut, El RPG del Año ha vuelto – ¡en una Edición Premium que incluye impactante contenido extra! Asume el papel de Geralt, The Witcher, un legendario matador de monstruos que cae en una red de intrigas, ¡mientras lucha contra las fuerzas que quieren dominar el mundo! ¡Toma decisiones determinantes y vive sus consecuencias en un juego que te atrapará en una extraordinaria fábula nunca vista! Representante de la cúspide de la narrativa en juegos de rol, The Witcher difumina la barrera entre el bien y el mal en un mundo donde reina la ambigüedad moral. The Witcher enfatiza la historia y el desarrollo del personaje en un mundo apasionante, e incorpora un sistema de combate en tiempo real de gran profundidad estratégica nunca visto antes en ningún otro juego.', 5),
(36, ' Dungeon Siege II', 'Dungeon Siege II, la segunda entrega de uno de los mayores éxitos de Chris “Total Annihilation” Taylor. Como en todos los juegos con toques de rol, nuestros personajes tienen atributos (Fuerza, Destreza, Inteligencia, etc) y habilidades (Combate cuerpo a cuerpo, a distancia, magia de combate y magia de la naturaleza). Dungeon Siege fue un juego heredero de títulos como Diablo, aunque con una historia menos trabajada y una mayor extensión. La segunda parte del juego ya está aquí y te ofrece la corrección de todos los fallos de la primera entrega y además, la incorporación de una buena cantidad de novedades. Entre las primeras mejoras encontrarás una historia mucho más elaborada a través de la cual conocerás la historia y leyendas del mundo en el que se desarrolla la acción. La mecánica del juego también ha experimentado mejoras y novedades. Si bien, sigues subiendo de experiencia de aquellos poderes y habilidades que utilizas, vas a descubrir que los creadores del juego han añadido una serie de nuevas habilidades propias para cada especialidad, logrando que el juego tenga una mayor riqueza en el desarrollo de tu personaje. Entre sus aportaciones más novedosas podemos hablar de las mulas de carga, que permitían llevar todos los tesoros. También el hecho de llevar grupos de hasta ocho personajes. Dos expansiones confirman el gran éxito de este título. Te sorprenderá lo mucho que ha mejorado la interfaz de usuario y también el motor gráfico que ahora ofrece un mayor detalle en personajes, decorados y efectos visuales', 5),
(37, ' RimWorld', 'RimWorld es un simulador de colonias (Construir y gestionar tu propia colonia espacial) enfatizado en la ciencia ficción y dirigido por una inteligencia artificial. El juego establece al jugador en el papel de gestor de una colonia en un planeta del borde galáctico, donde los colonos deben sobrevivir a diversos eventos generados aleatoriamente por la inteligencia artificial. No controlaremos directamente a los colonos, excepto en situaciones de combate, solo ordenaremos la creación de estructuras, o la realización de diversas acciones, que los colonos, o «peones» realizan cuando consideren adecuado (influenciado por las circunstancias del peón, sus habilidades, o los tipos de trabajos que tenga asignados.) Para asegurar la supervivencia de la colonia, deberemos administrar y equilibrar las diversas condiciones que garantizan el bienestar físico y mental de sus colonos, asegurándonos de que estén bien alimentados, tengan un hogar cómodo y ropa adecuada para el clima.', 6),
(38, ' SimCity 4: Deluxe Edition', 'SimCity 4 Deluxe Edition Incluye los juegos SimCity 4 más su expansión «Rush Hour» (Hora Veloz). SimCity es un videojuego de construcción de ciudades, la cuarta entrega de la serie SimCity. Desarrollado por Maxis, aunque originalmente creado por Will Wright, creador también de Los Sims y Spore. Sim City 4 es un juego enfocado a la urbanización de una ciudad, donde se es el alcalde y se va construyendo una ciudad poco a poco. La meta de este juego es alcanzar una ciudad donde todos los ciudadanos estén contentos de ver el progreso de la ciudad, si no lo están se mudarán a otras ciudades, en cambio si se lo hace bien la ciudad prosperará y los ciudadanos la amarán, además este juego es uno de los que tienen más características realistas, ya que se tiene que cuidar los impuestos, las ganancias, la seguridad, la educación, el tráfico, la sanidad y el medio ambiente.', 6),
(39, ' Monopoly', 'Monopoly PC es una versión virtual para PC del famoso juego de mesa desarrollado por EA Games. El juego de siempre con un toque moderno que incluye todos los lugares del mundo actualizados. Juega con 7 fichas animadas al detalle como el Perro, Sombrero de copa, Plancha, Zapato, Dedal, Carretilla, Coche de carreras. Usa tus millones y tu astucia para llegar a lo más alto; compra, comercia y subasta. Juega contra tus amigos en el modo multijugador; pasa y juega para ver quién puede quedarse el monopolio e ¡irse a casa con todo el dinero!', 6),
(40, 'Monopoly PC es una versión vir', 'Need For Speed: Most Wanted 2012 es un videojuego de carreras de la saga Need for Speed desarrollado por Electronic Arts y Criterion Games. Con un claro énfasis a las persecuciones policíacas y a la acción, el juego contará con un Autolog 2.0 que fomentará aún más la competencia y la rivalidad de marcas de tiempo entre amigos y un motor de juego de pistas libres pasando por puntos específicos.', 7),
(41, ' Need For Speed Carbon', 'Need For Speed: Carbon es la décima entrega de la saga de videojuegos Need for Speed. Fue mostrado por primera vez en la conferencia de Sony durante el E3 de 2006. Presenta un énfasis marcado en carreras nocturnas. La trama trata sobre lo que ocurrió después de los hechos que tuvieron lugar durante Need For Speed: Most Wanted. El personaje protagonista regresa a Palmont, su ciudad natal, pero todo allí ha cambiado. Ahora las bandas se pelean por el control de las calles para dominar toda la ciudad. El duelo final se disputa en el Cañón Carbon (De allí el nombre del juego), y puede resultar una carrera mortal. La historia comienza un tiempo después de la persecución en la ciudad de Rockport (Need For Speed: Most Wanted), el protagonista regresa a Palmont City para encontrarla hecha un caos, mientras unos flashbacks recuerdan lo que pasó antes de huir de la policía, un amigo que le confió un Toyota Supra, una carrera en la que aparentemente ganó un falso premio y toda la policía de Palmont siguiéndolo. Al mismo tiempo, el Sargento Cross (quien fue despedido del departamento de policía y ahora es un caza-recompensas), lo viene persiguiendo desde Rockport para atraparlo a cualquier costo, persecución que acaba con el BMW M3 GTR siniestrado', 7),
(42, ' Need For Speed Underground 2', 'Need For Speed: Underground 2 (NFSU2) es un videojuego de carreras publicado y desarrollado por Electronic Arts. Lanzado en 2004, es la secuela de Need for Speed: Underground. La historia se basa en el tuneo de coches para las carreras callejeras. El juego proporciona nuevas características, como una mayor personalización de los vehículos, el modo «libre» (donde conduces el coche de manera libre por el mapa, así como en Midnight Club), en una ciudad conocida como «Bayview», ciudad que posee parecidos con las ciudades de Los Ángeles, San Francisco, Vancouver y Las Vegas, Filadelfia. Este juego también permite la inclusión de los SUV, que pueden ser personalizados de forma extensiva como los demás vehículos y son usados en carreras contra otros vehículos de este tipo. Brooke Burke hace la voz de Rachel Teller, la persona que te guía a lo largo de la historia. Underground tiene muy buenos gráficos y el jugador puede elegir entre una de los tonos musicales y reproducirlo y escucharlo y ofrece opciones para aplicar esa música en las carreras o en el menú principal, o simplemente en todos los modos así se escucha en el menú principal y en las carreras.', 7),
(43, ' SnowRunner A MudRunner', 'SnowRunner: A MudRunner Game es un videojuego de simulación y conducción de camiones de carga sobre un terreno montañoso nevado. Conduce vehículos potentes de marcas como Ford y Chevrolet, mientras conquistas entornos abiertos extremos de terreno más avanzado de la historia. Supere el lodo, las aguas torrenciales, la nieve y los lagos congelados mientras asume peligrosos contratos y misiones. Expande y personaliza tu flota con muchas mejoras y accesorios, incluido un tubo de escape para aguas pesadas o llantas de cadena para combatir la nieve. Viaja solo o juega con otros jugadores en el modo cooperativo para 4 jugadores y amplía tu experiencia con mods creados por la comunidad. 40 vehículos únicos para desbloquear, actualizar y personalizar. Completa docenas de misiones desafiantes en un mundo interconectado', 7),
(44, ' Carmageddon: Reincarnation', 'Carmageddon: Reincarnation (anteriormente conocido como Carmageddon 4) es el cuarto juego de la saga Carmageddon. 18 años después del lanzamiento original, Stainless Games quiere recuperar esa idea con su nuevo lanzamiento, Carmageddon: Reincarnation. El objetivo del juego es sencillo: ganar una competición contra nuestros contrincantes, sumando puntos mediante tres objetivos básicos: los clásicos objetivos de carreras, con las metas y los puntos de control; eliminar y dañar los vehículos de los oponentes; y atropellar y aniquilar a la gente que anda por la calle.', 7),
(45, 'One Punch Man: A Hero Nobody K', 'One Punch Man: A Hero Nobody Knows es un videojuego de lucha basado en el Anime/Manga «One Punch Man» en el cual podrás elegir a tu personaje favorito de la serie o crear uno propio gracias al «creador de heroes». Crea tu propio avatar de y elige tu propio conjunto de habilidades y poderes.', 8),
(46, 'JUMP FORCE Ultimate Edition', 'JUMP FORCE es un nuevo videojuego del tipo lucha crossover que mezcla lo mejor de los heroes de las series de anime/manga más famosos entre los que se encuentran personajes de Dragon Ball Z, Naruto, One Piece, Bleach, Yu Yu Hakusho, Saint Seita y muchos más. Podrás jugar con tus amigos en el modo multijugador o encontrar jugadores de todo el mundo en las salas online. También tiene un espectacular modo historia donde podrás crear tu propio avatar y luchar junto a los héroes más fuertes del manga para enfrentar una gran amenaza.', 8),
(47, ' Injustice 2 Legendary Edition', 'Injustice 2 segunda entrega del videojuego de lucha de super heroes de comics favorito de muchos fans, Enfrenta a los héroes y villanos más icónicos del universo de DC Comics además de algunos personajes que no pertenecen a este universo. Podrás personalizar y subir de nivel a tus personajes favoritos. Continuando donde quedó Injustice, Batman lucha contra el régimen de Superman, mientras que una nueva amenaza pondrá en riesgo la existencia de la Tierra. Incluye 10 personajes adicionales y 5 trajes exclusivos, incluidos Hellboy y las TMNT.', 8),
(48, ' Street Fighter V Champion Edi', 'Street Fighter V es uno de los mejores y más aclamados juegos de lucha de todos los tiempos, en esta nueva entrega con increíbles gráficos 2.5 D podremos experimentar la intensidad de una batalla épica de Street Fighter. Tienes entre 16 personajes icónicos para elegir, cada uno con su propia historia y desafíos de entrenamiento, luego podrás luchar contra tus amigos en línea o sin conexión con una gran variedad de opciones de partida.', 8),
(49, ' DRAGON BALL FighterZ Ultimate', 'DRAGON BALL FighterZ es el más reciente juego de lucha de la serie DRAGON BALL: luchas espectaculares e interminables con los personajes más poderosos de la serie. DRAGON BALL FighterZ maximiza los gráficos de anime de alta calidad y ofrece un juego de lucha fácil de aprender pero difícil de dominar. Luchas en equipo de hasta 3v3, Forma tu equipo soñado y domina rápidas combinaciones entre luchadores. Emocionante juego en línea, Partidas igualadas, salas interactivas, locas partidas de grupos de 6 jugadores. No te pierdas su unico modo historia, Descubre una aventura nunca vista con la Androide N°21, un nuevo personaje de creación supervisada por Akira Toriyama. Experimenta combos aéreos, escenarios destructibles y escenas famosas del anime de DRAGON BALL reproducidas en una resolución de 60FPS y 1080p', 8),
(51, 'hoola', 'aaaaa', 117);

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
(1, 'admintudai', '', '$2y$12$fEnfSlaNNc..8rEKD.VNUOfI1auYnO86CcMN955o2E3MLjRBZXzS.', 1),
(3, 'gabriel', ' ', '$2y$12$JIus7d98DJyVvooniLYMD.JiaRdCA5/8m3XqMCrV1IUanc/70JTBq', 0),
(4, 'lucila', ' ', '$2y$12$M/nZiTDGhrPEWexS2lal0u3HM5T9mLpQ6ksoTaEiUROf38RVl9ED2', 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT de la tabla `commentary`
--
ALTER TABLE `commentary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `game`
--
ALTER TABLE `game`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `registry`
--
ALTER TABLE `registry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
