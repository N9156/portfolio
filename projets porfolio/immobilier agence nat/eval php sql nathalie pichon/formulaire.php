<?php
   require_once("inc/init.php");
   
   
   // LOGIQUE PHP
   
   
   
   if($_POST) {
   
       ////////////////////////////////////////////
       //////////// TRAITEMENT DE LA PHOTO ////////////////
       ////////////////////////////////////////////
   
       if(!empty($_FILES)){
           // Récupérer le nom de la photo
           $nomPhoto = $_POST["id_logement"] . "_" . $_FILES["photo"]["name"];
           // Enregistrer en BDD le chemin vers la photo
           $cheminPhotoPourBDD = URL . "photo/" . $nomPhoto;
           // Enregister/copier la photo sur le serveur
           // Fichier de destination à copier
           $dossier_pour_enregistrer_photo = RACINE_SITE . "photo/" . $nomPhoto;
   
           copy($_FILES["photo"]["tmp_name"], $dossier_pour_enregistrer_photo);
       }
   
       foreach($_POST as $indice=>$valeur){
           $_POST[$indice] = addslashes($valeur);
       }
   
   $count = $pdo->exec("INSERT INTO logement (titre, adresse, ville, cp, surface, 
   prix, photo, type, description)
   VALUES( '$_POST[titre]', '$_POST[adresse]', '$_POST[ville]', '$_POST[adresse]',
   '$_POST[cp]', '$_POST[surface]', '$_POST[prix]', '$cheminPhotoPourBDD' ,
   '$_POST[type]', '$_POST[description]' ) ");
   
   // Message de confirmation après ajout
   if($count >0 ){
       $content .= "<div class=\"alert alert-success\" role=\"alert\">
       Le logement " . $_POST["titre"] . " a bien été ajouté en base.
   </div>";
   }
}
   
   ////////////////////////////////////////////
   //////////// VARIABILISER LE CONTENU DU FORMULAIRE////////////////
   ////////////////////////////////////////////
   $id_logement = (isset($logement)) ? $logement["id_logement"] : "";
   $titre = (isset($logement)) ? $logement["titre"] : "";
   $adresse = (isset($logement)) ? $logement["adresse"] : "";
   $ville = (isset($logement)) ? $logement["ville"] : "";
   $cp = (isset($logement)) ? $logement["cp"] : "";
   $surface = (isset($logement)) ? $logement["surface"] : "";
   $prix = (isset($logement)) ? $logement["prix"] : "";
   $photo = (isset($logement)) ? $logement["photo"] : "";
   $type = (isset($logement)) ? $logement["prix"] : "";
   $description = (isset($logement)) ? $logement["description"] : "";
   
   
   
   require_once("inc/header.php");
   
   ?>
<!-- HTML -->
<!-- Formulaire d'ajout de logement -->
<div class="col-md-10">
   <form action="" method="POST" enctype="multipart/form-data">
      <input type="hidden" value="<?php echo $id_logement; ?>">
      <div class="form-row">
         <div class="form-group col-md-3">
            <label for="titre">Titre</label>
            <input type="text" class="form-control" id="titre" name="titre" value="<?php echo $titre; ?>">
         </div>
         <div class="form-group col-md-3">
            <label for="adresse">Adresse</label>
            <input type="text" class="form-control" id="adresse" name="adresse" value="<?php echo $adresse; ?>">
         </div>
         <div class="form-group col-md-3">
            <label for="ville">Ville</label>
            <input type="text" class="form-control" id="ville" name="ville" value="<?php echo $ville; ?>">
         </div>
         <div class="form-group col-md-3">
            <label for="cp">Code postal</label>
            <input type="text" class="form-control" id="cp" name="cpr" value="<?php echo $cp; ?>">
         </div>
         <div class="form-group col-md-3">
            <label for="surface">Surface</label>
            <input type="text" class="form-control" id="surface" name="surface" value="<?php echo $surface; ?>">
         </div>
         <div class="form-group col-md-3">
            <label for="prix">Prix</label>
            <input type="text" class="form-control" id="prix" name="prix" value="<?php echo $prix; ?>">
         </div>
         <div class="w-100"></div>
         <!-- FAIRE VARIABLED LE SELECTED DES INPUTS -->
         <div class="form-group col-md-2">
            <label for="type_l">Type</label>
            <div class="custom-control custom-radio">
               <input type="radio" id="type_l" name="type" class="custom-control-input" value="location" checked>
               <label class="custom-control-label" for="type_l">Location</label>
            </div>
         </div>
         <div class="form-group col-md-2">
            <label for="type_v" style="color:transparent">Type</label>
            <div class="custom-control custom-radio">
               <input type="radio" id="type_vente" name="type" class="custom-control-input" value="vente">
               <label class="custom-control-label" for="type_vente">Vente</label>
            </div>
         </div>
         <div class="custom-file mb-5">
            <input type="file" class="custom-file-input" id="photo" name="photo">
            <label class="custom-file-label" for="photo">Choisir une photo</label>
         </div>
         <div class="form-group col-md-12">
            <label for="description">Description</label>
            <input type="text" class="form-control" id="description" name="description" value="<?php echo $description; ?>">
         </div>
      </div>
      <button type="submit" class="btn btn-primary" name="ajouterLogement">Ajouter un logement</button>
   </form>
</div>
<?php
   require_once("inc/footer.php");
   
   ?>