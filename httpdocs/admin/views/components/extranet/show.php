
<h1>Profil du membre <?php echo $extranet->getPrenom()." ".$extranet->getNom(); ?></h1>
<div class="table-responsive">
<table class="table">
    <tr>
        <th>Nom </th>
        <td><?php echo $extranet->getNom(); ?></td>
    </tr>
    <tr>
        <th>Prénom</th>
        <td><?php echo $extranet->getPrenom(); ?></td>
    </tr>
    <tr>
        <th>Email</th>
        <td><?php echo $extranet->getEmail(); ?></td>
    </tr>
     <tr>
        <th>Login</th>
        <td><?php echo $extranet->getLogin(); ?></td>
    </tr>
    
   
</table>
</div>
<div class="well">
    <a class="btn btn-primary" href="?page=admin&crud=extranet&action=list"><i class="fa fa-list"></i> </a>
    <a class="btn btn-warning" href="?page=admin&crud=extranet&action=update&id=<?php echo $extranet->getId(); ?>"><i class="fa fa-pencil"></i> </a>
    <a class="btn btn-danger" href="?page=admin&crud=extranet&action=lete&id=<?php echo $extranet->getId(); ?>"><i class="glyphicon glyphicon-trash
"></i> </a>
</div>