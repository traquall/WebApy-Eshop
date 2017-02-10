<?php 
namespace Noneslad\Controllers;
?>
<h1>Modification de Page <?php echo $pageweb->getNom(); ?> !</h1>
<form action="?page=admin&crud=pageweb&action=update&id=<?php echo $pageweb->getId(); ?>"  enctype="multipart/form-data" name="formPage" method="post">
<div class="form-group">
        <label for="sel1">Page mère</label>
       <select class="form-control" id="sel1" name="id_parent">
        <option value="1">Pas de page mère</option>
        <?php 

            foreach ($pageweb->getAllExcpMe() as $pagesWeb) { ?>

           <option value="<?php echo $pagesWeb['id']; ?>" <?php if($pagesWeb['id']==$formData['id_parent']){ echo "selected"; } ?> ><?php echo $pagesWeb['nom']; ?></option>

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
        <label for="title">balise Title</label>
        <input
            type="text"
            class="form-control"
            id="title"
            placeholder="Affiché dans les tabs des navigateurs"
            name="title"
            value="<?php echo $formData['title']; ?>"
        >
    </div>
     <div class="form-group">
        <label for="descripion">Despription</label>
        <input
            type="text"
            class="form-control"
            id="descripion"
            placeholder="Affiché dans les tabs des navigateurs"
            name="descripion"
            value="<?php echo $formData['descripion']; ?>"
        >
    </div>
    <div class="form-group">
        <label for="sel1">Afichage dans le menu</label>
       <select class="form-control" id="sel1" name="menu">
        <option value="1" <?php if($formData['menu']==1){ echo "selected"; } ?>>Oui</option>
           <option value="2" <?php if($formData['menu']==2){ echo "selected"; } ?>>Non</option>
       </select>
    </div>
     <div class="form-group">
            <label for="image">image</label>
            <input type="file"  class="form-control" name="fichier">
        </div>
     <div class="form-group">
        <label for="contenu">Contenu</label>
         <textarea name="contenu" id="editor1"><?php echo $formData['contenu'];?> </textarea>
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
     


<div class="well">
    <button type="submit" onClick="ConfirmMessage()" class="btn btn-success"><i class="fa fa-save"></i></button>
    <a class="btn btn-primary" href="?page=admin&crud=pageweb&action=list"><i class="fa fa-list"></i> </a>
    <a class="btn btn-danger" onclick="if(!confirm('Voulez-vous vraiment supprimer la page : <?php echo $formData['nom'] ?> ?')){ return false; }" href="?page=admin&crud=pageweb&action=delete&id=<?php echo $pageweb->getId(); ?>"><i class="glyphicon glyphicon-trash
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