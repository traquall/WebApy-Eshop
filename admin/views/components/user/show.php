
<h1>Profil de l'utilisateur <?php echo $user->getNom(); $user->getPrenom(); ?></h1>
<div class="table-responsive">
<table class="table">
    <tr>
        <th>Nom </th>
        <td><?php echo $user->getNom(); ?></td>
    </tr>
    <tr>
        <th>Prénom</th>
        <td><?php echo $user->getPrenom(); ?></td>
    </tr>
    <tr>
        <th>Email</th>
        <td><?php echo $user->getEmail(); ?></td>
    </tr>
   
</table>
</div>
<div class="well">
    <a class="btn btn-primary" href="?page=admin&crud=user&action=list"><i class="fa fa-list"></i> </a>
    <a class="btn btn-warning" href="?page=admin&crud=user&action=update&id=<?php echo $user->getId(); ?>"><i class="fa fa-pencil"></i> </a>
    <a class="btn btn-danger" href="?page=admin&crud=user&action=lete&id=<?php echo $user->getId(); ?>"><i class="glyphicon glyphicon-trash
"></i> </a>
</div>