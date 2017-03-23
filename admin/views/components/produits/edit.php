<?php 
namespace Noneslad\Controllers;
?>
<h1>Modification du produits <?php echo $produits->getNom(); ?> !</h1>
<form action="?page=admin&crud=produits&action=update&id=<?php echo $produits->getId(); ?>"  onsubmit="return validateForm()" enctype="multipart/form-data" name="formPage" method="post">
<div class="form-group" style="display:none">
        <label for="sel1">Langue</label>
       <select class="form-control" id="sel1" name="id_lang">
        <option value="1">Français</option>
         <option value="2"<?php if ($formData['id_lang']==2)echo "selected"; ?> >Anglais</option>     
       </select>
    </div>
    <div class="form-group">
        <label for="nom">Nom</label>
        <input type="text"
               class="form-control"
               id="nom"
               placeholder="utilisé dans l'url ..."
               name="nom"
               value="<?php echo $formData['nom'];?>">
    </div>
    <div class="form-group">
      <label for="sel1">Catégorie</label>
      <select multiple class="form-control" name="id_cat[]" style="height:145px">
        <?php // On récupère les catégories sélectionnées
        $idDoc = $produits->getId();
        $catSel = \Noneslad\Controllers\produitsController::getCatDoc($idDoc);  
        if($_SESSION["langue"]==1)
          $langue="getfr";
        else
          $langue="geten";
        
        $menu = \Noneslad\Controllers\categorieController::$langue();
        for($i=0;$i<count($menu);$i++) {
          $ids=$menu[$i]["id"];
          $select="";
          if(\Noneslad\Controllers\produitsController::rec_in_array($ids,$catSel)){
            $select="selected";
          } ?>
          <option value="<?php echo $menu[$i]["id"]; ?>" <?php echo $select; ?>><?php echo $menu[$i]["nom"]; ?></option>
          <?php 
          for($j=0;$j<count($menu[$i]["enfants"]);$j++) { 
            $selec="";
            $idcats= $menu[$i]["enfants"][$j]["id"];
            if(\Noneslad\Controllers\produitsController::rec_in_array($idcats,$catSel)){
              $selec="selected";
            } ?>
            <option value="<?php echo $menu[$i]["enfants"][$j]["id"]; ?>"<?php echo  $selec; ?>>- <?php echo $menu[$i]["enfants"][$j]["nom"]; ?></option>
            <?php 
            for($k=0;$k<count($menu[$i]["enfants"][$j]["enfants"]);$k++) { $idcat= $menu[$i]["enfants"][$j]["enfants"][$k]["id"]; 
              $selects="";
              $idcats2= $menu[$i]["enfants"][$j]["enfants"][$k]["id"];
              if(\Noneslad\Controllers\produitsController::rec_in_array($idcats2,$catSel)){
                $selects="selected";
              } ?>
              <option value="<?php  echo $menu[$i]["enfants"][$j]["enfants"][$k]["id"];  ?>" <?php echo  $selects; ?>>&nbsp;&nbsp;&nbsp;* <?php  echo $menu[$i]["enfants"][$j]["enfants"][$k]["nom"]; ?></option>
              <?php 
              for($l=0;$l<count($menu[$i]["enfants"][$j]["enfants"][$k]["enfants"]);$l++) { 
                $idscat= $menu[$i]["enfants"][$j]["enfants"][$k]["enfants"][$l]["id"]; 
                $selectss="";
                if(\Noneslad\Controllers\produitsController::rec_in_array($idscat,$catSel)){
                  $selectss="selected";
                } ?>
                <option value="<?php  echo $menu[$i]["enfants"][$j]["enfants"][$k]["enfants"][$l]["id"];  ?>" <?php echo  $selectss; ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;> <?php  echo $menu[$i]["enfants"][$j]["enfants"][$k]["enfants"][$l]["nom"]; ?></option>
              <?php } ?>
            <?php } ?>
          <?php } ?>  
        <?php } ?>
      </select>
    </div>
    <div class="form-group">
        <label for="type">Type de produits</label>
        <select class="form-control" name="cat">
          <option value="0">Aucun</option>
          <option value="1"<?php if ($formData['cat']==1)echo "selected"; ?>>Fiches d&eacute;gustations Fiches techniques</option>
          <option value="2"<?php if ($formData['cat']==2)echo "selected"; ?>>Images</option>
          <option value="3"<?php if ($formData['cat']==3)echo "selected"; ?>>Mat&eacute;riel Publicitaire</option>
          <option value="4"<?php if ($formData['cat']==4)echo "selected"; ?>>Plaquettes et argumentaires</option>          
        </select>
    </div>
   
     <div class="form-group">
            <label for="image">produits</label>
            <input type="file"  class="form-control" name="fichier">
        </div>
   


<div class="well">
    <button type="submit" onClick="ConfirmMessage()" class="btn btn-success"><i class="fa fa-save"></i></button>
    <a class="btn btn-primary" href="?page=admin&crud=categorie"><i class="fa fa-list"></i> </a>
    <a class="btn btn-success" href="?page=admin&crud=produits&action=list&id=<?php echo $_GET["id_cat"] ?>"><i class="glyphicon glyphicon-folder-open
"></i> </a>
    <a class="btn btn-danger" onclick="if(!confirm('Voulez-vous vraiment supprimer la page : <?php echo $formData['nom'] ?> ?')){ return false; }" href="?page=admin&crud=document&action=delete&id=<?php echo $produits->getId(); ?>"><i class="glyphicon glyphicon-trash
"></i> </a>
</div>
</form>
<SCRIPT language=javascript>
function validateForm() {
    var N = document.forms["formPage"]["id_cat[]"].value;
   
    if (N == null || N == "") {
        alert("Veuillez choisir une catégorie ");
        return false;
    }
    
}
</SCRIPT>