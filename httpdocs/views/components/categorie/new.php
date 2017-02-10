<form action="?page=admin&crud=categorie&action=create"  onsubmit="return validateForm()" name="formPage" method="post">

    <div class="form-group">
        <label for="sel1">Langue</label>
      <select name="id_lang" class="form-control"  onchange="document.location.href='index.php?page=admin&crud=categorie&action=create&langue='+this.value">
        <option value="1" <?php if($_SESSION["langue"]==1) echo "selected"; ?>>Français</option>
        <option value="2" <?php if($_SESSION["langue"]==2) echo "selected"; ?>>English</option>
      </select>

    </div>
    <div class="form-group">
        <label for="sel2">Catégorie mère</label>
  
       <select class="form-control" id="sel2" name="id_parent">
        <option value="1">Pas de catégorie mère</option>

 <?php 
    if($_SESSION["langue"]==1){ 
      $langue="getfr";
   } else
      $langue="geten";
           
      $menu = \Noneslad\Controllers\categorieController::$langue();
    for($i=0;$i<count($menu);$i++) { ?>
   <option value="<?php echo$menu[$i]["nom"];?>"><?php echo $menu[$i]["nom"]; ?></option>
    
         <?php for($j=0;$j<count($menu[$i]["enfants"]);$j++) { ?>
             <option value="<?php echo $menu[$i]["enfants"][$j]["id"]; ?>"><?php echo $menu[$i]["enfants"][$j]["nom"];  ?></option>
                <?php for($k=0;$k<count($menu[$i]["enfants"][$j]["enfants"]);$k++) { ?>
                 <option value="<?php echo $menu[$i]["enfants"][$j]["enfants"][$k]["id"];?>">&nbsp;*<?php echo $menu[$i]["enfants"][$j]["enfants"][$k]["nom"]; ?></option>
                    <?php for($l=0;$l<count($menu[$i]["enfants"][$j]["enfants"][$k]["enfants"]);$l++) { ?>
                       <option value="<?php echo $menu[$i]["enfants"][$j]["enfants"][$k]["enfants"][$l]["id"]; ?>">&nbsp;&nbsp;&nbsp;+<?php echo $menu[$i]["enfants"][$j]["enfants"][$k]["enfants"][$l]["nom"]; ?></option>

                    <?php } ?>
                <?php } ?>
            <?php } ?>
          
          
        <?php } ?>
       
       </select>
    </div>
    
    <div class="form-group">
        <label for="nom">Nom</label>
        <input type="text" class="form-control" placeholder="nom" name="nom">
    </div>

    <div class="form-group">
        <label for="title">Contenu</label>
        <textarea name="contenu" id="editor1" rows="10" value=""></textarea>
              <script>
CKEDITOR.replace('editor1',{
     filebrowserBrowseUrl:     'assets/plugins/back/ckfinder/ckfinder.html',
    filebrowserImageBrowseUrl: 'assets/plugins/back/ckfinder/ckfinder.html?type=Images',
    filebrowserFlashBrowseUrl: 'assets/plugins/back/ckfinder/ckfinder.html?type=Flash',
    filebrowserUploadUrl:      'assets/plugins/back/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserImageUploadUrl: 'assets/plugins/back/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserFlashUploadUrl: 'assets/plugins/back/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
});
</script>
    </div>
    
    <button type="submit"  class="btn btn-default"><i class="fa fa-save"></i> Enregistrer</button>
</form>
<div class="well">
    <a class="btn btn-primary" href="?page=admin&crud=categorie&action=list"><i class="fa fa-list"></i> </a>
</div>
<script type="text/javascript">
   function validateForm() {
    var N = document.forms["formPage"]["nom"].value;
   
    if (N == null || N == "") {
        alert("Veuillez saisir un nom ");
        return false;
    }
    
}


</script>



