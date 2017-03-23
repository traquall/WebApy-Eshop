<?php 

  use Noneslad\Tools\WebTools;
  //use Noneslad\Tools\HTML\html;
  use Noneslad\Entity\categorie;
  //use Noneslad\Controllers\categorieController;
  $categorie = new categorie();

  $tableCat = Array(
    1 => Array("Fiches d&eacute;gustations Fiches techniques","Images","Mat&eacute;riel Publicitaire","Plaquettes et argumentaires"),
    2 => Array("Tasting notes","Pictures","Trade Loaders","Leaflets")
  );
?> 
 
<div class="container">
  <div class="row">
    <div class="grid1column">
      <h3>
        <?php   
          $categorie = \Noneslad\Controllers\categorieController::findAll();
          echo '<script>console.log("Your stuff here")</script>';
          echo $categorie['Nom']; 
        ?>
      </h3>
    </div>
    <?php 
      $content = $categorie->getContenu();
      $col = 4;
      $niveau = $categorie->getNiveau();
      $id_nav = $_GET['id'];
      if($niveau==4 || $niveau==2){
        // On récupère l'Id Parent
        $id_nav = $categorie->getId_parent();
      }
      if($niveau>1)
        $ssmenuNb = \Noneslad\Controllers\categorieController::sousmenuNb($id_nav);
      else 
        $ssmenuNb = 0;
      $ssmenuNb = $ssmenuNb[0]["nb"];
      if($ssmenuNb>0 && $_GET['id']!=21 && $_GET['id']!=31) { 
    ?>
        <div class="grid4column">
          <?php 
            $j = 0;
            foreach (\Noneslad\Controllers\categorieController::sousmenu($id_nav) as $categorie4) { 
              if($j==0){ 
          ?>
            <ul>
            <?php } ?>
              <li class="cat">
                <a href="index.php?page=admin&crud=categorie&action=read&id=<?php echo $categorie4['id']; ?>" <?php if($categorie4['id']==$_GET["id"]){ echo 'class="active"'; } ?>>
                <?php echo $categorie4['nom']; ?></a>
              </li>
            <?php $j++; } if($j>0){ ?>
            </ul>
          <?php $col -= 1;} ?> 
        </div>
        <?php } if($content!="" && $col==4){ ?>
        <div class="grid5column">
        <?php } elseif($content!=""){ ?>
          <div class="grid2column">
          <?php } echo $content; ?>
          </div>
          <?php if($content!=""){ ?>
          <div class="grid4column">
          <?php 
            } 
            $i=0;
            $cat = "";
            foreach (\Noneslad\Controllers\categorieController::doc_c() as $document) { 
              if($i==0){ 
          ?>
          <h4>
            <?php if($_SESSION["langue"]==1){ ?>T&eacute;l&eacute;chargements<?php } else {?>Downloads<?php } ?>
          </h4>
          <?php } 
            // On vérifie s'il y a des groupes
            if($document['cat']>0){
              if($cat!=$document['cat']){
                echo "<h5>".$tableCat[$_SESSION["langue"]][intval($document['cat']-1)]."</h5>";
                $cat=$document['cat'];
              }
            }
          ?>
          <p>
            <img width="30px" src="assets/img/<?php echo \Noneslad\Controllers\categorieController::ext($document["ext"]); ?>"/> 
            <a target="_blank" href="assets/content/upload/<?php echo $document['url']; ?>">
              <?php echo $document['nom']; ?>
            </a>
          </p>
          <?php $i++; } ?>
          <?php 
            if($_SESSION["langue"]==1){ 
              $langue="getfr";
            } else{
              $langue="geten";
            }
          ?>              
    <!--/**//**//**//**/*/*/*/*///**/*/*/*/-->
      </div>
    </div>
  </div>
</div>
  