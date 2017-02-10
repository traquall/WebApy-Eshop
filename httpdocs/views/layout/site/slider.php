<?php 
namespace Noneslad\views\layout;
use Noneslad\Entity\image;
use Noneslad\Entity\optionsite;

$optionsite = new optionsite(1);
$image = new image();
$tab = $image->imgList();
?><!--************************************
        Home Slider Start
    *************************************-->
   <div id="tg-home-slider" class="tg-home-slider tg-haslayout">
     
                 <?php for($i=0;$i<count($tab);$i++){
                  $id = $tab[$i]["id"];
                   $img= new image($id); ?>

     
       <div class="item">
        <div class="container">
          <div class="row">
            <div class="col-lg-10 col-lg-offset-1 col-xs-12">
              <div class="row">
                <div class="col-sm-5 col-xs-5 tg-verticalmiddle">
                  <img class="floating" src="../admin/<?php  echo $img->getUrl(); ?>" alt="<?php echo $img->getAlt();   ?>">
                 
                </div>
       <div class="col-sm-7 col-xs-7 tg-verticalmiddle tg-sliderwidth">
                  <div class="tg-heading-border">
                    <h1><?php echo $img->getNom(); ?></h1>
                  </div>
                  <div class="tg-description">
                    <p><?php echo $img->getAlt();   ?></p>
                  </div>
                   <a class="tg-btn active" href="#">Voir plus</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
                  <?php }; ?>
                 

     <!-- <div class="item">
        <div class="container">
          <div class="row">
            <div class="col-lg-10 col-lg-offset-1 col-xs-12">
              <div class="row">
                <div class="col-sm-5 col-xs-5 tg-verticalmiddle">
                  <img class="floating" src="images/slider/img-02.png" alt="image description">
                </div>
                <div class="col-sm-7 col-xs-7 tg-verticalmiddle tg-sliderwidth">
                  <div class="tg-heading-border">
                    <h1>auto repairing services</h1>
                  </div>
                  <div class="tg-description">
                    <p>Lorem ipsum dolor sit amet, consectetur adiong elit, sed do eiusmod amit sitam suban tempornt ut laboret.</p>
                  </div>
                  <a class="tg-btn active" href="#">Quick Quote</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="item">
        <div class="container">
          <div class="row">
            <div class="col-lg-10 col-lg-offset-1 col-xs-12">
              <div class="row">
                <div class="col-sm-5 col-xs-5 tg-verticalmiddle">
                  <img class="floating" src="images/slider/img-03.png" alt="image description">
                </div>
                <div class="col-sm-7 col-xs-7 tg-verticalmiddle tg-sliderwidth">
                  <div class="tg-heading-border">
                    <h1>auto repairing services</h1>
                  </div>
                  <div class="tg-description">
                    <p>Lorem ipsum dolor sit amet, consectetur adiong elit, sed do eiusmod amit sitam suban tempornt ut laboret.</p>
                  </div>
                  <a class="tg-btn active" href="#">Quick Quote</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>-->
    </div>
    <!--************************************
        Home Slider End
    *************************************-->