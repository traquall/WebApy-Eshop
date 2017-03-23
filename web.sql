-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  localhost
-- Généré le :  Jeu 23 Mars 2017 à 17:47
-- Version du serveur :  10.1.21-MariaDB
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `web`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `id_lang` tinyint(1) NOT NULL DEFAULT '1',
  `titre` varchar(255) NOT NULL,
  `text` longtext NOT NULL,
  `date` date NOT NULL,
  `affichage` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `article`
--

INSERT INTO `article` (`id`, `id_lang`, `titre`, `text`, `date`, `affichage`) VALUES
(1, 1, 'Zlatan Ibrahimovic - Bad Boy â— Crazy Moments', '<p><span style=\"color:#000000\">Zlatan IbrahimoviÄ‡ est un footballeur international su&eacute;dois, n&eacute; le 3 octobre 1981 &agrave; Malm&ouml;, qui &eacute;volue au poste d&#39;attaquant &agrave; Manchester United.</span></p>\r\n', '2016-12-22', '1'),
(2, 1, 'ggza', '<p><span style=\"color:#000000\">qscqvqdvfqdv</span></p>\r\n', '2016-12-28', '1'),
(3, 1, 'Qu\'est-ce que le Lorem Ipsum?', '<p><img alt=\"\" src=\"/ckfinder/userfiles/images/product-4.png\" style=\"float:right; height:250px; width:250px\" /><span style=\"color:#000000\">Le&nbsp;<strong>Lorem Ipsum</strong>&nbsp;est simplement du faux texte employ&eacute; dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l&#39;imprimerie depuis les ann&eacute;es 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour r&eacute;aliser un livre sp&eacute;cimen de polices de texte. Il n&#39;a pas fait que survivre cinq si&egrave;cles, mais s&#39;est aussi adapt&eacute; &agrave; la bureautique informatique, sans que son contenu n&#39;en soit modifi&eacute;.</span></p>\r\n', '2016-12-29', '1'),
(4, 2, 'sdqscd', '<p><span style=\"color:#000000\">qsdfvqdvqdvqdv</span></p>\r\n', '2016-12-30', '1');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `id_lang` varchar(20) NOT NULL,
  `contenu` longtext,
  `id_parent` varchar(20) NOT NULL,
  `ordre` int(10) NOT NULL,
  `niveau` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`, `id_lang`, `contenu`, `id_parent`, `ordre`, `niveau`) VALUES
(1, 'Casque', '1', '', '1', 70, 1),
(2, 'Haut parleur', '1', '', '1', 71, 1);

-- --------------------------------------------------------

--
-- Structure de la table `cat_doc`
--

CREATE TABLE `cat_doc` (
  `id` int(11) NOT NULL,
  `id_cat` int(11) DEFAULT NULL,
  `id_doc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `email`
--

CREATE TABLE `email` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `message` longtext NOT NULL,
  `objet` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `vousetes` varchar(20) NOT NULL,
  `cp` varchar(10) NOT NULL,
  `civilite` varchar(30) NOT NULL,
  `soci` varchar(50) NOT NULL,
  `ville` varchar(30) NOT NULL,
  `adresse` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `email`
--

INSERT INTO `email` (`id`, `nom`, `email`, `message`, `objet`, `phone`, `prenom`, `vousetes`, `cp`, `civilite`, `soci`, `ville`, `adresse`) VALUES
(16, '', 'koubaaahmed509@yahoo.fr', 'ggr', '', '', 'gga', '', '', '', 'ggr', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `extranet`
--

CREATE TABLE `extranet` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `login` varchar(50) NOT NULL,
  `mot_de_passe` varchar(60) NOT NULL,
  `date_connexion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `extranet`
--

INSERT INTO `extranet` (`id`, `nom`, `prenom`, `email`, `login`, `mot_de_passe`, `date_connexion`) VALUES
(1, 'ahmed', 'koubaa', 'koubaaahmed303@yahoo.fr', 'koubaaahmed303@yahoo.fr', '1141190ffcbeec347e0317117569dde3d7f88bcc', NULL),
(2, 'MELIS', 'David', 'contact@web-expert-bourgogne.fr', 'contact@web-expert-bourgogne.fr', '7e240de74fb1ed08fa08d38063f6a6a91462a815', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `alt` varchar(255) NOT NULL,
  `affichage` varchar(20) NOT NULL,
  `ordre` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `image`
--

INSERT INTO `image` (`id`, `nom`, `type`, `url`, `alt`, `affichage`, `ordre`) VALUES
(22, 'Spectasonics', 'image', 'assets/content/upload/15998.png', 'Un haut-parleur, ou hautparleur1, est un transducteur Ã©lectroacoustique destinÃ© Ã  produire des sons Ã  partir d\'un signal Ã©lectrique. Il est en cela l\'inverse du microphone. Par extension, on emploie parfois ce terme pour dÃ©signer un appareil complet', '2', 1),
(23, 'Wiko Casque WiSHAKE BT Noir', 'image', 'assets/content/upload/Wiko-Casque.png', 'GrÃ¢ce au casque Wiko WiSHAKE BT, vous pourrez Ã©couter votre musique prÃ©fÃ©rÃ©e oÃ¹ bon vous semble avec la technologie Bluetooth. LÃ©ger et confortable, il dispose de toutes les qualitÃ©s pour une utilisation prolongÃ©e. De plus, sa conception pliable ', '1', 4),
(25, 'ASUS Cerberus Headset', 'image', 'assets/content/upload/ASUS-Cerberus-Headset.png', 'Faites l\'achat d\'un casque-micro conÃ§u pour la victoire : le casque ASUS Cerberus ! Performant et polyvalent, il amÃ©liorera votre confort de jeu sur PC, PC portable ou PlayStation 4 et sera adaptÃ© pour Ã©couter de la musique pendant vos dÃ©placements.', '1', 2),
(26, 'Philips BTD7170/12', 'image', 'assets/content/upload/Philips-BTD717012.png', 'Avec la micro-chaÃ®ne BTD7170 de Philips, offrez-vous une expÃ©rience cinÃ©matographique et un son exceptionnels ! Moderne et raffinÃ©e, elle intÃ¨gre des tweeters Ã  dÃ´me haute fidÃ©litÃ© qui gÃ©nÃ¨rent un son dÃ©taillÃ© et naturel Ã  chaque utilisation', '1', 4);

-- --------------------------------------------------------

--
-- Structure de la table `optionsite`
--

CREATE TABLE `optionsite` (
  `id` int(11) NOT NULL,
  `heurevisite` longtext CHARACTER SET utf8 NOT NULL,
  `heureabonne` longtext CHARACTER SET utf8 NOT NULL,
  `tel` varchar(255) NOT NULL,
  `keywords` varchar(255) CHARACTER SET utf8 NOT NULL,
  `text` varchar(255) CHARACTER SET utf8 NOT NULL,
  `lienf` varchar(255) NOT NULL,
  `lieng` varchar(255) NOT NULL,
  `lient` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `actu` longtext,
  `sliderex` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `optionsite`
--

INSERT INTO `optionsite` (`id`, `heurevisite`, `heureabonne`, `tel`, `keywords`, `text`, `lienf`, `lieng`, `lient`, `logo`, `actu`, `sliderex`) VALUES
(1, 'Inscrivez-vous Ã  notre lettre d\'information pour Ãªtre averti en premier des nouveautÃ©s, promotions et activitÃ©s', 'Ouvert tous les jours : <br>9 h 30 Ã  11 h 30 - 14 h 00 Ã  17 h 30 <br>ArrivÃ©e pour la visite au plus tard Ã  11h15 ou 17h15 <br>Du 01/10 au 31/03, <br>fermeture Ã  17 h 00 les samedis, dimanches et jours fÃ©riÃ©s. <br>Prestation unique le 18 et 19 novembre 2017 - tarif sur demande. <br>FermÃ© les 17 novembre, 24, 25, 31 dÃ©cembre et le 1er janvier.', ' 03.80.24.53.78', 'Découvrez les meilleurs équipements audio !', 'Trouver le matériel audio dont vous avez besoin dans notre magasin !', 'https://www.facebook.com/', 'https://plus.google.com', 'https://twitter.com/', 'assets/content/upload/SPECTASONICS-logo.png', '<p><span style=\"color:#D3D3D3\">N&eacute;e et &eacute;lev&eacute;e &agrave;&nbsp; New York elle &eacute;tudie au couvent du Sacr&eacute;-C&oelig;ur et fr&eacute;quente bri&egrave;vement</span></p>\r\n', '/var/www/vhosts/patriarche.melis.fr/httpdocs/assets/content/upload/visite-caves.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `optionsite_en`
--

CREATE TABLE `optionsite_en` (
  `id` int(11) NOT NULL,
  `heurevisite` varchar(255) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `text` varchar(255) NOT NULL,
  `actu` varchar(255) DEFAULT NULL,
  `heureabonne` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `optionsite_en`
--

INSERT INTO `optionsite_en` (`id`, `heurevisite`, `keywords`, `text`, `actu`, `heureabonne`) VALUES
(1, 'Sign up for our newsletter to be notified first about news, promotions and activities', 'TO CHANGE', 'TO CHANGE TOO', '<p><span style=\"color:#A9A9A9\">ac in english</span></p>\r\n', 'From 9:30 to 11:30 and from 14h to 17h30 Closed on 24, 25 and 31 December and 1 January');

-- --------------------------------------------------------

--
-- Structure de la table `pageweb`
--

CREATE TABLE `pageweb` (
  `id` int(11) NOT NULL,
  `id_lang` tinyint(1) NOT NULL DEFAULT '1',
  `id_parent` int(11) NOT NULL DEFAULT '0',
  `nom` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `contenu` text CHARACTER SET utf8 NOT NULL,
  `descripion` varchar(255) NOT NULL,
  `rewrite` varchar(50) NOT NULL,
  `ordre` tinyint(3) NOT NULL,
  `menu` varchar(11) NOT NULL,
  `slide` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `pageweb`
--

INSERT INTO `pageweb` (`id`, `id_lang`, `id_parent`, `nom`, `title`, `contenu`, `descripion`, `rewrite`, `ordre`, `menu`, `slide`) VALUES
(18, 1, 1, 'Accueil', 'Accueil', '<div class=\"container\">\n				<div id=\"tg-features\" class=\"tg-features\">\n					<div class=\"item\">\n						<div class=\"tg-feature\">\n							<figure>\n								<img src=\"assets/images/img-06.jpg\" alt=\"image description\">\n								<figcaption class=\"tg-feature-hover\">\n									<a href=\"#\"><i class=\"icon-back28\"></i></a>\n								</figcaption>\n							</figure>\n							<div class=\"tg-feature-data\">\n								<div class=\"tg-heading-border\">\n									<h3>2 hour auto road recovry</h3>\n								</div>\n								<div class=\"tg-description\">\n									<p>Consectetur adipisicing elit sed do eiusmod tempor incididunt ut laboreet dolore.</p>\n								</div>\n							</div>\n						</div>\n					</div>\n					<div class=\"item\">\n						<div class=\"tg-feature\">\n							<figure>\n								<img src=\"assets/images/img-07.jpg\" alt=\"image description\">\n								<figcaption class=\"tg-feature-hover\">\n									<a href=\"#\"><i class=\"icon-back28\"></i></a>\n								</figcaption>\n							</figure>\n							<div class=\"tg-feature-data\">\n								<div class=\"tg-heading-border\">\n									<h3>total auto tune ups</h3>\n								</div>\n								<div class=\"tg-description\">\n									<p>Consectetur adipisicing elit sed do eiusmod tempor incididunt ut laboreet dolore.</p>\n								</div>\n							</div>\n						</div>\n					</div>\n					<div class=\"item\">\n						<div class=\"tg-feature\">\n							<figure>\n								<img src=\"assets/images/img-08.jpg\" alt=\"image description\">\n								<figcaption class=\"tg-feature-hover\">\n									<a href=\"#\"><i class=\"icon-back28\"></i></a>\n								</figcaption>\n							</figure>\n							<div class=\"tg-feature-data\">\n								<div class=\"tg-heading-border\">\n									<h3>24/7 active service</h3>\n								</div>\n								<div class=\"tg-description\">\n									<p>Consectetur adipisicing elit sed do eiusmod tempor incididunt ut laboreet dolore.</p>\n								</div>\n							</div>\n						</div>\n					</div>\n					<div class=\"item\">\n						<div class=\"tg-feature\">\n							<figure>\n								<img src=\"assets/images/img-08.jpg\" alt=\"image description\">\n								<figcaption class=\"tg-feature-hover\">\n									<a href=\"#\"><i class=\"flaticon-back28\"></i></a>\n								</figcaption>\n							</figure>\n							<div class=\"tg-feature-data\">\n								<div class=\"tg-heading-border\">\n									<h3>24/7 active service</h3>\n								</div>\n								<div class=\"tg-description\">\n									<p>Consectetur adipisicing elit sed do eiusmod tempor incididunt ut laboreet dolore.</p>\n								</div>\n							</div>\n						</div>\n					</div>\n					<div class=\"item\">\n						<div class=\"tg-feature\">\n							<figure>\n								<img src=\"assets/images/img-08.jpg\" alt=\"image description\">\n								<figcaption class=\"tg-feature-hover\">\n									<a href=\"#\"><i class=\"flaticon-back28\"></i></a>\n								</figcaption>\n							</figure>\n							<div class=\"tg-feature-data\">\n								<div class=\"tg-heading-border\">\n									<h3>24/7 active service</h3>\n								</div>\n								<div class=\"tg-description\">\n									<p>Consectetur adipisicing elit sed do eiusmod tempor incididunt ut laboreet dolore.</p>\n								</div>\n							</div>\n						</div>\n					</div>\n				</div>\n			</div>\n			<!--************************************\n					Features End\n			*************************************-->\n			<!--************************************\n					How We Works Start\n			*************************************-->\n			<section class=\"tg-main-section tg-haslayout\">\n				<div class=\"container\">\n					<div class=\"row\">\n						<div class=\"col-sm-8 col-sm-offset-2 col-xs-12\">\n							<div class=\"tg-section-head tg-haslayout\">\n								<div class=\"tg-section-heading tg-haslayout\">\n									<h2>how we work</h2>\n								</div>\n								<div class=\"tg-description tg-haslayout\">\n									<p>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minimiam uis nostrud exercitation ullamco laboris nisi ut aliquip ex ea.</p>\n								</div>\n							</div>\n						</div>\n						<div class=\"tg-howwework tg-haslayout\">\n							<div class=\"col-lg-6 col-md-7 col-sm-12 col-xs-12 tg-verticalmiddle\">\n								<figure>\n									<img src=\"assets/images/img-05.jpg\" alt=\"image description\">\n								</figure>\n							</div>\n							<div class=\"col-lg-6 col-md-5 col-sm-12 col-xs-12 tg-verticalmiddle\">\n								<div class=\"tg-textbox\">\n									<div class=\"tg-description\">\n										<p>Consectetur adipisicing elit, sed do eiusmod tempor incidt ut labore et dolore magna aliqua siampa toly sita totam amit siam anta toatam aplicianto.</p>\n									</div>\n									<ul>\n										<li>\n											<span class=\"tg-count\">01</span>\n											<div class=\"tg-workdata\">\n												<h3>Get A Quote</h3>\n												<div class=\"tg-work-description\">\n													<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua enim ad minim veniam.</p>\n												</div>\n											</div>\n										</li>\n										<li>\n											<span class=\"tg-count\">02</span>\n											<div class=\"tg-workdata\">\n												<h3>Book an appointment</h3>\n												<div class=\"tg-work-description\">\n													<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua enim ad minim veniam.</p>\n												</div>\n											</div>\n										</li>\n										<li>\n											<span class=\"tg-count\">03</span>\n											<div class=\"tg-workdata\">\n												<h3>GET YOUR CAR FIXED</h3>\n												<div class=\"tg-work-description\">\n													<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua enim ad minim veniam.</p>\n												</div>\n											</div>\n										</li>\n									</ul>\n								</div>\n							</div>\n						</div>\n					</div>\n				</div>\n			</section>\n			<!--************************************\n					How We Works End\n			*************************************-->\n			<!--************************************\n					Counter Start\n			*************************************-->\n			<section class=\"tg-main-section tg-haslayout parallax-window\" data-appear-top-offset=\"600\" data-parallax=\"scroll\" data-image-src=\"assets/images/bgparallax/bgparallax-01.jpg\">\n				<div class=\"container\">\n					<div class=\"row\">\n						<div class=\"tg-counters\">\n							<div class=\"tg-counter\">\n								<h2><span class=\"tg-timer\" data-from=\"0\" data-to=\"3700\" data-speed=\"8000\" data-refresh-interval=\"50\">3700</span></h2>\n								<div class=\"tg-heading-border\">\n									<h3>Customer Satisfied</h3>\n								</div>\n							</div>\n							<div class=\"tg-counter\">\n								<h2><span class=\"tg-timer\" data-from=\"0\" data-to=\"160\" data-speed=\"8000\" data-refresh-interval=\"50\">160</span></h2>\n								<div class=\"tg-heading-border\">\n									<h3>Engine Repair</h3>\n								</div>\n							</div>\n							<div class=\"tg-counter\">\n								<h2><span class=\"tg-timer\" data-from=\"0\" data-to=\"850\" data-speed=\"8000\" data-refresh-interval=\"50\">850</span></h2>\n								<div class=\"tg-heading-border\">\n									<h3>Oil Change</h3>\n								</div>\n							</div>\n							<div class=\"tg-counter\">\n								<h2><span class=\"tg-timer\" data-from=\"0\" data-to=\"1850\" data-speed=\"8000\" data-refresh-interval=\"50\">1850</span></h2>\n								<div class=\"tg-heading-border\">\n									<h3>car Paint</h3>\n								</div>\n							</div>\n						</div>\n					</div>\n				</div>\n			</section>\n			<!--************************************\n					Counter End\n			*************************************-->\n			<!--************************************\n					Services Start\n			*************************************-->\n			<section class=\"tg-main-section tg-haslayout\">\n				<div class=\"container\">\n					<div class=\"row\">\n						<div class=\"col-sm-8 col-sm-offset-2 col-xs-12\">\n							<div class=\"tg-section-head tg-haslayout\">\n								<div class=\"tg-section-heading tg-haslayout\">\n									<h2>services we offer</h2>\n								</div>\n								<div class=\"tg-description tg-haslayout\">\n									<p>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minimiam uis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>\n								</div>\n							</div>\n						</div>\n						<div class=\"tg-theme-tabs tg-haslayout\">\n							<div class=\"col-md-3 col-sm-4 col-xs-2 tg-width-568\">\n								<ul class=\"tg-nav-tabs\" role=\"tablist\">\n									<li role=\"presentation\" class=\"active\">\n										<a href=\"#car-painting\" aria-controls=\"car-painting\" role=\"tab\" data-toggle=\"tab\">\n											<i class=\"icon-car36\"></i>\n											<span>Car Painting</span>\n										</a>\n									</li>\n									<li role=\"presentation\">\n										<a href=\"#car-repairing\" aria-controls=\"car-repairing\" role=\"tab\" data-toggle=\"tab\">\n											<i class=\"icon-button40\"></i>\n											<span>Car Repairing</span>\n										</a>\n									</li>\n									<li role=\"presentation\">\n										<a href=\"#diagnostics\" aria-controls=\"diagnostics\" role=\"tab\" data-toggle=\"tab\">\n											<i class=\"icon-garage19\"></i>\n											<span>DIAGNOSTICS</span>\n										</a>\n									</li>\n									<li role=\"presentation\">\n										<a href=\"#maintenance\" aria-controls=\"maintenance\" role=\"tab\" data-toggle=\"tab\">\n											<i class=\"icon-repair25\"></i>\n											<span>maintenance</span>\n										</a>\n									</li>\n									<li role=\"presentation\">\n										<a href=\"#wheel-balance\" aria-controls=\"wheel-balance\" role=\"tab\" data-toggle=\"tab\">\n											<i class=\"fa fa-gear\"></i>\n											<span>Wheel Balance</span>\n										</a>\n									</li>\n								</ul>\n							</div>\n							<div class=\"col-md-9 col-sm-8 col-xs-10 tg-width-568\">\n								<div class=\"tg-tab-content tab-content\">\n									<div role=\"tabpanel\" class=\"tab-pane active\" id=\"car-painting\">\n										<div class=\"row\">\n											<div class=\"tg-carpaint-gallery tg-haslayout\">\n												<div class=\"col-sm-4 col-xs-4\">\n													<figure><img src=\"assets/images/img-02.jpg\" alt=\"image description\"></figure>\n												</div>\n												<div class=\"col-sm-4 col-xs-4\">\n													<figure><img src=\"assets/images/img-03.jpg\" alt=\"image description\"></figure>\n												</div>\n												<div class=\"col-sm-4 col-xs-4\">\n													<figure><img src=\"assets/images/img-04.jpg\" alt=\"image description\"></figure>\n												</div>\n											</div>\n											<div class=\"col-xs-12\">\n												<h3>Car Painting</h3>\n												<div class=\"tg-description\">\n													<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incidunt ut labore et dolore magna aliqua enim adiam minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>\n												</div>\n												<ul>\n													<li>Labore et dolore</li>\n													<li>Bababano dekhy mayam kam</li>\n													<li>Dignissimos ducimus qui blanditiis</li>\n													<li>Magna aliqua enim</li>\n													<li>Buka amin</li>\n													<li>Praesentium voluptatum</li>\n												</ul>\n												<div class=\"tg-progress tg-haslayout\">\n													<h3>Skill Rating</h3>\n													<div class=\"progress\" data-percent=\"86%\">\n														<div class=\"progress-bar progress-bar-striped\">\n															<span class=\"tg-percent\" data-from=\"0\" data-to=\"86\" data-speed=\"8000\" data-refresh-interval=\"50\">86</span>\n															<!--<span class=\"tg-percent\">86%</span>-->\n														</div>\n													</div>\n												</div>\n											</div>\n										</div>\n									</div>\n									<div role=\"tabpanel\" class=\"tab-pane\" id=\"car-repairing\">\n										<div class=\"row\">\n											<div class=\"tg-carpaint-gallery tg-haslayout\">\n												<div class=\"col-sm-4 col-xs-4\">\n													<figure><img src=\"assets/images/img-02.jpg\" alt=\"image description\"></figure>\n												</div>\n												<div class=\"col-sm-4 col-xs-4\">\n													<figure><img src=\"assets/images/img-03.jpg\" alt=\"image description\"></figure>\n												</div>\n												<div class=\"col-sm-4 col-xs-4\">\n													<figure><img src=\"assets/images/img-04.jpg\" alt=\"image description\"></figure>\n												</div>\n											</div>\n											<div class=\"col-xs-12\">\n												<h3>car repairing</h3>\n												<div class=\"tg-description\">\n													<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incidunt ut labore et dolore magna aliqua enim adiam minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>\n												</div>\n												<ul>\n													<li>Labore et dolore</li>\n													<li>Bababano dekhy mayam kam</li>\n													<li>Dignissimos ducimus qui blanditiis</li>\n													<li>Magna aliqua enim</li>\n													<li>Buka amin</li>\n													<li>Praesentium voluptatum</li>\n												</ul>\n												<div class=\"tg-progress tg-haslayout\">\n													<h3>Skill Rating</h3>\n													<div class=\"progress\" data-percent=\"86%\">\n														<div class=\"progress-bar progress-bar-striped\">\n															<span class=\"tg-percent\" data-from=\"0\" data-to=\"86\" data-speed=\"8000\" data-refresh-interval=\"50\">86</span>\n															<!--<span class=\"tg-percent\">86%</span>-->\n														</div>\n													</div>\n												</div>\n											</div>\n										</div>\n									</div>\n									<div role=\"tabpanel\" class=\"tab-pane\" id=\"diagnostics\">\n										<div class=\"row\">\n											<div class=\"tg-carpaint-gallery tg-haslayout\">\n												<div class=\"col-sm-4 col-xs-4\">\n													<figure><img src=\"assets/images/img-02.jpg\" alt=\"image description\"></figure>\n												</div>\n												<div class=\"col-sm-4 col-xs-4\">\n													<figure><img src=\"assets/images/img-03.jpg\" alt=\"image description\"></figure>\n												</div>\n												<div class=\"col-sm-4 col-xs-4\">\n													<figure><img src=\"assets/images/img-04.jpg\" alt=\"image description\"></figure>\n												</div>\n											</div>\n											<div class=\"col-xs-12\">\n												<h3>DIAGNOSTICS</h3>\n												<div class=\"tg-description\">\n													<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incidunt ut labore et dolore magna aliqua enim adiam minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>\n												</div>\n												<ul>\n													<li>Labore et dolore</li>\n													<li>Bababano dekhy mayam kam</li>\n													<li>Dignissimos ducimus qui blanditiis</li>\n													<li>Magna aliqua enim</li>\n													<li>Buka amin</li>\n													<li>Praesentium voluptatum</li>\n												</ul>\n												<div class=\"tg-progress tg-haslayout\">\n													<h3>Skill Rating</h3>\n													<div class=\"progress\" data-percent=\"86%\">\n														<div class=\"progress-bar progress-bar-striped\">\n															<span class=\"tg-percent\" data-from=\"0\" data-to=\"86\" data-speed=\"8000\" data-refresh-interval=\"50\">86</span>\n															<!--<span class=\"tg-percent\">86%</span>-->\n														</div>\n													</div>\n												</div>\n											</div>\n										</div>\n									</div>\n									<div role=\"tabpanel\" class=\"tab-pane\" id=\"maintenance\">\n										<div class=\"row\">\n											<div class=\"tg-carpaint-gallery tg-haslayout\">\n												<div class=\"col-sm-4 col-xs-4\">\n													<figure><img src=\"assets/images/img-02.jpg\" alt=\"image description\"></figure>\n												</div>\n												<div class=\"col-sm-4 col-xs-4\">\n													<figure><img src=\"assets/images/img-03.jpg\" alt=\"image description\"></figure>\n												</div>\n												<div class=\"col-sm-4 col-xs-4\">\n													<figure><img src=\"assets/images/img-04.jpg\" alt=\"image description\"></figure>\n												</div>\n											</div>\n											<div class=\"col-xs-12\">\n												<h3>maintenance</h3>\n												<div class=\"tg-description\">\n													<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incidunt ut labore et dolore magna aliqua enim adiam minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>\n												</div>\n												<ul>\n													<li>Labore et dolore</li>\n													<li>Bababano dekhy mayam kam</li>\n													<li>Dignissimos ducimus qui blanditiis</li>\n													<li>Magna aliqua enim</li>\n													<li>Buka amin</li>\n													<li>Praesentium voluptatum</li>\n												</ul>\n												<div class=\"tg-progress tg-haslayout\">\n													<h3>Skill Rating</h3>\n													<div class=\"progress\" data-percent=\"86%\">\n														<div class=\"progress-bar progress-bar-striped\">\n															<span class=\"tg-percent\" data-from=\"0\" data-to=\"86\" data-speed=\"8000\" data-refresh-interval=\"50\">86</span>\n															<!--<span class=\"tg-percent\">86%</span>-->\n														</div>\n													</div>\n												</div>\n											</div>\n										</div>\n									</div>\n									<div role=\"tabpanel\" class=\"tab-pane\" id=\"wheel-balance\">\n										<div class=\"row\">\n											<div class=\"tg-carpaint-gallery tg-haslayout\">\n												<div class=\"col-sm-4 col-xs-4\">\n													<figure><img src=\"assets/images/img-02.jpg\" alt=\"image description\"></figure>\n												</div>\n												<div class=\"col-sm-4 col-xs-4\">\n													<figure><img src=\"assets/images/img-03.jpg\" alt=\"image description\"></figure>\n												</div>\n												<div class=\"col-sm-4 col-xs-4\">\n													<figure><img src=\"assets/images/img-04.jpg\" alt=\"image description\"></figure>\n												</div>\n											</div>\n											<div class=\"col-xs-12\">\n												<h3>Wheel Balance</h3>\n												<div class=\"tg-description\">\n													<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incidunt ut labore et dolore magna aliqua enim adiam minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>\n												</div>\n												<ul>\n													<li>Labore et dolore</li>\n													<li>Bababano dekhy mayam kam</li>\n													<li>Dignissimos ducimus qui blanditiis</li>\n													<li>Magna aliqua enim</li>\n													<li>Buka amin</li>\n													<li>Praesentium voluptatum</li>\n												</ul>\n												<div class=\"tg-progress tg-haslayout\">\n													<h3>Skill Rating</h3>\n													<div class=\"progress\" data-percent=\"86%\">\n														<div class=\"progress-bar progress-bar-striped\">\n															<span class=\"tg-percent\" data-from=\"0\" data-to=\"86\" data-speed=\"8000\" data-refresh-interval=\"50\">86</span>\n															<!--<span class=\"tg-percent\">86%</span>-->\n														</div>\n													</div>\n												</div>\n											</div>\n										</div>\n									</div>\n								</div>\n							</div>\n						</div>\n					</div>\n				</div>\n			</section>\n			<!--************************************\n					Services End\n			*************************************-->\n			<!--************************************\n					Get a Quote Start\n			*************************************-->\n			<section class=\"tg-main-section tg-overflowhidden tg-haslayout parallax-window\" data-appear-top-offset=\"600\" data-parallax=\"scroll\" data-image-src=\"assets/images/bgparallax/bgparallax-02.jpg\">\n				<div class=\"container\">\n					<div class=\"row\">\n						<div class=\"col-sm-9 col-xs-12 pull-right\">\n							<div class=\"tg-getaquote tg-haslayout\">\n								<h2>get a quote!</h2>\n								<form class=\"form-quotation\">\n									<label>Select Vehicle Type:*</label>\n									<div id=\"tg-vehicletype-slider\" class=\"tg-vehicletype-slider\">\n										<div class=\"item tg-vehicle-type\">\n											<i class=\"icon-sports-car\"></i>\n											<input type=\"radio\" name=\"title\" checked><label><span>Sports Car</span></label>\n										</div>\n										<div class=\"item tg-vehicle-type\">\n											<i class=\"icon-lux-car\"></i>\n											<input type=\"radio\" name=\"title\"><label><span>Luxury Car</span></label>\n										</div>\n										<div class=\"item tg-vehicle-type\">\n											<i class=\"icon-pickup\"></i>\n											<input type=\"radio\" name=\"title\"><label><span>SUVS &amp; Pickup</span></label>\n										</div>\n										<div class=\"item tg-vehicle-type\">\n											<i class=\"icon-bus\"></i>\n											<input type=\"radio\" name=\"title\"><label><span>bus</span></label>\n										</div>\n										<div class=\"item tg-vehicle-type\">\n											<i class=\"icon-sports-car\"></i>\n											<input type=\"radio\" name=\"title\"><label><span>Sports Car</span></label>\n										</div>\n										<div class=\"item tg-vehicle-type\">\n											<i class=\"icon-sports-car\"></i>\n											<input type=\"radio\" name=\"title\"><label><span>Sports Car</span></label>\n										</div>\n									</div>\n									<label>Add your information:</label>\n									<div class=\"row\">\n										<div class=\"col-sm-4\">\n											<div class=\"form-group\">\n												<input type=\"text\" class=\"form-control\" placeholder=\"Name*\">\n											</div>\n										</div>\n										<div class=\"col-sm-4\">\n											<div class=\"form-group\">\n												<input type=\"text\" class=\"form-control\" placeholder=\"Phone*\">\n											</div>\n										</div>\n										<div class=\"col-sm-4\">\n											<div class=\"form-group\">\n												<input type=\"text\" class=\"form-control\" placeholder=\"Your Location*\">\n											</div>\n										</div>\n										<div class=\"col-xs-12\">\n											<div class=\"form-group\">\n												<textarea class=\"form-control\" placeholder=\"Message\"></textarea>\n											</div>\n										</div>\n										<div class=\"col-xs-12\">\n											<button class=\"tg-btn\">send</button>\n										</div>\n									</div>\n								</form>\n							</div>\n						</div>\n					</div>\n				</div>\n			</section>\n			<!--************************************\n					Get a Quote End\n			*************************************-->\n			<!--************************************\n					Featured Products Start\n			*************************************-->\n			<section class=\"tg-main-section tg-haslayout\">\n				<div class=\"container\">\n					<div class=\"row\">\n						<div class=\"col-sm-8 col-sm-offset-2 col-xs-12\">\n							<div class=\"tg-section-head tg-haslayout\">\n								<div class=\"tg-section-heading tg-haslayout\">\n									<h2>Featured Products</h2>\n								</div>\n								<div class=\"tg-description tg-haslayout\">\n									<p>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minimiam uis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>\n								</div>\n							</div>\n						</div>\n						<div id=\"tg-product-slider\" class=\"tg-team-slider tg-haslayout\">\n							<div class=\"item tg-product\">\n								<span class=\"tg-saletag\"><i>sale</i></span>\n								<figure>\n									<img src=\"assets/images/product/img-01.jpg\" alt=\"image description\">\n									<ul class=\"tg-product-icon\">\n										<li><a href=\"#\"><i class=\"fa fa-cart-plus\"></i></a></li>\n										<li><a href=\"#\"><i class=\"fa fa-eye\"></i></a></li>\n									</ul>\n								</figure>\n								<div class=\"tg-product-info tg-haslayout\">\n									<div class=\"tg-heading-border\">\n										<h3><a href=\"#\">Disc Break</a></h3>\n									</div>\n									<div class=\"tg-stars\">\n										<i class=\"fa fa-star\"></i>\n										<i class=\"fa fa-star\"></i>\n										<i class=\"fa fa-star\"></i>\n										<i class=\"fa fa-star\"></i>\n										<i class=\"fa fa-star-half-empty\"></i>\n									</div>\n									<span class=\"tg-product-price\">$37.00 <del>$45.00</del></span>\n								</div>\n							</div>\n							<div class=\"item tg-product\">\n								<figure>\n									<img src=\"assets/images/product/img-02.jpg\" alt=\"image description\">\n									<ul class=\"tg-product-icon\">\n										<li><a href=\"#\"><i class=\"fa fa-cart-plus\"></i></a></li>\n										<li><a href=\"#\"><i class=\"fa fa-eye\"></i></a></li>\n									</ul>\n								</figure>\n								<div class=\"tg-product-info tg-haslayout\">\n									<div class=\"tg-heading-border\">\n										<h3><a href=\"#\">Ignition</a></h3>\n									</div>\n									<div class=\"tg-stars\">\n										<i class=\"fa fa-star\"></i>\n										<i class=\"fa fa-star\"></i>\n										<i class=\"fa fa-star\"></i>\n										<i class=\"fa fa-star\"></i>\n										<i class=\"fa fa-star-half-empty\"></i>\n									</div>\n									<span class=\"tg-product-price\">$37.00 <del>$45.00</del></span>\n								</div>\n							</div>\n							<div class=\"item tg-product\">\n								<span class=\"tg-saletag\"><i>sale</i></span>\n								<figure>\n									<img src=\"assets/images/product/img-03.jpg\" alt=\"image description\">\n									<ul class=\"tg-product-icon\">\n										<li><a href=\"#\"><i class=\"fa fa-cart-plus\"></i></a></li>\n										<li><a href=\"#\"><i class=\"fa fa-eye\"></i></a></li>\n									</ul>\n								</figure>\n								<div class=\"tg-product-info tg-haslayout\">\n									<div class=\"tg-heading-border\">\n										<h3><a href=\"#\">Head Light</a></h3>\n									</div>\n									<div class=\"tg-stars\">\n										<i class=\"fa fa-star\"></i>\n										<i class=\"fa fa-star\"></i>\n										<i class=\"fa fa-star\"></i>\n										<i class=\"fa fa-star\"></i>\n										<i class=\"fa fa-star-half-empty\"></i>\n									</div>\n									<span class=\"tg-product-price\">$37.00 <del>$45.00</del></span>\n								</div>\n							</div>\n							<div class=\"item tg-product\">\n								<figure>\n									<img src=\"assets/images/product/img-04.jpg\" alt=\"image description\">\n									<ul class=\"tg-product-icon\">\n										<li><a href=\"#\"><i class=\"fa fa-cart-plus\"></i></a></li>\n										<li><a href=\"#\"><i class=\"fa fa-eye\"></i></a></li>\n									</ul>\n								</figure>\n								<div class=\"tg-product-info tg-haslayout\">\n									<div class=\"tg-heading-border\">\n										<h3><a href=\"#\">Worker Helmet</a></h3>\n									</div>\n									<div class=\"tg-stars\">\n										<i class=\"fa fa-star\"></i>\n										<i class=\"fa fa-star\"></i>\n										<i class=\"fa fa-star\"></i>\n										<i class=\"fa fa-star\"></i>\n										<i class=\"fa fa-star-half-empty\"></i>\n									</div>\n									<span class=\"tg-product-price\">$37.00 <del>$45.00</del></span>\n								</div>\n							</div>\n							<div class=\"item tg-product\">\n								<figure>\n									<img src=\"assets/images/product/img-05.jpg\" alt=\"image description\">\n									<ul class=\"tg-product-icon\">\n										<li><a href=\"#\"><i class=\"fa fa-cart-plus\"></i></a></li>\n										<li><a href=\"#\"><i class=\"fa fa-eye\"></i></a></li>\n									</ul>\n								</figure>\n								<div class=\"tg-product-info tg-haslayout\">\n									<div class=\"tg-heading-border\">\n										<h3><a href=\"#\">product title</a></h3>\n									</div>\n									<div class=\"tg-stars\">\n										<i class=\"fa fa-star\"></i>\n										<i class=\"fa fa-star\"></i>\n										<i class=\"fa fa-star\"></i>\n										<i class=\"fa fa-star\"></i>\n										<i class=\"fa fa-star-half-empty\"></i>\n									</div>\n									<span class=\"tg-product-price\">$37.00 <del>$45.00</del></span>\n								</div>\n							</div>\n							<div class=\"item tg-product\">\n								<figure>\n									<img src=\"assets/images/product/img-06.jpg\" alt=\"image description\">\n									<ul class=\"tg-product-icon\">\n										<li><a href=\"#\"><i class=\"fa fa-cart-plus\"></i></a></li>\n										<li><a href=\"#\"><i class=\"fa fa-eye\"></i></a></li>\n									</ul>\n								</figure>\n								<div class=\"tg-product-info tg-haslayout\">\n									<div class=\"tg-heading-border\">\n										<h3><a href=\"#\">product title</a></h3>\n									</div>\n									<div class=\"tg-stars\">\n										<i class=\"fa fa-star\"></i>\n										<i class=\"fa fa-star\"></i>\n										<i class=\"fa fa-star\"></i>\n										<i class=\"fa fa-star\"></i>\n										<i class=\"fa fa-star-half-empty\"></i>\n									</div>\n									<span class=\"tg-product-price\">$37.00 <del>$45.00</del></span>\n								</div>\n							</div>\n							<div class=\"item tg-product\">\n								<figure>\n									<img src=\"assets/images/product/img-07.jpg\" alt=\"image description\">\n									<ul class=\"tg-product-icon\">\n										<li><a href=\"#\"><i class=\"fa fa-cart-plus\"></i></a></li>\n										<li><a href=\"#\"><i class=\"fa fa-eye\"></i></a></li>\n									</ul>\n								</figure>\n								<div class=\"tg-product-info tg-haslayout\">\n									<div class=\"tg-heading-border\">\n										<h3><a href=\"#\">product title</a></h3>\n									</div>\n									<div class=\"tg-stars\">\n										<i class=\"fa fa-star\"></i>\n										<i class=\"fa fa-star\"></i>\n										<i class=\"fa fa-star\"></i>\n										<i class=\"fa fa-star\"></i>\n										<i class=\"fa fa-star-half-empty\"></i>\n									</div>\n									<span class=\"tg-product-price\">$37.00 <del>$45.00</del></span>\n								</div>\n							</div>\n							<div class=\"item tg-product\">\n								<figure>\n									<img src=\"assets/images/product/img-08.jpg\" alt=\"image description\">\n									<ul class=\"tg-product-icon\">\n										<li><a href=\"#\"><i class=\"fa fa-cart-plus\"></i></a></li>\n										<li><a href=\"#\"><i class=\"fa fa-eye\"></i></a></li>\n									</ul>\n								</figure>\n								<div class=\"tg-product-info tg-haslayout\">\n									<div class=\"tg-heading-border\">\n										<h3><a href=\"#\">product title</a></h3>\n									</div>\n									<div class=\"tg-stars\">\n										<i class=\"fa fa-star\"></i>\n										<i class=\"fa fa-star\"></i>\n										<i class=\"fa fa-star\"></i>\n										<i class=\"fa fa-star\"></i>\n										<i class=\"fa fa-star-half-empty\"></i>\n									</div>\n									<span class=\"tg-product-price\">$37.00 <del>$45.00</del></span>\n								</div>\n							</div>\n							<div class=\"item tg-product\">\n								<figure>\n									<img src=\"assets/images/product/img-09.jpg\" alt=\"image description\">\n									<ul class=\"tg-product-icon\">\n										<li><a href=\"#\"><i class=\"fa fa-cart-plus\"></i></a></li>\n										<li><a href=\"#\"><i class=\"fa fa-eye\"></i></a></li>\n									</ul>\n								</figure>\n								<div class=\"tg-product-info tg-haslayout\">\n									<div class=\"tg-heading-border\">\n										<h3><a href=\"#\">product title</a></h3>\n									</div>\n									<div class=\"tg-stars\">\n										<i class=\"fa fa-star\"></i>\n										<i class=\"fa fa-star\"></i>\n										<i class=\"fa fa-star\"></i>\n										<i class=\"fa fa-star\"></i>\n										<i class=\"fa fa-star-half-empty\"></i>\n									</div>\n									<span class=\"tg-product-price\">$37.00 <del>$45.00</del></span>\n								</div>\n							</div>\n							<div class=\"item tg-product\">\n								<figure>\n									<img src=\"assets/images/product/img-10.jpg\" alt=\"image description\">\n									<ul class=\"tg-product-icon\">\n										<li><a href=\"#\"><i class=\"fa fa-cart-plus\"></i></a></li>\n										<li><a href=\"#\"><i class=\"fa fa-eye\"></i></a></li>\n									</ul>\n								</figure>\n								<div class=\"tg-product-info tg-haslayout\">\n									<div class=\"tg-heading-border\">\n										<h3><a href=\"#\">product title</a></h3>\n									</div>\n									<div class=\"tg-stars\">\n										<i class=\"fa fa-star\"></i>\n										<i class=\"fa fa-star\"></i>\n										<i class=\"fa fa-star\"></i>\n										<i class=\"fa fa-star\"></i>\n										<i class=\"fa fa-star-half-empty\"></i>\n									</div>\n									<span class=\"tg-product-price\">$37.00 <del>$45.00</del></span>\n								</div>\n							</div>\n							<div class=\"item tg-product\">\n								<figure>\n									<img src=\"assets/images/product/img-11.jpg\" alt=\"image description\">\n									<ul class=\"tg-product-icon\">\n										<li><a href=\"#\"><i class=\"fa fa-cart-plus\"></i></a></li>\n										<li><a href=\"#\"><i class=\"fa fa-eye\"></i></a></li>\n									</ul>\n								</figure>\n								<div class=\"tg-product-info tg-haslayout\">\n									<div class=\"tg-heading-border\">\n										<h3><a href=\"#\">product title</a></h3>\n									</div>\n									<div class=\"tg-stars\">\n										<i class=\"fa fa-star\"></i>\n										<i class=\"fa fa-star\"></i>\n										<i class=\"fa fa-star\"></i>\n										<i class=\"fa fa-star\"></i>\n										<i class=\"fa fa-star-half-empty\"></i>\n									</div>\n									<span class=\"tg-product-price\">$37.00 <del>$45.00</del></span>\n								</div>\n							</div>\n							<div class=\"item tg-product\">\n								<figure>\n									<img src=\"assets/images/product/img-12.jpg\" alt=\"image description\">\n									<ul class=\"tg-product-icon\">\n										<li><a href=\"#\"><i class=\"fa fa-cart-plus\"></i></a></li>\n										<li><a href=\"#\"><i class=\"fa fa-eye\"></i></a></li>\n									</ul>\n								</figure>\n								<div class=\"tg-product-info tg-haslayout\">\n									<div class=\"tg-heading-border\">\n										<h3><a href=\"#\">product title</a></h3>\n									</div>\n									<div class=\"tg-stars\">\n										<i class=\"fa fa-star\"></i>\n										<i class=\"fa fa-star\"></i>\n										<i class=\"fa fa-star\"></i>\n										<i class=\"fa fa-star\"></i>\n										<i class=\"fa fa-star-half-empty\"></i>\n									</div>\n									<span class=\"tg-product-price\">$37.00 <del>$45.00</del></span>\n								</div>\n							</div>\n							<div class=\"item tg-product\">\n								<figure>\n									<img src=\"assets/images/product/img-09.jpg\" alt=\"image description\">\n									<ul class=\"tg-product-icon\">\n										<li><a href=\"#\"><i class=\"fa fa-cart-plus\"></i></a></li>\n										<li><a href=\"#\"><i class=\"fa fa-eye\"></i></a></li>\n									</ul>\n								</figure>\n								<div class=\"tg-product-info tg-haslayout\">\n									<div class=\"tg-heading-border\">\n										<h3><a href=\"#\">product title</a></h3>\n									</div>\n									<div class=\"tg-stars\">\n										<i class=\"fa fa-star\"></i>\n										<i class=\"fa fa-star\"></i>\n										<i class=\"fa fa-star\"></i>\n										<i class=\"fa fa-star\"></i>\n										<i class=\"fa fa-star-half-empty\"></i>\n									</div>\n									<span class=\"tg-product-price\">$37.00 <del>$45.00</del></span>\n								</div>\n							</div>\n							<div class=\"item tg-product\">\n								<figure>\n									<img src=\"assets/images/product/img-10.jpg\" alt=\"image description\">\n									<ul class=\"tg-product-icon\">\n										<li><a href=\"#\"><i class=\"fa fa-cart-plus\"></i></a></li>\n										<li><a href=\"#\"><i class=\"fa fa-eye\"></i></a></li>\n									</ul>\n								</figure>\n								<div class=\"tg-product-info tg-haslayout\">\n									<div class=\"tg-heading-border\">\n										<h3><a href=\"#\">product title</a></h3>\n									</div>\n									<div class=\"tg-stars\">\n										<i class=\"fa fa-star\"></i>\n										<i class=\"fa fa-star\"></i>\n										<i class=\"fa fa-star\"></i>\n										<i class=\"fa fa-star\"></i>\n										<i class=\"fa fa-star-half-empty\"></i>\n									</div>\n									<span class=\"tg-product-price\">$37.00 <del>$45.00</del></span>\n								</div>\n							</div>\n							<div class=\"item tg-product\">\n								<figure>\n									<img src=\"assets/images/product/img-11.jpg\" alt=\"image description\">\n									<ul class=\"tg-product-icon\">\n										<li><a href=\"#\"><i class=\"fa fa-cart-plus\"></i></a></li>\n										<li><a href=\"#\"><i class=\"fa fa-eye\"></i></a></li>\n									</ul>\n								</figure>\n								<div class=\"tg-product-info tg-haslayout\">\n									<div class=\"tg-heading-border\">\n										<h3><a href=\"#\">product title</a></h3>\n									</div>\n									<div class=\"tg-stars\">\n										<i class=\"fa fa-star\"></i>\n										<i class=\"fa fa-star\"></i>\n										<i class=\"fa fa-star\"></i>\n										<i class=\"fa fa-star\"></i>\n										<i class=\"fa fa-star-half-empty\"></i>\n									</div>\n									<span class=\"tg-product-price\">$37.00 <del>$45.00</del></span>\n								</div>\n							</div>\n							<div class=\"item tg-product\">\n								<figure>\n									<img src=\"assets/images/product/img-12.jpg\" alt=\"image description\">\n									<ul class=\"tg-product-icon\">\n										<li><a href=\"#\"><i class=\"fa fa-cart-plus\"></i></a></li>\n										<li><a href=\"#\"><i class=\"fa fa-eye\"></i></a></li>\n									</ul>\n								</figure>\n								<div class=\"tg-product-info tg-haslayout\">\n									<div class=\"tg-heading-border\">\n										<h3><a href=\"#\">product title</a></h3>\n									</div>\n									<div class=\"tg-stars\">\n										<i class=\"fa fa-star\"></i>\n										<i class=\"fa fa-star\"></i>\n										<i class=\"fa fa-star\"></i>\n										<i class=\"fa fa-star\"></i>\n										<i class=\"fa fa-star-half-empty\"></i>\n									</div>\n									<span class=\"tg-product-price\">$37.00 <del>$45.00</del></span>\n								</div>\n							</div>\n						</div>\n					</div>\n				</div>', 'Accueil', 'accueil', 1, '1', 'assets/content/upload/slide-2.png');
INSERT INTO `pageweb` (`id`, `id_lang`, `id_parent`, `nom`, `title`, `contenu`, `descripion`, `rewrite`, `ordre`, `menu`, `slide`) VALUES
(36, 1, 1, 'Qui sommes-nous', 'Qui sommes-nous', '<div class=\"container\">\n<div class=\"row\">\n<div class=\"col-xs-8 col-xs-offset-2\">\n<div class=\"tg-section-head tg-haslayout\">\n<div class=\"tg-section-heading tg-haslayout\">\n<h2>Welcome to Mechanico</h2>\n</div>\n</div>\n</div>\n\n<div class=\"tg-howwework tg-welcome tg-haslayout\">\n<div class=\"col-lg-6 col-md-7 col-sm-12 col-xs-12 tg-verticalmiddle\">\n<p><img alt=\"image description\" src=\"assets/images/img-10.jpg\" /></p>\n</div>\n\n<div class=\"col-lg-6 col-md-5 col-sm-12 col-xs-12 tg-verticalmiddle\">\n<div class=\"tg-textbox\">\n<div class=\"tg-description\">\n<p>Consectetur adipisicing elit, sed do eiusmod tempor incidt ut labore et dolore magna aliqua siampa toly sita totam amit siam anta toatam aplicianto.</p>\n</div>\n\n<ul>\n	<li>\n	<div class=\"tg-workdata\">\n	<h3>consectetur adipisicing</h3>\n\n	<div class=\"tg-work-description\">\n	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua enim ad minim veniam.</p>\n	</div>\n	</div>\n	</li>\n	<li>\n	<div class=\"tg-workdata\">\n	<h3>magna aliqua</h3>\n\n	<div class=\"tg-work-description\">\n	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua enim ad minim veniam.</p>\n	</div>\n	</div>\n	</li>\n	<li>\n	<div class=\"tg-workdata\">\n	<h3>eiusmod tempor</h3>\n\n	<div class=\"tg-work-description\">\n	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua enim ad minim veniam.</p>\n	</div>\n	</div>\n	</li>\n</ul>\n<a class=\"tg-btn\" href=\"#\">meet the team</a></div>\n</div>\n</div>\n</div>\n</div>\n<!--************************************\n					How We Works End\n			*************************************--><!--************************************\n					Counter Start\n			*************************************-->\n\n<div class=\"container\">\n<div class=\"row\">\n<div class=\"tg-counters\">\n<div class=\"tg-counter\">\n<h2>3700</h2>\n\n<div class=\"tg-heading-border\">\n<h3>Customer Satisfied</h3>\n</div>\n</div>\n\n<div class=\"tg-counter\">\n<h2>160</h2>\n\n<div class=\"tg-heading-border\">\n<h3>Engine Repair</h3>\n</div>\n</div>\n\n<div class=\"tg-counter\">\n<h2>850</h2>\n\n<div class=\"tg-heading-border\">\n<h3>Oil Change</h3>\n</div>\n</div>\n\n<div class=\"tg-counter\">\n<h2>1850</h2>\n\n<div class=\"tg-heading-border\">\n<h3>car Paint</h3>\n</div>\n</div>\n</div>\n</div>\n</div>\n<!--************************************\n					Counter End\n			*************************************--><!--************************************\n					Choose Us Start\n			*************************************-->\n\n<div class=\"container\">\n<div class=\"row\">\n<div class=\"col-xs-8 col-xs-offset-2\">\n<div class=\"tg-section-head tg-haslayout\">\n<div class=\"tg-section-heading tg-haslayout\">\n<h2>why choose us</h2>\n</div>\n\n<div class=\"tg-description tg-haslayout\">\n<p>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minimiam uis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>\n</div>\n</div>\n</div>\n\n<div class=\"tg-hotservices\">\n<div class=\"col-md-3 col-sm-3 col-xs-6 tg-choosewidth\">\n<div class=\"tg-hotservice tg-large\">\n<div class=\"tg-displaytable\">\n<div class=\"tg-displaytablecell\">\n<div class=\"tg-service-data\">\n<div class=\"tg-heading-border\">\n<h3><a href=\"#\">Car Paint</a></h3>\n</div>\n\n<div class=\"tg-description\">\n<p>Lorem ipsum dolor sit ametur adipisicing elit sed do eiusm. tempor</p>\n</div>\n</div>\n</div>\n</div>\n</div>\n</div>\n\n<div class=\"col-md-3 col-sm-3 col-xs-6 tg-choosewidth\">\n<div class=\"tg-hotservice\">\n<div class=\"tg-displaytable\">\n<div class=\"tg-displaytablecell\">\n<div class=\"tg-service-data\">\n<div class=\"tg-heading-border\">\n<h3><a href=\"#\">Car Repair</a></h3>\n</div>\n\n<div class=\"tg-description\">\n<p>Lorem ipsum dolor sit ametur adipisicing elit sed do eiusm. tempor</p>\n</div>\n</div>\n</div>\n</div>\n</div>\n\n<div class=\"tg-hotservice\">\n<div class=\"tg-displaytable\">\n<div class=\"tg-displaytablecell\">\n<div class=\"tg-service-data\">\n<div class=\"tg-heading-border\">\n<h3><a href=\"#\">Oil Change</a></h3>\n</div>\n\n<div class=\"tg-description\">\n<p>Lorem ipsum dolor sit ametur adipisicing elit sed do eiusm. tempor</p>\n</div>\n</div>\n</div>\n</div>\n</div>\n</div>\n\n<div class=\"col-md-3 col-sm-3 col-xs-6 tg-choosewidth\">\n<div class=\"tg-hotservice\">\n<div class=\"tg-displaytable\">\n<div class=\"tg-displaytablecell\">\n<div class=\"tg-service-data\">\n<div class=\"tg-heading-border\">\n<h3><a href=\"#\">DIAGNOSTICS</a></h3>\n</div>\n\n<div class=\"tg-description\">\n<p>Lorem ipsum dolor sit ametur adipisicing elit sed do eiusm. tempor</p>\n</div>\n</div>\n</div>\n</div>\n</div>\n\n<div class=\"tg-hotservice\">\n<div class=\"tg-displaytable\">\n<div class=\"tg-displaytablecell\">\n<div class=\"tg-service-data\">\n<div class=\"tg-heading-border\">\n<h3><a href=\"#\">Maintenance</a></h3>\n</div>\n\n<div class=\"tg-description\">\n<p>Lorem ipsum dolor sit ametur adipisicing elit sed do eiusm. tempor</p>\n</div>\n</div>\n</div>\n</div>\n</div>\n</div>\n\n<div class=\"col-md-3 col-sm-3 col-xs-6 tg-choosewidth\">\n<div class=\"tg-hotservice tg-large\">\n<div class=\"tg-displaytable\">\n<div class=\"tg-displaytablecell\">\n<div class=\"tg-service-data\">\n<div class=\"tg-heading-border\">\n<h3><a href=\"#\">Wheel Balance</a></h3>\n</div>\n\n<div class=\"tg-description\">\n<p>Lorem ipsum dolor sit ametur adipisicing elit sed do eiusm. tempor</p>\n</div>\n</div>\n</div>\n</div>\n</div>\n</div>\n</div>\n</div>\n</div>\n<!--************************************\n					Choose End\n			*************************************--><!--************************************\n					Testimonials Start\n			*************************************-->\n\n<div class=\"container\">\n<div class=\"row\">\n<div class=\"col-xs-12\">\n<div class=\"tg-testimonials-slider tg-haslayout\">\n<h2>testimonials</h2>\n\n<div class=\"tg-message-slider tg-haslayout\" id=\"tg-message-slider\">\n<div class=\"item\">\n<blockquote><q>Adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua enimad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip exeation litsed do eiusmod tempor sita totam piatotan sibanian kayla.</q></blockquote>\n</div>\n\n<div class=\"item\">\n<blockquote><q>Adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua enimad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip exeation litsed do eiusmod tempor sita totam piatotan sibanian kayla.</q></blockquote>\n</div>\n\n<div class=\"item\">\n<blockquote><q>Adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua enimad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip exeation litsed do eiusmod tempor sita totam piatotan sibanian kayla.</q></blockquote>\n</div>\n\n<div class=\"item\">\n<blockquote><q>Adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua enimad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip exeation litsed do eiusmod tempor sita totam piatotan sibanian kayla.</q></blockquote>\n</div>\n\n<div class=\"item\">\n<blockquote><q>Adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua enimad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip exeation litsed do eiusmod tempor sita totam piatotan sibanian kayla.</q></blockquote>\n</div>\n\n<div class=\"item\">\n<blockquote><q>Adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua enimad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip exeation litsed do eiusmod tempor sita totam piatotan sibanian kayla.</q></blockquote>\n</div>\n</div>\n\n<div class=\"tg-author-slider tg-haslayout\" id=\"tg-author-slider\">\n<div class=\"item\">\n<p><img alt=\"image description\" src=\"assets/images/thumbnail/thumbnail-01.jpg\" /></p>\n\n<div class=\"tg-author-detail\">\n<div class=\"tg-heading-border\">\n<h3>Simon Doe</h3>\n</div>\nCustomer, NY</div>\n</div>\n\n<div class=\"item\">\n<p><img alt=\"image description\" src=\"assets/images/thumbnail/thumbnail-02.jpg\" /></p>\n\n<div class=\"tg-author-detail\">\n<div class=\"tg-heading-border\">\n<h3>Angela Doe</h3>\n</div>\nCustomer, NY</div>\n</div>\n\n<div class=\"item\">\n<p><img alt=\"image description\" src=\"assets/images/thumbnail/thumbnail-03.jpg\" /></p>\n\n<div class=\"tg-author-detail\">\n<div class=\"tg-heading-border\">\n<h3>Jhon Doe</h3>\n</div>\nCustomer, NY</div>\n</div>\n\n<div class=\"item\">\n<p><img alt=\"image description\" src=\"assets/images/thumbnail/thumbnail-04.jpg\" /></p>\n\n<div class=\"tg-author-detail\">\n<div class=\"tg-heading-border\">\n<h3>Riana Doe</h3>\n</div>\nCustomer, NY</div>\n</div>\n\n<div class=\"item\">\n<p><img alt=\"image description\" src=\"assets/images/thumbnail/thumbnail-05.jpg\" /></p>\n\n<div class=\"tg-author-detail\">\n<div class=\"tg-heading-border\">\n<h3>Simon Doe</h3>\n</div>\nCustomer, NY</div>\n</div>\n\n<div class=\"item\">\n<p><img alt=\"image description\" src=\"assets/images/thumbnail/thumbnail-06.jpg\" /></p>\n\n<div class=\"tg-author-detail\">\n<div class=\"tg-heading-border\">\n<h3>Lara Doe</h3>\n</div>\nCustomer, NY</div>\n</div>\n</div>\n</div>\n</div>\n</div>\n</div>\n<!--************************************\n					Testimonials End\n			*************************************--><!--************************************\n					FAQ Skills Start\n			*************************************-->\n\n<div class=\"container\">\n<div class=\"row\">\n<div class=\"col-sm-6\">\n<div class=\"tg-faqs\">\n<h2>F.A.Q</h2>\n\n<div class=\"tg-accordion tg-haslayout\">\n<div class=\"panel-group tg-panel-group\" id=\"accordion\">\n<div class=\"panel panel-default active\">\n<div class=\"panel-heading\" id=\"headingOne\">\n<h3><a href=\"#collapseOne\">Our Solution</a></h3>\n</div>\n\n<div class=\"panel-collapse collapse in\" id=\"collapseOne\">\n<div class=\"panel-body\">\n<p><img alt=\"image description\" src=\"assets/images/thumbnail/thumbnail-02.jpg\" /></p>\n\n<div class=\"tg-textbox\">\n<p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram anteposuerit litterarum formas humanitatis per seacula.</p>\n</div>\n</div>\n</div>\n</div>\n\n<div class=\"panel panel-default\">\n<div class=\"panel-heading\" id=\"headingTwo\">\n<h3><a class=\"collapsed\" href=\"#collapseTwo\">Our Mission</a></h3>\n</div>\n\n<div class=\"panel-collapse collapse\" id=\"collapseTwo\">\n<div class=\"panel-body\">\n<p><img alt=\"image description\" src=\"assets/images/thumbnail/thumbnail-02.jpg\" /></p>\n\n<div class=\"tg-textbox\">\n<p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram anteposuerit litterarum formas humanitatis per seacula.</p>\n</div>\n</div>\n</div>\n</div>\n\n<div class=\"panel panel-default\">\n<div class=\"panel-heading\" id=\"headingThree\">\n<h3><a class=\"collapsed\" href=\"#collapseThree\">Our Technology</a></h3>\n</div>\n\n<div class=\"panel-collapse collapse\" id=\"collapseThree\">\n<div class=\"panel-body\">\n<p><img alt=\"image description\" src=\"assets/images/thumbnail/thumbnail-02.jpg\" /></p>\n\n<div class=\"tg-textbox\">\n<p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram anteposuerit litterarum formas humanitatis per seacula.</p>\n</div>\n</div>\n</div>\n</div>\n</div>\n</div>\n</div>\n</div>\n\n<div class=\"col-sm-6\">\n<div class=\"tg-skill-box\">\n<h2>Our Skills</h2>\n\n<div class=\"tg-skill-group\" id=\"tg-ourskill\">\n<div class=\"tg-skill active\">Photoshop\n<div class=\"tg-skill-holder tg-border\">\n<div class=\"tg-skill-bar\">95%</div>\n</div>\n</div>\n\n<div class=\"tg-skill\">Illustrator\n<div class=\"tg-skill-holder tg-border\">\n<div class=\"tg-skill-bar\">70%</div>\n</div>\n</div>\n\n<div class=\"tg-skill\">indesign\n<div class=\"tg-skill-holder tg-border\">\n<div class=\"tg-skill-bar\">45%</div>\n</div>\n</div>\n\n<div class=\"tg-skill\">Flash\n<div class=\"tg-skill-holder tg-border\">\n<div class=\"tg-skill-bar\">90%</div>\n</div>\n</div>\n\n<div class=\"tg-skill\">Premiere\n<div class=\"tg-skill-holder tg-border\">\n<div class=\"tg-skill-bar\">55%</div>\n</div>\n</div>\n</div>\n</div>\n</div>\n</div>\n</div>\n<!--************************************\n					FAQ Skills End\n			*************************************--><!--************************************\n					Buy Now Start\n			*************************************-->\n\n<div class=\"container\">\n<div class=\"row\">\n<div class=\"col-xs-12\">\n<div class=\"tg-buynowbox\">\n<h3>consectetur adipisicing elit <strong>sed do eiusmod tempor</strong> incididunt.</h3>\n<a class=\"tg-btn\" href=\"#\">Read more</a></div>\n</div>\n</div>\n</div>\n<!--************************************\n					Buy Now End\n			*************************************--><!--************************************\n					Our Team Start\n			*************************************-->\n\n<div class=\"container\">\n<div class=\"row\">\n<div class=\"col-xs-8 col-xs-offset-2\">\n<div class=\"tg-section-head tg-haslayout\">\n<div class=\"tg-section-heading tg-haslayout\">\n<h2>Our Team</h2>\n</div>\n\n<div class=\"tg-description tg-haslayout\">\n<p>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minimiam uis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>\n</div>\n</div>\n</div>\n\n<div class=\"tg-team-slider tg-haslayout\" id=\"tg-team-slider\">\n<div class=\"item tg-team\"><img alt=\"image description\" src=\"assets/images/team/img-01.jpg\" />\n<div class=\"tg-displaytable\">\n<div class=\"tg-displaytablecell\">\n<div class=\"tg-heading-border\">\n<h3>Jhon Doe</h3>\n</div>\nSenior Mechanic\n\n<div class=\"tg-description\">\n<p>Lorem ipsum dolor sit ametcur adipisicing elit saed do eiusd tempor incididunt labore.</p>\n</div>\n\n<ul>\n	<li>&nbsp;</li>\n	<li>&nbsp;</li>\n	<li>&nbsp;</li>\n	<li>&nbsp;</li>\n</ul>\n</div>\n</div>\n</div>\n\n<div class=\"item tg-team\"><img alt=\"image description\" src=\"assets/images/team/img-02.jpg\" />\n<div class=\"tg-displaytable\">\n<div class=\"tg-displaytablecell\">\n<div class=\"tg-heading-border\">\n<h3>Simone Doe</h3>\n</div>\nSenior Mechanic\n\n<div class=\"tg-description\">\n<p>Lorem ipsum dolor sit ametcur adipisicing elit saed do eiusd tempor incididunt labore.</p>\n</div>\n\n<ul>\n	<li>&nbsp;</li>\n	<li>&nbsp;</li>\n	<li>&nbsp;</li>\n	<li>&nbsp;</li>\n</ul>\n</div>\n</div>\n</div>\n\n<div class=\"item tg-team\"><img alt=\"image description\" src=\"assets/images/team/img-03.jpg\" />\n<div class=\"tg-displaytable\">\n<div class=\"tg-displaytablecell\">\n<div class=\"tg-heading-border\">\n<h3>Paul Morton</h3>\n</div>\nSenior Mechanic\n\n<div class=\"tg-description\">\n<p>Lorem ipsum dolor sit ametcur adipisicing elit saed do eiusd tempor incididunt labore.</p>\n</div>\n\n<ul>\n	<li>&nbsp;</li>\n	<li>&nbsp;</li>\n	<li>&nbsp;</li>\n	<li>&nbsp;</li>\n</ul>\n</div>\n</div>\n</div>\n\n<div class=\"item tg-team\"><img alt=\"image description\" src=\"assets/images/team/img-04.jpg\" />\n<div class=\"tg-displaytable\">\n<div class=\"tg-displaytablecell\">\n<div class=\"tg-heading-border\">\n<h3>Alexander E</h3>\n</div>\nSenior Mechanic\n\n<div class=\"tg-description\">\n<p>Lorem ipsum dolor sit ametcur adipisicing elit saed do eiusd tempor incididunt labore.</p>\n</div>\n\n<ul>\n	<li>&nbsp;</li>\n	<li>&nbsp;</li>\n	<li>&nbsp;</li>\n	<li>&nbsp;</li>\n</ul>\n</div>\n</div>\n</div>\n\n<div class=\"item tg-team\"><img alt=\"image description\" src=\"assets/images/team/img-05.jpg\" />\n<div class=\"tg-displaytable\">\n<div class=\"tg-displaytablecell\">\n<div class=\"tg-heading-border\">\n<h3>Mithelle Jhon</h3>\n</div>\nSenior Mechanic\n\n<div class=\"tg-description\">\n<p>Lorem ipsum dolor sit ametcur adipisicing elit saed do eiusd tempor incididunt labore.</p>\n</div>\n\n<ul>\n	<li>&nbsp;</li>\n	<li>&nbsp;</li>\n	<li>&nbsp;</li>\n	<li>&nbsp;</li>\n</ul>\n</div>\n</div>\n</div>\n\n<div class=\"item tg-team\"><img alt=\"image description\" src=\"assets/images/team/img-06.jpg\" />\n<div class=\"tg-displaytable\">\n<div class=\"tg-displaytablecell\">\n<div class=\"tg-heading-border\">\n<h3>Marshal Doe</h3>\n</div>\nSenior Mechanic\n\n<div class=\"tg-description\">\n<p>Lorem ipsum dolor sit ametcur adipisicing elit saed do eiusd tempor incididunt labore.</p>\n</div>\n\n<ul>\n	<li>&nbsp;</li>\n	<li>&nbsp;</li>\n	<li>&nbsp;</li>\n	<li>&nbsp;</li>\n</ul>\n</div>\n</div>\n</div>\n\n<div class=\"item tg-team\"><img alt=\"image description\" src=\"assets/images/team/img-07.jpg\" />\n<div class=\"tg-displaytable\">\n<div class=\"tg-displaytablecell\">\n<div class=\"tg-heading-border\">\n<h3>David Kirkland</h3>\n</div>\nSenior Mechanic\n\n<div class=\"tg-description\">\n<p>Lorem ipsum dolor sit ametcur adipisicing elit saed do eiusd tempor incididunt labore.</p>\n</div>\n\n<ul>\n	<li>&nbsp;</li>\n	<li>&nbsp;</li>\n	<li>&nbsp;</li>\n	<li>&nbsp;</li>\n</ul>\n</div>\n</div>\n</div>\n\n<div class=\"item tg-team\"><img alt=\"image description\" src=\"assets/images/team/img-08.jpg\" />\n<div class=\"tg-displaytable\">\n<div class=\"tg-displaytablecell\">\n<div class=\"tg-heading-border\">\n<h3>Jhon Doe</h3>\n</div>\nSenior Mechanic\n\n<div class=\"tg-description\">\n<p>Lorem ipsum dolor sit ametcur adipisicing elit saed do eiusd tempor incididunt labore.</p>\n</div>\n\n<ul>\n	<li>&nbsp;</li>\n	<li>&nbsp;</li>\n	<li>&nbsp;</li>\n	<li>&nbsp;</li>\n</ul>\n</div>\n</div>\n</div>\n</div>\n</div>\n</div>\n', 'Qui sommes-nous', 'spectrasonics', 3, '1', 'assets/content/upload/slide-2.png'),
(40, 1, 1, 'Contact', 'Contact', '', 'Contact', 'contact', 10, '1', 'assets/content/upload/slide-2.png'),
(46, 1, 36, 'Nos services', 'Service', '<div class=\"container\">\r\n<div class=\"row\">\r\n<div class=\"col-xs-8 col-xs-offset-2\">\r\n<div class=\"tg-section-head tg-haslayout\">\r\n<div class=\"tg-section-heading tg-haslayout\">\r\n<h2>Nos services</h2>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"tg-howwework tg-welcome tg-haslayout\">\r\n<div class=\"col-lg-6 col-md-7 col-sm-12 col-xs-12 tg-verticalmiddle\">\r\n<p><img alt=\"image description\" src=\"/ckfinder/userfiles/images/product-4.png\" style=\"height:550px; width:550px\" /></p>\r\n</div>\r\n\r\n<div class=\"col-lg-6 col-md-5 col-sm-12 col-xs-12 tg-verticalmiddle\">\r\n<div class=\"tg-textbox\">\r\n<div class=\"tg-description\">\r\n<p>SPECTASONIC, c&#39;est avant tout une &eacute;quipe qui intervient sur divers domaines de la structure du son en g&eacute;n&eacute;ral.</p>\r\n\r\n<p>Etudes industrielles ou impl&eacute;mentation de salles de concert, d&#39;auditorium, font partie des comp&eacute;tences expertes de SPECTASONIC.<br />\r\n<br />\r\nDes ing&eacute;nieurs de haut niveau sp&eacute;cialis&eacute;s dans les formations intiales acoustiques.<br />\r\n<br />\r\nNotre &eacute;quipe pr&eacute;f&egrave;re les challenges complexes impliquant une parfaite connaissances des enjeux.<br />\r\n<br />\r\nLa client&egrave;le de particuliers la plus exigeante peut aussi faire appel &agrave; nos services pour l&#39;impl&eacute;mentation d&#39;un salon musical ou un home cim&eacute;ma.<br />\r\n<br />\r\nLes r&eacute;sultats sont mesur&eacute;s et garantis par nos experts gr&acirc;ce &agrave; un parc d&#39;&eacute;quipements de pointes : microphones sp&eacute;ciaux, mesure de la fr&eacute;quences, g&eacute;n&eacute;rateur de bruits blanc.<br />\r\n<br />\r\nAvec SPECTASONIC, vous avez l&#39;assurance de maximiser les ressources dont vous disposez.<br />\r\n<br />\r\nUn travail de qualit&eacute; se passe de discours.</p>\r\n\r\n<p><br />\r\nEcoutez, le r&eacute;sultat vous laissera &nbsp;sans voix.</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n', 'Service', 'metiers', 14, '1', 'assets/content/upload/slide-2.png'),
(48, 1, 36, 'Histoire', 'Histoire', '<div class=\"container\">\n<div class=\"row\">\n<div class=\"col-xs-8 col-xs-offset-2\">\n<div class=\"tg-section-head tg-haslayout\">\n<div class=\"tg-section-heading tg-haslayout\">\n<h2>A propos de Spectasonic</h2>\n</div>\n</div>\n</div>\n\n<div class=\"tg-howwework tg-welcome tg-haslayout\">\n<div class=\"col-lg-6 col-md-7 col-sm-12 col-xs-12 tg-verticalmiddle\">\n<p><img alt=\"image description\" src=\"/ckfinder/userfiles/images/fiio.jpg\" /></p>\n</div>\n\n<div class=\"col-lg-6 col-md-5 col-sm-12 col-xs-12 tg-verticalmiddle\">\n<div class=\"tg-textbox\">\n<div class=\"tg-description\">\n<p>En <strong>1954,</strong> Mr G&eacute;d&eacute;on Gaultier ouvre son atelier &agrave; Lyon, rue Garibaldi. Il fabrique son premier amplificateur &agrave; lampes qu&#39;il baptise le &quot;G&eacute;d&eacute;on 1&quot;.</p>\n\n<p>&nbsp;</p>\n\n<p>En <strong>1992</strong>, il confie les rennes de sa petite entreprise &agrave; son fils, Jos&eacute;, qui la fait prosp&eacute;rer avec seulement deux ouvriers et ce jusqu&#39;en <strong>2006</strong>. Le SPECTALIZER conna&icirc;t un d&eacute;veloppement significatif de son activit&eacute;.</p>\n\n<p>&nbsp;</p>\n\n<p>En <strong>2008</strong>, le fils de M. Jos&eacute; Gaultiera fort d&#39;une formation MBA &agrave; l&#39;EM Lyon d&eacute;cide de donner un coup d&#39;acc&eacute;l&eacute;rateur puissant &agrave; son entreprise.</p>\n\n<p>&nbsp;</p>\n\n<p>Muni d&#39;un business plan cons&eacute;quent, il fait appel au fond DELTA FINANCES afin de financer sa croissance. En <strong>2011</strong>, l&#39;entreprise emploie <strong>25</strong> personnes et livre ses amplificateurs partout dans le monde. Elle propose aussi des prestations d&#39;installation et d&#39;audit. En <strong>2012</strong>, le projet d&#39;ouverture d&#39;un site marchand en ligne est valid&eacute;.</p>\n\n<p>&nbsp;</p>\n\n<p>En <strong>2014</strong>, apr&egrave;s trois ann&eacute;es de pr&eacute;paration, SPECTASONIC rach&egrave;te l&#39;entreprise dublinoise RICHER Ltd, fabricant d&#39;amplificateur sur mesure afin de d&eacute;ployer son activit&eacute; dans le monde anglophone.</p>\n\n<p>&nbsp;</p>\n\n<p>En <strong>2015</strong>, l&#39;entreprise compte presque salari&eacute;s <strong>50</strong> sur la France, l&#39;Irlande et la Bulgarie Et ce n&#39;est qu&#39;un d&eacute;but....la suite de l&#39;histoire : c&#39;est peut &ecirc;tre VOUS qui allez l&#39;&eacute;crire !</p>\n</div>\n</div>\n</div>\n</div>\n</div>\n</div>\n', 'Histoire', 'histoire', 15, '1', 'assets/content/upload/slide-2.png'),
(50, 1, 1, 'ActualitÃ©s', 'ActualitÃ©', '', 'ActualitÃ©', 'actualite', 12, '1', 'assets/content/upload/slide-2.png'),
(86, 2, 1, 'Home', 'Home', '', 'Home', 'home', 2, '1', ''),
(87, 2, 1, 'Presentation', 'Presentation', '', 'Presentation', 'presentation', 4, '1', 'assets/content/upload/slide-2.png'),
(88, 2, 1, 'Products', 'Products', '', 'Products', 'visit-our-cellars', 7, '1', 'assets/content/upload/slide-2.png'),
(89, 2, 1, 'CatÃ©gories', 'CatÃ©gories', '', 'CatÃ©gories', 'our-wines', 9, '1', 'assets/content/upload/slide-2.png'),
(90, 2, 1, 'Contact', 'contact', '', 'contact', 'contact', 11, '1', 'assets/content/upload/slide-2.png'),
(91, 2, 87, 'History', 'History', '', 'History', 'activities', 16, '1', 'assets/content/upload/slide-2.png'),
(93, 2, 87, 'Our services', 'Our services', '<p><img alt=\"\" src=\"http://patriarche.melis.fr/assets/content/upload/images/images.jpg\" style=\"width: 299px; height: 169px; float: right;\" /><strong>PATRIARCHE, a major player in the French wine industry&nbsp;with&nbsp;</strong>international representation:</p>\r\n\r\n<p><strong>1780</strong>: PATRIARCHE was founded in Beaune. &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<strong>1904:&nbsp;</strong>the oldest vintage in our cellars&nbsp;<br />\r\n<br />\r\nTurnover:&nbsp;<strong>115 million Euros &nbsp;</strong> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<strong>3 million</strong>&nbsp;bottles in our cellars&nbsp;<br />\r\n&nbsp; &nbsp;<br />\r\n<strong>185</strong>&nbsp;employees &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<strong>&nbsp;50,000&nbsp;visitors</strong> to our cellars each year&nbsp;<br />\r\n<br />\r\n<strong>60 million&nbsp;</strong>bottles sold each year throughout the world &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <strong>1&nbsp;subsidiary</strong> in the United States&nbsp;<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<br />\r\nAvailable in over&nbsp;<strong>85&nbsp;countries &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;5 km&nbsp;</strong>of cellars in Beaune&nbsp;</p>\r\n', 'Our services', 'key-figures', 18, '1', 'assets/content/upload/slide-2.png'),
(94, 2, 1, 'News', 'News', '', 'News', 'news', 13, '1', 'assets/content/upload/slide-2.png'),
(97, 1, 1, 'Mentions lÃ©gales', 'Mentions lÃ©gales', '<p>Ce site Internet est la propri&eacute;t&eacute; de la Soci&eacute;t&eacute; KBB SA, au capital de 39 000 000 euros, immatricul&eacute;e au RCS de Dijon sous le n B 343 484 879 dont le si&egrave;ge social est situ&eacute; 5/7, rue du Coll&egrave;ge, 21200 Beaune, &eacute;diteur dudit site.<br />\r\nLes termes qui suivent r&eacute;gissent votre consultation du site.Si vous &ecirc;tes en d&eacute;saccord avec eux, vous pouvez quitter le site.&nbsp;<br />\r\n<br />\r\n<strong>- Age</strong><br />\r\nPour visiter ce site, vous devez &ecirc;tre &acirc;g&eacute; d&#39;au moins 18 ans.&nbsp;<br />\r\nA d&eacute;faut, nous vous remercions de bien vouloir quitter le site.&nbsp;<br />\r\n<br />\r\n<strong>- Risques et responsabilit&eacute;</strong><br />\r\nLa visite de ce site est enti&egrave;rement sous votre responsabilit&eacute;.&nbsp;<br />\r\nPATRIARCHE ne peut garantir que ce site ne comporte pas de bugs, d&#39;erreurs ou de virus qui pourraient affecter votre ordinateur.&nbsp;<br />\r\nPATRIARCHE ne peut vous garantir que l&#39;information du site est &agrave; jour au moment de votre visite. PATRIARCHE n&#39;est responsable d&#39;aucun pr&eacute;judice que vous pourriez subir dans le cadre de la visite de ce site.&nbsp;<br />\r\n<br />\r\n<strong>- Propri&eacute;t&eacute; intellectuelle et industrielle</strong><br />\r\nPATRIARCHE avise les utilisateurs de ce site que les &eacute;l&eacute;ments pr&eacute;sent&eacute;s (photos, dessins, logos, noms de maisons ou marque, maquette du site et tous &eacute;l&eacute;ments graphiques ou visuels, etc...) sont prot&eacute;g&eacute;s par la l&eacute;gislation en vigueur sur le droit d&#39;auteur, sur les dessins et mod&egrave;les ainsi que par la l&eacute;gislation sur les marques.&nbsp;<br />\r\nPATRIARCHE est investi des droits de tous les droits de propri&eacute;t&eacute; intellectuelle et industrielle sur tous les &eacute;l&eacute;ments susvis&eacute;s du site.&nbsp;<br />\r\nToute reproduction, repr&eacute;sentation, utilisation, adaptation, traduction, commercialisation, partielle ou int&eacute;grale est interdite, sauf accord pr&eacute;alable &eacute;crit de PATRIARCHE. Vous pouvez n&eacute;anmoins imprimer des pages enti&egrave;res sur un support papier pour votre usage personnel, &agrave; titre strictement priv&eacute;.&nbsp;<br />\r\n<br />\r\n<strong>- Protection des donn&eacute;es</strong><br />\r\nPATRIARCHE respecte la libert&eacute; de tout individu visitant le site.&nbsp;<br />\r\nLa pr&eacute;sente clause d&eacute;crit les renseignements que PATRIARCHE est susceptible de collecter ainsi que l&#39;usage qui en sera fait.&nbsp;<br />\r\nRenseignements personnels : PATRIARCHE ne se procurera pas d&#39;informations permettant de vous identifier personnellement, directement ou indirectement (c&#39;est-&agrave;-dire: vos nom, adresse, num&eacute;ro de t&eacute;l&eacute;phone ou adresse e-mail; &quot;Renseignements personnels&quot;) &agrave; moins que vous ne nous les communiquiez volontairement en r&eacute;pondant aux formulaires ad&eacute;quats.</p>\r\n\r\n<p>Si vous fournissez des renseignements personnels &agrave; PATRIARCHE, ceux-ci seront stock&eacute;s dans une base de donn&eacute;es pour &ecirc;tre utilis&eacute;s pour des analyses de march&eacute;, le suivi des ventes ainsi que pour pouvoir vous contacter. Droit d&#39;acc&egrave;s, de modification, de rectification et de suppression.En application de la loi N 78-17 du 6 janvier 1978 relative &agrave; l&#39;informatique, aux fichiers et aux libert&eacute;s, nous vous informons que vous disposez d&#39;un droit d&#39;acc&egrave;s, de modification, de rectification et de suppression des donn&eacute;es nominatives qui vous concernent. Pour l&#39;exercer, vous pouvez &eacute;crire &agrave; l&#39;adresse PATRIARCHE mentionn&eacute;e ci-dessous.&nbsp;<br />\r\n<br />\r\n<strong>- Cookies</strong><br />\r\nUn cookie est une information envoy&eacute;e par un site Internet et stock&eacute;e sur votre ordinateur. Un cookie ne nous permet pas de vous identifier; en revanche il enregistre des informations relatives &agrave; la navigation de votre ordinateur sur notre site (pages consult&eacute;es, date et heure de consultation...). Vous pouvez param&eacute;trer votre navigateur afin d&#39;&ecirc;tre pr&eacute;venu lorsque vous recevrez un cookie. Cela vous laissera le choix d&#39;accepter ou non le cookie.&nbsp;<br />\r\nCe site utilise les cookies seulement afin d&#39;optimiser son utilisation. Aucune information personnelle n&#39;est stock&eacute;e. Les donn&eacute;es enregistr&eacute;es &agrave; l&#39;aide de cookies sur ce site ne seront utilis&eacute;es que par PATRIARCHE, et ne seront jamais partag&eacute;es avec d&#39;autres entreprises. La dur&eacute;e de conservation de ces informations dans votre ordinateur d&eacute;pend du param&eacute;trage de votre logiciel de navigation.&nbsp;<br />\r\n<br />\r\n<strong>- Contacter PATRIARCHE:&nbsp;</strong><br />\r\nSi vous d&eacute;sirez contacter PATRIARCHE, il vous suffit de nous &eacute;crire &agrave; l&#39;adresse suivante :<br />\r\nPATRIARCHE 5-7, rue du Coll&egrave;ge - 21200 BEAUNE<br />\r\nT&eacute;l. + 33 (0)3 80 24 53 01&nbsp;<br />\r\n<br />\r\n<strong>- Loi fran&ccedil;aise</strong><br />\r\nVous acceptez que ce site et vos relations avec PATRIARCHE soient plac&eacute;s sous le r&eacute;gime de la loi fran&ccedil;aise, qui est seule applicable au pr&eacute;sent site.<br />\r\nTout litige avec un utilisateur du site sera soumis aux tribunaux fran&ccedil;ais comp&eacute;tents.&nbsp;<br />\r\n<br />\r\n<strong>- H&eacute;bergeur</strong><br />\r\n<a href=\"https://www.ovh.com\" target=\"_blank\">OVH</a><br />\r\n<br />\r\n<strong>- Conception</strong><br />\r\n<a href=\"http://www.web-expert-bourgogne.fr/\" target=\"_blank\">Web Expert Bourgogne</a><br />\r\n<br />\r\n<strong>- Cr&eacute;dits</strong><br />\r\nBIVB/IMAGES ET ASSOCIES<br />\r\nBIVB/MONNIER H.<br />\r\nCOPYRIGHTS YUROK ALEKSANDROVIH - FOTOLIA.COM<br />\r\nCOPYRIGHTS SSILVER - FOTOLIA.COM<br />\r\nBLAZONDESIGN - FRANCOIS FOUQUES DUPARC<br />\r\nDUSAN ZIDAR&nbsp;</p>\r\n', 'Mentions lÃ©gales', 'mentions-legales', 19, '2', 'assets/content/upload/slide-2.png'),
(98, 1, 1, 'Plan du site', 'Plan du site', '', 'Plan du site', 'plan-du-site', 20, '2', 'assets/content/upload/slide-2.png'),
(99, 1, 1, 'Condition gÃ©nÃ©rale de vente', 'Condition gÃ©nÃ©rale de vente', '', 'Condition gÃ©nÃ©rale de vente', 'condition-generale-de-vente', 21, '2', 'assets/content/upload/slide-2.png'),
(100, 1, 1, 'CatÃ©gorie', 'catÃ©gorie', '', 'catÃ©gorie', 'cate-gorie', 8, '1', 'assets/content/upload/slide-2.png'),
(101, 1, 1, 'Produits', 'Produits', '', 'Produits', 'produits', 6, '1', 'assets/content/upload/slide-2.png'),
(102, 2, 1, 'Terms and conditions', 'Terms and conditions', '', 'Terms and conditions', 'terms-and-conditions', 20, '2', 'assets/content/upload/'),
(103, 2, 1, 'Site map', 'Site map', '', 'Site map', 'site-map', 21, '2', 'assets/content/upload/');

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `pdf` varchar(255) DEFAULT NULL,
  `cat` tinyint(1) NOT NULL,
  `date_c` date NOT NULL,
  `date_m` date DEFAULT NULL,
  `id_lang` int(11) DEFAULT NULL,
  `reference` varchar(255) DEFAULT NULL,
  `code_barre` varchar(255) DEFAULT NULL,
  `actif` varchar(255) DEFAULT NULL,
  `etat` varchar(255) DEFAULT NULL,
  `resume` text,
  `description` longtext,
  `prix_ht` decimal(10,0) DEFAULT NULL,
  `prix_ttc` decimal(10,0) DEFAULT NULL,
  `taxe` decimal(10,0) DEFAULT NULL,
  `balise_titre` varchar(255) DEFAULT NULL,
  `meta_desc` varchar(255) DEFAULT NULL,
  `quantite` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `fournisseur` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Contenu de la table `produits`
--

INSERT INTO `produits` (`id`, `nom`, `pdf`, `cat`, `date_c`, `date_m`, `id_lang`, `reference`, `code_barre`, `actif`, `etat`, `resume`, `description`, `prix_ht`, `prix_ttc`, `taxe`, `balise_titre`, `meta_desc`, `quantite`, `image`, `fournisseur`) VALUES
(3, 'test produit', NULL, 0, '2017-03-23', NULL, 1, 'ert', 'ert', '1', '1', '<p>testsetse</p>\r\n', '<p>testsetse</p>\r\n', '0', '0', '1', '', '', 0, NULL, ''),
(4, 'test 56', NULL, 2, '2017-03-23', NULL, 1, 'ref', 'codebarre', '1', '1', '<p>resum&eacute;</p>\r\n', '<p>description</p>\r\n', '50', '100', '1', 'balise titre', 'meta desc', 5, NULL, 'fournisseur');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `niveau` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `email`, `password`, `niveau`) VALUES
(17, 'Koubaa', 'Ahmed', 'contact@web-expert-bourgogne.fr', '470e4cdba997991412603d8f12a86545deb61124', 40);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cat_doc`
--
ALTER TABLE `cat_doc`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `extranet`
--
ALTER TABLE `extranet`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `optionsite`
--
ALTER TABLE `optionsite`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `optionsite_en`
--
ALTER TABLE `optionsite_en`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `pageweb`
--
ALTER TABLE `pageweb`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;
--
-- AUTO_INCREMENT pour la table `cat_doc`
--
ALTER TABLE `cat_doc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `email`
--
ALTER TABLE `email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT pour la table `extranet`
--
ALTER TABLE `extranet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT pour la table `optionsite`
--
ALTER TABLE `optionsite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `pageweb`
--
ALTER TABLE `pageweb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;
--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
