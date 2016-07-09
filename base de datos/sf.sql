-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 09, 2016 at 12:44 PM
-- Server version: 5.5.49-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sf`
--

-- --------------------------------------------------------

--
-- Table structure for table `conceptos`
--

CREATE TABLE IF NOT EXISTS `conceptos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `tipo` enum('Ingreso','Egreso') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Ingreso',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `conceptos`
--

INSERT INTO `conceptos` (`id`, `nombre`, `descripcion`, `tipo`, `created_at`, `updated_at`) VALUES
(1, 'Cuentas Por Pagar', 'Cuentas Por Pagar', 'Egreso', '2016-07-09 20:43:10', '2016-07-09 20:43:10'),
(2, 'Cuentas Por Cobrar', 'Cuentas Por Cobrar', 'Egreso', '2016-07-09 20:43:23', '2016-07-09 20:43:23');

-- --------------------------------------------------------

--
-- Table structure for table `concepto_miembro`
--

CREATE TABLE IF NOT EXISTS `concepto_miembro` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `monto` double NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `estatus` enum('Activo','Inactivo') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Activo',
  `miembro_id` int(10) unsigned NOT NULL,
  `concepto_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `concepto_miembro_miembro_id_foreign` (`miembro_id`),
  KEY `concepto_miembro_concepto_id_foreign` (`concepto_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `concepto_miembro`
--

INSERT INTO `concepto_miembro` (`id`, `monto`, `descripcion`, `estatus`, `miembro_id`, `concepto_id`, `created_at`, `updated_at`) VALUES
(1, 600, 'pago por el servicio de internet', 'Activo', 1, 1, '2016-07-09 20:44:15', '2016-07-09 20:44:15');

-- --------------------------------------------------------

--
-- Table structure for table `familias`
--

CREATE TABLE IF NOT EXISTS `familias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dirección` text COLLATE utf8_unicode_ci NOT NULL,
  `telf` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `foto` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'fam.jpg',
  `estatus` enum('Activo','Inactivo') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Activo',
  `usuario_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `familias_usuario_id_foreign` (`usuario_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `familias`
--

INSERT INTO `familias` (`id`, `nombre`, `dirección`, `telf`, `foto`, `estatus`, `usuario_id`, `created_at`, `updated_at`) VALUES
(1, 'Familia Garces', 'La Beatriz Bloque 39', '02712351310', 'znAxXXAbItbjC0LzIdio.jpg', 'Activo', 1, '2016-07-07 04:46:40', '2016-07-07 06:42:47');

-- --------------------------------------------------------

--
-- Table structure for table `metas`
--

CREATE TABLE IF NOT EXISTS `metas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `metabs` double(15,2) NOT NULL,
  `fecha_limite` date NOT NULL DEFAULT '2016-07-07',
  `prioridad` int(10) unsigned NOT NULL DEFAULT '0',
  `miembro_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `metas_miembro_id_foreign` (`miembro_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `miembros`
--

CREATE TABLE IF NOT EXISTS `miembros` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `telf` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `parentesco` enum('Padre','Madre','Hij@','Herman@','Ti@','Abuel@','Otro') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Padre',
  `foto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `estatus` enum('Activo','Inactivo') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Activo',
  `familia_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `miembros_familia_id_foreign` (`familia_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `miembros`
--

INSERT INTO `miembros` (`id`, `nombre`, `apellido`, `email`, `telf`, `parentesco`, `foto`, `estatus`, `familia_id`, `created_at`, `updated_at`) VALUES
(1, 'Milangela', 'Garces', 'milig_21@hotmail.com', '2351310', 'Madre', 'JYHahhfRMEHHxScjol7D.jpeg', 'Activo', 1, '2016-07-07 08:09:59', '2016-07-09 20:42:12');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_04_21_201157_create_users_table', 1),
('2014_04_21_203655_create_concept_table', 1),
('2014_04_21_203917_create_family', 1),
('2014_04_28_184518_create_members_table', 1),
('2014_04_28_185710_create_goals_table', 1),
('2014_04_28_190723_create_conceptmembers_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `login` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `clave` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `rol` enum('Administrador','Usuario') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Usuario',
  `estatus` enum('Activo','Inactivo') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Activo',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `login`, `clave`, `email`, `rol`, `estatus`, `created_at`, `updated_at`) VALUES
(1, 'jose miguel', 'm3taljose@gmail.com', '$2y$10$/YUy4wUA5otQniNJrGvPuO0SjkUxtGg7vLDcqWgHjvnYeY5QHZ1bu', 'm3taljose@gmail.com', 'Administrador', 'Activo', '2016-07-07 04:46:40', '2016-07-07 04:46:40');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `concepto_miembro`
--
ALTER TABLE `concepto_miembro`
  ADD CONSTRAINT `concepto_miembro_concepto_id_foreign` FOREIGN KEY (`concepto_id`) REFERENCES `conceptos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `concepto_miembro_miembro_id_foreign` FOREIGN KEY (`miembro_id`) REFERENCES `miembros` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `familias`
--
ALTER TABLE `familias`
  ADD CONSTRAINT `familias_usuario_id_foreign` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `metas`
--
ALTER TABLE `metas`
  ADD CONSTRAINT `metas_miembro_id_foreign` FOREIGN KEY (`miembro_id`) REFERENCES `miembros` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `miembros`
--
ALTER TABLE `miembros`
  ADD CONSTRAINT `miembros_familia_id_foreign` FOREIGN KEY (`familia_id`) REFERENCES `familias` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
