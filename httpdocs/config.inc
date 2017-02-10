<?php
// Ceci déclenche la session, cela doit être la première ligne de codé donnée au système


session_start();

// Definition du controle de l'age

if(!isset($_SESSION["age"])){
	$_SESSION["age"]=1;
}

// Definition du controle de la langue

if(!isset($_SESSION["langue"])){
	$_SESSION["langue"]=1;
}

if(isset($_GET["langue"])){

	$_SESSION["langue"]=$_GET["langue"];
}


// Langue = 1 = FR

// Langue = 2 = EN

define('PARAM_hote', 'localhost');

define('PARAM_port','3306');


define('PARAM_nom_bd','web');

define('PARAM_utilisateur','root');

define('PARAM_mot_passe','');

define('IMG_FILE','assets/img/');
define('IMG_ICON_PDF',IMG_FILE.'icoPDF.png');
define('IMG_ICON_VIDEO',IMG_FILE.'icoVIDEO.png');
define('UPLOAD_DIR','assets/content/upload/');


require_once('controllers/all/html.class.php');
require_once('assets/dico/'.$_SESSION["langue"].".php");

require_once('controllers/all/webTools.class.php');

require_once('controllers/all/model.class.php');


require_once('controllers/all/AdminController.php');

//roting niveau 1

require_once('controllers/all/appController.php');

require_once('controllers/site/siteController.php');



// PagesWeb

require_once('controllers/all/pageWebController.php');

require_once ('entity/class/all/pageWeb.php');

//article

require_once('controllers/all/actualitController.php');

require_once ('entity/class/all/actualite.php');


//optionsiteen

require_once('controllers/all/optionenController.php');

require_once ('entity/class/all/optionsite.php');

//email

require_once('controllers/all/emailController.php');

require_once ('entity/class/all/email.php');

//option

require_once('controllers/all/optionController.php');

require_once ('entity/class/all/option.php');


//image

require_once('controllers/all/imageController.php');

require_once ('entity/class/all/image.php');

//cat

require_once('controllers/all/categorieController.php');

require_once ('entity/class/all/categorie.php');

//user
require_once('controllers/all/userSiteController.php');
require_once ('entity/class/all/user.php');

