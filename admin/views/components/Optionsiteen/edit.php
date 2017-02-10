<h1>Modification des options !</h1>
<form action="?page=admin&crud=optionsite_en&action=update" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="heureabonne">Les horaires</label>
        <input type="text"
               class="form-control"
               id="heureabonne"
               placeholder="Horaires abonnés ex  6:00-23:00"
               name="heureabonne"
               value="<?php echo $formData['heureabonne']; ?>">
    </div>
    <div class="form-group">
        <label for="heurevisite">Lettre d'informations

</label>
        <input
            type="text"
            class="form-control"
            id="heurevisite"
            placeholder=""
            name="heurevisite"
            value="<?php echo $formData['heurevisite']; ?>"
            >
    </div>
    
    <div class="form-group">
        <label for="keywordswords">keywordswords</label>
        <input
            type="text"
            class="form-control"

            placeholder="keywordswords"
            name="keywords"
            value="<?php echo $formData['keywords']; ?>"
            >
    </div>
    <div class="form-group">
        <label for="text">A propos</label>
        <textarea
            type="text"
            class="form-control"
            id="keywords"
            placeholder="Text de la page contact"
            name="text"

            ><?php echo $formData['text']; ?></textarea>

    </div>
    
     
 <div class="form-group">
        <label for="Actualités">Actualités</label>
        <textarea name="actu" id="editor1" rows="10" value=""><?php echo $formData['actu']; ?></textarea>
              <script>
CKEDITOR.replace('editor1',{
     filebrowserBrowseUrl: 'assets/plugins/back/ckfinder/ckfinder.html',
    filebrowserImageBrowseUrl: 'assets/plugins/back/ckfinder/ckfinder.html?type=Images',
    filebrowserFlashBrowseUrl: 'assets/plugins/back/ckfinder/ckfinder.html?type=Flash',
    filebrowserUploadUrl: 'assets/plugins/back/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserImageUploadUrl: 'assets/plugins/back/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserFlashUploadUrl: 'assets/plugins/back/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
});
</script>
    </div>
    <div class="well">
        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i></button>
        <a class="btn btn-primary" href="?page=admin&crud=optionsite_en&action=read"><i class="fa fa-list"></i> </a>


    </div>
</form>