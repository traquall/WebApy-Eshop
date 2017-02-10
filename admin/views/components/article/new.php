<form action="?page=admin&crud=article&action=create"  name="formPage" method="post">
<div class="form-group">
        <label for="sel1">Langue</label>
       <select class="form-control" id="sel1" name="id_lang" onchange="document.location.href='index.php?page=admin&crud=article&action=create&langue='+this.value">
   
        <option value="1" <?php if($_SESSION["langue"]==1) echo "selected"; ?>>Français</option>
        <option value="2" <?php if($_SESSION["langue"]==2) echo "selected"; ?>>English</option>
      </select>
       </select>

    </div>
    
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" placeholder="Title de l'article" name="titre">
    </div>
   
    <div class="form-group">
        <label for="sel1">Afichage </label>
       <select class="form-control" id="sel1" name="affichage" >
        <option value="1">Oui</option>
         <option value="2">Non</option>
       </select>
    </div>
    
    <div class="form-group">
        <label for="Contenu">Contenu</label>
        <textarea name="text" id="editor1" rows="10" value=""></textarea>
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
    <a class="btn btn-primary" href="?page=admin&crud=article&action=list"><i class="fa fa-list"></i> </a>
</div>



