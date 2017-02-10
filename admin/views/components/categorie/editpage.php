<form action="?page=admin&crud=categorie&action=updatepage"  method="post">
   <?php foreach (\Noneslad\Controllers\categorieController::findAll() as $page) {
       ?>
      <div class="form-group">
            <label for="title"><?php echo $page->nom; ?></label>
            <input type="text" value="<?php echo $page->ordre; ?>" class="form-control" name="ordre_<?php echo $page->id; ?>">
        </div>
           
           
           
           <td>
              
              
<?php } ?>
   
       
        <button type="submit" class="btn btn-default"><i class="fa fa-save"></i> Enregistrer</button>
</form>
<div class="well">
    <a class="btn btn-primary" href="?page=admin&crud=categorie&action=list"><i class="fa fa-list"></i></a>
</div>
