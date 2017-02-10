<form action="?page=admin&crud=image&action=update&id=<?php echo $image->getId(); ?>" enctype="multipart/form-data" method="post">
    <div class="form-group">
        <div class="form-group">
            <label for="nom">Nom de l'image</label>
            <input type="text" class="form-control" value="<?php  echo $formData['nom'] ?>" placeholder="Nom dans balise alt." name="nom">
        </div>

        <div class="form-group">
            <label for="Image du image">Type</label>
            <select class="form-control" name="type">
                <option value="document"  <?php echo $formData['type'] == "document" ? "selected" : ''; ?>> Document</option>
                <option value="image" <?php echo $formData['type'] == "image" ? "selected" : ''; ?>>Image</option>
            </select>

        </div>
        <div class="form-group">
            <label for="title">image/Document</label>
            <input type="file"  class="form-control" name="fichier">
        </div>
        <div class="form-group">
            <label for="title">Description</label>
            <input type="text" class="form-control" value="<?php  echo $formData['alt']; ?> "placeholder="Description alt" name="alt">
        </div>
        <div class="form-group">
            <label for="Image du image">Affichage</label>
            <select class="form-control" name="affichage">
                <option value="1">Oui</option>
                <option value="2" <?php if($formData['affichage'] == 2) echo "selected" ; ?>>Non</option>
            </select>

        </div>
        <button type="submit" class="btn btn-default"><i class="fa fa-save"></i> Enregistrer</button>
</form>
<div class="well">
    <a class="btn btn-primary" href="?page=admin&crud=image&action=list"><i class="fa fa-list"></i></a>
</div>



