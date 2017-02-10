<form action="?page=admin&crud=image&action=updateimg" enctype="multipart/form-data" method="post">
   <?php foreach (\Noneslad\Controllers\imageController::findAll() as $image) {
       ?>
      <div class="form-group">
            <label for="title"><img src="<?php echo $image->url; ?>" width="100px"/></label>
            <input type="text" value="<?php echo $image->ordre; ?>" class="form-control" name="ordre_<?php echo $image->id; ?>">
        </div>
           
           
           
           <td>
              
              
<?php } ?>
   
       
        <button type="submit" class="btn btn-default"><i class="fa fa-save"></i> Enregistrer</button>
</form>
<div class="well">
    <a class="btn btn-primary" href="?page=admin&crud=image&action=list"><i class="fa fa-list"></i></a>
</div>
