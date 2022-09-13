-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : mar. 13 sep. 2022 à 13:51
-- Version du serveur : 5.7.34
-- Version de PHP : 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `e-boutique-php`
--

-- --------------------------------------------------------

--
-- Structure de la table `e_boutique_php_category`
--

CREATE TABLE `e_boutique_php_category` (
  `id_category` int(11) NOT NULL,
  `name_category` varchar(40) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `e_boutique_php_category`
--

INSERT INTO `e_boutique_php_category` (`id_category`, `name_category`) VALUES
(1, 'Ballerine'),
(2, 'Basse'),
(3, 'Haute'),
(4, 'Original'),
(5, 'Swag');

-- --------------------------------------------------------

--
-- Structure de la table `e_boutique_php_order`
--

CREATE TABLE `e_boutique_php_order` (
  `id_order` int(11) NOT NULL,
  `date_order` datetime NOT NULL,
  `email_user` varchar(50) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity_order` int(11) NOT NULL,
  `total_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `e_boutique_php_order`
--

INSERT INTO `e_boutique_php_order` (`id_order`, `date_order`, `email_user`, `id_product`, `quantity_order`, `total_order`) VALUES
(2, '2022-09-13 15:24:29', 'tony.stark@mail.com', 3, 1, 49);

-- --------------------------------------------------------

--
-- Structure de la table `e_boutique_php_product`
--

CREATE TABLE `e_boutique_php_product` (
  `id_product` int(11) NOT NULL,
  `name_product` varchar(25) CHARACTER SET utf8 DEFAULT NULL,
  `image_product` varchar(40) DEFAULT NULL,
  `price_product` float DEFAULT NULL,
  `description_product` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `id_category` int(11) NOT NULL,
  `type` enum('new','old') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `e_boutique_php_product`
--

INSERT INTO `e_boutique_php_product` (`id_product`, `name_product`, `image_product`, `price_product`, `description_product`, `id_category`, `type`) VALUES
(1, 'Ballerine Bleue', 'ballerine_bleu.jpe', 49, 'Converse de type Ballerine de couleur Bleue', 1, 'old'),
(2, 'Ballerine Rose', 'ballerine_rose.jpe', 49, 'Converse de type Ballerine de couleur Rose', 1, 'old'),
(3, 'Ballerine Marinière', 'ballerine_mariniere.jpe', 49, 'Converse de type Ballerine avec motif Marinière', 1, 'new'),
(4, 'Basse Bleu Clair', 'basse_bleu_clair.jpe', 69, 'Converse de type Basse de couleur Bleu Clair', 2, 'new'),
(5, 'Basse Grise', 'basse_gris.jpe', 69, 'Converse de type Basse de couleur Grise', 2, 'old'),
(6, 'Basse Rose', 'basse_rose.jpe', 69, 'Converse de type Basse de couleur Rose', 2, 'old'),
(7, 'Basse Verte', 'basse_vert.jpe', 69, 'Converse de type Basse de couleur Verte', 2, 'new'),
(8, 'Haute Blanche', 'haute_blanc.jpe', 79, 'Converse de type Haute de couleur Blanche', 3, 'old'),
(9, 'Haute Grise', 'haute_gris.jpe', 79, 'Converse de type Haute de couleur Grise', 3, 'old'),
(10, 'Haute Noire', 'haute_noir.jpe', 79, 'Converse de type Haute de couleur Noire', 3, 'old'),
(11, 'Haute Rouge', 'haute_rouge.jpe', 79, 'Converse de type Haute de couleur Rouge', 3, 'new'),
(12, 'Original Cerise', 'original_cerise.jpe', 75, 'Converse de type Originale avec motif Cerise', 4, 'old'),
(13, 'Original Pois', 'original_pois.jpe', 75, 'Converse de type Original avec motif Pois', 4, 'old'),
(14, 'Original Fleur', 'original_fleur.jpe', 75, 'Converse de type Original avec motif Fleur', 4, 'new'),
(15, 'Original Superman', 'original_superman.jpe', 85, 'Converse de type Original avec motif Superman', 4, 'new'),
(16, 'Swag Bleue', 'swag_bleu.jpe', 110, 'Converse de type Swag de couleur Bleue', 5, 'new'),
(17, 'Swag Noire', 'swag_noir.jpe', 110, 'Converse de type Swag de couleur Noire', 5, 'old'),
(18, 'Ballerine Grise', 'ballerine_gris.jpe', 49, 'Converse de type Ballerine de couleur Grise', 1, 'old'),
(19, 'Ballerine Noire', 'ballerine_noir.jpe', 49, 'Converse de type Ballerine de couleur Noire', 1, 'old'),
(20, 'Basse Blanche', 'basse_blanc.jpe', 69, 'Converse de type Basse de couleur Blanche', 2, 'old'),
(21, 'Basse Bleu Foncé', 'basse_bleu_fonce.jpe', 69, 'Converse de type Basse de couleur Bleu Foncé', 1, 'old'),
(22, 'Basse Violette', 'basse_violet.jpe', 69, 'Converse de type Basse de couleur Violette', 2, 'new'),
(23, 'Haute Bleue', 'haute_bleu.jpe', 79, 'Converse de type Haute de couleur Bleue', 3, 'new'),
(24, 'Haute Marron', 'haute_marron.jpe', 79, 'Converse de type Haute de couleur Marron', 3, 'old'),
(25, 'Haute Rose', 'haute_rose.jpe', 79, 'Converse de type Haute de couleur Rose', 3, 'new'),
(26, 'Original Angleterre', 'original_angleterre.jpe', 75, 'Converse de type Original avec motif Angleterre', 4, 'new'),
(27, 'Original Clous', 'original_clous.jpe', 85, 'Converse de type Original avec motif Clous', 4, 'new'),
(28, 'Original Léopard', 'original_leopard.jpe', 85, 'Converse de type Original avec motif Léopard', 4, 'old'),
(29, 'Original Rayé', 'origianl_raye.jpe', 85, 'Converse de type Original avec motif Rayé', 4, 'old'),
(30, 'Original Wonder Woman', 'original_wonder_woman.jpe', 75, 'Converse de type Original avec motif Wonder Woman', 4, 'new'),
(31, 'Swag Grise', 'swag_gris.jpe', 110, 'Converse de type Swag de couleur Grise', 5, 'old');

-- --------------------------------------------------------

--
-- Structure de la table `e_boutique_php_user`
--

CREATE TABLE `e_boutique_php_user` (
  `pseudo_user` varchar(20) NOT NULL,
  `last_name_user` varchar(20) NOT NULL,
  `first_name_user` varchar(20) NOT NULL,
  `password_user` varchar(40) NOT NULL,
  `address_user` varchar(40) NOT NULL,
  `postal_code_user` int(11) NOT NULL,
  `city_user` varchar(20) NOT NULL,
  `email_user` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `e_boutique_php_user`
--

INSERT INTO `e_boutique_php_user` (`pseudo_user`, `last_name_user`, `first_name_user`, `password_user`, `address_user`, `postal_code_user`, `city_user`, `email_user`) VALUES
('captainA', 'Rogers', 'Steve', 'ab4f63f9ac65152575886860dde480a1', '569 Leaman Place', 0, 'Brooklyn Heights', 'steve.rogers@mail.com'),
('ironman2', 'Stark', 'Tony', 'ab4f63f9ac65152575886860dde480a1', 'Malibu Point 10880', 90265, 'Malibu', 'tony.stark@mail.com');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `e_boutique_php_category`
--
ALTER TABLE `e_boutique_php_category`
  ADD PRIMARY KEY (`id_category`);

--
-- Index pour la table `e_boutique_php_order`
--
ALTER TABLE `e_boutique_php_order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_user` (`email_user`);

--
-- Index pour la table `e_boutique_php_product`
--
ALTER TABLE `e_boutique_php_product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `id_category` (`id_category`);

--
-- Index pour la table `e_boutique_php_user`
--
ALTER TABLE `e_boutique_php_user`
  ADD PRIMARY KEY (`email_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `e_boutique_php_category`
--
ALTER TABLE `e_boutique_php_category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `e_boutique_php_order`
--
ALTER TABLE `e_boutique_php_order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `e_boutique_php_product`
--
ALTER TABLE `e_boutique_php_product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `e_boutique_php_product`
--
ALTER TABLE `e_boutique_php_product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `e_boutique_php_category` (`id_category`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
