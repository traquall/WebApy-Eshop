<?php
use Noneslad\Tools\WebTools;
use Noneslad\Entity\pageweb;
use Noneslad\Entity\optionsite;
 $pageweb = new pageweb();
?>
<body class="home">
  <!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
  <![endif]-->
  <!--************************************
        Preloader Start
    *************************************-->
  <div id="status">
    <div id="preloader" class="gearbox">
      <div class="gear_1"></div>
      <div class="gear_2"></div>
      <div class="gear_3"></div>
      <div class="gear_4"></div>
      <div class="gear_5"></div>
      <div class="gear_6"></div>
      <div class="gear_7"></div>
      <div class="gear_8"></div>
      <div class="gear_9"></div>
      <div class="gear_10"></div>
    </div>
  </div>
  <!--************************************
        Preloader End
  *************************************-->
  <!--************************************
      Wrapper Start
  *************************************-->
  <div id="wrapper" class="tg-haslayout">
    <!--************************************
        Header Start
    *************************************-->
    <header id="header" class="tg-haslayout">
      <div class="container">
        <div class="row">
          <div class="col-xs-12">
            <strong class="logo">
              <a href="index.html"><img style="width: 160px;" src="../admin/<?php echo $optionsite->getLogo(); ?>" alt="image description"></a>
            </strong>
            <div class="tg-rightarea">
              <div class="tg-topbar tg-haslayout">
                <ul class="tg-addnav">
                  <li><a href="#" data-toggle="modal" data-target=".tg-signin-modal"><?php echo $SITE_VAR["nav"]["login"]; ?></a></li>
                  <li><a href="#" data-toggle="modal" data-target=".tg-signup-modal"><?php echo $SITE_VAR["nav"]["signup"]; ?></a></li>
                </ul>
                <div class="tg-languages">
                  <a id="tg-languages-button" href="#">
                  <?php if($_SESSION["langue"]==2){
                    echo"<img src='assets/images/lang-flags/flag-01.jpg' alt='image description'><span>EN</span>
                    <i class='fa fa-caret-down'></i>
                  </a>";
                        }else{
      echo"<img src='assets/images/lang-flags/flag-04.jpg' alt='image description'>  <span>FR</span>
                    <i class='fa fa-caret-down'></i>
                  </a>";
                  }
                     ?>
                  
                    
                  <ul>
                   <li>
                      <a href="index.php?page=site&site=accueil&langue=1">
                        <img src="assets/images/lang-flags/flag-04.jpg" alt="image description">
                        <span>fr</span>
                      </a>
                    </li>
                    <li>
                      <a href="index.php?page=site&site=accueil&langue=2">
                        <img src="assets/images/lang-flags/flag-01.jpg" alt="image description">
                        <span>en</span>
                      </a>
                    </li>
                  </ul>
                </div>
                <div class="tg-minicart">
                  <a id="tg-minicart-button" href="#">
                    <i class="fa fa-cart-plus"></i>
                    <span class="tg-badge">3</span>
                  </a>
                  <div class="tg-minicart-box">
                    <ul>
                      <li>
                        <figure class="tg-product-img">
                          <img src="assets/images/product-thumbs/thumb-01.jpg" alt="image description">
                        </figure>
                        <div class="tg-product-data">
                          <a href="#" class="tg-trash fa fa-trash-o"></a>
                          <div class="tg-product-info">
                            <h4>2 × Product title</h4>
                            <span class="tg-product-price">$ 16.37</span>
                            <em class="tg-stock">in stock</em>
                          </div>
                        </div>
                      </li>
                       
                    </ul>
                    <div class="tg-cart-total">
                      <a href="#" class="tg-emptycart pull-left">
                        <i class="tg-trash fa fa-trash-o"></i>
                        <em>Clear Your Cart</em>
                      </a>
                      <strong class="tg-total pull-right">Subtotal: $ 130.49</strong>
                    </div>
                  </div>
                </div>
              </div>
              <nav id="tg-nav" class="tg-nav">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#tg-navigation" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                </div>
<!-- -->
 
        <div class="collapse navbar-collapse" id="tg-navigation">
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
          <ul>
            <?php for($j=0;$j<count($menu[$i]["enfants"]);$j++) { ?>
              <li><a href="<?php echo $menu[$i]["enfants"][$j]["rewrite"]; ?>"> <?php echo $menu[$i]["enfants"][$j]["nom"]; ?> </a></li>
            <?php } ?>
          </ul>
        <?php } ?>
        </li>
  <?php if($menu[$i]["rewrite"]=="nos-produits"){  ?>
    <li><a href=""> E-commerce </a></li>
<!--           -->
 <?php if($menu[$i]["rewrite"]=="cate-gorie"){  ?>
    <li><a href=""> Catégorie</a>
  <?php } ?>
  <ul>
  <?php 

    if($_SESSION["langue"]==1){ 
      $langue="getfr";
   } else
      $langue="geten";
          
      $menur = \Noneslad\Controllers\categorieController::$langue();
    for($i=0;$i<count($menu);$i++) {

  ?>
  <li><a href=""><?php echo $menur[$i]["nom"]; ?></a></li>
  <?php }?>
  </ul>
   </li>
  <?php// if($menu[$i]["rewrite"]==""){  ?>
    <!--<li><a href=""> E-commerce </a></li>-->
  <?php// } ?>

<!--           -->


    </li>
  <?php } ?>
  <?php if($menu[$i]["rewrite"]==""){  ?>
    <li><a href=""> E-commerce </a></li>
  <?php } ?>
      <?php } ?>
   

<!-- 


               
                    <li class="active"><a href="index.html">Home</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="services.html">Services</a></li>
                    <li><a href="team.html">team</a></li>
                    <li>
                      <a href="blog-grid.html">Blog</a>
                      <ul>
                        <li><a href="blog-grid.html">blog grid</a></li>
                        <li><a href="blog-list.html">blog list</a></li>
                        <li><a href="blog-detail.html">blog detail</a></li>
                      </ul>
                    </li>
                    <li>
                      <a href="shop-grid.html">Shop</a>
                      <ul>
                        <li><a href="shop-grid.html">shop grid</a></li>
                        <li><a href="shop-detail.html">shop detail</a></li>
                      </ul>
                    </li>
                    <li><a href="contactus.html">Contact</a></li>
                    <li>
                      <a href="#">
                        <i class="fa fa-navicon"></i>
                        <span>pages</span>
                      </a>
                      <ul>
                        <li><a href="404.html">404</a></li>
                        <li><a href="comming-soon.html">comming soon</a></li>
                        <li><a href="portfolio-grid.html">portfolio Grid</a></li>
                        <li><a href="portfolio-masonry.html">portfolio masonry</a></li>
                      </ul> -->
                    </li>
                  </ul>
                </div>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </header>