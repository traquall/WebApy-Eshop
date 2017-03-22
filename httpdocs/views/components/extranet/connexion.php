<?php

namespace Noneslad\Controllers;
use Noneslad\Tools\WebTools;
require_once 'config.inc';
use Noneslad\Tools\HTML\html;
$html = new html();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />

<link 
<link href="assets/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
<script src="assets/scripts/back/jquery-1.11.2.min.js"></script>
 <script src="assets/scripts/back/app.js" type="text/javascript"></script>

<title>login spectasonic</title>
</head>
<body>
<div class="container">
      <?php
$retour = WebTools::getInFlashBag('Notice');
if ($retour) {
    $html->alert($retour);
}

?>
  <div id="loginbox" class="mainbox col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
    <div class="panel panel-default" >
      <div class="panel-heading">
        <div class="panel-title text-center">Administration</div>
      </div>
  
      <div class="panel-body" >
        <form name="form" id="form" action="" class="form-horizontal" enctype="multipart/form-data" method="POST">
          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input id="email"  name="email" placeholder="email" class="form-control">
          </div>
          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input id="password" type="password" name="password" placeholder="mot de passe"class="form-control" >
          </div>
          <div class="form-group"> 
            <!-- Button -->
            <div class="col-sm-12 controls">
              <button type="submit" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-log-in"></i> SE CONNECTER</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

</body>

</html>