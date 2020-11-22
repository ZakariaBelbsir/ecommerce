-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 11 juin 2019 à 13:37
-- Version du serveur :  10.1.37-MariaDB
-- Version de PHP :  7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ecommerce`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

CREATE TABLE `admins` (
  `adminId` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`adminId`, `email`, `password`) VALUES
(1, 'admin@admin.com', '123456789');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `categoryId` int(11) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`categoryId`, `category`) VALUES
(3, 'Phones'),
(4, 'Electronics'),
(5, 'Garden'),
(6, 'Computer'),
(7, 'Home');

-- --------------------------------------------------------

--
-- Structure de la table `command`
--

CREATE TABLE `command` (
  `commandRef` varchar(255) NOT NULL,
  `userId` int(11) NOT NULL,
  `commandDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `command`
--

INSERT INTO `command` (`commandRef`, `userId`, `commandDate`) VALUES
('myshop_cmd5ce096529b84d5.30086406', 1, '2019-05-19'),
('myshop_cmd5ce096a006c297.90395236', 1, '2019-05-19'),
('myshop_cmd5ce0996ae7fee9.15577865', 1, '2019-06-05');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `productId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(11) UNSIGNED NOT NULL,
  `pictures` varchar(255) NOT NULL,
  `sales` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`productId`, `name`, `description`, `category`, `price`, `quantity`, `pictures`, `sales`) VALUES
(3, 'Kitchen Set', 'Home Test', 'Home', 100, 90, 'photos/cp1.jpg', 33),
(4, 'Test 2', 'TEST PRODUCT 2', 'Computer', 3000, 93, 'photos/apple-macbook-pro-15-inch-2017-14.jpg', 10),
(5, 'Test 3', 'TEST PRODUCT 3', 'Electronics', 200, 94, 'photos/bracelet-apple-watch-golf.jpg', 11),
(6, 'Test 4', 'TEST PRODUCT 4', 'Phones', 1000, 98, 'photos/iPhoneX-Svr.png', 3),
(7, 'Product 1 ', 'product', 'Home', 100, 99, '', 4),
(8, 'Test 2', 'avcds', 'Home', 100, 99, '', 3),
(9, 'Test 2', 'azdsqdq', 'Home', 1200, 99, '', 3),
(10, 'Test 2', 'azdsqcxcx', 'Home', 200, 100, '', 0),
(11, 'Test 2', 'azsqdcxwxvcvw', 'Home', 100, 100, '', 0),
(12, 'Test 4', 'TEST PRODUCT 4', 'Garden', 200, 99, '', 6),
(13, 'Sony Xperia Z3', 'Amazing phone', 'Phones', 250, 91, 'photos/xperia.png', 17),
(14, 'Mobile Phone X', 'some phone', 'Phones', 1000, 99, 'photos/iPhoneX-Svr.png', 3),
(15, 'Laptop', 'AWESOME LAPTOP', 'Home', 1200, 99, '', 2),
(16, 'Gaming Chair', 'Very comfortable gaming chair', 'Computer', 600, 50, 'photos/10574298.jpg', 0),
(18, 'Watering Can', 'Light-weight watering can', 'Garden', 20, 100, 'photos/watering-can-clipart-9.jpg', 0);

-- --------------------------------------------------------

--
-- Structure de la table `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `userId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  `complete` tinyint(4) NOT NULL,
  `commandRef` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `shoppingcart`
--

INSERT INTO `shoppingcart` (`userId`, `productId`, `quantity`, `price`, `complete`, `commandRef`) VALUES
(1, 3, 1, 100, 1, 'myshop_cmd5ce096529b84d5.30086406'),
(1, 3, 1, 100, 1, 'myshop_cmd5ce096529b84d5.30086406'),
(1, 3, 1, 100, 1, 'myshop_cmd5ce096a006c297.90395236'),
(1, 3, 1, 100, 1, 'myshop_cmd5ce0996ae7fee9.15577865'),
(1, 13, 1, 250, 1, 'myshop_cmd5ce0996ae7fee9.15577865'),
(1, 5, 1, 200, 1, 'myshop_cmd5ce0996ae7fee9.15577865');

-- --------------------------------------------------------

--
-- Structure de la table `transactions_paypal`
--

CREATE TABLE `transactions_paypal` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_id` varchar(255) NOT NULL,
  `hash` varchar(255) NOT NULL,
  `complete` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `transactions_paypal`
--

INSERT INTO `transactions_paypal` (`id`, `user_id`, `payment_id`, `hash`, `complete`) VALUES
(14, 1, 'PAYID-LTOBP7Y2D7827618C9086703', 'aed5dd2131e5c36834f411759bd34b16', 1),
(15, 1, 'PAYID-LTOBRQQ30R31644RM761243N', '5c4a530db5e8bc7ae6bd42f5d073a625', 1),
(16, 1, 'PAYID-LTOCBEY9B139991YR612615B', '93aff5cc520637768a5ecb179e35c130', 1),
(17, 1, 'PAYID-LTODASA5GK48594L6403962X', '706805e0b86c094295093897f76264e3', 1),
(18, 1, 'PAYID-LTODDBI6G013435BK746843K', '017d891a3fbd200e5a2e8dd5498983b0', 1),
(19, 1, 'PAYID-LTODD6Y4G101656BX8085537', '95f78d9fb7c730901d603ffa05eb522e', 1),
(20, 1, 'PAYID-LTODI3A73D91883S2595331X', 'f3f276511fe0ee16beedc8e8e13a96a6', 1),
(21, 1, 'PAYID-LTODJOI5AR26316PL022035V', 'daa37d82c975f8591610300839a2021d', 1),
(22, 1, 'PAYID-LTODKSI4C752649G2319942A', '44682028c268a44f8396e7efa217c887', 1),
(23, 1, 'PAYID-LTODPAY0HR84011UD073731R', '3e291fa201ab4d5a4e425c41e7aebc8d', 1),
(24, 1, 'PAYID-LTOSVCY2LS50769D1591740X', 'd98b4a9e13197e5a275f1b53e67e2672', 1),
(25, 1, 'PAYID-LTOSV6A6AX399616L545660S', '1493b1a08b062ba1a46fb20cfde15394', 1),
(26, 1, 'PAYID-LTPRPQA82V59698WS293163G', '375a53a7c90e7f4d7dd871daa9895e0c', 1),
(27, 1, 'PAYID-LTPTYXY41E000543G550670U', 'fbe3f680e6649d30c12347359801aa0e', 1),
(28, 1, 'PAYID-LTQFHKQ6Y153382CC754425B', 'b205cde9a75a8b7a916fbaecae863f5d', 1),
(29, 1, 'PAYID-LTQFJHI9HW40170PD014905P', '006c044fd497312e6df6a992b55b9b7a', 1),
(30, 1, 'PAYID-LTQFKTY4JP55973PS302744W', '42967807fbc1e88376bc6f27a6fd020b', 1),
(31, 1, 'PAYID-LTQGMWY74A41192PK222481C', 'cb713707098d662712c5ae0f360645c4', 1),
(32, 1, 'PAYID-LTQGNFQ7DM40845AR865470T', 'aa5a1579e55754dd8664c136bf841d22', 1),
(33, 1, 'PAYID-LTQGN7A32238127E8961110K', '66a205fa12d08d3bca58e3fa2cd9f8d7', 1),
(34, 1, 'PAYID-LTQGRKI4TT20510R8253524C', 'fb1d839b52d0f59ec260197cf6eda105', 1),
(35, 1, 'PAYID-LTQGSCY1NG19664J4430300A', '3735228398c45031421b801549360fc7', 0),
(36, 1, 'PAYID-LTQIOUQ7S062795DW365662B', '8d454fdb4c28338f7a935187b42d8b76', 1),
(37, 1, 'PAYID-LTQJHDA45295262LT105604A', '14ac3d9561637eefecf696a5ba5d5ac2', 1),
(38, 1, 'PAYID-LTQJKOA6M029069J1030510P', '2ef4053e9d93e84e3eab494576f97ee1', 1),
(39, 1, 'PAYID-LTQJLEA3YK23580TW399080D', '18cd7aa8f6e2f5aa006861740641fdcf', 1),
(40, 1, 'PAYID-LTQJMFI61L2238085002061V', 'c6102c049acc3c983715fee1739a8656', 1),
(41, 1, 'PAYID-LTQJMPQ4G278842C5288844Y', 'b8063a01684b39d81bbd9b2a1c54a90f', 1),
(42, 1, 'PAYID-LTQJNCI5GB57655AG600045D', 'c2c0fe7c4ad5e6d4beeac0fa912786ac', 1),
(43, 1, 'PAYID-LTQJSOQ3HA35062GJ0257806', '8c75e762f7f0b1e5d63adcbc70e58876', 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `userId` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  `phone` varchar(12) NOT NULL,
  `city` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  `adress` varchar(100) NOT NULL,
  `zip` varchar(8) NOT NULL,
  `subDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`userId`, `name`, `email`, `password`, `active`, `phone`, `city`, `country`, `adress`, `zip`, `subDate`) VALUES
(1, 'Zakaria', 'iisga.tsdi2019@gmail.com', '25f9e794323b453885f5181f1b624d0b', 1, '0645418766', 'azerezaraz', 'reazrareza', 'azrezarzea', 'rzaerazr', '2019-03-21'),
(2, 'Zakaria', 'zakaria.belbsir@yahoo.com', '9d49c675b06d082684093982b464fe24', 1, '', '', '', '', '', '2019-05-29');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`adminId`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryId`);

--
-- Index pour la table `command`
--
ALTER TABLE `command`
  ADD PRIMARY KEY (`commandRef`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productId`);

--
-- Index pour la table `transactions_paypal`
--
ALTER TABLE `transactions_paypal`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admins`
--
ALTER TABLE `admins`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `transactions_paypal`
--
ALTER TABLE `transactions_paypal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
