<?php 
namespace Noneslad\Controllers;
?>
<h1>Modification de l'article <?php echo $article->getTitre(); ?> !</h1>
<form action="?page=admin&crud=article&action=update&id=<?php echo $article->getId(); ?>"  enctype="multipart/form-data" name="formPage" method="post">

    <div class="form-group">
        <label for="nom">Titre</label>
        <input type="text"
               class="form-control"
               id="nom"
               placeholder="utilisé dans l'url ..."
               name="titre"
               value="<?php echo $formData['titre'];?>">
    </div>
    <div class="form-group">
        <label for="sel1">Afichage</label>
       <select class="form-control" id="sel1" name="affichage">
        <option value="1" <?php if($formData['affichage']==1){ echo "selected"; } ?>>Oui</option>
           <option value="2" <?php if($formData['affichage']==2){ echo "selected"; } ?>>Non</option>
       </select>
    </div>
     
     <div class="form-group">
        <label for="contenu">Contenu</label>
         <textarea name="text" id="editor1"><?php echo $formData['text'];?> </textarea>
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
    <a class="btn btn-primary" href="?page=admin&crud=article&action=list"><i class="fa fa-list"></i> </a>
    <a class="btn btn-danger" onclick="if(!confirm('Voulez-vous vraiment supprimer la page : <?php echo $formData['nom'] ?> ?')){ return false; }" href="?page=admin&crud=article&action=delete&id=<?php echo $article->getId(); ?>"><i class="glyphicon glyphicon-trash
"></i> </a>
</div>
</form>
