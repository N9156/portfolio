<?php

require_once("inc/init.php");


////////////////////////////////////////////
//////////// RÉCUPÉRATION DES logements À AFFICHER ////////////////
////////////////////////////////////////////

$r = $pdo->query("SELECT * FROM logement ");


// LOGIQUE PHP

require_once("inc/header.php");

?>

<div class="col-md-10">

    <?php echo $content; ?>

    <div class="table-responsive">
    <caption>Liste des logements</caption>
        <table class="table col-md-12">
        
            <thead class="thead-dark">
                <tr>

                    <!-- JE RÉCUPÈRE LE NOM DE MES COLONNES EN BDD -->
                    <!-- POUR GÉNÉRER LES TH DE MA TABLE HTML DYNAMIQUEMENT -->

                    <?php for($i=0; $i< $r->columnCount(); $i++ ) { ?>
                        <th> <?php echo $r->getColumnMeta($i)["name"]; ?> </th>
                    <?php } ?>

                    </tr>
            </thead>
            <tbody>

                <!-- JE FETCH DANS LE JEU DE RÉSULTAT DE MA REQUÊTE SQL (PDOSTATEMENT)-->
                
                <?php while($logement = $r->fetch(PDO::FETCH_ASSOC)) { ?>
                    
                    <tr>

                        <?php foreach($logement as $indice => $valeur) {
                            if($indice == "photo") { ?>
                                <td> <img class="img-fluid" style="width:40px" src="<?php echo $valeur; ?>">  </td>
                           <?php  } else{ ?>
                            <td> <?php echo $valeur;  ?>  </td>
                           <?php } ?>

                        <?php } ?>
                        </tr>
                    
                    <?php } ?>
    
                </tbody>
            </table>
    
        </div>
    




<!-- HTML -->



<?php

require_once("inc/footer.php");

?>