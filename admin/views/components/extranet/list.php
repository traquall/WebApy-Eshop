<?php
use Noneslad\Tools\WebTools;
use Noneslad\Tools\HTML\html;
$html = new html();
?>

<h1>Liste des membre !</h1>

<?php


$retour = WebTools::getInFlashBag('Notice');
if ($retour) {
    $html->alert($retour);
}

?>
<div class="table-responsive">
<table class="table">
    <tr>
        <th>Nom </th>
        <th>Prenom </th>
        <th>Email </th>
        <th>Actions</th>
    </tr>
   <?php foreach (\Noneslad\Controllers\extranetController::findAll() as $Extranet) {
       ?>
       <tr>
           <td><?php echo $Extranet->nom; ?></td>
           <td><?php echo $Extranet->prenom; ?></td>
            <td><?php echo $Extranet->email; ?></td>
           <td>
               <a class="btn btn-info" href="?page=admin&crud=extranet&action=read&id=<?php echo $Extranet->id; ?>"><i class="fa fa-eye"></i> </a>
               <a class="btn btn-warning" href="?page=admin&crud=extranet&action=update&id=<?php echo $Extranet->id; ?>"><i class="fa fa-pencil"></i> </a>
               <a class="btn btn-danger" href="?page=admin&crud=extranet&action=delete&id=<?php echo $Extranet->id; ?>"><i class="glyphicon glyphicon-trash
"></i> </a>
           </td>
       </tr>
    <?php
   }?>
</table>
</div>
<div class="well">
    <a class="btn btn-success" href="?page=admin&crud=extranet&action=create"><i class="fa fa-plus"></i> </a>
</div>