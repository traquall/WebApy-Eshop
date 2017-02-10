<?php
use Noneslad\Tools\WebTools;
use Noneslad\Tools\HTML\html;
$html = new html();
?>

<h1>Liste des pages Web !</h1>

<?php


$retour = WebTools::getInFlashBag('Notice');
if ($retour) {
    $html->alert($retour);
}

?>
<div class="table-responsive">
<table class="table">
 <select class="form-control" id="sel2" onchange="document.location.href='index.php?page=admin&crud=pageweb&langue='+this.value">
  <option value="1" <?php if($_SESSION["langue"]==1) echo "selected"; ?>>Français</option>
  <option value="2" <?php if($_SESSION["langue"]==2) echo "selected"; ?>>English</option>
</select>
    <tr>
        <th>Nom</th>
        <th>Balise Title</th>
        <th>Etat</th>
        <th>Actions</th>
    </tr>

  <?php 
    if($_SESSION["langue"]==1){ 
      $langue="getfr";
   } else
      $langue="geten";
           
  	  $menu = \Noneslad\Controllers\pagewebController::$langue();
 		for($i=0;$i<count($menu);$i++) {

  ?>
   <tr>
   <td><?php echo $menu[$i]["nom"]; ?></td> 
    
        
       <td><?php echo $menu[$i]["title"]; ?></td>
            <td><i class="<?php if( $menu[$i]["menu"] == 1)echo"glyphicon glyphicon-eye-open";else echo"glyphicon glyphicon-eye-close" ?>"></i></td>
           <td>
	 
   <a class="btn btn-info" href="?page=admin&crud=pageweb&action=read&id=<?php echo $menu[$i]['id']; ?>"><i class="fa fa-eye"></i> </a>
               <a class="btn btn-warning" href="?page=admin&crud=pageweb&action=update&id=<?php echo $menu[$i]['id']; ?>"><i class="fa fa-pencil"></i> </a>
               <a class="btn btn-danger" onclick="if(!confirm('Voulez-vous vraiment supprimer la page : <?php echo $menu[$i]['nom']; ?> ?')){ return false; }"href="?page=admin&crud=pageweb&action=delete&id=<?php echo $menu[$i]['id']; ?>"><i class="glyphicon glyphicon-trash
"></i> </a>
</td>
    
         
              
           
       </tr>
   
          
            <?php for($j=0;$j<count($menu[$i]["enfants"]);$j++) { ?>
            <tr>
            <td style="padding: 8px 0 0 25px; color:#ca9c33;">
               <?php echo $menu[$i]["enfants"][$j]["nom"]; ?>
               </td> 
                <td><?php echo $menu[$i]["enfants"][$j]["title"]; ?></td>
            <td><i class="<?php if( $menu[$i]["enfants"][$j]["menu"] == 1)echo"glyphicon glyphicon-eye-open";else echo"glyphicon glyphicon-eye-close" ?>"></i></td>
           </td>
    
        
        
               <td>
                <a class="btn btn-info" href="?page=admin&crud=pageweb&action=read&id=<?php echo $menu[$i]["enfants"][$j]['id']; ?>"><i class="fa fa-eye"></i> </a>
               <a class="btn btn-warning" href="?page=admin&crud=pageweb&action=update&id=<?php echo $menu[$i]["enfants"][$j]['id']; ?>"><i class="fa fa-pencil"></i> </a>
               <a class="btn btn-danger" onclick="if(!confirm('Voulez-vous vraiment supprimer la page : <?php echo $menu[$i]["enfants"][$j]['nom']; ?> ?')){ return false; }"href="?page=admin&crud=pageweb&action=delete&id=<?php echo $menu[$i]["enfants"][$j]['id'] ?>"><i class="glyphicon glyphicon-trash
"></i> </a>
               </td> 
            <?php } ?>
          
          </tr>
        <?php } ?>
       
</table>
</div>
<div class="well">
<a class="btn btn-info" href="?page=admin&crud=pageweb&action=updatepage"><i class="glyphicon glyphicon-sort-by-attributes"></i> </a>
    <a class="btn btn-success" href="?page=admin&crud=pageweb&action=create"><i class="fa fa-plus"></i> </a>
</div>