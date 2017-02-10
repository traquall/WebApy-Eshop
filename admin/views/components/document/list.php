<?php
use Noneslad\Tools\WebTools;
use Noneslad\Tools\HTML\html;
$html = new html();
?>

<h1>Liste des Produits</h1>

<?php


$retour = WebTools::getInFlashBag('Notice');
if ($retour) {
    $html->alert($retour);
}

?>
<div class="table-responsive">
<br/>
<table class="table">
    <tr>
        <th>Nom</th>
        
         
        <th>Actions</th>
    </tr>
   <?php 
   if($_SESSION["langue"]==1){ 
      $langue="getfr";
   } else
      $langue="geten";

   foreach (\Noneslad\Controllers\docController::$langue() as $document) {
       ?>
       <tr>
           <td><?php echo $document['nom'] ?></td>
           <td>
               <a class="btn btn-info" href="?document=admin&crud=document&action=read&id=<?php echo $document['id']; ?>"><i class="fa fa-eye"></i> </a>
               <a class="btn btn-warning" href="?document=admin&crud=document&action=update&id=<?php echo $document['id']; ?>&id_cat=<?php echo $_GET["id"] ?>&langue=<?php echo $document['id_lang']; ?>"><i class="fa fa-pencil"></i> </a>
               <a class="btn btn-danger" onclick="if(!confirm('Voulez-vous vraiment supprimer la document : <?php echo $document['nom']; ?> ?')){ return false; }"href="?document=admin&crud=document&action=delete&id=<?php echo $document['id']; ?>&idcat=<?php echo $_GET['id']; ?>"><i class="glyphicon glyphicon-trash
"></i> </a>
           </td>
       </tr>
    <?php
   }?>
</table>

<div class="well">
    <a class="btn btn-success" href="?document=admin&crud=document&action=create&id_cat=<?php echo $_GET["id"] ?>"><i class="fa fa-plus"></i> </a>

</div>
</div>
