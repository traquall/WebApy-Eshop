<form action="?page=admin&crud=image&action=create" enctype="multipart/form-data" method="post">
    <div class="form-group">
        <div class="form-group">
            <label for="nom">Nom de l'image</label>
            <input type="text" class="form-control" id="nom" placeholder="Nom dans balise alt." name="nom">
        </div>
        </div>

        
        <div class="form-group">
        <label for="sel1">Type</label>
       <select class="form-control" id="sel1" name="type" >
         <option value="document"> Document</option>
                <option value="image" >Image</option>
      
       </select>
    </div>
        <div class="form-group">
            <label for="title">image</label>
            <input type="file" class="form-control" name="fichier">
        </div>
        <div class="form-group">
            <label for="title">Description de l'image </label>
            <input type="text" class="form-control" id="descripion" placeholder="Description alt" name="alt">
        </div>
        <div class="form-group">
        <label for="sel1">Afichage</label>
       <select class="form-control" id="sel1" name="affichage" >
        <option value="1">Oui</option>
        <option value="2">Non</option>
       </select>
    </div>
        <button type="submit" class="btn btn-default"><i class="fa fa-save"></i> Enregistrer</button>
</form>
<div class="well">
    <a class="btn btn-primary" href="?page=admin&crud=image&action=list"><i class="fa fa-list"></i></a>
</div>



