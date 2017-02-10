<div class="container">
<div class="blanc">
<img src="assets/img/logo-intro.png" class="img-responsive center-block" alt="logo"/>
<br/>
<br/>
<h1>L'accés à ce site est réservé aux personnes majeures.<br/>
<span>Access to site is restricted to people of legal drinking age.</span></h1>
<br/>
<br/>
<div class="row">
<div class="col-lg-2 col-xs-12 "></div>
  <div class="col-lg-4 col-sm-12 col-xs-12 "><a id="fr" class="age" href=""><p><img src="assets/img/drapeauFra.png"/>J'ai l'âge légal</p></a></div>
 <div class="col-lg-4 col-sm-12 col-xs-12 "><a id="en" class="age" href=""><p><img src="assets/img/drapeauEn.png"/>I confim I am of legal drinking age</p></a></div>
</div>
<h2>L'ABUS D'ALCOOL EST DANGEREUX POUR LA SANTÉ, A CONSOMMER AVEC MODÉRATION<br/>
ALCOHOL ABUSE IS DANGEROUS FOR YOUR HEALTH, PLEASE DRINK RESPONSIBLY</h2>
</div>
</div>
<script type="text/javascript">
$( document ).ready(function() {
  $(".age").click(function(){
  	var lang = $(this).attr("id");
  	if(lang=="fr"){ var idlang=1; }
  	if(lang=="en"){ var idlang=2; }
  	$.ajax({
  		type: 'POST',
	    url: '_ajax_age.php',
	    dataType: "json",
	    data : 'age=ok&langue='+idlang,
      	success: function(data) {
    		document.location.reload();
		}
	});
  });

});
</script>