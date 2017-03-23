<?php 
 
use Noneslad\Tools\WebTools;
use Noneslad\Entity\pageweb;
use Noneslad\Entity\optionsite;
use Noneslad\Entity\produits;
 $pageweb = new pageweb();

?>

 <main id="main" class="tg-main-section tg-haslayout tg-bgwhite">
      <div class="container">
        <div class="row">
          <div id="tg-towcolumns" class="tg-haslayout">
            <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 pull-right">
              <div class="row">
                <div id="tg-content" class="tg-content tg-shop-grid tg-overflowhidden">
                
                <?php                 
                  if($_SESSION["langue"]=="1"){ 
                    $langue="getfr";
                  } else{ 
                    $langue="geten";
                  }
                  foreach (\Noneslad\Controllers\produitsController::$langue() as $produit) {

                ?>

                  <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 tg-productwidth">
                    <div class="tg-product">
                      <!-- <span class="tg-saletag"><i>sale</i></span> -->
                      <figure>
                        <img src="assets/images/img-02.jpg" alt="image description">
                        <ul class="tg-product-icon">
                          <li><a href="#"><i class="fa fa-cart-plus"></i></a></li>
                          <li><a href="#"><i class="fa fa-eye"></i></a></li>
                        </ul>
                      </figure>
                      <div class="tg-product-info tg-haslayout">
                        <div class="tg-heading-border">
                          <h3><a href="#"><?php echo $produit['nom']; ?></a></h3>
                        </div>
                        <div class="tg-stars">
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star-half-empty"></i>
                        </div>
                        <span class="tg-product-price"><?php echo $produit['prix_ttc']; ?> €<!-- <del>$45.00</del> --></span>
                      </div>
                    </div>
                  </div>

                <?php
                  }
                ?>
                </div>
                <div class="col-xs-12">
                  <nav class="tg-pagination">
                    <ul>
                      <li class="tg-previous"><a href="#"><i class="fa fa-angle-left"></i></a></li>
                      <li><a href="#">1</a></li>
                      <li><a href="#">2</a></li>
                      <li><a href="#">3</a></li>
                      <li><a href="#">4</a></li>
                      <li><a href="#">5</a></li>
                      <li class="tg-next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
                    </ul>
                  </nav>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 pull-left">
              <aside id="tg-sidebar" class="tg-sidebar tg-sidebar-woocommerce tg-haslayout">
                <div class="tg-widget tg-woocommerce-widget tg-search">
                  <form class="form-search">
                    <fieldset>
                      <input type="search" class="form-control" placeholder="Search Here">
                      <button type="submit"><i class="fa fa-search"></i></button>
                    </fieldset>
                  </form>
                </div>
                <div class="tg-widget tg-woocommerce-widget tg-widget-accordions">
                  <h3>Accordions Widget</h3>
                  <ul class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <li class="panel panel-default active">
                      <div class="tg-panel-heading" role="tab" id="headingOne">
                        <h3 class="panel-title">
                          <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Web Design</a>
                        </h3>
                      </div>
                      <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                        <ul>
                          <li><a href="#">Graphic Design</a></li>
                          <li><a href="#">Marketing</a></li>
                          <li><a href="#">Photography</a></li>
                        </ul>
                      </div>
                    </li>
                    <li class="panel panel-default">
                      <div class="tg-panel-heading" role="tab" id="headingTwo">
                        <h3 class="panel-title">
                          <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Marketing</a>
                        </h3>
                      </div>
                      <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                        <ul>
                          <li><a href="#">Graphic Design</a></li>
                          <li><a href="#">Marketing</a></li>
                          <li><a href="#">Photography</a></li>
                        </ul>
                      </div>
                    </li>
                    <li class="panel panel-default">
                      <div class="tg-panel-heading" role="tab" id="headingThree">
                        <h3 class="panel-title">
                          <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Wordpress</a>
                        </h3>
                      </div>
                      <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                        <ul>
                          <li><a href="#">Graphic Design</a></li>
                          <li><a href="#">Marketing</a></li>
                          <li><a href="#">Photography</a></li>
                        </ul>
                      </div>
                    </li>
                    <li class="panel panel-default">
                      <div class="tg-panel-heading" role="tab" id="headingFour">
                        <h3 class="panel-title">
                          <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">eCommerce</a>
                        </h3>
                      </div>
                      <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                        <ul>
                          <li><a href="#">Graphic Design</a></li>
                          <li><a href="#">Marketing</a></li>
                          <li><a href="#">Photography</a></li>
                        </ul>
                      </div>
                    </li>
                    <li class="panel panel-default">
                      <div class="tg-panel-heading" role="tab" id="headingFive">
                        <h3 class="panel-title">
                          <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">Html</a>
                        </h3>
                      </div>
                      <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                        <ul>
                          <li><a href="#">Graphic Design</a></li>
                          <li><a href="#">Marketing</a></li>
                          <li><a href="#">Photography</a></li>
                        </ul>
                      </div>
                    </li>
                  </ul>
                </div>
                <div class="tg-widget tg-woocommerce-widget tg-widget-categories">
                  <h3>Sort by Braands</h3>
                  <ul>
                    <li><a href="#"><em>Web Design</em><i>389</i></a></li>
                    <li><a href="#"><em>Marketing</em><i>256</i></a></li>
                    <li><a href="#"><em>Wordpress</em><i>56</i></a></li>
                    <li><a href="#"><em>Graphic Design</em><i>43</i></a></li>
                    <li><a href="#"><em>Photography</em><i>38</i></a></li>
                  </ul>
                </div>
                <div class="tg-widget tg-woocommerce-widget tg-widget-filterbyprice">
                  <h3>Filter by Price</h3>
                  <div class="tg-filter">
                    <div id="tg-range-slider"></div>
                    <p>
                      <label for="amount">Price: </label>
                      <input type="text" id="amount" readonly>
                    </p>
                    <div class="tg-btn-filter">
                      <a class="tg-btn" href="#">reset</a>
                      <a class="tg-btn" href="#">Filter</a>
                    </div>
                  </div>
                </div>
                <div class="tg-widget tg-woocommerce-widget tg-widget-popular">
                  <h3>Most popular</h3>
                  <ul>
                    <li>
                      <figure>
                        <a href="#"><img src="assets/images/product-thumbs/thumb-04.jpg" alt="image description"></a>
                      </figure>
                      <div class="tg-product-detail">
                        <h4><a href="#">Product Title</a></h4>
                        <span class="tg-product-price">$37.00</span>
                        <div class="tg-stars">
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star-half-empty"></i>
                        </div>
                      </div>
                    </li>
                    <li>
                      <figure>
                        <a href="#"><img src="assets/images/product-thumbs/thumb-05.jpg" alt="image description"></a>
                      </figure>
                      <div class="tg-product-detail">
                        <h4><a href="#">Product Title</a></h4>
                        <span class="tg-product-price">$37.00</span>
                        <div class="tg-stars">
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star-half-empty"></i>
                        </div>
                      </div>
                    </li>
                    <li>
                      <figure>
                        <a href="#"><img src="assets/images/product-thumbs/thumb-06.jpg" alt="image description"></a>
                      </figure>
                      <div class="tg-product-detail">
                        <h4><a href="#">Product Title</a></h4>
                        <span class="tg-product-price">$37.00</span>
                        <div class="tg-stars">
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star-half-empty"></i>
                        </div>
                      </div>
                    </li>
                    <li>
                      <figure>
                        <a href="#"><img src="assets/images/product-thumbs/thumb-07.jpg" alt="image description"></a>
                      </figure>
                      <div class="tg-product-detail">
                        <h4><a href="#">Product Title</a></h4>
                        <span class="tg-product-price">$37.00</span>
                        <div class="tg-stars">
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star-half-empty"></i>
                        </div>
                      </div>
                    </li>
                    <li>
                      <figure>
                        <a href="#"><img src="assets/images/product-thumbs/thumb-08.jpg" alt="image description"></a>
                      </figure>
                      <div class="tg-product-detail">
                        <h4><a href="#">Product Title</a></h4>
                        <span class="tg-product-price">$37.00</span>
                        <div class="tg-stars">
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star-half-empty"></i>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </aside>
            </div>
          </div>
        </div>
      </div>
    </main>
