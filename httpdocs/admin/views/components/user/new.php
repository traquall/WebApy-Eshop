<h4>Ajouter un nouveau utilisateur</h4>

<hr>
<form action="?page=admin&crud=user&action=create" onsubmit="return validateForm()" name="formUser" method="post">
    <div class="form-group">
        <label for="nom">Nom</label>
        <input type="text" class="form-control" name="nom" id="inputNom" placeholder="Nom">
    </div>
    <div class="form-group">
        <label for="title">Prénom</label>
        <input type="text" class="form-control" name="prenom" id="inputPrenom" placeholder="Prénom">
    </div>
    <div class="form-group">
        <label for="title">Email</label>
        <input  type="email" class="form-control" name="email" id="inputEmail" placeholder="Email">
    </div>
    <div class="form-group">
        <label for="title">Mot de passe</label>
        <input type="text" class="form-control" name="password" id="inputPassword" placeholder="Password">
    </div>
     <div class="form-group">
        <label for="title">Retaper le mot de passe</label>
        <input type="text" class="form-control" name="passwordSecond" id="inputPasswordSecond" placeholder="Retaper le mot de passe">
    </div>
    <button type="submit" class="btn btn-default"><i class="fa fa-save"></i> Enregistrer</button>
</form>
<div class="well">
    <a class="btn btn-primary" href="?page=admin&crud=user&action=list"><i class="fa fa-list"></i> </a>
</div>
<script type="text/javascript">
   function validateForm() {
    var N = document.forms["formUser"]["passwordSecond"].value;
    var p = document.forms["formUser"]["password"].value;
    if (N == null || N == "" || p == null || p == "" ) {
        alert("Veuillez saisir un mot de passe");
        return false;
    }
     if (N != p) {
        alert("Veuillez Retaperer le méme mot de passe");
        return false;
    }
}


</script>
