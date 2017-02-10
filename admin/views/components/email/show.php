
<h1>email reçu de ( <?php echo $email->getSoci(); ?> ) </h1>
<div class="table-responsive">
<table class="table">
   
    <tr>
        <th>Prenom </th>
      <td><?php echo $email->getPrenom(); ?></td>
    </tr>
    
    <tr>
        <th>email </th>
        <td><?php echo $email->getemail(); ?></td>
    </tr>
     
     <tr>
        <th>Message </th>
      <td><?php echo $email->getMessage(); ?></td>
    </tr>
    
    <tr>
        <th>Socité </th>
      <td><?php echo $email->getSoci(); ?></td>
    </tr>
     
    

  
</table>
</div>
<div class="well">
    <a class="btn btn-primary" href="?page=admin&crud=email&action=list"><i class="fa fa-list"></i> </a>
    <a class="btn btn-danger" href="?page=admin&crud=email&action=delete&id=<?php echo $email->getId(); ?>"><i class="glyphicon glyphicon-trash
"></i> </a>
</div>