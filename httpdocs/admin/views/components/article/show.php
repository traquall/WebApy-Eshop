<?php 
namespace Noneslad\Controllers;

?>
<h1>Information sur l'article ! (<?php echo $article->getTitre(); ?>)</h1>
<div class="table-responsive">
<table class="table">
    <tr>
        <th>Nom</th>
        <td><?php echo $article->getTitre(); ?></td>
    </tr>
   
    <tr>
        <th>Date</th>
        <td><?php echo $article->getDate(); ?></td>
    </tr>
    <tr>
        <th>Afichage</th>
        <td><?php echo $article->etat(); ?></td>
    </tr>
   </table>
</div>
<div class="well">
    <a class="btn btn-primary" href="?page=admin&crud=article&action=list"><i class="fa fa-list"></i> </a>
    <a class="btn btn-warning" href="?page=admin&crud=article&action=update&id=<?php echo $article->getId(); ?>"><i class="fa fa-pencil"></i> </a>
    <a class="btn btn-danger" href="?page=admin&crud=article&action=delete&id=<?php echo $article->getId(); ?>"><i class="glyphicon glyphicon-trash
"></i> </a>
</div>