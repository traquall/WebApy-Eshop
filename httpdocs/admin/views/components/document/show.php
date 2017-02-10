<?php 
namespace Noneslad\Controllers;

?>
<h1>Information sur le document ! (<?php echo $document->getNom(); ?>)</h1>
<div class="table-responsive">
<table class="table">
    <tr>
        <th>Nom</th>
        <td><?php echo $document->getNom(); ?></td>
    </tr>
   
        <th>Date de création</th>
        <td><?php echo $document->getDate_c(); ?></td>
    </tr>
    <tr>
        <th>Date de dernier modification</th>
        <td><?php echo $document->getDate_m(); ?></td>
    </tr>
   
    <tr>
        <th>voir le document</th>
        <td><a class="btn btn-primary" href="<?php echo URL_EXT.EXT_UPLOAD_PATH.$document->getUrl(); ?>" target="_blank" >
<i class="glyphicon glyphicon-open-file"></i>
</a>
        </td>
    </tr>
    <!--<tr>
        <th>Contenu</th>
        <td><?php //echo $document->getContenu(); ?></td>
    </tr>-->
</table>
</div>
<div class="well">
    <a class="btn btn-primary" href="?page=admin&crud=categorie"><i class="fa fa-list"></i> </a>
    <a class="btn btn-warning" href="?page=admin&crud=document&action=update&id=<?php echo $document->getId(); ?>"><i class="fa fa-pencil"></i> </a>
    <a class="btn btn-danger" href="?page=admin&crud=document&action=delete&id=<?php echo $document->getId(); ?>"><i class="glyphicon glyphicon-trash
"></i> </a>
</div>