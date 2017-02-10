<br>
 
    <div class="well">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#theory" data-toggle="tab">Informations</a></li>
          <li><a href="#aim" data-toggle="tab">Référencement - SEO

</a></li>
          <li><a href="#precedure" data-toggle="tab">Prix</a></li>
          <li><a href="#simulation" data-toggle="tab">Livraison</a></li>
          <li><a href="#assignment" data-toggle="tab">Caractéristiques</a></li>
          <li><a href="#references" data-toggle="tab">Documents joints</a></li>
          <li><a href="#feedback" data-toggle="tab">Quantités</a></li>
          <li><a href="#people" data-toggle="tab">People</a></li>
        </ul>
        <div id="myTabContent" class="tab-content">
          <div class="tab-pane active in" id="theory">
           <form action="?page=admin&crud=document&action=create" enctype="multipart/form-data" onsubmit="return validateForm()"  method="post">
<div class="form-group">
        <label for="sel1">Langue</label>
       <select class="form-control" id="sel1" name="id_lang" onchange="document.location.href='index.php?page=admin&crud=document&action=create&langue='+this.value">
   
        <option value="1" <?php if($_SESSION["langue"]==1) echo "selected"; ?>>Français</option>
        <option value="2" <?php if($_SESSION["langue"]==2) echo "selected"; ?>>English</option>
      </select>
       </select>

    </div>
    <div class="form-group">
      <label for="sel1">Catégorie</label>
      <select multiple class="form-control" name="id_cat[]" style="height:145px">
        <?php   
        if($_SESSION["langue"]==1)
          $langue="getfr";
        else
          $langue="geten";
        
        $menu = \Noneslad\Controllers\categorieController::$langue();
        for($i=0;$i<count($menu);$i++) {
          $ids=$menu[$i]["id"];
          $select="";

          $idget=$_GET['id'];
          if($idget==$ids){
            $select="selected";
          } ?>
          <option value="<?php echo $menu[$i]["id"]; ?>" <?php echo $select; ?>><?php echo $menu[$i]["nom"]; ?></option>
          <?php 
          for($j=0;$j<count($menu[$i]["enfants"]);$j++) { 
            $selec="";
            $idcats= $menu[$i]["enfants"][$j]["id"];
            if( $_GET['id']==$idcats){
              $selec="selected";
            } ?>
            <option value="<?php echo $menu[$i]["enfants"][$j]["id"]; ?>"<?php echo  $selec; ?>>- <?php echo $menu[$i]["enfants"][$j]["nom"]; ?></option>
            <?php 
            for($k=0;$k<count($menu[$i]["enfants"][$j]["enfants"]);$k++) { $idcat= $menu[$i]["enfants"][$j]["enfants"][$k]["id"]; 
              $selects="";
              if( $_GET['id']==$idcat){
                $selects="selected";
              } ?>
              <option value="<?php  echo $menu[$i]["enfants"][$j]["enfants"][$k]["id"];  ?>" <?php echo  $selects; ?>>&nbsp;&nbsp;&nbsp;* <?php  echo $menu[$i]["enfants"][$j]["enfants"][$k]["nom"]; ?></option>
              <?php 
              for($l=0;$l<count($menu[$i]["enfants"][$j]["enfants"][$k]["enfants"]);$l++) { $idscat= $menu[$i]["enfants"][$j]["enfants"][$k]["enfants"][$l]["id"]; 
                $selectss="";
                if( $_GET['id']==$idscat){
                  $selects="selected";
                } ?>
                <option value="<?php  echo $menu[$i]["enfants"][$j]["enfants"][$k]["enfants"][$l]["id"];  ?>" <?php echo  $selects; ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;> <?php  echo $menu[$i]["enfants"][$j]["enfants"][$k]["enfants"][$l]["nom"]; ?></option>
              <?php } ?>
            <?php } ?>
          <?php } ?>  
        <?php } ?>
      </select>
    </div>
    
    <div class="form-group">
        <label for="type">Type de document</label>
        <select class="form-control" name="cat">
          <option value="0">Aucun</option>
          <option value="1">Fiches d&eacute;gustations Fiches techniques</option>
          <option value="2">Images</option>
          <option value="3">Mat&eacute;riel Publicitaire</option>
          <option value="4">Plaquettes et argumentaires</option>          
        </select>
    </div>

    <div class="form-group">
        <label for="nom">Nom</label>
        <input type="text" class="form-control" id="nom" placeholder="utilisé dans l'url ..." name="nom">
    </div>
     
   
  
     <div class="form-group">
            <label for="Document">Document</label>
            <input type="file" class="form-control" name="fichier">
        </div>
          </div>
          <div class="tab-pane fade" id="aim">
          Aim
          </div>
          <div class="tab-pane fade" id="precedure">
            Procedure & Demo
          </div>
          <div class="tab-pane fade" id="simulation">
            Simulation
          </div>
          <div class="tab-pane fade" id="assignment">
            Assignments
          </div>
          <div class="tab-pane fade" id="references">
           References
          </div>
          <div class="tab-pane fade" id="feedback">
            Feedback
          </div>
          <div class="tab-pane fade" id="people">
           People
          </div>
        </div>
    </div>
</div>
    

    
    <button type="submit"  class="btn btn-default"><i class="fa fa-save"></i> Enregistrer</button>
</form>
<div class="well">
    <a class="btn btn-primary" href="?page=admin&crud=categorie"><i class="fa fa-list"></i> </a>
    <a class="btn btn-success" href="?page=admin&crud=document&action=list&id=<?php echo $_GET["id_cat"] ?>"><i class="glyphicon glyphicon-folder-open
"></i> </a>
 
 


