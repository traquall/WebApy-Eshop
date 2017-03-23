<?php 
namespace Noneslad\Controllers;

?>
<h1>Information sur le produit ! (<?php echo $produits->getNom(); ?>)</h1>
<div class="table-responsive">
<table class="table">
    <tr>
        <th>Nom</th>
        <td><?php echo $produits->getNom(); ?></td>
    </tr>
   
        <th>Date de création</th>
        <td><?php echo $produits->getDate_c(); ?></td>
    </tr>
    <tr>
        <th>Date de dernier modification</th>
        <td><?php echo $produits->getDate_m(); ?></td>
    </tr>
   
    <tr>
        <th>voir le produit</th>
        <td>
            <a class="btn btn-primary" href="<?php echo URL_EXT.EXT_UPLOAD_PATH.$produits->getUrl(); ?>" target="_blank" ><i class="glyphicon glyphicon-open-file"></i></a>
        </td>
    </tr>
    <!--<tr>
        <th>Contenu</th>
        <td><?php //echo $produits->getContenu(); ?></td>
    </tr>-->
</table>
</div>
<div class="well">
    <a class="btn btn-primary" href="?page=admin&crud=categorie"><i class="fa fa-list"></i> </a>
    <a class="btn btn-warning" href="?page=admin&crud=produits&action=update&id=<?php echo $produits->getId(); ?>"><i class="fa fa-pencil"></i> </a>
    <a class="btn btn-danger" href="?page=admin&crud=produits&action=delete&id=<?php echo $produits->getId(); ?>"><i class="glyphicon glyphicon-trash"></i> </a>
</div>