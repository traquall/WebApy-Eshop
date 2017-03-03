<?php

use Noneslad\Tools\HTML\html;
use Noneslad\Entity\User;

$pre = User::giveMeUser()->getPrenom();
$nom = User::giveMeUser()->getNom();
$id = User::giveMeUser()->getId();
?>
<div id="wrapper">
    <!-- navbar top -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="navbar">
        <!-- navbar-header -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php?page=admin&crud=home">
                <img src="assets/img/logos.png" alt="" width="80px" />
            </a>
        </div>
        <!-- end navbar-header -->
        <!-- navbar-top-links -->
        <ul class="nav navbar-top-links navbar-right">


            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-3x"></i>
                </a>
                <!-- dropdown user-->
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="index.php?page=admin&crud=user&action=update&&id=<?php echo $id;?>"><i class="fa fa-user fa-fw"></i>MODIFIER MON PROFIL</a>
                    </li>

                    <li class="divider"></li>
                    <li><a href="?page=admin&crud=user&action=deconnexion"><i class="fa fa-sign-out fa-fw"></i>DÉCONNEXION</a>
                    </li>
                </ul>
                <!-- end dropdown-user -->
            </li>
            <!-- end main dropdown -->
        </ul>
        <!-- end navbar-top-links -->

    </nav>
    <!-- end navbar top -->

    <!-- navbar side -->
    <nav class="navbar-default navbar-static-side" role="navigation">
        <!-- sidebar-collapse -->
        <div class="sidebar-collapse">
            <!-- side-menu -->
            <ul class="nav" id="side-menu">
                <li>
                    <!-- user image section-->
                    <div class="user-section">
                       <!-- <div class="user-section-inner">
                            <img src="assets/img/user.jpg" alt="">
                        </div>-->
                        <div class="user-info">
                            <div class="user-text-online">
                                <span class="user-circle-online btn btn-success btn-circle "></span>  connecter
                            </div>
                            <div><?php echo $nom." ".$pre; ?></div>
                        </div>
                    </div>
                    <!--end user image section-->
                </li>

                <li class="selected">
                    <a href="index.php?page=admin&crud=home"><i class="fa fa-dashboard fa-fw"></i> TABLEAU DE BORD</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> UTILISATEURS<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="index.php?page=admin&crud=user&action=create" class="glyphicon glyphicon-share-alt
                               "> AJOUTER</a>
                        </li>
                        <li>
                            <a href="index.php?page=admin&crud=user" class="glyphicon glyphicon-share-alt
                               "> LISTE</a>
                        </li>
                    </ul>
                    <!-- second-level-items -->
                </li>
                <li>
                    <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> PRODUITS<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="index.php?page=admin&crud=document&action=create" class="glyphicon glyphicon-share-alt
                               "> AJOUTER</a>
                        </li>
                        <li>
                            <a href="index.php?page=admin&crud=document" class="glyphicon glyphicon-share-alt
                               "> LISTE</a>
                        </li>
                    </ul>

                </li>

                <li>
                    <a href="#"><i class="fa fa-files-o fa-fw"></i> PAGES<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="index.php?page=admin&crud=pageweb&action=create" class="glyphicon glyphicon-share-alt
                               "> AJOUTER</a>
                        </li>
                        <li>
                            <a href="index.php?page=admin&crud=pageweb" class="glyphicon glyphicon-share-alt
                               "> LISTE</a>
                        </li>
                    </ul>
                    <!-- second-level-items -->
                </li>

                 <li>
                    <a href="#"><i class="fa fa-files-o fa-fw"></i> ARTICLES<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="index.php?page=admin&crud=article&action=create" class="glyphicon glyphicon-share-alt
                               "> AJOUTER</a>
                        </li>
                        <li>
                            <a href="index.php?page=admin&crud=article" class="glyphicon glyphicon-share-alt
                               "> LISTE</a>
                        </li>
                    </ul>
                    <!-- second-level-items -->
                </li>
                <li>
                    <a href="index.php?page=admin&crud=image"><i class="glyphicon glyphicon-picture"></i> IMAGE(S) DU SLIDER</a>
                </li>
                <li>
                    <a href="index.php?page=admin&crud=email"><i class="glyphicon glyphicon-envelope"></i> BOITE DE RECEPTION</a>
                </li>
 <li>
                    <a href="#"><i class="fa fa-files-o fa-fw"></i> CONTENU<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="index.php?page=admin&crud=categorie&action=create" class="glyphicon glyphicon-share-alt
                               "> AJOUTER</a>
                        </li>
                        <li>
                            <a href="index.php?page=admin&crud=categorie" class="glyphicon glyphicon-share-alt
                               "> LISTE</a>
                        </li>
                    </ul>
                    <!-- second-level-items -->
                </li>




              <!--  <li>
                    <a href="#"><i class="fa fa-files-o fa-fw"></i> EXTRANET<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="#"><i class="fa fa-lock fa-fw"></i> ACC&Egrave;S<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="index.php?page=admin&crud=extranet&action=create" class="glyphicon glyphicon-share-alt
                                       "> AJOUTER</a>
                                </li>
                                <li>
                                    <a href="index.php?page=admin&crud=extranet" class="glyphicon glyphicon-share-alt
                                       "> LISTE</a>
                                </li>
                            </ul>

                        </li>















                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> CONTENU<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="index.php?page=admin&crud=categorie&action=create" class="glyphicon glyphicon-share-alt
                                       "> AJOUTER</a>
                                </li>
                                <li>
                                    <a href="index.php?page=admin&crud=categorie" class="glyphicon glyphicon-share-alt
                                       "> LISTE</a>
                                </li>
                            </ul>

                        </li>
                    </ul>
                </li>
              <li>
                    <a href="index.php?page=admin&crud=optionsite"><i class="glyphicon glyphicon-wrench"></i> OPTIONS</a>
                </li>-->
                  <li>
                    <a href="#"><i class="fa fa-files-o fa-fw"></i> OPTIONS<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="index.php?page=admin&crud=optionsite" class="glyphicon glyphicon-share-alt
                               "> Français</a>
                        </li>
                        <li>
                            <a href="index.php?page=admin&crud=optionsite_en" class="glyphicon glyphicon-share-alt
                               "> Anglais</a>
                        </li>
                    </ul>
                    <!-- second-level-items -->
                </li>
                <li>
                    <a href="index.php?page=admin&crud=user&action=deconnexion"><i class="fa fa-sign-out fa-fw"></i> DÉCONNEXION</a>

                </li>
            </ul>
            <!-- end side-menu -->
        </div>
        <!-- end sidebar-collapse -->
    </nav>
