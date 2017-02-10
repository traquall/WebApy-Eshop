<?php
use Noneslad\Tools\WebTools;
use Noneslad\Tools\HTML\html;
$html = new html();
?>

<h1>Boite de reception !</h1>

<?php

$retour = WebTools::getInFlashBag('Notice');
if ($retour) {
    $html->alert($retour);
}

?>
<div class="table-responsive">
<table class="table">
    <tr>
        <th>Nom de l'expéditeur</th>
        <th>Nom de l'entreprise</th>
        <th>Email de l'expéditeur</th>
        <th>Actions</th>
    </tr>
   <?php foreach (\Noneslad\Controllers\emailController::findAll() as $email) {
       ?>
       <tr>
           <td><?php echo $email->prenom; ?></td>
           <td><?php echo $email->soci; ?></td>
            <td><?php echo $email->email; ?></td>
            
           <td>
               <a class="btn btn-info" href="?page=admin&crud=email&action=read&id=<?php echo $email->id; ?>"><i class="fa fa-eye"></i> </a>
               <a class="btn btn-danger" href="?page=admin&crud=email&action=delete&id=<?php echo $email->id; ?>"><i class="glyphicon glyphicon-trash
"></i> </a>
           </td>
       </tr>
    <?php
   }?>
</table>
</div>
<div class="well">
    
</div>