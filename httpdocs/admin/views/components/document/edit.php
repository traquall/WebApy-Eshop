<?php
namespace Noneslad\Controllers;
?>
<h1>Modification du document <?php echo $document->getNom(); ?> !</h1>
<form action="?page=admin&crud=document&action=update&id=<?php echo $document->getId(); ?>"  onsubmit="return validateForm()" enctype="multipart/form-data" name="formPage" method="post">
<div class="form-group" style="display:none">
        <label for="sel1">Langue</label>
       <select class="form-control" id="sel1" name="id_lang">
        <option value="1">Français</option>
         <option value="2"<?php if ($formData['id_lang']==2)echo "selected"; ?> >Anglais</option>
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
                  <select class="form-control" id="etat" name="etat" onchange="document.location.href='index.php?page=admin&crud=document&action=create&langue='+this.value">

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


               <form action="?page=admin&crud=document&action=create" enctype="multipart/form-data" onsubmit="return validateForm()"  method="post">


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
                  											<option value="66">
                  					ES Books Rate (4%)
                  						</option>
                  											<option value="65">
                  					ES Foodstuff Rate (4%)
                  						</option>
                  											<option value="63">
                  					ES Reduced Rate (10%)
                  						</option>
                  											<option value="62">
                  					ES Standard rate (21%)
                  						</option>
                  											<option value="64">
                  					ES Super Reduced Rate (4%)
                  						</option>
                  											<option value="2">
                  					FR Taux réduit (10%)
                  						</option>
                  											<option value="3">
                  					FR Taux réduit (5.5%)
                  						</option>
                  											<option value="1" selected="selected">
                  					FR Taux standard (20%)
                  						</option>
                  											<option value="4">
                  					FR Taux super réduit (2.1%)
                  						</option>
                  											<option value="61">
                  					IT Books Rate (4%)
                  						</option>
                  											<option value="60">
                  					IT Foodstuff Rate (4%)
                  						</option>
                  											<option value="58">
                  					IT Reduced Rate (10%)
                  						</option>
                  											<option value="57">
                  					IT Standard Rate (22%)
                  						</option>
                  											<option value="59">
                  					IT Super Reduced Rate (4%)
                  						</option>
                  											<option value="6">
                  					US-AK Rate (0%)
                  						</option>
                  											<option value="5">
                  					US-AL Rate (4%)
                  						</option>
                  											<option value="8">
                  					US-AR Rate (6%)
                  						</option>
                  											<option value="7">
                  					US-AZ Rate (6.6%)
                  						</option>
                  											<option value="9">
                  					US-CA Rate (8.25%)
                  						</option>
                  											<option value="10">
                  					US-CO Rate (2.9%)
                  						</option>
                  											<option value="11">
                  					US-CT Rate (0%)
                  						</option>
                  											<option value="56">
                  					US-DC Rate (6%)
                  						</option>
                  											<option value="12">
                  					US-DE Rate (0%)
                  						</option>
                  											<option value="13">
                  					US-FL Rate (6%)
                  						</option>
                  											<option value="14">
                  					US-GA Rate (4%)
                  						</option>
                  											<option value="15">
                  					US-HI Rate (4%)
                  						</option>
                  											<option value="19">
                  					US-IA Rate (6%)
                  						</option>
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
                  <select class="form-control" id="etat" name="etat" onchange="document.location.href='index.php?page=admin&crud=document&action=create&langue='+this.value">

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


               <form action="?page=admin&crud=document&action=create" enctype="multipart/form-data" onsubmit="return validateForm()"  method="post">


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
                  											<option value="66">
                  					ES Books Rate (4%)
                  						</option>
                  											<option value="65">
                  					ES Foodstuff Rate (4%)
                  						</option>
                  											<option value="63">
                  					ES Reduced Rate (10%)
                  						</option>
                  											<option value="62">
                  					ES Standard rate (21%)
                  						</option>
                  											<option value="64">
                  					ES Super Reduced Rate (4%)
                  						</option>
                  											<option value="2">
                  					FR Taux réduit (10%)
                  						</option>
                  											<option value="3">
                  					FR Taux réduit (5.5%)
                  						</option>
                  											<option value="1" selected="selected">
                  					FR Taux standard (20%)
                  						</option>
                  											<option value="4">
                  					FR Taux super réduit (2.1%)
                  						</option>
                  											<option value="61">
                  					IT Books Rate (4%)
                  						</option>
                  											<option value="60">
                  					IT Foodstuff Rate (4%)
                  						</option>
                  											<option value="58">
                  					IT Reduced Rate (10%)
                  						</option>
                  											<option value="57">
                  					IT Standard Rate (22%)
                  						</option>
                  											<option value="59">
                  					IT Super Reduced Rate (4%)
                  						</option>
                  											<option value="6">
                  					US-AK Rate (0%)
                  						</option>
                  											<option value="5">
                  					US-AL Rate (4%)
                  						</option>
                  											<option value="8">
                  					US-AR Rate (6%)
                  						</option>
                  											<option value="7">
                  					US-AZ Rate (6.6%)
                  						</option>
                  											<option value="9">
                  					US-CA Rate (8.25%)
                  						</option>
                  											<option value="10">
                  					US-CO Rate (2.9%)
                  						</option>
                  											<option value="11">
                  					US-CT Rate (0%)
                  						</option>
                  											<option value="56">
                  					US-DC Rate (6%)
                  						</option>
                  											<option value="12">
                  					US-DE Rate (0%)
                  						</option>
                  											<option value="13">
                  					US-FL Rate (6%)
                  						</option>
                  											<option value="14">
                  					US-GA Rate (4%)
                  						</option>
                  											<option value="15">
                  					US-HI Rate (4%)
                  						</option>
                  											<option value="16">
                  					US-ID Rate (6%)
                  						</option>
                  											<option value="17">
                  					US-IL Rate (6.25%)
                  						</option>
                  											<option value="18">
                  					US-IN Rate (7%)
                  						</option>
                  											<option value="20">
                  					US-KS Rate (5.3%)
                  						</option>
                  											<option value="21">
                  					US-KY Rate (6%)
                  						</option>
                  											<option value="22">
                  					US-LA Rate (4%)
                  						</option>
                  											<option value="25">
                  					US-MA Rate (6.25%)
                  						</option>
                  											<option value="24">
                  					US-MD Rate (6%)
                  						</option>
                  											<option value="23">
                  					US-ME Rate (5%)
                  						</option>
                  											<option value="26">
                  					US-MI Rate (6%)
                  						</option>
                  											<option value="27">
                  					US-MN Rate (6.875%)
                  						</option>
                  											<option value="29">
                  					US-MO Rate (4.225%)
                  						</option>
                  											<option value="28">
                  					US-MS Rate (7%)
                  						</option>
                  											<option value="30">
                  					US-MT Rate (0%)
                  						</option>
                  											<option value="37">
                  					US-NC Rate (5.5%)
                  						</option>
                  											<option value="38">
                  					US-ND Rate (5%)
                          </op  <div class="form-group">
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
                  <select class="form-control" id="etat" name="etat" onchange="document.location.href='index.php?page=admin&crud=document&action=create&langue='+this.value">

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


               <form action="?page=admin&crud=document&action=create" enctype="multipart/form-data" onsubmit="return validateForm()"  method="post">


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
                  											<option value="66">
                  					ES Books Rate (4%)
                  						</option>
                  											<option value="65">
                  					ES Foodstuff Rate (4%)
                  						</option>
                  											<option value="63">
                  					ES Reduced Rate (10%)
                  						</option>
                  											<option value="62">
                  					ES Standard rate (21%)
                  						</option>
                  											<option value="64">
                  					ES Super Reduced Rate (4%)
                  						</option>
                  											<option value="2">
                  					FR Taux réduit (10%)
                  						</option>
                  											<option value="3">
                  					FR Taux réduit (5.5%)
                  						</option>
                  											<option value="1" selected="selected">
                  					FR Taux standard (20%)
                  						</option>
                  											<option value="4">
                  					FR Taux super réduit (2.1%)
                  						</option>
                  											<option value="61">
                  					IT Books Rate (4%)
                  						</option>
                  											<option value="60">
                  					IT Foodstuff Rate (4%)
                  						</option>
                  											<option value="58">
                  					IT Reduced Rate (10%)
                  						</option>
                  											<option value="57">
                  					IT Standard Rate (22%)
                  						</option>
                  											<option value="59">
                  					IT Super Reduced Rate (4%)
                  						</option>
                  											<option value="6">
                  					US-AK Rate (0%)
                  						</option>
                  											<option value="5">
                  					US-AL Rate (4%)
                  						</option>
                  											<option value="8">
                  					US-AR Rate (6%)
                  						</option>
                  											<option value="7">
                  					US-AZ Rate (6.6%)
                  						</option>
                  											<option value="9">
                  					US-CA Rate (8.25%)
                  						</option>
                  											<option value="10">
                  					US-CO Rate (2.9%)
                  						</option>
                  											<option value="11">
                  					US-CT Rate (0%)
                  						</option>
                  											<option value="56">
                  					US-DC Rate (6%)
                  						</option>
                  											<option value="12">
                  					US-DE Rate (0%)
                  						</option>
                  											<option value="13">
                  					US-FL Rate (6%)
                  						</option>
                  											<option value="14">
                  					US-GA Rate (4%)
                  						</option>
                  											<option value="15">
                  					US-HI Rate (4%)
                  						</option>
                  												<option value="33">
                  					US-NH Rate (0%)
                  						</option>
                  											<option value="34">
                  					US-NJ Rate (7%)
                  						</option>
                  											<option value="35">
                  					US-NM Rate (5.125%)
                  						</option>
                  											<option value="32">
                  					US-NV Rate (6.85%)
                  						</option>
                  											<option value="36">
                  					US-NY Rate (4%)
                  						</option>
                  											<option value="39">
                  					US-OH Rate (5.5%)
                  						</option>
                  											<option value="40">
                  					US-OK Rate (4.5%)
                  						</option>
                  											<option value="41">
                  					US-OR Rate (0%)
                  						</option>
                  											<option value="42">
                  					US-PA Rate (6%)
                  						</option>
                  											<option value="55">
                  					US-PR Rate (5.5%)
                  						</option>
                  											<option value="43">
                  					US-RI Rate (7%)
                  						</option>
                  											<option value="44">
                  					US-SC Rate (6%)
                  						</option>
                  											<option value="45">
                  					US-SD Rate (4%)
                  						</option>
                  											<option value="46">
                  					US-TN Rate (7%)
                  						</option>
                  											<option value="47">
                  					US-TX Rate (6.25%)
                  						</option>
                  											<option value="48">
                  					US-UT Rate (4.75%)
                  						</option>
                  											<option value="50">
                  					US-VA Rate (4%)
                  						</option>
                  											<option value="49">
                  					US-VT Rate (6%)
                  						</option>
                  											<option value="51">
                  					US-WA Rate (6.5%)
                  						</option>
                  											<option value="53">
                  					US-WI Rate (5%)
                  						</option>
                  											<option value="52">
                  					US-WV Rate (6%)
                  						</option>
                  											<option value="54">
                  					US-WY Rate (4%)
                  						</option>
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


    <div class="form-group">
      <label for="sel1">Catégorie</label>
      <select multiple class="form-control" name="id_cat[]" style="height:145px">
        <?php // On récupère les catégories sélectionnées
        $idDoc = $document->getId();
        $catSel = \Noneslad\Controllers\docController::getCatDoc($idDoc);
        if($_SESSION["langue"]==1)
          $langue="getfr";
        else
          $langue="geten";

        $menu = \Noneslad\Controllers\categorieController::$langue();
        for($i=0;$i<count($menu);$i++) {
          $ids=$menu[$i]["id"];
          $select="";
          if(\Noneslad\Controllers\docController::rec_in_array($ids,$catSel)){
            $select="selected";
          } ?>
          <option value="<?php echo $menu[$i]["id"]; ?>" <?php echo $select; ?>><?php echo $menu[$i]["nom"]; ?></option>
          <?php
          for($j=0;$j<count($menu[$i]["enfants"]);$j++) {
            $selec="";
            $idcats= $menu[$i]["enfants"][$j]["id"];
            if(\Noneslad\Controllers\docController::rec_in_array($idcats,$catSel)){
              $selec="selected";
            } ?>
            <option value="<?php echo $menu[$i]["enfants"][$j]["id"]; ?>"<?php echo  $selec; ?>>- <?php echo $menu[$i]["enfants"][$j]["nom"]; ?></option>
            <?php
            for($k=0;$k<count($menu[$i]["enfants"][$j]["enfants"]);$k++) { $idcat= $menu[$i]["enfants"][$j]["enfants"][$k]["id"];
              $selects="";
              $idcats2= $menu[$i]["enfants"][$j]["enfants"][$k]["id"];
              if(\Noneslad\Controllers\docController::rec_in_array($idcats2,$catSel)){
                $selects="selected";
              } ?>
              <option value="<?php  echo $menu[$i]["enfants"][$j]["enfants"][$k]["id"];  ?>" <?php echo  $selects; ?>>&nbsp;&nbsp;&nbsp;* <?php  echo $menu[$i]["enfants"][$j]["enfants"][$k]["nom"]; ?></option>
              <?php
              for($l=0;$l<count($menu[$i]["enfants"][$j]["enfants"][$k]["enfants"]);$l++) {
                $idscat= $menu[$i]["enfants"][$j]["enfants"][$k]["enfants"][$l]["id"];
                $selectss="";
                if(\Noneslad\Controllers\docController::rec_in_array($idscat,$catSel)){
                  $selectss="selected";
                } ?>
                <option value="<?php  echo $menu[$i]["enfants"][$j]["enfants"][$k]["enfants"][$l]["id"];  ?>" <?php echo  $selectss; ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;> <?php  echo $menu[$i]["enfants"][$j]["enfants"][$k]["enfants"][$l]["nom"]; ?></option>
              <?php } ?>
            <?php } ?>
          <?php } ?>
        <?php } ?>
      </select>
    </div>
    <div class="form-group">
        <label for="type">Type de document</label>
        <select class="form-control" name="cat">
          <option value="0">Aucun</option>
          <option value="1"<?php if ($formData['cat']==1)echo "selected"; ?>>Fiches d&eacute;gustations Fiches techniques</option>
          <option value="2"<?php if ($formData['cat']==2)echo "selected"; ?>>Images</option>
          <option value="3"<?php if ($formData['cat']==3)echo "selected"; ?>>Mat&eacute;riel Publicitaire</option>
          <option value="4"<?php if ($formData['cat']==4)echo "selected"; ?>>Plaquettes et argumentaires</option>
        </select>
    </div>

     <div class="form-group">
            <label for="image">Document</label>
            <input type="file"  class="form-control" name="fichier">
        </div>



<div class="well">
    <button type="submit" onClick="ConfirmMessage()" class="btn btn-success"><i class="fa fa-save"></i></button>
    <a class="btn btn-primary" href="?page=admin&crud=categorie"><i class="fa fa-list"></i> </a>
    <a class="btn btn-success" href="?page=admin&crud=document&action=list&id=<?php echo $_GET["id_cat"] ?>"><i class="glyphicon glyphicon-folder-open
"></i> </a>
    <a class="btn btn-danger" onclick="if(!confirm('Voulez-vous vraiment supprimer la page : <?php echo $formData['nom'] ?> ?')){ return false; }" href="?page=admin&crud=document&action=delete&id=<?php echo $document->getId(); ?>"><i class="glyphicon glyphicon-trash
"></i> </a>
</div>
</form>
<SCRIPT language=javascript>
function validateForm() {
    var N = documentument.forms["formPage"]["id_cat[]"].value;

    if (N == null || N == "") {
        alert("Veuillez choisir une catégorie ");
        return false;
    }

}
</SCRIPT>
