<?php
use Noneslad\Tools\WebTools;
use Noneslad\Entity\pageweb;
use Noneslad\Entity\optionsite;
 $pageweb = new pageweb();
?>
<footer id="footer" class="footer tg-haslayout">
            <div class="tg-three-columns haslayout">
                <div class="container">
                    <div class="row">
                        <div class="tg-cols tg-haslayout">
                            <a class="tg-back-to-top" href="#"><i class="fa fa-angle-up"></i></a>
                            <div class="col-sm-4 col-xs-12">
                                <div class="tg-col">
                                    <strong class="logo">
                                        <a href="index.html">
                                            <img style="width: 160px;" src="../admin/<?php echo $optionsite->getLogo(); ?>" alt="image description">
                                        </a>
                                    </strong>
                                    <div class="tg-description">
                                        <p><?php if($_SESSION["langue"]==1){
                    echo $optionsite->getText();
                    }/*else{
                         echo $optionsite_en->getText(); 
                        }*/ ?></p>
                                    </div>
                                    <ul class="tg-socialicon tg-haslayout">
                                        <li><a href="<?php echo $optionsite->getLienf(); ?>"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="<?php echo $optionsite->getLient(); ?>"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href=" "><i class="fa fa-pinterest-p"></i></a></li>
                                        <!--<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                        <li><a href="#"><i class="fa fa-tumblr"></i></a></li>-->
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                <div class="tg-col">
                                        <h3><?php echo $SITE_VAR["form"]["Ln"]; ?></h3>
                                    <div class="tg-latest-post tg-haslayout">
                                        <ul>
                                            <li>
                                                <span class="tg-date">04<i>Feb</i></span>
                                                <div class="tg-post-contentbox">
                                                    <p><?php echo $optionsite->getActu(); ?></p>
                                                </div>
                                            </li>
                                            <li>
                                                <span class="tg-date">04<i>Feb</i></span>
                                                <div class="tg-post-contentbox">
                                                    <p><?php echo $optionsite->getHeurevisite(); ?></p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                <div class="tg-col">
                                        <h3>Information</h3>
                                    <div class="contact-info">
                                        <ul>
                                            <li>
                                                <span><?php echo $SITE_VAR["footer"]["v"]; ?>:</span>
                                                <span>6 Place Charles HERNU, Le Colysée - 69100 VILLEURBANNE</span>
                                            </li>
                                            <li>
                                                <span>TEL:</span>
                                                <span>
                                                    <i><?php echo $optionsite->getTel(); ?></i>
                                                     
                                                </span>
                                            </li>
                                            <li>
                                                <span>Email:</span>
                                                <span>
                                                    <i><a href="support@spectrasonic.com">support@spectrasonic.com</a></i>
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tg-bottom-bar haslayout">
                <div class="container">
                    <nav class="addnav">
                     <ul>
                     <?php 
$_var_script = explode("/",$_SERVER["REQUEST_URI"]);
$_script_nb = count($_var_script)-1;
$_var_sc = $_var_script[$_script_nb];
 
    $menu = \Noneslad\Controllers\pagewebController::menu();
    for($i=0;$i<count($menu);$i++) {
    ?>
      <li class="<?php if($menu[$i]["rewrite"]== $_var_sc) echo "active"; ?>"><a href="<?php echo $menu[$i]["rewrite"]; ?>"> <?php echo $menu[$i]["nom"]; ?> </a>
        <?php if(count($menu[$i]["enfants"])>0){ ?>
         
            <?php for($j=0;$j<count($menu[$i]["enfants"]);$j++) { ?>
              <li><a href="<?php echo $menu[$i]["enfants"][$j]["rewrite"]; ?>"> <?php echo $menu[$i]["enfants"][$j]["nom"]; ?> </a></li>
            <?php } ?>
         
        <?php } ?>
        </li>
  <?php if($menu[$i]["rewrite"]=="nos-produits"){  ?>
    <li><a href="http://boutiquepatriarche.melis.fr/fr/"> Nouvelle technologie</a></li>
  <?php } ?>
  <?php if($menu[$i]["rewrite"]==""){  ?>
    <li><a href="http://boutiquepatriarche.melis.fr/gb/"> New technology </a></li>
  <?php } ?>
      <?php } ?>
                       
                           
                        </ul>
                    </nav>
                    <span class="copyright pull-left">© 2017 | WEB_APPY</span>
                </div>
            </div>
        </footer>
        <!--************************************
                Footer End
        *************************************-->
    </div>
    <!--************************************
            Wrapper End
    *************************************-->
    <!--************************************
        Sign Up Modal Box Start
    *************************************-->
    <div class="modal fade tg-signup-modal" tabindex="-1" role="dialog">
        <div class="tg-modal-content">
            <div class="head">
                <h3><?php echo $SITE_VAR["footer"]["sf"]; ?></h3>
                <a  class="glyphicon glyphicon-remove-circle close" data-dismiss="modal" aria-label="Close"></a>
            </div>
            <form class="tg-form-modal tg-form-signup">
                <fieldset>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="<?php echo $SITE_VAR["footer"]["username"]; ?>">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="<?php echo $SITE_VAR["footer"]["pass"]; ?>">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="<?php echo $SITE_VAR["footer"]["confpass"]; ?>">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="<?php echo $SITE_VAR["footer"]["mail"]; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="<?php echo $SITE_VAR["footer"]["firstname"]; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="<?php echo $SITE_VAR["footer"]["lastname"]; ?>">
                    </div>
                    <div class="form-group tg-checkbox">
                        <label>
                            <input type="checkbox" class="form-control">
                            <?php echo $SITE_VAR["footer"]["agree"]; ?>
                        </label>
                    </div>
                    <button class="tg-btn tg-btn-lg"><?php echo $SITE_VAR["footer"]["ca"]; ?></button>
                </fieldset>
            </form>
        </div>
    </div>
    <!--************************************
        Sign Up Modal Box End
    *************************************-->
    <!--************************************
        Sign In Modal Box Start
    *************************************-->
    <div class="modal fade tg-signin-modal" tabindex="-1" role="dialog">
        <div class="tg-modal-content">
            <div class="head">
                <h3><?php echo $SITE_VAR["footer"]["Lf"];?></h3>
                <a  class="glyphicon glyphicon-remove-circle close" data-dismiss="modal" aria-label="Close"></a>
            </div>
            <form class="tg-form-modal tg-form-signin">
                <fieldset>
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="<?php echo $SITE_VAR["footer"]["mail"]; ?>">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="<?php echo $SITE_VAR["footer"]["pass"]; ?>">
                    </div>
                    <div class="form-group tg-checkbox">
                        <label>
                            <input type="checkbox" class="form-control">
                            <?php echo $SITE_VAR["footer"]["rm"]; ?>
                        </label>
                        <a class="tg-forgot-password" href="#">
                            <i><?php echo $SITE_VAR["footer"]["fp"]; ?></i>
                            <i class="fa fa-question-circle"></i>
                        </a>
                    </div>
                    <button class="tg-btn tg-btn-lg"><?php echo $SITE_VAR["footer"]["l"]; ?></button>
                </fieldset>
            </form>
            <div class="tg-foot">
                <p><?php echo $SITE_VAR["footer"]["nm"];?> <a href="#"><?php echo $SITE_VAR["footer"]["ca"]; ?></a></p>
            </div>
        </div>
    </div>
    <!--************************************
        Sign In Modal Box End
    *************************************-->
    <script src="assets/scripts/vendor/jquery-library.js"></script>
    <script src="assets/scripts/vendor/bootstrap.min.js"></script>
    <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script src="assets/scripts/gmap3.min.js"></script>
    <script src="assets/scripts/countdown.js"></script>
    <script src="assets/scripts/owl.carousel.js"></script>
    <script src="assets/scripts/jquery-ui.js"></script>
    <script src="assets/scripts/isotope.pkgd.js"></script>
    <script src="assets/scripts/packery-mode.js"></script>
    <script src="assets/scripts/prettyPhoto.js"></script>
    <script src="assets/scripts/parallax.js"></script>
    <script src="assets/scripts/appear.js"></script>
    <script src="assets/scripts/countTo.js"></script>
    <script src="assets/scripts/main.js"></script>
</body>
</html>