-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : jeu. 25 fév. 2021 à 09:19
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
(219, 30, 2, 1),
(220, 41, 2, 1),
(221, 38, 2, 1),
(222, 39, 1, 1),
(223, 39, 2, 1);

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
(32, '60351779b0d18.jpg', 42, '');

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
(28, 'Masque tête de mort', 'À la mode ou sportif ? Votre style est unique.\r\nC\'est vous qui choisissez le style que vous voulez porter. Vous disposez de plusieurs catégories : couleurs pleines, géométries, motifs et différents visuels. Faites votre choix parmi les 270 motifs disponibles. Si vous ne trouvez pas ce que vous recherchez, vous avez la possibilité de télécharger votre visuel et ainsi personnaliser votre trumask™ à partir d\'un seul exemplaire.\r\n', 9.99, 15, 2),
(30, 'Masque cercles', 'Masque grand public en tissu à motifs cerclés, fabriqué en France, catégorie 1.', 8.99, 6, 2),
(34, 'Veste en jeans', 'Veste en jeans bleu denim avec col et manches longues. Les manches sont boutonnées. Cette veste se portera parfaitement au printemps comme en automne.', 69.99, 26, 1),
(37, 'Short en jeans', 'Short en jean taille haute à revers - Bleu moyen', 29.99, 30, 1),
(38, 'Sweat enfant', 'Sweat à capuche pour enfant entre 9 et 11 ans, multi-color et adapté à l\'hiver', 45.99, 16, 3),
(39, 'Masque à pois', 'Masque à pois taille adulte, fabriqué en France. Confortable et aéré, vous pourrez le porter toute la journée sans craindre d\'être gêné.', 7.99, 25, 2),
(40, 'Masque Navy', 'Masque en tissu couleur navy qui se fondra parfaitement avec votre tenue d\'hiver. Confortable et aéré, vous pourrez le porter tout au long de la journée sans craindre d\'être gêné.', 10.99, 40, 2),
(41, 'Masque éventail', 'Masque à motifs éventails rose pale. Taille adulte, lanière élastiques et étirables. Sa légèreté vous garantira un confort optimal tout au long de votre journée. Idéale pour les balades longue durée.', 9.99, 4, 2),
(42, 'Masque éventail 2', 'Masque à motifs éventails vert pale. Taille adulte, lanière élastiques et étirables. Sa légèreté vous garantira un confort optimal tout au long de votre journée. Idéale pour les balades longue durée.', 9.99, 0, 2);

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
(16, 'Super masque ! Je ne regrette pas du tout mon achat.', 30, 2, 1);

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
(1, 'Admin', 'admin@gmail.com', 'admin', 5),
(2, 'Guest', 'guest@gmail.com', 'guest', 1),
(3, 'Visitor', 'visitor@gmail.com', 'visitor', 1),
(5, 'Visitor2', 'visitor2@gmail.com', 'visitor2', 1),
(6, 'Visitor3', 'visitor3@gmail.com', 'visitor3', 1);

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
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=224;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `images`
--
ALTER TABLE `images`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT pour la table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
