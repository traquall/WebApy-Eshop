<?php
use Noneslad\Tools\WebTools;
use Noneslad\Tools\HTML\html;
$html = new html();
?>

<h1>Liste des Produits</h1>

<?php
  $retour = WebTools::getInFlashBag('Notice');
  if ($retour) {
      $html->alert($retour);
  }
?>
<div class="table-responsive">
  <br/>
  <table class="table">
    <tr>
      <th>Nom</th>
      <th>Actions</th>
    </tr>
    <?php 
      if($_SESSION["langue"]==1){ 
        $langue="getfr";
      } else
        $langue="geten";

     foreach (\Noneslad\Controllers\produitsController::$langue() as $produit) {
    ?>
      <tr>
        <td><?php echo $produit['nom'] ?></td>
        <td>
          <a class="btn btn-info" href="?document=admin&crud=produits&action=read&id=<?php echo $produit['id']; ?>"><i class="fa fa-eye"></i> </a>
          <a class="btn btn-warning" href="?document=admin&crud=produits&action=update&id=<?php echo $produit['id']; ?>&id_cat=<?php echo $_GET["id"] ?>&langue=<?php echo $produit['id_lang']; ?>"><i class="fa fa-pencil"></i> </a>
          <a class="btn btn-danger" onclick="if(!confirm('Voulez-vous vraiment supprimer le produit : <?php echo $produit['nom']; ?> ?')){ return false; }"href="?document=admin&crud=produits&action=delete&id=<?php echo $produit['id']; ?>&idcat=<?php echo $_GET['id']; ?>"><i class="glyphicon glyphicon-trash"></i> </a>
        </td>
      </tr>
    <?php }?>
  </table>

  <div class="well">
    <a class="btn btn-success" href="?document=admin&crud=produits&action=create&id_cat=<?php echo $_GET["id"] ?>"><i class="fa fa-plus"></i> </a>
  </div>
</div>
