<form action="?page=admin&crud=pageweb&action=create" enctype="multipart/form-data" onsubmit="return validateForm()" name="formPage" method="post">
<div class="form-group">
        <label for="sel1">Page mère</label>
       <select class="form-control" id="sel1" name="id_parent" >
        <option value="1">Pas de page mère</option>
        <?php foreach (\Noneslad\Controllers\pagewebController::findAll() as $pageweb) { ?>

           <option value="<?php echo $pageweb->id; ?>"><?php echo $pageweb->nom; ?></option>
<?php } ?>
       </select>
    </div>
    <div class="form-group">
        <label for="sel1">Langue</label>
       <select class="form-control" id="sel1" name="id_lang" onchange="document.location.href='index.php?page=admin&crud=pageweb&action=create&langue='+this.value">
   
        <option value="1" <?php if($_SESSION["langue"]==1) echo "selected"; ?>>Français</option>
        <option value="2" <?php if($_SESSION["langue"]==2) echo "selected"; ?>>English</option>
      </select>
       </select>

    </div>
    <div class="form-group">
        <label for="nom">Nom</label>
        <input type="text" class="form-control" id="nom" placeholder="utilisé dans l'url ..." name="nom">
    </div>
     
    <div class="form-group">
        <label for="title"> Title</label>
        <input type="text" class="form-control" id="title" placeholder="Affiché dans les tabs des navigateurs" name="title">
    </div>
    <div class="form-group">
        <label for="title">Description</label>
        <input type="text" class="form-control" id="descripion" placeholder="Description pour le reféfancement" name="descripion">
    </div>
    <div class="form-group">
        <label for="sel1">Afichage dans le menu</label>
       <select class="form-control" id="sel1" name="menu" >
        <option value="1">Oui</option>
         <option value="2">Non</option>
       </select>
    </div>
     <div class="form-group">
            <label for="title">image</label>
            <input type="file" class="form-control" name="fichier">
        </div>
    <div class="form-group">
        <label for="title">Contenu</label>
        <textarea name="contenu" id="editor1" rows="10" value=""></textarea>
                            <script>
CKEDITOR.replace('editor1',{
      filebrowserBrowseUrl: 'assets/plugins/back/ckfinder/ckfinder.html',
    filebrowserImageBrowseUrl: 'assets/plugins/back/ckfinder/ckfinder.html?type=Images',
    filebrowserFlashBrowseUrl: 'assets/plugins/back/ckfinder/ckfinder.html?type=Flash',
    filebrowserUploadUrl: 'assets/plugins/back/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserImageUploadUrl: 'assets/plugins/back/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserFlashUploadUrl: 'assets/plugins/back/ckfinder/connector/php/connector.php?command=QuickUpload&type=Flash'
});
</script>
    </div>
    
    <button type="submit"  class="btn btn-default"><i class="fa fa-save"></i> Enregistrer</button>
</form>
<div class="well">
    <a class="btn btn-primary" href="?page=admin&crud=pageweb&action=list"><i class="fa fa-list"></i> </a>
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



