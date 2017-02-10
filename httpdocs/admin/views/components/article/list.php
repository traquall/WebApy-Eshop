<?php
use Noneslad\Tools\WebTools;
use Noneslad\Tools\HTML\html;
$html = new html();
?>

<h1>Liste des articles !</h1>

<?php


$retour = WebTools::getInFlashBag('Notice');
if ($retour) {
    $html->alert($retour);
}

?>
<div class="table-responsive">
 <select class="form-control" id="sel2" onchange="document.location.href='index.php?page=admin&crud=article&langue='+this.value">
  <option value="1" <?php if($_SESSION["langue"]==1) echo "selected"; ?>>Français</option>
  <option value="2" <?php if($_SESSION["langue"]==2) echo "selected"; ?>>English</option>
</select>
<table class="table">
    <tr>

        <th>Nom</th>
        <th>Date</th>
        <th>Affichage</th>
          <th>Action</th>
    </tr>
    <?php 
   if($_SESSION["langue"]==1){ 
      $langue="getfr";
   } else
      $langue="geten";

   foreach (\Noneslad\Controllers\articleController::$langue() as $article) {
   // die(print_r($article));
       ?>
       <tr>
           <td><?php echo $article['titre']; ?></td>
           <td><?php echo $article['date']; ?></td>
           
            <td><i class="<?php if( $article['affichage'] == 1)echo"glyphicon glyphicon-eye-open";else echo"glyphicon glyphicon-eye-close" ?>"></i></td>
           <td>
               <a class="btn btn-info" href="?page=admin&crud=article&action=read&id=<?php echo $article['id']; ?>"><i class="fa fa-eye"></i> </a>
               <a class="btn btn-warning" href="?page=admin&crud=article&action=update&id=<?php echo $article['id']; ?>"><i class="fa fa-pencil"></i> </a>
               <a class="btn btn-danger" onclick="if(!confirm('Voulez-vous vraiment supprimer la page : <?php echo $article['nom']; ?> ?')){ return false; }"href="?page=admin&crud=article&action=delete&id=<?php echo $article['id']; ?>"><i class="glyphicon glyphicon-trash
"></i> </a>
           </td>
       </tr>
    <?php
   }?>
</table>
</div>
<div class="well">

    <a class="btn btn-success" href="?page=admin&crud=article&action=create"><i class="fa fa-plus"></i> </a>
</div>