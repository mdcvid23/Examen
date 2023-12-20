# Examen

Instrucciones para descargar y ejecutar el proyecto

Intalar XAMPP v3.3.0  //https://www.apachefriends.org/es/download.html

Instalar Composer Latest: v2.6.6 //https://getcomposer.org/download/

Clonar proyecto desde el repo

Una vez descargado el proyecto, inicie el servidor de desarrollo local de Laravel usando serveel comando de Laravel Artisan:

```cd example```
 
```php artisan serve```

Acceder a /create



Archivo de BD
-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generaciÃ³n: 20-12-2023 a las 11:20:38
-- VersiÃ³n del servidor: 10.4.32-MariaDB
-- VersiÃ³n de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `laravel`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `sku` varchar(255) NOT NULL,
  `precio` decimal(8,2) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `habilitar` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `sku`, `precio`, `cantidad`, `imagen`, `created_at`, `updated_at`, `habilitar`) VALUES
(41, 'coca cola', 'Coca-Cola es una bebida azucarada gaseosa vendida a nivel mundial en tiendas, restaurantes y mÃ¡quinas expendedoras en mÃ¡s de doscientos paÃ­ses o territorios.', 'pro-037ola', 23.00, 23, NULL, '2023-12-20 16:18:10', '2023-12-20 16:18:10', 1),
(42, 'cheetos fl', 'El sabor extrapicante y condimentado comprimido en estos bocadillos crujientes y con queso harÃ¡ que te suba la temperatura. SentirÃ¡s mucho mÃ¡s picor con los CHEETOS', 'pro-759 fl', 2.00, 45, NULL, '2023-12-20 16:19:05', '2023-12-20 16:19:05', 1);

--
-- Ãndices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
