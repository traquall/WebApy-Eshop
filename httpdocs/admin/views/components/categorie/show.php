<?php 
namespace Noneslad\Controllers;

?>
<h1>Information sur la catégorie  (<?php echo $categorie->getNom(); ?>)</h1>
<div class="table-responsive">
<table class="table">
    <tr>
        <th>Nom</th>
        <td><?php echo $categorie->getNom(); ?></td>
    </tr>
        <th>Catégorie mère</th>
        <td><?php echo $categorie->getPagess(); ?></td>
    </tr>
   
    <!--<tr>
        <th>Contenu</th>
        <td><?php //echo $categorie->getContenu(); ?></td>
    </tr>-->
</table>
</div>
<div class="well">
    <a class="btn btn-primary" href="?page=admin&crud=categorie&action=list"><i class="fa fa-list"></i> </a>
    <a class="btn btn-warning" href="?page=admin&crud=categorie&action=update&id=<?php echo $categorie->getId(); ?>"><i class="fa fa-pencil"></i> </a>
    <a class="btn btn-danger" href="?page=admin&crud=categorie&action=delete&id=<?php echo $categorie->getId(); ?>"><i class="glyphicon glyphicon-trash
"></i> </a>
</div>