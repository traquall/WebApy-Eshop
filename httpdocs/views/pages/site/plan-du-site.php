<?php 
 
use Noneslad\Tools\WebTools;
use Noneslad\Entity\pageweb;
use Noneslad\Entity\optionsite;
 $pageweb = new pageweb();
 





?>

        <ul>
         <?php 
$_var_script = explode("/",$_SERVER["REQUEST_URI"]);
$_script_nb = count($_var_script)-1;
$_var_sc = $_var_script[$_script_nb];
 
    $menu = \Noneslad\Controllers\pagewebController::menu();
    for($i=0;$i<count($menu);$i++) {
    ?>
      <li class="<?php if($menu[$i]["rewrite"]== $_var_sc) echo "current-menu-item"; ?>"><a href="<?php echo $menu[$i]["rewrite"]; ?>"> <?php echo $menu[$i]["nom"]; ?> </a>
        <?php if(count($menu[$i]["enfants"])>0){ ?>
          <ul>
            <?php for($j=0;$j<count($menu[$i]["enfants"]);$j++) { ?>
              <li><a href="<?php echo $menu[$i]["enfants"][$j]["rewrite"]; ?>"> <?php echo $menu[$i]["enfants"][$j]["nom"]; ?> </a></li>
            <?php } ?>
          </ul>
        <?php } ?>
        </li>
	<?php if($menu[$i]["rewrite"]=="nos-vins"){  ?>
		<li><a href="http://boutiquepatriarche.melis.fr/" target="_blank"> Acheter nos vins </a></li>
	<?php } ?>
  <?php if($menu[$i]["rewrite"]=="our-wines"){  ?>
    <li><a href="http://boutiquepatriarche.melis.fr/" target="_blank"> Buy our wines </a></li>
  <?php } ?>
      <?php } ?>
    </ul>
