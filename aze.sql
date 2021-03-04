-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : jeu. 04 mars 2021 à 17:10
-- Version du serveur :  5.7.32
-- Version de PHP : 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données : `aze`
--

-- --------------------------------------------------------

--
-- Structure de la table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cart`
--

INSERT INTO `cart` (`cart_id`, `product_id`, `user_id`, `product_quantity`) VALUES
(212, 13, 2, 5),
(213, 25, 2, 5),
(214, 12, 2, 2),
(215, 23, 2, 1),
(216, 8, 2, 1),
(222, 39, 1, 2),
(231, 50, 2, 2),
(292, 47, 1, 1),
(303, 43, 9, 1),
(306, 47, 9, 2),
(307, 50, 9, 3),
(308, 51, 8, 2),
(309, 47, 8, 1);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'Vêtements'),
(2, 'Accessoires'),
(3, 'Enfants');

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE `images` (
  `img_id` int(11) NOT NULL,
  `img_name` varchar(100) NOT NULL,
  `product_id` int(11) NOT NULL,
  `extra_img1` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `images`
--

INSERT INTO `images` (`img_id`, `img_name`, `product_id`, `extra_img1`) VALUES
(20, '60350b00a51a4.jpg', 28, ''),
(21, '60350fca4c302.jpg', 29, ''),
(22, '603510140debf.jpg', 30, ''),
(23, '6035115068d75.jpg', 33, ''),
(24, '603511621bf70.jpg', 34, ''),
(25, '603513054f489.jpg', 35, ''),
(26, '6035133d7085c.jpg', 36, ''),
(27, '6035135766500.jpg', 37, ''),
(28, '603514c95dd83.jpg', 38, ''),
(29, '6035161b51ccc.jpg', 39, ''),
(30, '60351661214e6.jpg', 40, ''),
(31, '6035175d8fb02.jpg', 41, ''),
(32, '60351779b0d18.jpg', 42, ''),
(33, '6039154d6b11a.jpg', 43, ''),
(34, '6039168787965.jpg', 44, ''),
(35, '6039172ca8008.jpg', 45, ''),
(36, '6039177645c3b.jpg', 46, ''),
(37, '6039180525345.jpg', 47, ''),
(38, '603918286f658.jpg', 48, ''),
(39, '60391847eccbb.jpg', 49, ''),
(40, '6039186c78e83.jpg', 50, ''),
(41, '603918ad90bb6.jpg', 51, '');

-- --------------------------------------------------------

--
-- Structure de la table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `total_to_pay` float NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `product_description` text NOT NULL,
  `product_price` float NOT NULL,
  `product_stock` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_description`, `product_price`, `product_stock`, `category_id`) VALUES
(43, 'Masque éventail', 'Masque à motifs éventails rose pale. Taille adulte, lanière élastiques et étirables. Sa légèreté vous garantira un confort optimal tout au long de votre journée. Idéale pour les balades longue durée.', 9.99, 45, 2),
(44, 'Veste en jeans', 'Veste en jeans bleu denim avec col et manches longues. Les manches sont boutonnées. Cette veste se portera parfaitement au printemps comme en automne.', 69.99, 26, 1),
(45, 'Short en jeans', 'Short en jean taille haute à revers - Bleu moyen', 29.99, 30, 1),
(46, 'Masque tête de mort', 'À la mode ou sportif ? Votre style est unique.\r\nC\'est vous qui choisissez le style que vous voulez porter. Vous disposez de plusieurs catégories : couleurs pleines, géométries, motifs et différents visuels. Faites votre choix parmi les 270 motifs disponibles. Si vous ne trouvez pas ce que vous recherchez, vous avez la possibilité de télécharger votre visuel et ainsi personnaliser votre trumask™ à partir d\'un seul exemplaire.\r\n', 9.99, 15, 2),
(47, 'Masque à pois', 'Masque à pois taille adulte, fabriqué en France. Confortable et aéré, vous pourrez le porter toute la journée sans craindre d\'être gêné.', 7.99, 25, 2),
(48, 'Masque Navy', 'Masque en tissu couleur navy qui se fondra parfaitement avec votre tenue d\'hiver. Confortable et aéré, vous pourrez le porter tout au long de la journée sans craindre d\'être gêné.', 10.99, 23, 2),
(49, 'Masque éventail 2', 'Masque à motifs éventails vert pale. Taille adulte, lanière élastiques et étirables. Sa légèreté vous garantira un confort optimal tout au long de votre journée. Idéale pour les balades longue durée.', 9.99, 0, 2),
(50, 'Masque cercles', 'Masque grand public en tissu à motifs cerclés, fabriqué en France, catégorie 1.', 8.99, 6, 2),
(51, 'Sweat enfant', 'Sweat à capuche pour enfant entre 9 et 11 ans, multi-color et adapté à l\'hiver', 45.99, 16, 3);

-- --------------------------------------------------------

--
-- Structure de la table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `review_content` text NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_valid` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reviews`
--

INSERT INTO `reviews` (`review_id`, `review_content`, `product_id`, `user_id`, `is_valid`) VALUES
(16, 'Super masque ! Je ne regrette pas du tout mon achat.', 30, 2, 1),
(19, 'Super masque et très joli', 47, 8, 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_role` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`, `user_role`) VALUES
(8, 'Guest', 'guest@gmail.com', '$2y$10$PMXoJD0yhjqkw5qVqMfMh.SyFFAWonFYceX4D551ixS0yfqRSdQ5S', 1),
(9, 'Admin', 'admin@gmail.com', '$2y$10$AzXbsL38kq4Yd.weZuhyge/rU4uInpuZy4FNWChoGjAOq5khEOW5G', 5),
(43, 'Thuan', 'congthuan274@gmail.com', '$2y$10$w8zDheDH6hywbUHT9um8Xe0jzwi/IE0Szm9zPIdrJJoLNEQap.2Zm', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Index pour la table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`img_id`);

--
-- Index pour la table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Index pour la table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=310;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `images`
--
ALTER TABLE `images`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT pour la table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT pour la table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
