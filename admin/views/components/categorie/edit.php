<?php 
namespace Noneslad\Controllers;
?>
<h1>Modification de la catégorie <?php echo $categorie->getNom(); ?> !</h1>
<form action="?page=admin&crud=categorie&action=update&id=<?php echo $categorie->getId(); ?>"  enctype="multipart/form-data" name="formPage" method="post">
<div class="form-group">
        <label for="sel1">Langue</label>
       <select class="form-control" id="sel1" name="id_lang">
        <option value="1">Français</option>
         <option value="2"<?php if ($formData['id_lang']==2)echo "selected"; ?> >Anglais</option>     
       </select>
    </div>
<div class="form-group">
        <label for="sel1">Categorie mère</label>
       <select class="form-control" id="sel1" name="id_parent">
        <option value="1">Pas de categorie mère</option>
        <?php 

            foreach ($categorie->getAllExcpMe() as $categories) { ?>

           <option value="<?php echo $categories['id']; ?>" <?php if($categories['id']==$formData['id_parent']){ echo "selected"; } ?> ><?php echo $categories['nom']; ?></option>

<?php } ?>
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
        <label for="contenu">Contenu</label>
         <textarea name="contenu" id="editor1"><?php echo $formData['contenu'];?> </textarea>
                  <script>
CKEDITOR.replace('editor1',{
     filebrowserBrowseUrl: 'assets/plugins/back/kcfinder/browse.php?opener=ckeditor&type=files',
    filebrowserImageBrowseUrl: 'assets/plugins/back/kcfinder/browse.php?opener=ckeditor&type=images',
    filebrowserFlashBrowseUrl: 'assets/plugins/back/kcfinder/browse.php?opener=ckeditor&type=flash',
    filebrowserUploadUrl: 'assets/plugins/back/kcfinder/upload.php?opener=ckeditor&type=files',
    filebrowserImageUploadUrl: 'assets/plugins/back/kcfinder/upload.php?opener=ckeditor&type=images',
    filebrowserFlashUploadUrl: 'assets/plugins/back/kcfinder/upload.php?opener=ckeditor&type=flash'
});
</script>
    </div>
     


<div class="well">
    <button type="submit" onClick="ConfirmMessage()" class="btn btn-success"><i class="fa fa-save"></i></button>
    <a class="btn btn-primary" href="?page=admin&crud=categorie&action=list"><i class="fa fa-list"></i> </a>
    <a class="btn btn-danger" onclick="if(!confirm('Voulez-vous vraiment supprimer la page : <?php echo $formData['nom'] ?> ?')){ return false; }" href="?page=admin&crud=categorie&action=delete&id=<?php echo $categorie->getId(); ?>"><i class="glyphicon glyphicon-trash
"></i> </a>
</div>
</form>
<SCRIPT language=javascript>
function ConfirmMessage() {
    var N = document.forms["formPage"]["nom"].value;
    var T = document.forms["formPage"]["title"].value;
    var D = document.forms["formPage"]["descripion"].value;
    if (N == "" || T == "" || D == "" ) { 
        if (!confirm("Voulez-vous eregister la page avec de(s) champ(s) ?")) { 
            return false;
        }else{ return true;}
    }
}
</SCRIPT>