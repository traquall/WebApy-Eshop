<?php
  use Noneslad\Tools\WebTools;
  use Noneslad\Tools\HTML\html;
  $html = new html();
?>

<h1>Liste des categories</h1>

<?php
  $retour = WebTools::getInFlashBag('Notice');
  if ($retour) {
      $html->alert($retour);
  }
?>

<div class="table-responsive">
  <select name="id_lang" class="form-control" id="sel2" onchange="document.location.href='index.php?page=admin&crud=categorie&langue='+this.value">
    <option value="1" <?php if($_SESSION["langue"]==1) echo "selected"; ?>>Français</option>
    <option value="2" <?php if($_SESSION["langue"]==2) echo "selected"; ?>>English</option>
  </select>
  <br/>
  <table class="table">
    <tr>
      <th>Nom</th>
      <th> </th>
      <!--<th>Langue</th>-->
      <th>Actions</th>
    </tr>
    <?php 
      if($_SESSION["langue"]==1){ 
        $langue="getfr";
      } 
      else
        $langue="geten";
             
      $menu = \Noneslad\Controllers\categorieController::$langue();
      for($i=0;$i<count($menu);$i++) {
    ?>
      <tr>
        <td><?php echo $menu[$i]["nom"]; ?></td> 
        <td></td>
        <td>
          <a class="btn btn-success" href="?page=admin&crud=produits&action=list&id=<?php echo $menu[$i]['id']; ?>"><i class="glyphicon glyphicon-headphones"></i> </a>
          <a class="btn btn-info" href="?page=admin&crud=categorie&action=read&id=<?php echo $menu[$i]['id']; ?>"><i class="fa fa-eye"></i> </a>
          <a class="btn btn-warning" href="?page=admin&crud=categorie&action=update&id=<?php echo $menu[$i]['id']; ?>"><i class="fa fa-pencil"></i> </a>
          <a class="btn btn-danger" onclick="if(!confirm('Voulez-vous vraiment supprimer la page : <?php echo $menu[$i]['nom']; ?> ?')){ return false; }"href="?page=admin&crud=categorie&action=delete&id=<?php echo $menu[$i]['id']; ?>"><i class="glyphicon glyphicon-trash"></i> </a>
        </td>
      </tr>
      <?php for($j=0;$j<count($menu[$i]["enfants"]);$j++) { ?>
        <tr>
          <td style="padding: 8px 0 0 25px;">- <?php echo $menu[$i]["enfants"][$j]["nom"]; ?></td> 
          <td> </td>
          <td>
            <a class="btn btn-success" href="?page=admin&crud=produits&action=list&id=<?php echo $menu[$i]["enfants"][$j]['id']; ?>"><i class="glyphicon glyphicon-folder-open"></i> </a>
            <a class="btn btn-info" href="?page=admin&crud=categorie&action=read&id=<?php echo $menu[$i]["enfants"][$j]['id']; ?>"><i class="fa fa-eye"></i> </a>
            <a class="btn btn-warning" href="?page=admin&crud=categorie&action=update&id=<?php echo $menu[$i]["enfants"][$j]['id']; ?>"><i class="fa fa-pencil"></i> </a>
            <a class="btn btn-danger" onclick="if(!confirm('Voulez-vous vraiment supprimer la page : <?php echo $menu[$i]["enfants"][$j]['nom']; ?> ?')){ return false; }"href="?page=admin&crud=categorie&action=delete&id=<?php echo $menu[$i]["enfants"][$j]['id'] ?>"><i class="glyphicon glyphicon-trash"></i> </a>
          </td>
        </tr>
        <?php for($k=0;$k<count($menu[$i]["enfants"][$j]["enfants"]);$k++) { ?>
          <tr>
            <td style="padding: 8px 0 0 50px;">* <?php echo $menu[$i]["enfants"][$j]["enfants"][$k]["nom"]; ?></td> 
            <td> </td>
            <td>
              <a class="btn btn-success" href="?page=admin&crud=produits&action=list&id=<?php echo $menu[$i]["enfants"][$j]["enfants"][$k]['id']; ?>"><i class="glyphicon glyphicon-folder-open"></i> </a>
              <a class="btn btn-info" href="?page=admin&crud=categorie&action=read&id=<?php echo $menu[$i]["enfants"][$j]["enfants"][$k]['id']; ?>"><i class="fa fa-eye"></i> </a>
              <a class="btn btn-warning" href="?page=admin&crud=categorie&action=update&id=<?php echo $menu[$i]["enfants"][$j]["enfants"][$k]['id']; ?>"><i class="fa fa-pencil"></i> </a>
              <a class="btn btn-danger" onclick="if(!confirm('Voulez-vous vraiment supprimer la page : <?php echo $menu[$i]["enfants"][$j]["enfants"][$k]['nom']; ?> ?')){ return false; }"href="?page=admin&crud=categorie&action=delete&id=<?php echo $menu[$i]["enfants"][$j]["enfants"][$k]['id'] ?>"><i class="glyphicon glyphicon-trash"></i> </a>
            </td>
          </tr>
          <?php for($l=0;$l<count($menu[$i]["enfants"][$j]["enfants"][$k]["enfants"]);$l++) { ?>
            <tr>
              <td style="padding: 8px 0 0 75px;">+ <?php echo $menu[$i]["enfants"][$j]["enfants"][$k]["enfants"][$l]["nom"]; ?></td> 
              <td> </td>
              <td>
                <a class="btn btn-success" href="?page=admin&crud=produits&action=list&id=<?php echo $menu[$i]["enfants"][$j]["enfants"][$k]["enfants"][$l]['id'];?>"><i class="glyphicon glyphicon-folder-open"></i> </a>
                <a class="btn btn-info" href="?page=admin&crud=categorie&action=read&id=<?php echo $menu[$i]["enfants"][$j]["enfants"][$k]["enfants"][$l]['id']; ?>"><i class="fa fa-eye"></i> </a>
                <a class="btn btn-warning" href="?page=admin&crud=categorie&action=update&id=<?php echo $menu[$i]["enfants"][$j]["enfants"][$k]["enfants"][$l]['id']; ?>"><i class="fa fa-pencil"></i> </a>
                <a class="btn btn-danger" onclick="if(!confirm('Voulez-vous vraiment supprimer la page : <?php echo $menu[$i]["enfants"][$j]["enfants"][$k]["enfants"][$l]['nom']; ?> ?')){ return false; }"href="?page=admin&crud=categorie&action=delete&id=<?php echo $menu[$i]["enfants"][$j]["enfants"][$k]["enfants"][$l]['id'] ?>"><i class="glyphicon glyphicon-trash"></i> </a>
              </td>
            </tr>
                          
          <?php } 
        }
      }
    } ?>
         
  </table>
</div>
<div class="well">
  <a class="btn btn-info" href="?page=admin&crud=categorie&action=updatepage"><i class="glyphicon glyphicon-sort-by-attributes"></i> </a>
  <a class="btn btn-success" href="?page=admin&crud=categorie&action=create"><i class="fa fa-plus"></i> </a>
</div>