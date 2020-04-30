-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le :  ven. 20 mars 2020 à 10:19
-- Version du serveur :  8.0.18
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `twittos`
--

-- --------------------------------------------------------

--
-- Structure de la table `likespertweet`
--

DROP TABLE IF EXISTS `likespertweet`;
CREATE TABLE IF NOT EXISTS `likespertweet` (
  `IdTweet` int(11) NOT NULL,
  `IdUserLike` int(11) NOT NULL,
  PRIMARY KEY (`IdTweet`,`IdUserLike`),
  KEY `likespertweet` (`IdUserLike`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `rtspertweet`
--

DROP TABLE IF EXISTS `rtspertweet`;
CREATE TABLE IF NOT EXISTS `rtspertweet` (
  `IdTweet` int(11) NOT NULL,
  `IdUserRT` int(11) NOT NULL,
  PRIMARY KEY (`IdTweet`,`IdUserRT`),
  KEY `rtspertweet` (`IdUserRT`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tweets`
--

DROP TABLE IF EXISTS `tweets`;
CREATE TABLE IF NOT EXISTS `tweets` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `IdUsers` int(11) NOT NULL,
  `Content` varchar(255) NOT NULL,
  `Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Likes` int(11) NOT NULL,
  `Retweets` int(11) NOT NULL,
  `BTCs` int(11) NOT NULL,
  PRIMARY KEY (`Id`,`IdUsers`),
  KEY `tweets` (`IdUsers`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `tweets`
--

INSERT INTO `tweets` (`Id`, `IdUsers`, `Content`, `Date`, `Likes`, `Retweets`, `BTCs`) VALUES
(1, 2, 'First', '2020-03-02 15:59:23', 0, 0, 0),
(2, 2, 'Bonjour les twittos !', '2020-03-02 16:00:16', 0, 0, 0),
(3, 2, 'Je mange une pomme', '2020-03-02 16:00:29', 0, 0, 0),
(4, 2, 'ça fonctionne :)', '2020-03-02 17:02:02', 0, 0, 0),
(5, 2, 'test greg', '2020-03-16 13:50:31', 0, 0, 0),
(6, 2, 'mon troisième tweet', '2020-03-16 13:52:50', 0, 0, 0),
(7, 2, 'micro test', '2020-03-20 09:44:46', 0, 0, 0),
(8, 3, 'mon tout premier tweet', '2020-03-20 11:14:22', 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Pseudo` varchar(255) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(10000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Avatar` varchar(1000) NOT NULL DEFAULT 'https://upload.wikimedia.org/wikipedia/fr/c/c8/Twitter_Bird.svg',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`Id`, `Pseudo`, `FirstName`, `LastName`, `Email`, `Password`, `Avatar`) VALUES
(2, 'payeTaBiere', 'Vermersch', 'Lucas', 'lucas.vermersch@epsi.fr', '$2y$12$YrK1hzP7JFvEN5nxAaj7SuMJfotVtsZx0sikAi4hWM1V8icWozwPi', 'https://upload.wikimedia.org/wikipedia/fr/c/c8/Twitter_Bird.svg'),
(3, 'greggameplayer', 'Grégoire', 'Hage', 'gregoire.hage@epsi.fr', '$2y$12$QILrPW0kSnulGjYv.Ea2g.SNTmL6rRxlxlgRpEFA9sOwr8f9a1cV.', 'http://lofrev.net/wp-content/photos/2017/05/user_logo.png');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `likespertweet`
--
ALTER TABLE `likespertweet`
  ADD CONSTRAINT `likespertweet_ibfk_1` FOREIGN KEY (`IdTweet`) REFERENCES `tweets` (`Id`),
  ADD CONSTRAINT `likespertweet_ibfk_2` FOREIGN KEY (`IdUserLike`) REFERENCES `users` (`Id`);

--
-- Contraintes pour la table `rtspertweet`
--
ALTER TABLE `rtspertweet`
  ADD CONSTRAINT `rtspertweet_ibfk_1` FOREIGN KEY (`IdTweet`) REFERENCES `tweets` (`Id`),
  ADD CONSTRAINT `rtspertweet_ibfk_2` FOREIGN KEY (`IdUserRT`) REFERENCES `users` (`Id`);

--
-- Contraintes pour la table `tweets`
--
ALTER TABLE `tweets`
  ADD CONSTRAINT `tweets_ibfk_1` FOREIGN KEY (`IdUsers`) REFERENCES `users` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
