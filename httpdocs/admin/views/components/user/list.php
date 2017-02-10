<?php
use Noneslad\Tools\WebTools;
use Noneslad\Tools\HTML\html;
$html = new html();
?>

<h1>Liste d'utilisateur !</h1>

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
   <?php foreach (\Noneslad\Controllers\UserSiteController::findAll() as $User) {
       ?>
       <tr>
           <td><?php echo $User->nom; ?></td>
           <td><?php echo $User->prenom; ?></td>
            <td><?php echo $User->email; ?></td>
           <td>
               <a class="btn btn-info" href="?page=admin&crud=user&action=read&id=<?php echo $User->id; ?>"><i class="fa fa-eye"></i> </a>
               <a class="btn btn-warning" href="?page=admin&crud=user&action=update&id=<?php echo $User->id; ?>"><i class="fa fa-pencil"></i> </a>
               <a class="btn btn-danger" href="?page=admin&crud=user&action=delete&id=<?php echo $User->id; ?>"><i class="glyphicon glyphicon-trash
"></i> </a>
           </td>
       </tr>
    <?php
   }?>
</table>
</div>
<div class="well">
    <a class="btn btn-success" href="?page=admin&crud=user&action=create"><i class="fa fa-plus"></i> </a>
</div>