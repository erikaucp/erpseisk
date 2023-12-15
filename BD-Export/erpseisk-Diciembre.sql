-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 15-12-2023 a las 21:36:18
-- Versión del servidor: 8.0.30
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `erpseisk`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `id` bigint UNSIGNED NOT NULL,
  `identificacion` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombres` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idTipoIdentificacion` bigint UNSIGNED NOT NULL,
  `idEstado` bigint UNSIGNED NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`id`, `identificacion`, `nombres`, `apellidos`, `email`, `idTipoIdentificacion`, `idEstado`, `created_at`, `updated_at`) VALUES
(1, '12345', 'Felipe', 'Cañon', 'felipe@seiskagencia.com', 1, 1, NULL, NULL),
(2, '12345987', 'Edward', 'Sepulveda', 'edward@seiskagencia.com', 2, 1, NULL, NULL),
(3, '1112223335', 'Katherine', 'Perez', 'katherin@coats.com', 2, 1, '2023-11-10 20:37:12', '2023-11-10 20:37:12'),
(4, '5555', 'Juan', 'Perez', 'juan@perez.c', 2, 1, '2023-11-19 20:50:13', '2023-11-19 20:50:13'),
(5, '123456987', 'Alejandro', 'Sanchez', 'adminsoft@seiskagencia.com', 2, 1, '2023-12-16 01:35:38', '2023-12-16 01:35:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaciones`
--

CREATE TABLE `asignaciones` (
  `id` bigint UNSIGNED NOT NULL,
  `fechaAsignacion` date NOT NULL,
  `idCliente` bigint UNSIGNED NOT NULL,
  `idEmpleado` bigint UNSIGNED NOT NULL,
  `idEstado` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` bigint UNSIGNED NOT NULL,
  `identificacion` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `empresa` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` enum('GR','MD','PQ') COLLATE utf8mb4_unicode_ci NOT NULL,
  `observaciones` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `idAdministrador` bigint UNSIGNED NOT NULL,
  `idTipoIdentificacion` bigint UNSIGNED NOT NULL,
  `idEstado` bigint UNSIGNED NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `identificacion`, `empresa`, `direccion`, `tipo`, `observaciones`, `idAdministrador`, `idTipoIdentificacion`, `idEstado`, `created_at`, `updated_at`) VALUES
(1, '12345', 'Empresa x', 'centro', 'GR', 'observaciones del cliente', 1, 1, 2, '2023-09-21 00:11:54', '2023-09-27 00:50:05'),
(2, '111222333', 'Supermercado El Arriero', 'centro', 'GR', 'observaciones del cliente', 1, 1, 1, '2023-09-21 00:25:25', '2023-09-21 23:58:15'),
(3, '12345444', 'Tacuará Mall', 'centro', 'GR', 'observaciones del cliente', 1, 1, 1, '2023-09-21 00:26:54', '2023-09-22 00:27:30'),
(4, '1000000001', 'Coats Cadena', 'centro', 'GR', 'observaciones del cliente', 1, 1, 1, '2023-09-21 23:52:52', '2023-09-21 23:52:52'),
(5, '1000000002', 'Comestibles Integrales', 'centro', 'GR', 'observaciones del cliente', 1, 1, 1, '2023-09-22 01:57:52', '2023-09-22 02:54:29'),
(6, '1000000003', 'Gastro eje', 'centro', 'GR', 'observaciones del cliente', 1, 1, 1, '2023-09-22 03:12:08', '2023-09-22 03:12:08'),
(7, '1000000004', 'Lujos Los Coches', 'centro', 'MD', 'observaciones del cliente', 1, 1, 1, '2023-09-22 03:13:45', '2023-09-22 03:13:45'),
(8, '1088333222', 'SASA', 'centro', 'PQ', 'observaciones del cliente', 1, 1, 1, '2023-09-22 03:15:54', '2023-09-22 03:15:54'),
(9, '1000000005', 'Rafael García Retinólogo', 'centro', 'GR', 'observaciones del cliente', 1, 1, 1, '2023-09-22 03:17:22', '2023-09-22 03:17:22'),
(10, '1000000006', 'FAVI UTP', 'centro', 'GR', 'observaciones del cliente', 1, 1, 1, '2023-09-22 03:19:36', '2023-09-22 03:19:36'),
(11, '1000000007', 'Iconika', 'centro', 'PQ', 'observaciones del cliente', 1, 1, 1, '2023-09-22 03:21:00', '2023-09-22 03:21:00'),
(12, '1000000008', 'Paseo Del Prado', 'centro', 'PQ', 'observaciones del cliente', 1, 1, 1, '2023-09-22 03:22:03', '2023-09-22 03:22:03'),
(13, '1000000009', 'Canchas Cannan', 'centro', 'MD', 'observaciones del cliente', 1, 1, 1, '2023-09-22 03:23:52', '2023-09-22 03:23:52'),
(14, '1000000010', 'Cardilicoles', 'centro', 'PQ', 'observaciones del cliente', 1, 1, 1, '2023-09-22 03:25:23', '2023-09-22 03:25:23'),
(15, '1000000011', 'Dr. Erick Buitrago', 'centro', 'MD', 'observaciones del cliente', 1, 1, 1, '2023-09-22 03:26:35', '2023-09-22 03:26:35'),
(16, '1000000012', 'Top Travel', 'centro', 'MD', 'observaciones del cliente', 1, 1, 1, '2023-09-22 03:28:00', '2023-09-22 03:28:00'),
(17, '1234544466', 'Siza Ingeniería', 'centro', 'PQ', 'observaciones del cliente', 1, 1, 1, '2023-09-22 03:29:56', '2023-09-22 03:29:56'),
(18, '1000000013', 'Sociedad Cardiovascular', 'centro', 'PQ', 'observaciones del cliente', 1, 1, 1, '2023-09-22 03:34:02', '2023-09-22 03:34:02'),
(19, '1000000014', 'Seisk Agencia', 'centro', 'PQ', 'observaciones del cliente', 1, 1, 1, '2023-09-22 03:36:30', '2023-09-22 03:36:30'),
(20, '1234589', 'Alexander Events', 'centro', 'PQ', 'observaciones del cliente', 1, 1, 1, '2023-09-22 03:38:03', '2023-09-22 03:38:03'),
(21, '2000000001', 'Cliente 1', 'Pereira', 'MD', 'Prueba C MD', 1, 1, 1, '2023-11-07 19:39:27', '2023-11-07 19:39:27'),
(22, '2000000002', 'Cliente 2', 'Megacentro pinares', 'PQ', 'cliente PQ', 1, 2, 1, '2023-11-07 22:31:46', '2023-11-07 22:31:46'),
(23, '2000000003', 'Cliente 3', 'Pereira', 'PQ', 'cliente de prueba', 1, 2, 1, '2023-11-09 19:26:49', '2023-11-09 19:26:49'),
(24, '2000012547', 'Seisk', 'centro', 'MD', 'fghfgh', 5, 1, 1, '2023-12-16 01:36:28', '2023-12-16 01:36:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` bigint UNSIGNED NOT NULL,
  `identificacion` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombres` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `observaciones` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idTipoIdentificacion` bigint UNSIGNED NOT NULL,
  `idRol` bigint UNSIGNED NOT NULL,
  `idEstado` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `identificacion`, `nombres`, `apellidos`, `email`, `observaciones`, `idTipoIdentificacion`, `idRol`, `idEstado`, `created_at`, `updated_at`) VALUES
(7, '1088555666', 'Maria Fernanda', 'Quintero', 'cm1@seiskagencia.com', 'Lider de CM\r\nEspecialista en Marketing', 1, 1, 1, '2023-09-21 22:41:04', '2023-09-21 22:41:04'),
(8, '1088222333', 'Duliana ', 'Montoya', 'cm2@seiskagencia.com', 'Cm especialista en Google Ads', 1, 1, 1, '2023-09-21 22:45:04', '2023-09-21 22:45:04'),
(9, '1088555444', 'Laura', 'Cruz', 'cm3@seiskagencia.com', 'Cm especialista en creación de contenido', 1, 2, 1, '2023-09-21 22:50:58', '2023-09-21 22:50:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados_habilidades`
--

CREATE TABLE `empleados_habilidades` (
  `id` bigint UNSIGNED NOT NULL,
  `idEmpleado` bigint UNSIGNED NOT NULL,
  `idHabilidad` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `id` bigint UNSIGNED NOT NULL,
  `nombre` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'visible', NULL, NULL),
(2, 'oculto', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_notificacion`
--

CREATE TABLE `estado_notificacion` (
  `id` bigint UNSIGNED NOT NULL,
  `estado` enum('leido','no leido','archivado') COLLATE utf8mb4_unicode_ci NOT NULL,
  `idNotificacion` bigint UNSIGNED NOT NULL,
  `idEmpleado` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habilidades`
--

CREATE TABLE `habilidades` (
  `id` bigint UNSIGNED NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idEmpleado` bigint UNSIGNED DEFAULT NULL,
  `idEstado` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_10_31_124429_create_roles_table', 2),
(7, '2023_10_31_124709_create_tipos_identificacion_table', 3),
(9, '2023_10_31_125145_create_estados_table', 4),
(10, '2023_10_31_125308_create_tipos_contenido_table', 5),
(11, '2023_10_31_130622_create_administradores_table', 6),
(12, '2023_10_31_131625_create_clientes_table', 7),
(13, '2023_10_31_132059_create_telefonos_administradores_table', 8),
(14, '2023_10_31_132203_create_parrillas_table', 9),
(15, '2023_10_31_132813_create_plataformas_table', 10),
(16, '2023_10_31_132956_create_publicaciones_table', 11),
(17, '2023_10_31_134508_create_publicaciones_plataformas_table', 12),
(18, '2023_10_31_135023_create_empleados_table', 13),
(19, '2023_10_31_135514_create_telefonos_empleados_table', 14),
(20, '2023_10_31_135614_create_habilidades_table', 15),
(21, '2023_10_31_135752_create_empleados_habilidades_table', 16),
(22, '2023_10_31_135907_create_publicacion_empleados_table', 17),
(23, '2023_10_31_140036_create_notificaciones_table', 18),
(24, '2023_10_31_140449_create_notificacion_empleado_table', 19),
(25, '2023_10_31_140536_create_estado_notificacion_table', 20),
(26, '2023_10_31_140714_create_asignaciones_table', 21);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE `notificaciones` (
  `id` bigint UNSIGNED NOT NULL,
  `idEstado` bigint UNSIGNED NOT NULL,
  `idEmpleado` bigint UNSIGNED NOT NULL,
  `idPublicacion` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificacion_empleado`
--

CREATE TABLE `notificacion_empleado` (
  `id` bigint UNSIGNED NOT NULL,
  `idNotificacion` bigint UNSIGNED NOT NULL,
  `idEmpleado` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parrillas`
--

CREATE TABLE `parrillas` (
  `id` bigint UNSIGNED NOT NULL,
  `mes` enum('1','2','3','4','5','6','7','8','9','10','11','12') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `quincenaPublicacion` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL,
  `observaciones` text COLLATE utf8mb4_unicode_ci,
  `fechaCreacion` date NOT NULL,
  `idCliente` bigint UNSIGNED NOT NULL,
  `idEstado` bigint UNSIGNED NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `parrillas`
--

INSERT INTO `parrillas` (`id`, `mes`, `quincenaPublicacion`, `observaciones`, `fechaCreacion`, `idCliente`, `idEstado`, `created_at`, `updated_at`) VALUES
(1, '12', '2', 'ghjghj', '2023-11-07', 2, 1, '2023-11-08 00:15:31', '2023-11-08 00:15:31'),
(2, '12', '1', NULL, '2023-11-09', 8, 1, '2023-11-09 16:41:24', '2023-11-09 16:41:24'),
(3, '12', '1', NULL, '2023-11-10', 2, 1, '2023-11-10 20:26:05', '2023-11-10 20:26:05'),
(4, '12', '1', NULL, '2023-11-10', 6, 1, '2023-11-10 21:17:11', '2023-11-10 21:17:11'),
(5, '12', '2', 'gfhgfh', '2023-12-15', 24, 1, '2023-12-16 01:40:25', '2023-12-16 01:40:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plataformas`
--

CREATE TABLE `plataformas` (
  `id` bigint UNSIGNED NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idCliente` bigint UNSIGNED NOT NULL,
  `idEstado` bigint UNSIGNED NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `plataformas`
--

INSERT INTO `plataformas` (`id`, `nombre`, `url`, `descripcion`, `idCliente`, `idEstado`, `created_at`, `updated_at`) VALUES
(1, 'Facebook', 'facebook.com', NULL, 2, 1, '2023-11-08 17:19:38', '2023-11-08 17:19:38'),
(2, 'Facebook', 'facebook.com', NULL, 2, 1, '2023-11-08 17:20:01', '2023-11-08 17:20:01'),
(3, 'Instagram', 'instagram.com', 'prueba de plataforma', 3, 1, '2023-11-08 17:57:15', '2023-11-08 17:57:15'),
(4, 'FB', 'facebook.com/geje', NULL, 6, 1, '2023-11-09 18:22:29', '2023-11-09 18:22:29'),
(5, 'IG', 'instagram.com/geje', 'Prueba', 6, 1, '2023-11-09 18:24:06', '2023-11-09 18:24:06'),
(6, 'TK', 'tiktok.com/elarriero', 'prueba', 2, 1, '2023-11-09 18:30:06', '2023-11-09 18:30:06'),
(7, 'IG', 'instagram.com/elarriero', 'prueba el arriero ig', 2, 1, '2023-11-09 18:42:17', '2023-11-09 18:42:17'),
(8, 'Facebook', 'facebook.com/tmall', 'plataforma de prueba FB', 3, 1, '2023-11-10 19:17:06', '2023-11-10 19:17:06'),
(9, 'TK', 'tiktok.com/tmall', NULL, 3, 1, '2023-11-10 21:16:33', '2023-11-10 21:16:33'),
(10, 'Facebook', 'www.facebook.com/cliente', 'dgfdsg', 24, 1, '2023-12-16 01:37:43', '2023-12-16 01:37:43'),
(11, 'instagram', 'instgram.com/cc', 'df', 24, 1, '2023-12-16 01:37:58', '2023-12-16 01:37:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

CREATE TABLE `publicaciones` (
  `id` bigint UNSIGNED NOT NULL,
  `estado` enum('pendiente','publicado','en revision') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pendiente',
  `fechaPublicacion` date DEFAULT NULL,
  `linkContenido` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `postCopyPublicacion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `copyDiseno` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `linkReferencia` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `linkDescargaRecursos` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `observaciones` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `idParilla` bigint UNSIGNED DEFAULT NULL,
  `idTipoContenido` bigint UNSIGNED DEFAULT NULL,
  `idEstado` bigint UNSIGNED DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `publicaciones`
--

INSERT INTO `publicaciones` (`id`, `estado`, `fechaPublicacion`, `linkContenido`, `postCopyPublicacion`, `copyDiseno`, `linkReferencia`, `linkDescargaRecursos`, `observaciones`, `idParilla`, `idTipoContenido`, `idEstado`, `created_at`, `updated_at`) VALUES
(1, 'pendiente', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-10 18:42:49', '2023-11-10 18:42:49'),
(2, 'pendiente', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-10 18:44:26', '2023-11-10 18:44:26'),
(3, 'pendiente', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-10 18:45:47', '2023-11-10 18:45:47'),
(4, 'pendiente', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-10 18:49:37', '2023-11-10 18:49:37'),
(5, 'pendiente', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-10 18:54:43', '2023-11-10 18:54:43'),
(6, 'pendiente', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-10 18:55:33', '2023-11-10 18:55:33'),
(7, 'pendiente', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-10 20:03:16', '2023-11-10 20:03:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones_plataformas`
--

CREATE TABLE `publicaciones_plataformas` (
  `id` bigint UNSIGNED NOT NULL,
  `idPublicacion` bigint UNSIGNED NOT NULL,
  `idPlataforma` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicacion_empleados`
--

CREATE TABLE `publicacion_empleados` (
  `id` bigint UNSIGNED NOT NULL,
  `fechaAsignacion` date NOT NULL,
  `idEmpleado` bigint UNSIGNED NOT NULL,
  `idPublicacion` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', NULL, NULL),
(2, 'Community', NULL, NULL),
(3, 'Diseñador', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefonos_administradores`
--

CREATE TABLE `telefonos_administradores` (
  `id` bigint UNSIGNED NOT NULL,
  `numero` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idAdministrador` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefonos_empleados`
--

CREATE TABLE `telefonos_empleados` (
  `id` bigint UNSIGNED NOT NULL,
  `numero` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idEmpleado` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_contenido`
--

CREATE TABLE `tipos_contenido` (
  `id` bigint UNSIGNED NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ejemplo` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idEstado` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipos_contenido`
--

INSERT INTO `tipos_contenido` (`id`, `nombre`, `descripcion`, `ejemplo`, `idEstado`, `created_at`, `updated_at`) VALUES
(1, 'Imagen 1:1', 'Imagen 1080*1080', 'url', 1, '2023-11-27 03:54:54', '2023-11-27 03:54:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_identificacion`
--

CREATE TABLE `tipos_identificacion` (
  `id` bigint UNSIGNED NOT NULL,
  `nombre` enum('Cédula de ciudadanía','Cédula de extranjería','Pasaporte','NIT') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipos_identificacion`
--

INSERT INTO `tipos_identificacion` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'NIT', NULL, NULL),
(2, 'Cédula de ciudadanía', NULL, NULL),
(3, 'Cédula de extranjería', NULL, NULL),
(4, 'Pasaporte', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', 'admin@seiskagencia.com', NULL, '$2y$10$RNO0X9Mnr4XbAcxmYD.7yuurkRdUzoJTKN0qi5V/8EwtG4xFkP7aa', NULL, '2023-10-31 19:48:53', '2023-10-31 19:48:53');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `administradores_identificacion_unique` (`identificacion`);

--
-- Indices de la tabla `asignaciones`
--
ALTER TABLE `asignaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `asignaciones_idcliente_foreign` (`idCliente`),
  ADD KEY `asignaciones_idempleado_foreign` (`idEmpleado`),
  ADD KEY `asignaciones_idestado_foreign` (`idEstado`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clientes_identificacion_unique` (`identificacion`),
  ADD KEY `clientes_idadministrador_foreign` (`idAdministrador`),
  ADD KEY `clientes_idtipoidentificacion_foreign` (`idTipoIdentificacion`),
  ADD KEY `clientes_idestado_foreign` (`idEstado`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `empleados_idtipoidentificacion_foreign` (`idTipoIdentificacion`),
  ADD KEY `empleados_idrol_foreign` (`idRol`),
  ADD KEY `empleados_idestado_foreign` (`idEstado`);

--
-- Indices de la tabla `empleados_habilidades`
--
ALTER TABLE `empleados_habilidades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `empleados_habilidades_idempleado_foreign` (`idEmpleado`),
  ADD KEY `empleados_habilidades_idhabilidad_foreign` (`idHabilidad`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estado_notificacion`
--
ALTER TABLE `estado_notificacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estado_notificacion_idnotificacion_foreign` (`idNotificacion`),
  ADD KEY `estado_notificacion_idempleado_foreign` (`idEmpleado`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `habilidades`
--
ALTER TABLE `habilidades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `habilidades_idempleado_foreign` (`idEmpleado`),
  ADD KEY `habilidades_idestado_foreign` (`idEstado`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notificaciones_idestado_foreign` (`idEstado`),
  ADD KEY `notificaciones_idempleado_foreign` (`idEmpleado`),
  ADD KEY `notificaciones_idpublicacion_foreign` (`idPublicacion`);

--
-- Indices de la tabla `notificacion_empleado`
--
ALTER TABLE `notificacion_empleado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notificacion_empleado_idnotificacion_foreign` (`idNotificacion`),
  ADD KEY `notificacion_empleado_idempleado_foreign` (`idEmpleado`);

--
-- Indices de la tabla `parrillas`
--
ALTER TABLE `parrillas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parrillas_idcliente_foreign` (`idCliente`),
  ADD KEY `parrillas_idestado_foreign` (`idEstado`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `plataformas`
--
ALTER TABLE `plataformas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `plataformas_idcliente_foreign` (`idCliente`),
  ADD KEY `plataformas_idestado_foreign` (`idEstado`);

--
-- Indices de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `publicaciones_idparilla_foreign` (`idParilla`),
  ADD KEY `publicaciones_idtipocontenido_foreign` (`idTipoContenido`),
  ADD KEY `publicaciones_idestado_foreign` (`idEstado`);

--
-- Indices de la tabla `publicaciones_plataformas`
--
ALTER TABLE `publicaciones_plataformas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `publicaciones_plataformas_idpublicacion_foreign` (`idPublicacion`),
  ADD KEY `publicaciones_plataformas_idplataforma_foreign` (`idPlataforma`);

--
-- Indices de la tabla `publicacion_empleados`
--
ALTER TABLE `publicacion_empleados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `publicacion_empleados_idempleado_foreign` (`idEmpleado`),
  ADD KEY `publicacion_empleados_idpublicacion_foreign` (`idPublicacion`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `telefonos_administradores`
--
ALTER TABLE `telefonos_administradores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `telefonos_administradores_idadministrador_foreign` (`idAdministrador`);

--
-- Indices de la tabla `telefonos_empleados`
--
ALTER TABLE `telefonos_empleados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `telefonos_empleados_idempleado_foreign` (`idEmpleado`);

--
-- Indices de la tabla `tipos_contenido`
--
ALTER TABLE `tipos_contenido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipos_contenido_idestado_foreign` (`idEstado`);

--
-- Indices de la tabla `tipos_identificacion`
--
ALTER TABLE `tipos_identificacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `asignaciones`
--
ALTER TABLE `asignaciones`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `empleados_habilidades`
--
ALTER TABLE `empleados_habilidades`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `estado_notificacion`
--
ALTER TABLE `estado_notificacion`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `habilidades`
--
ALTER TABLE `habilidades`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `notificacion_empleado`
--
ALTER TABLE `notificacion_empleado`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `parrillas`
--
ALTER TABLE `parrillas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `plataformas`
--
ALTER TABLE `plataformas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `publicaciones_plataformas`
--
ALTER TABLE `publicaciones_plataformas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `publicacion_empleados`
--
ALTER TABLE `publicacion_empleados`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `telefonos_administradores`
--
ALTER TABLE `telefonos_administradores`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `telefonos_empleados`
--
ALTER TABLE `telefonos_empleados`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipos_contenido`
--
ALTER TABLE `tipos_contenido`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tipos_identificacion`
--
ALTER TABLE `tipos_identificacion`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asignaciones`
--
ALTER TABLE `asignaciones`
  ADD CONSTRAINT `asignaciones_idcliente_foreign` FOREIGN KEY (`idCliente`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `asignaciones_idempleado_foreign` FOREIGN KEY (`idEmpleado`) REFERENCES `empleados` (`id`),
  ADD CONSTRAINT `asignaciones_idestado_foreign` FOREIGN KEY (`idEstado`) REFERENCES `estados` (`id`);

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_idadministrador_foreign` FOREIGN KEY (`idAdministrador`) REFERENCES `administradores` (`id`),
  ADD CONSTRAINT `clientes_idestado_foreign` FOREIGN KEY (`idEstado`) REFERENCES `estados` (`id`),
  ADD CONSTRAINT `clientes_idtipoidentificacion_foreign` FOREIGN KEY (`idTipoIdentificacion`) REFERENCES `tipos_identificacion` (`id`);

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `empleados_idestado_foreign` FOREIGN KEY (`idEstado`) REFERENCES `estados` (`id`),
  ADD CONSTRAINT `empleados_idrol_foreign` FOREIGN KEY (`idRol`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `empleados_idtipoidentificacion_foreign` FOREIGN KEY (`idTipoIdentificacion`) REFERENCES `tipos_identificacion` (`id`);

--
-- Filtros para la tabla `empleados_habilidades`
--
ALTER TABLE `empleados_habilidades`
  ADD CONSTRAINT `empleados_habilidades_idempleado_foreign` FOREIGN KEY (`idEmpleado`) REFERENCES `empleados` (`id`),
  ADD CONSTRAINT `empleados_habilidades_idhabilidad_foreign` FOREIGN KEY (`idHabilidad`) REFERENCES `habilidades` (`id`);

--
-- Filtros para la tabla `estado_notificacion`
--
ALTER TABLE `estado_notificacion`
  ADD CONSTRAINT `estado_notificacion_idempleado_foreign` FOREIGN KEY (`idEmpleado`) REFERENCES `empleados` (`id`),
  ADD CONSTRAINT `estado_notificacion_idnotificacion_foreign` FOREIGN KEY (`idNotificacion`) REFERENCES `notificaciones` (`id`);

--
-- Filtros para la tabla `habilidades`
--
ALTER TABLE `habilidades`
  ADD CONSTRAINT `habilidades_idempleado_foreign` FOREIGN KEY (`idEmpleado`) REFERENCES `empleados` (`id`),
  ADD CONSTRAINT `habilidades_idestado_foreign` FOREIGN KEY (`idEstado`) REFERENCES `estados` (`id`);

--
-- Filtros para la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD CONSTRAINT `notificaciones_idempleado_foreign` FOREIGN KEY (`idEmpleado`) REFERENCES `empleados` (`id`),
  ADD CONSTRAINT `notificaciones_idestado_foreign` FOREIGN KEY (`idEstado`) REFERENCES `estados` (`id`),
  ADD CONSTRAINT `notificaciones_idpublicacion_foreign` FOREIGN KEY (`idPublicacion`) REFERENCES `publicaciones` (`id`);

--
-- Filtros para la tabla `notificacion_empleado`
--
ALTER TABLE `notificacion_empleado`
  ADD CONSTRAINT `notificacion_empleado_idempleado_foreign` FOREIGN KEY (`idEmpleado`) REFERENCES `empleados` (`id`),
  ADD CONSTRAINT `notificacion_empleado_idnotificacion_foreign` FOREIGN KEY (`idNotificacion`) REFERENCES `notificaciones` (`id`);

--
-- Filtros para la tabla `parrillas`
--
ALTER TABLE `parrillas`
  ADD CONSTRAINT `parrillas_idcliente_foreign` FOREIGN KEY (`idCliente`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `parrillas_idestado_foreign` FOREIGN KEY (`idEstado`) REFERENCES `estados` (`id`);

--
-- Filtros para la tabla `plataformas`
--
ALTER TABLE `plataformas`
  ADD CONSTRAINT `plataformas_idcliente_foreign` FOREIGN KEY (`idCliente`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `plataformas_idestado_foreign` FOREIGN KEY (`idEstado`) REFERENCES `estados` (`id`);

--
-- Filtros para la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD CONSTRAINT `publicaciones_idestado_foreign` FOREIGN KEY (`idEstado`) REFERENCES `estados` (`id`),
  ADD CONSTRAINT `publicaciones_idparilla_foreign` FOREIGN KEY (`idParilla`) REFERENCES `parrillas` (`id`),
  ADD CONSTRAINT `publicaciones_idtipocontenido_foreign` FOREIGN KEY (`idTipoContenido`) REFERENCES `tipos_contenido` (`id`);

--
-- Filtros para la tabla `publicaciones_plataformas`
--
ALTER TABLE `publicaciones_plataformas`
  ADD CONSTRAINT `publicaciones_plataformas_idplataforma_foreign` FOREIGN KEY (`idPlataforma`) REFERENCES `plataformas` (`id`),
  ADD CONSTRAINT `publicaciones_plataformas_idpublicacion_foreign` FOREIGN KEY (`idPublicacion`) REFERENCES `publicaciones` (`id`);

--
-- Filtros para la tabla `publicacion_empleados`
--
ALTER TABLE `publicacion_empleados`
  ADD CONSTRAINT `publicacion_empleados_idempleado_foreign` FOREIGN KEY (`idEmpleado`) REFERENCES `empleados` (`id`),
  ADD CONSTRAINT `publicacion_empleados_idpublicacion_foreign` FOREIGN KEY (`idPublicacion`) REFERENCES `publicaciones` (`id`);

--
-- Filtros para la tabla `telefonos_administradores`
--
ALTER TABLE `telefonos_administradores`
  ADD CONSTRAINT `telefonos_administradores_idadministrador_foreign` FOREIGN KEY (`idAdministrador`) REFERENCES `administradores` (`id`);

--
-- Filtros para la tabla `telefonos_empleados`
--
ALTER TABLE `telefonos_empleados`
  ADD CONSTRAINT `telefonos_empleados_idempleado_foreign` FOREIGN KEY (`idEmpleado`) REFERENCES `empleados` (`id`);

--
-- Filtros para la tabla `tipos_contenido`
--
ALTER TABLE `tipos_contenido`
  ADD CONSTRAINT `tipos_contenido_idestado_foreign` FOREIGN KEY (`idEstado`) REFERENCES `estados` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
