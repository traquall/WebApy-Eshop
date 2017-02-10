<?php

namespace Noneslad\Controllers;
?>
<h1>Information sur l'image ! (<?php echo $image->getNom(); ?>)</h1>
<div class="table-responsive">
    <table class="table">
        <tr>
            <th>Nom </th>
            <td><?php echo $image->getNom(); ?></td>
        </tr>
        <tr>
            <th>Image</th>
            <td><img src="<?php echo $image->getUrl(); ?>" width="100px"/></td>
        </tr>
        <tr>
            <th>Type </th>
            <td><?php echo $image->getType(); ?></td>
        </tr>
        <tr>
            <th>Description </th>
            <td><?php echo $image->getAlt(); ?></td>
        </tr>
        <tr>
            <th>Affichage </th>
            <td><i class="<?php echo $image->aff(); ?>"></i></td>
        </tr>


    </table>
</div>
<div class="well">
    <a class="btn btn-primary" href="?page=admin&crud=image&action=list"><i class="fa fa-list"></i> </a>
    <a class="btn btn-warning" href="?page=admin&crud=image&action=update&id=<?php echo $image->getId(); ?>"><i class="fa fa-pencil"></i> </a>
    <a class="btn btn-danger" href="?page=admin&crud=image&action=delete&id=<?php echo $image->getId(); ?>"><i class="glyphicon glyphicon-trash
                                                                                                               "></i> </a>
</div>