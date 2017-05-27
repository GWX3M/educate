-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-05-2017 a las 05:45:37
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdsistemas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE `actividades` (
  `idactividades` int(10) NOT NULL,
  `actividad1` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `actividad2` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `actividad3` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `idmodulo` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `idadministrador` int(10) NOT NULL,
  `idpersona` int(10) NOT NULL,
  `idtelefono` int(10) NOT NULL,
  `especialidad` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `certificado`
--

CREATE TABLE `certificado` (
  `idcertificado` int(10) NOT NULL,
  `idtutor` int(10) NOT NULL,
  `idcurso` int(10) NOT NULL,
  `idestudiante` int(10) NOT NULL,
  `idadministrador` int(10) NOT NULL,
  `fecha` date NOT NULL,
  `acreditacion` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `idcurso` int(10) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `duracion` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `idtutor` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `idestudiante` int(10) NOT NULL,
  `idpersona` int(10) NOT NULL,
  `idtelefono` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluacion`
--

CREATE TABLE `evaluacion` (
  `idevaluacion` int(10) NOT NULL,
  `idmodulo` int(10) NOT NULL,
  `fecha_apli` date NOT NULL,
  `resultado` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `idlogin` int(10) NOT NULL,
  `user` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `pass` varchar(16) COLLATE utf8_spanish_ci NOT NULL,
  `tipousuario` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`idlogin`, `user`, `pass`, `tipousuario`) VALUES
(1, 'admin', 'admin', 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulo`
--

CREATE TABLE `modulo` (
  `idmodulo` int(10) NOT NULL,
  `idcurso` int(10) NOT NULL,
  `descripcion` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `duracion` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `idpago` int(10) NOT NULL,
  `descripcion` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `monto` decimal(4,2) NOT NULL,
  `fechapago` date NOT NULL,
  `idestudiante` int(10) NOT NULL,
  `idcurso` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `idpersona` int(10) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `direccion1` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `direccion2` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `fechanac` date NOT NULL,
  `cui` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefono`
--

CREATE TABLE `telefono` (
  `idtelefono` int(10) NOT NULL,
  `telefono` int(10) NOT NULL,
  `empresatelefonica` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipotarea`
--

CREATE TABLE `tipotarea` (
  `idtipotarea` int(10) NOT NULL,
  `descripcion` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `idmodulo` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_login`
--

CREATE TABLE `tipo_login` (
  `idtipologin` int(10) NOT NULL,
  `tipousuario` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_login`
--

INSERT INTO `tipo_login` (`idtipologin`, `tipousuario`) VALUES
(1, 'Administrador'),
(2, 'Estudiante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tutor`
--

CREATE TABLE `tutor` (
  `idtutor` int(10) NOT NULL,
  `idpersona` int(10) NOT NULL,
  `especialidad` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `idtelefono` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `validarcurso`
--

CREATE TABLE `validarcurso` (
  `idvalidarcurso` int(10) NOT NULL,
  `idcurso` int(10) NOT NULL,
  `fechavalidacion` date NOT NULL,
  `idadministrador` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videos`
--

CREATE TABLE `videos` (
  `idvideo` int(10) NOT NULL,
  `descripcion` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `idmodulo` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `z_coment`
--

CREATE TABLE `z_coment` (
  `id` int(11) NOT NULL,
  `autor` int(11) NOT NULL,
  `post` int(11) NOT NULL,
  `comentario` text COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `z_coment`
--

INSERT INTO `z_coment` (`id`, `autor`, `post`, `comentario`) VALUES
(1, 1, 1, 'prueba'),
(2, 4, 1, 'Nitido'),
(3, 4, 2, 'Nitido');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `z_datos`
--

CREATE TABLE `z_datos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `url` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `z_datos`
--

INSERT INTO `z_datos` (`id`, `nombre`, `url`, `email`) VALUES
(1, 'educate', 'http://localhost/educate/', 'educategtm@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `z_favori`
--

CREATE TABLE `z_favori` (
  `id` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `post` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `z_favori`
--

INSERT INTO `z_favori` (`id`, `usuario`, `post`) VALUES
(1, 4, 1),
(2, 4, 2),
(3, 4, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `z_mensajes`
--

CREATE TABLE `z_mensajes` (
  `id` int(11) NOT NULL,
  `envia` int(11) NOT NULL,
  `asunto` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `recibe` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '0',
  `mensaje` text COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `z_mensajes`
--

INSERT INTO `z_mensajes` (`id`, `envia`, `asunto`, `recibe`, `estado`, `mensaje`) VALUES
(1, 4, 'Hola', 3, 1, 'Adios');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `z_notifica`
--

CREATE TABLE `z_notifica` (
  `id` int(11) NOT NULL,
  `post` int(11) NOT NULL,
  `comenta` int(11) NOT NULL,
  `autor` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `z_notifica`
--

INSERT INTO `z_notifica` (`id`, `post`, `comenta`, `autor`, `estado`) VALUES
(1, 1, 4, 1, 0),
(2, 2, 4, 3, 1),
(3, 5, 4, 3, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `z_online`
--

CREATE TABLE `z_online` (
  `ipIndice` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `usuarioOnline` int(11) NOT NULL,
  `ip` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `z_online`
--

INSERT INTO `z_online` (`ipIndice`, `date`, `usuarioOnline`, `ip`) VALUES
(1, 1495856674, 3, '::1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `z_posts`
--

CREATE TABLE `z_posts` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `url` varchar(150) COLLATE latin1_spanish_ci NOT NULL,
  `contenido` text COLLATE latin1_spanish_ci NOT NULL,
  `autor` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `visitas` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `puntos` int(11) NOT NULL DEFAULT '0',
  `keywords` varchar(150) COLLATE latin1_spanish_ci NOT NULL,
  `descripcion` text COLLATE latin1_spanish_ci NOT NULL,
  `urlamigable` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `youtube` varchar(255) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `z_posts`
--

INSERT INTO `z_posts` (`id`, `titulo`, `url`, `contenido`, `autor`, `fecha`, `visitas`, `time`, `puntos`, `keywords`, `descripcion`, `urlamigable`, `youtube`) VALUES
(1, 'Windows RT podría ser usado en phablets', '', '<p><img alt=\"Windows RT podría ser usado en phablets\" src=\"http://img.tecnomagazine.net/2013/09/Windows-RT-podr%C3%ADa-ser-usado-en-phablets.jpg\" style=\"height:auto; margin:0px auto\" /><br />\r\n<br />\r\n<strong>Terry Myerson</strong>, un ejecutivo de Microsoft que adem&aacute;s es el encargado principal del sector de sistemas operativos, ha dado a conocer un detalle que sin lugar a dudas es sumamente interesante:&nbsp;<strong>Windows RT podr&iacute;a ser implementado en phablets en el futuro</strong>.<br />\r\n<br />\r\nDada el poco &eacute;xito que logr&oacute; tener&nbsp;<strong>Windows RT</strong>&nbsp;cuando fue lanzado con el Surface RT, parece que ahora los chicos de&nbsp;<strong>Microsoft</strong>&nbsp;se encuentran buscando nuevas estrategias para llevar a su plataforma por buen camino.&nbsp;<br />\r\n<br />\r\nEn una reuni&oacute;n financiera reciente, Myerson asegur&oacute; que las claves del &eacute;xito para Windows RT se encuentran entre las l&iacute;neas que separan un smartphone de un tablet, por lo tanto un phablet ser&iacute;a la elecci&oacute;n m&aacute;s natural.<br />\r\n<br />\r\nWindows RT result&oacute; ser una plataforma de muy poco &eacute;xito, pero Microsoft no busca deshacerse de ella, simplemente quiere cambiar un poco el modo en que se vienen haciendo las cosas.<br />\r\n<br />\r\nLa compa&ntilde;&iacute;a ya tiene planes para lanzar m&aacute;s tablets con Windows 8 y con Windows 8.1, por lo tanto el &uacute;nico sector del mercado que le queda para &ldquo;huir&rdquo; a WRT es el de los smartphones con pantallas de 6 pulgadas.<br />\r\n<br />\r\n&iquest;Crees que un sistema operativo que fracas&oacute; en un tablet pueda llegar a ser exitoso si es utilizado en un phablet?</p>\r\n', 1, '2013-10-16 17:36:10', 10, 1381944970, 1, 'windows, rt, podria, ser, usado, en, phablets', '\r\n\r\nTerry Myerson, un ejecutivo de Microsoft que adem&aacute;s es el encargado principal del sector de sistemas operativos, ha dado a conocer un detalle que sin lugar a dudas es sumamente interesante:&nbsp;Windows RT podr&iacute;a ser implementado en phablets en el futuro.\r\n\r\nDada el poco &eacute;xito que logr&oacute; tener&nbsp;Windows RT&nbsp;cuando fue lanzado con el Surface RT, parece que ahora los chicos de&nbsp;Microsoft&nbsp;se encuentran buscando nuevas estrategias para llevar a su plataforma por buen camino.&nbsp;\r\n\r\nEn una reuni&oacute;n financiera reciente, Myerson asegur&oacute; que las claves del &eacute;xito para Windows RT se encuentran entre las l&iacute;neas que separan un smartphone de un tablet, por lo tanto un phablet ser&iacute;a la elecci&oacute;n m&aacute;s natural.\r\n\r\nWindows RT result&oacute; ser una plataforma de muy poco &eacute;xito, pero Microsoft no busca deshacerse de ella, simplemente quiere cambiar un poco el modo en que se vienen haciendo las cosas.\r\n\r\nLa compa&ntilde;&iacute;a ya tiene planes para lanzar m&aacute;s tablets con Windows 8 y con Windows 8.1, por lo tanto el &uacute;nico sector del mercado que le queda para &ldquo;huir&rdquo; a WRT es el de los smartphones con pantallas de 6 pulgadas.\r\n\r\n&iquest;Crees que un sistema operativo que fracas&oacute; en un tablet pueda llegar a ser exitoso si es utilizado en un phablet?\r\n', '1/windows-rt-podria-ser-usado-en-phablets', ''),
(2, 'Curso De Programacion', '', '<p>Agrega aqui el contenido.</p>\r\n', 3, '2017-05-19 01:42:03', 6, 1495158123, 1, 'curso, de, programacion', 'Agrega aqui el contenido.\r\n', '2/curso-de-programacion', ''),
(3, 'Prueba 3', '', '<p>Prueba de contenido</p>\r\n', 3, '2017-05-21 23:06:44', 1, 1495408004, 0, 'prueba, 3', 'Prueba de contenido\r\n', '3/prueba-3', ''),
(4, 'Prueba 4', '', '<p>dsdsdss</p>\r\n', 3, '2017-05-21 23:07:10', 8, 1495408030, 0, 'prueba, 4', 'dsdsdss\r\n', '4/prueba-4', ''),
(6, 'Youtube', '', '<p><a href=\"https://www.youtube.com/watch?v=5g6RBd-vxBk\">https://www.youtube.com/watch?v=5g6RBd-vxBk</a></p>\r\n', 3, '2017-05-22 21:17:43', 2, 1495487863, 0, 'youtube', 'https://www.youtube.com/watch?v=5g6RBd-vxBk\r\n', '6/youtube', ''),
(7, 'Youtube', '', '<p>Esta es una prueba mas</p>\r\n', 3, '2017-05-26 13:15:23', 1, 1495804523, 0, 'youtube', 'Esta es una prueba mas\r\n', '7/youtube', ''),
(8, 'Hola', '', 'Contenido del Curso\r\n', 0, '2017-05-26 13:21:00', 0, 0, 0, '1495804860', 'hola', '', '3'),
(9, 'Si funciona', '', '<p>Si funciona espero que siii!!!</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><iframe frameborder=\"0\" height=\"315\" scrolling=\"no\" src=\"https://www.youtube.com/embed/mraul5-1TBE\" width=\"560\"></iframe>Esto es definitivo</p>\r\n', 3, '2017-05-26 23:13:02', 5, 1495840382, 0, 'si, funciona', 'Si funciona espero que siii!!!\r\n\r\n&nbsp;\r\n\r\nEsto es definitivo\r\n', '9/si-funciona', ''),
(10, 'Prueba 6', '', '<p>sadasdasdjhkajsdhakjsdh</p>\r\n', 3, '2017-05-26 23:45:02', 1, 1495842302, 0, 'prueba, 6', 'sadasdasdjhkajsdhakjsdh\r\n', '10/prueba-6', ''),
(11, 'kaldjskjsd', '', '<p>dajklsdjalksdjkla</p>\r\n', 3, '2017-05-26 23:46:54', 1, 1495842414, 0, 'kaldjskjsd', 'dajklsdjalksdjkla\r\n', '11/kaldjskjsd', ''),
(12, 'asdjlkasdjlsakjdklasdjklasd', '', '<p>dm,mzcn,zmcnz,xcm</p>\r\n', 3, '2017-05-26 23:47:56', 1, 1495842476, 0, 'asdjlkasdjlsakjdklasdjklasd', 'dm,mzcn,zmcnz,xcm\r\n', '12/asdjlkasdjlsakjdklasdjklasd', ''),
(13, 'zzzzzzzzzzzzzz', '', '<p>zzzzzzzzzzzzzzzzz</p>\r\n', 3, '2017-05-26 23:49:25', 1, 1495842565, 0, 'zzzzzzzzzzzzzz', 'zzzzzzzzzzzzzzzzz\r\n', '13/zzzzzzzzzzzzzz', ''),
(14, 'hkjdaskjsdhasjk', '', '<p>dadsjkjdsajasdhkj</p>\r\n', 3, '2017-05-27 00:34:36', 1, 1495845276, 0, 'hkjdaskjsdhasjk', 'dadsjkjdsajasdhkj\r\n', '14/hkjdaskjsdhasjk', ''),
(15, 'jhdakjsdhsakj', '', '<p>hjadkshdsakjs</p>\r\n', 3, '2017-05-27 00:49:30', 1, 1495846170, 0, 'jhdakjsdhsakj', 'hjadkshdsakjs\r\n', '15/jhdakjsdhsakj', ''),
(16, 'hahahaha', '03.mp4', '<p>hahahaha</p>\r\n', 3, '2017-05-27 00:53:17', 12, 1495846397, 0, 'hahahaha', 'hahahaha\r\n', '16/hahahaha', ''),
(17, 'TITULO', '03 (2).mp4', '<p>BLA BOA KHASODAS</p>\r\n', 3, '2017-05-27 01:12:31', 4, 1495847551, 0, 'titulo', 'BLA BOA KHASODAS\r\n', '17/titulo', ''),
(18, 'Camarones', 'camarones.jpg', '<p>Ricos sabrosos y deliciosis</p>\r\n', 3, '2017-05-27 01:29:24', 1, 1495848564, 0, 'camarones', 'Ricos sabrosos y deliciosis\r\n', '18/camarones', ''),
(19, 'sdfgsdfg', 'Mercado.doc', '<p>dfsdgfd</p>\r\n', 3, '2017-05-27 01:33:24', 1, 1495848804, 0, 'sdfgsdfg', 'dfsdgfd\r\n', '19/sdfgsdfg', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `z_puntos`
--

CREATE TABLE `z_puntos` (
  `id` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `post` int(11) NOT NULL,
  `puntos` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `z_puntos`
--

INSERT INTO `z_puntos` (`id`, `usuario`, `post`, `puntos`) VALUES
(1, 4, 1, 1),
(2, 4, 2, 1),
(3, 4, 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `z_users`
--

CREATE TABLE `z_users` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `password` varchar(60) COLLATE latin1_spanish_ci NOT NULL,
  `recuperar` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `email` varchar(60) COLLATE latin1_spanish_ci NOT NULL,
  `ultima` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `avatar` varchar(50) COLLATE latin1_spanish_ci NOT NULL DEFAULT 'no_avatar.jpg',
  `rango` int(11) NOT NULL,
  `lema` text COLLATE latin1_spanish_ci NOT NULL,
  `puntos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `z_users`
--

INSERT INTO `z_users` (`id`, `nombre`, `password`, `recuperar`, `email`, `ultima`, `avatar`, `rango`, `lema`, `puntos`) VALUES
(1, 'pepe', '47bce5c74f589f4867dbd57e9ca9f808', '16f0fd52ff1008af716ba556886e37d0', 'pepe@hotmail.com', '2013-10-16 19:39:10', 'no_avatar.jpg', 1, '', 0),
(2, 'zeuskx', '47bce5c74f589f4867dbd57e9ca9f808', '0', 'zeuskx@hotmail.com', '2013-10-16 19:39:23', 'no_avatar.jpg', 1, '', 0),
(3, 'Gary', '827ccb0eea8a706c4c34a16891f84e7b', '186b690e29892f137b4c34cfa40a3a4d', 'garywcm@hotmail.com', '2017-05-26 22:40:33', 'no_avatar.jpg', 1, '', 0),
(4, 'Guilmar', '827ccb0eea8a706c4c34a16891f84e7b', '', 'guilmar.urizar@gmail.com', '2017-05-21 23:11:37', 'no_avatar.jpg', 1, '', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`idactividades`),
  ADD KEY `idmodulo` (`idmodulo`);

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`idadministrador`),
  ADD KEY `idpersona` (`idpersona`),
  ADD KEY `idtelefono` (`idtelefono`);

--
-- Indices de la tabla `certificado`
--
ALTER TABLE `certificado`
  ADD PRIMARY KEY (`idcertificado`),
  ADD KEY `idtutor` (`idtutor`),
  ADD KEY `idcurso` (`idcurso`),
  ADD KEY `idestudiante` (`idestudiante`),
  ADD KEY `idadministrador` (`idadministrador`);

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`idcurso`),
  ADD KEY `idtutor` (`idtutor`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`idestudiante`),
  ADD KEY `idpersona` (`idpersona`),
  ADD KEY `idtelefono` (`idtelefono`);

--
-- Indices de la tabla `evaluacion`
--
ALTER TABLE `evaluacion`
  ADD PRIMARY KEY (`idevaluacion`),
  ADD KEY `idmodulo` (`idmodulo`);

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`idlogin`);

--
-- Indices de la tabla `modulo`
--
ALTER TABLE `modulo`
  ADD PRIMARY KEY (`idmodulo`),
  ADD KEY `idcurso` (`idcurso`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`idpago`),
  ADD KEY `idestudiante` (`idestudiante`),
  ADD KEY `idcurso` (`idcurso`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`idpersona`);

--
-- Indices de la tabla `telefono`
--
ALTER TABLE `telefono`
  ADD PRIMARY KEY (`idtelefono`);

--
-- Indices de la tabla `tipotarea`
--
ALTER TABLE `tipotarea`
  ADD PRIMARY KEY (`idtipotarea`),
  ADD KEY `idmodulo` (`idmodulo`);

--
-- Indices de la tabla `tipo_login`
--
ALTER TABLE `tipo_login`
  ADD PRIMARY KEY (`idtipologin`),
  ADD KEY `tipousuario` (`tipousuario`);

--
-- Indices de la tabla `tutor`
--
ALTER TABLE `tutor`
  ADD PRIMARY KEY (`idtutor`),
  ADD KEY `idpersona` (`idpersona`),
  ADD KEY `idtelefono` (`idtelefono`);

--
-- Indices de la tabla `validarcurso`
--
ALTER TABLE `validarcurso`
  ADD PRIMARY KEY (`idvalidarcurso`),
  ADD KEY `idcurso` (`idcurso`),
  ADD KEY `idadministrador` (`idadministrador`);

--
-- Indices de la tabla `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`idvideo`),
  ADD KEY `idmodulo` (`idmodulo`);

--
-- Indices de la tabla `z_coment`
--
ALTER TABLE `z_coment`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `z_datos`
--
ALTER TABLE `z_datos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `z_favori`
--
ALTER TABLE `z_favori`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `z_mensajes`
--
ALTER TABLE `z_mensajes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `z_notifica`
--
ALTER TABLE `z_notifica`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `z_online`
--
ALTER TABLE `z_online`
  ADD PRIMARY KEY (`ipIndice`);

--
-- Indices de la tabla `z_posts`
--
ALTER TABLE `z_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `z_puntos`
--
ALTER TABLE `z_puntos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `z_users`
--
ALTER TABLE `z_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividades`
--
ALTER TABLE `actividades`
  MODIFY `idactividades` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `idadministrador` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `certificado`
--
ALTER TABLE `certificado`
  MODIFY `idcertificado` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `idcurso` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  MODIFY `idestudiante` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `evaluacion`
--
ALTER TABLE `evaluacion`
  MODIFY `idevaluacion` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
  MODIFY `idlogin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `modulo`
--
ALTER TABLE `modulo`
  MODIFY `idmodulo` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
  MODIFY `idpago` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `idpersona` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `telefono`
--
ALTER TABLE `telefono`
  MODIFY `idtelefono` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipotarea`
--
ALTER TABLE `tipotarea`
  MODIFY `idtipotarea` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipo_login`
--
ALTER TABLE `tipo_login`
  MODIFY `idtipologin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tutor`
--
ALTER TABLE `tutor`
  MODIFY `idtutor` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `validarcurso`
--
ALTER TABLE `validarcurso`
  MODIFY `idvalidarcurso` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `videos`
--
ALTER TABLE `videos`
  MODIFY `idvideo` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `z_coment`
--
ALTER TABLE `z_coment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `z_datos`
--
ALTER TABLE `z_datos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `z_favori`
--
ALTER TABLE `z_favori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `z_mensajes`
--
ALTER TABLE `z_mensajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `z_notifica`
--
ALTER TABLE `z_notifica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `z_online`
--
ALTER TABLE `z_online`
  MODIFY `ipIndice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `z_posts`
--
ALTER TABLE `z_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `z_puntos`
--
ALTER TABLE `z_puntos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `z_users`
--
ALTER TABLE `z_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
