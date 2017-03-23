<form action="?page=admin&crud=produits&action=create" enctype="multipart/form-data" onsubmit="return validateForm()"  method="post">
  <div class="well">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#information" data-toggle="tab">Informations</a></li>
      <li><a href="#referencement" data-toggle="tab">Référencement - SEO</a></li>
      <li><a href="#prix" data-toggle="tab">Prix</a></li>
      <li><a href="#quantite" data-toggle="tab">Quantités</a></li>
      <li><a href="#image" data-toggle="tab">Images</a></li>
      <li><a href="#pdf" data-toggle="tab">PDF</a></li>
      <li><a href="#fournisseur" data-toggle="tab">fournisseur</a></li>
    </ul>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="information">
        <div class="form-group">
          <label for="sel1">Langue</label>
          <select class="form-control" id="sel1" name="id_lang" onchange="document.location.href='index.php?page=admin&crud=produits&action=create&langue='+this.value">
            <option value="1" <?php if($_SESSION["langue"]==1) echo "selected"; ?>>Français</option>
            <option value="2" <?php if($_SESSION["langue"]==2) echo "selected"; ?>>English</option>
          </select>
        </div>
        <div class="form-group">
          <label for="nom">Nom: </label>
          <input class="form-control"type="text" name="nom" id="nom">
        </div>
        <br>
        <div class="form-group">
          <label for="sel1">Catégorie</label>
          <select multiple class="form-control" name="id_cat[]" style="height:145px">
            <?php
              if($_SESSION["langue"]==1)
                $langue="getfr";
              else
                $langue="geten";

              $menu = \Noneslad\Controllers\categorieController::$langue();
              for($i=0;$i<count($menu);$i++) {
                $ids=$menu[$i]["id"];
                $select="";
                $idget=$_GET['id'];
                if($idget==$ids){
                  $select="selected";
                } 
            ?>
              <option value="<?php echo $menu[$i]["id"]; ?>" <?php echo $select; ?>><?php echo $menu[$i]["nom"]; ?></option>
              <?php
                for($j=0;$j<count($menu[$i]["enfants"]);$j++) {
                  $selec="";
                  $idcats= $menu[$i]["enfants"][$j]["id"];
                  if( $_GET['id']==$idcats){
                    $selec="selected";
                  } 
              ?>
                <option value="<?php echo $menu[$i]["enfants"][$j]["id"]; ?>"<?php echo  $selec; ?>>- <?php echo $menu[$i]["enfants"][$j]["nom"]; ?></option>
                <?php
                  for($k=0;$k<count($menu[$i]["enfants"][$j]["enfants"]);$k++) { $idcat= $menu[$i]["enfants"][$j]["enfants"][$k]["id"];
                    $selects="";
                    if( $_GET['id']==$idcat){
                      $selects="selected";
                    } 
                ?>
                  <option value="<?php  echo $menu[$i]["enfants"][$j]["enfants"][$k]["id"];  ?>" <?php echo  $selects; ?>>&nbsp;&nbsp;&nbsp;* <?php  echo $menu[$i]["enfants"][$j]["enfants"][$k]["nom"]; ?></option>
                  <?php
                    for($l=0;$l<count($menu[$i]["enfants"][$j]["enfants"][$k]["enfants"]);$l++) { $idscat= $menu[$i]["enfants"][$j]["enfants"][$k]["enfants"][$l]["id"];
                      $selectss="";
                      if( $_GET['id']==$idscat){
                        $selects="selected";
                      } 
                  ?>
                    <option value="<?php  echo $menu[$i]["enfants"][$j]["enfants"][$k]["enfants"][$l]["id"];  ?>" <?php echo  $selects; ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;> <?php  echo $menu[$i]["enfants"][$j]["enfants"][$k]["enfants"][$l]["nom"]; ?></option>
                    <?php 
                  } 
                } 
              } 
            } ?>
          </select>
        </div>

        <div class="form-group">
            <label for="type">Type de document</label>
            <select class="form-control" name="cat">
              <option value="0">Aucun</option>
              <option value="2">Images</option>
            </select>
        </div>

        <div class="form-group">
          <label for="Document">Document</label>
          <input type="file" class="form-control" name="fichier">
        </div>
        <br>
        <div class="form-group">
          <label for="reference">reference : </label>
          <input class="form-control" type="text" name="reference" id="reference" value="">
        </div>
        <br>
        <div class="form-group">
          <label for="code-barre">Code-barres: </label>
          <input class="form-control"type="text" name="code_barre" id="code_barre" value="">
        </div>
        <br>
        <div class="form-group">
          <label for="actif">Activé : </label>
          <select class="form-control" name="actif">
            <option value="1">Oui</option>
            <option value="2">Non</option>
          </select>
        </div>
        <br>
        <div class="form-group">
          <label for="etat">Etats : </label>
          <select class="form-control" id="etat" name="etat" onchange="document.location.href='index.php?page=admin&crud=produits&action=create&langue='+this.value">
            <option value="1" <?php if($_SESSION["langue"]==1) echo "selected"; ?>>nouveau</option>
            <option value="2" <?php if($_SESSION["langue"]==2) echo "selected"; ?>>occasion</option>
          </select>
        </div>
        <div class="form-group">
            <label for="resume">Resumé</label>
            <textarea name="resume" id="resume" rows="10" value=""></textarea>
            <script>
              CKEDITOR.replace('resume',{
                   filebrowserBrowseUrl:     'assets/plugins/back/ckfinder/ckfinder.html',
                  filebrowserImageBrowseUrl: 'assets/plugins/back/ckfinder/ckfinder.html?type=Images',
                  filebrowserFlashBrowseUrl: 'assets/plugins/back/ckfinder/ckfinder.html?type=Flash',
                  filebrowserUploadUrl:      'assets/plugins/back/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                  filebrowserImageUploadUrl: 'assets/plugins/back/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                  filebrowserFlashUploadUrl: 'assets/plugins/back/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
              });
            </script>
        </div>

        <div class="form-group">
            <label for="description">description</label>
            <textarea name="description" id="description" rows="10" value=""></textarea>
            <script>
              CKEDITOR.replace('description',{
                   filebrowserBrowseUrl:     'assets/plugins/back/ckfinder/ckfinder.html',
                  filebrowserImageBrowseUrl: 'assets/plugins/back/ckfinder/ckfinder.html?type=Images',
                  filebrowserFlashBrowseUrl: 'assets/plugins/back/ckfinder/ckfinder.html?type=Flash',
                  filebrowserUploadUrl:      'assets/plugins/back/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                  filebrowserImageUploadUrl: 'assets/plugins/back/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                  filebrowserFlashUploadUrl: 'assets/plugins/back/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
              });
            </script>
        </div>
      </div>
        <div class="tab-pane fade" id="referencement">
          <div class="form-group">
            <label for="balise_titre">Balise Titre : </label>
            <input class="form-control" type="text" name="balise_titre" id="balise_titre" value="">
          </div>
          <br>
          <div class="form-group">
            <label for="meta_desc">Meta description : </label>
            <input class="form-control" type="text" name="meta_desc" id="meta_desc" value="">
          </div>
        </div>
        <div class="tab-pane fade" id="prix">
          <div class="form-group">
            <label for="prix_ht">Prix HT : </label>
            <input class="form-control" type="text" name="prix_ht" id="prix_ht" value="">
          </div>
          <br>
          <div class="form-group">
            <label for="prix_ttc">Prix TTC : </label>
            <input class="form-control" type="text" name="prix_ttc" id="prix_ttc" value="">
          </div>
          <br>
          <div class="form-group">
            <label for="prix_achat">Prix d'achat </label>
            <input class="form-control" type="text" name="prix_achat" id="prix_achat" value="">
          </div>
          <br>
          <div class="form-group">
            <label for="taxe">taxe (20%) </label>
            <select class="form-control" name="taxe" id="taxe">
        			<option value="0">Aucune taxe</option>
							<option value="66">ES Books Rate (4%)</option>
							<option value="65">ES Foodstuff Rate (4%)</option>
							<option value="63">ES Reduced Rate (10%)</option>
							<option value="62">ES Standard rate (21%)</option>
							<option value="64">ES Super Reduced Rate (4%)</option>
							<option value="2">FR Taux réduit (10%)</option>
							<option value="3">FR Taux réduit (5.5%)</option>
							<option value="1" selected="selected">FR Taux standard (20%)</option>
							<option value="4">FR Taux super réduit (2.1%)</option>
							<option value="61">IT Books Rate (4%)</option>
							<option value="60">IT Foodstuff Rate (4%)</option>
							<option value="58">IT Reduced Rate (10%)</option>
							<option value="57">IT Standard Rate (22%)</option>
							<option value="59">IT Super Reduced Rate (4%)</option>
							<option value="6">US-AK Rate (0%)</option>
							<option value="5">US-AL Rate (4%)</option>
							<option value="8">US-AR Rate (6%)</option>
							<option value="7">US-AZ Rate (6.6%)</option>
							<option value="9">US-CA Rate (8.25%)</option>
							<option value="10">US-CO Rate (2.9%)</option>
							<option value="11">US-CT Rate (0%)</option>
							<option value="56">US-DC Rate (6%)</option>
							<option value="12">US-DE Rate (0%)</option>
							<option value="13">US-FL Rate (6%)</option>
							<option value="14">US-GA Rate (4%)</option>
							<option value="15">US-HI Rate (4%)</option>
							<option value="19">US-IA Rate (6%)</option>
							<option value="16">US-ID Rate (6%)</option>
							<option value="17">US-IL Rate (6.25%)</option>
							<option value="18">US-IN Rate (7%)</option>
							<option value="20">US-KS Rate (5.3%)</option>
							<option value="21">US-KY Rate (6%)</option>
							<option value="22">US-LA Rate (4%)</option>
							<option value="25">US-MA Rate (6.25%)</option>
							<option value="24">US-MD Rate (6%)</option>
							<option value="23">US-ME Rate (5%)</option>
							<option value="26">US-MI Rate (6%)</option>
							<option value="27">US-MN Rate (6.875%)</option>
							<option value="29">US-MO Rate (4.225%)</option>
							<option value="28">US-MS Rate (7%)</option>
							<option value="30">US-MT Rate (0%)</option>
							<option value="37">US-NC Rate (5.5%)</option>
							<option value="38">US-ND Rate (5%)</option>
							<option value="31">US-NE Rate (5.5%)</option>
							<option value="33">US-NH Rate (0%)</option>
							<option value="34">US-NJ Rate (7%)</option>
							<option value="35">US-NM Rate (5.125%)</option>
							<option value="32">US-NV Rate (6.85%)</option>
							<option value="36">US-NY Rate (4%)</option>
							<option value="39">US-OH Rate (5.5%)</option>
							<option value="40">US-OK Rate (4.5%)</option>
							<option value="41">US-OR Rate (0%)</option>
							<option value="42">US-PA Rate (6%)</option>
							<option value="55">US-PR Rate (5.5%)</option>
							<option value="43">US-RI Rate (7%)</option>
							<option value="44">US-SC Rate (6%)</option>
							<option value="45">US-SD Rate (4%)</option>
							<option value="46">US-TN Rate (7%)</option>
							<option value="47">US-TX Rate (6.25%)</option>
							<option value="48">US-UT Rate (4.75%)</option>
							<option value="50">US-VA Rate (4%)</option>
							<option value="49">US-VT Rate (6%)</option>
							<option value="51">US-WA Rate (6.5%)</option>
							<option value="53">US-WI Rate (5%)</option>
							<option value="52">US-WV Rate (6%)</option>
        			<option value="54">US-WY Rate (4%)</option>
						</select>
          </div>
          <br>
        </div>
        <div class="tab-pane fade" id="quantite">
          <div class="form-group">
            <label for="taxe">Quantités </label>
            <input class="form-control" type="number" name="quantite" value="">
          </div>
        </div>
        <div class="tab-pane fade" id="image">
          <div class="form-group">
            <label for="image">Choisissez une image</label>
            <input type="file" class="form-control" name="image">
          </div>
        </div>
        <div class="tab-pane fade" id="pdf">
          <div class="form-group">
            <label for="pdf">Choisissez un PDF</label>
            <input type="file" class="form-control" name="pdf">
          </div>
        </div>
        <div class="tab-pane fade" id="fournisseur">
          <div class="form-group">
            <label for="fournisseur">Fournisseur</label>
            <input type="text" class="form-control" name="fournisseur">
          </div>
        </div>
      </div>
    </div>
  </div>
  <button type="submit"  class="btn btn-default"><i class="fa fa-save"></i> Enregistrer</button>
</form>
<div class="well">
    <a class="btn btn-primary" href="?page=admin&crud=categorie"><i class="fa fa-list"></i> </a>
    <a class="btn btn-success" href="?page=admin&crud=produits&action=list&id=<?php echo $_GET["id_cat"] ?>"><i class="glyphicon glyphicon-folder-open"></i> </a>
</div>
