<?php

use Noneslad\Entity\pageweb;
use Noneslad\Entity\optionsite;
use Noneslad\Entity\optionsite_en;
$optionsite_en = new optionsite_en(1);
$optionsite = new optionsite(1);
$pageweb = new pageweb();
$actu = $optionsite->getActu();
$actue=$optionsite_en->getActu();

if($actu!="1" && $actue!="1"){

echo '<div class="actu">' ?>
<?php if($_SESSION["langue"]==1){
 echo $actu;
}else{
echo $actue; 
} ?>
 
<?php echo"</div>"; ?>
<?php } ?>

 <style type="text/css">
.actu{
    max-width: 30%;
    background-color: #fff;
    opacity: 0.8;
    border-left: 5px solid #ca9c33;
    position: absolute;
    z-index: 100;
    top: 190px;
    right: 15%;
    padding:5px;
}


 </style>