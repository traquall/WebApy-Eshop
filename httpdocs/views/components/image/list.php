<?php
use Noneslad\Tools\WebTools;
use Noneslad\Tools\HTML\html;
$html = new html();
?>

<h1>Liste des image !</h1>

<?php


$retour = WebTools::getInFlashBag('Notice');
if ($retour) {
    $html->alert($retour);
}

?>
<div class="table-responsive">
<table class="table">
    <tr>
        <th>Image </th>
        <th>Type </th>
        <th>Message </th>
         <th>Affichage </th>
        <th>Actions </th>
    </tr>
   <?php foreach (\Noneslad\Controllers\imageController::findAll() as $image) {
       ?>
       <tr>
           <td><img src="<?php echo $image->url; ?>" width="100px"/></td>
           <td><?php echo $image->type; ?></td>
            <td><?php echo $image->alt; ?></td>
            <td><i class="<?php if($image->affichage==1)echo "glyphicon glyphicon-eye-open
"; else echo "glyphicon glyphicon-eye-close"  ?>"></td>
           <td>
              
               <a class="btn btn-info" href="?page=admin&crud=image&action=read&id=<?php echo $image->id; ?>"><i class="fa fa-eye"></i> </a>
               <a class="btn btn-warning" href="?page=admin&crud=image&action=update&id=<?php echo $image->id; ?>"><i class="fa fa-pencil"></i> </a>
               <a class="btn btn-danger" onclick="if(!confirm('Voulez-vous vraiment supprimer l'image : <?php echo $image->nom; ?> ?')){ return false; }"href="?page=admin&crud=image&action=delete&id=<?php echo $image->id; ?>"><i class="glyphicon glyphicon-trash
"></i> </a>
           </td>
       </tr>
    <?php
   }?>
</table>
</div>
<div class="well">
 <a class="btn btn-info" href="?page=admin&crud=image&action=updateimg"><i class="glyphicon glyphicon-sort-by-attributes"></i> </a>
    <a class="btn btn-success" href="?page=admin&crud=image&action=create"><i class="fa fa-plus"></i> </a>
</div> 