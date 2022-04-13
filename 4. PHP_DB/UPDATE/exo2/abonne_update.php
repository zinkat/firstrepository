<?php
require_once("../../config.php");

if(isset($_GET["nom"]) && isset($_GET["email"]) && isset($_GET["idadresse"]) && isset($_GET["idabonnement"])){
    $stmtUpdate = $pdo->prepare("UPDATE abonne SET 
                                nom = :nom, 
                                email = :email, 
                                idadresse = :idadresse, 
                                idabonnement = :idabonnement 
                                WHERE idabonne = :idabonne");

    $stmtUpdate->bindParam(':nom', $_GET["nom"]);
    $stmtUpdate->bindParam(':email', $_GET["email"]);
    $stmtUpdate->bindParam(':idadresse', $_GET["idadresse"]);
    $stmtUpdate->bindParam(':idabonnement', $_GET["idabonnement"]);
    $stmtUpdate->bindParam(':idabonne', $_GET["idabonne"]);
    $stmtUpdate->execute();
}

// On récupère les informations de l'abonné pour l'affichage
$stmtAbonne = $pdo->prepare("SELECT * FROM abonne 
                            INNER JOIN adresse ON abonne.idadresse = adresse.idadresse 
                            INNER JOIN abonnement ON abonne.idabonnement = abonnement.idabonnement 
                            WHERE idabonne = :idabonne");
$stmtAbonne->bindParam(':idabonne', $_GET["idabonne"]);
$stmtAbonne->execute();

$abonne = $stmtAbonne->fetch();

// On récupère la liste des abonnements pour le futur UPDATE
$stmtAbonnement = $pdo->prepare("SELECT * FROM abonnement");
$stmtAbonnement->execute();

// On récupère la liste des adresses (partielles pour l'instant, on verra en Ajax comment améliorer le système) pour le futur UPDATE
$stmtAdresse = $pdo->prepare("SELECT * FROM adresse LIMIT 25");
$stmtAdresse->execute();

?>

<form action="abonne_update.php" method="GET">
    <div>
        <input type="hidden" name="idabonne" value="<?php echo $abonne['idabonne']; ?>"/>
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" value="<?php echo utf8_encode($abonne["nom"]); ?>">
    </div>
    <div>
        <label for="email">Email :</label>
        <input type="email" id="email" name="email" value="<?php echo $abonne["email"]; ?>">
    </div>
        
    <div>
        <br/>
        <label for="idabonnement">Abonnement en cours : <i><?php echo $abonne["abonnement"] ." à ". $abonne["prix"] . "€"; ?></i></label><br/>
        Changer d'abonnement ?<br/>
        <select name="idabonnement">
        <?php
            $liste = "";
            foreach($stmtAbonnement->fetchAll() as $row){
                $liste .= "<option ";
                    // ajout de la valeur
                    $liste .= "value='".$row['idabonnement']."'";
                    // vérification de l'abonnement actuel et on le pré-sélectionne dans la liste déroulante
                    if($row['idabonnement'] == $abonne["idabonnement"]){
                        $liste .= " selected";
                    }
                $liste .= ">";
                $liste .= $row['abonnement'] ." | ".$row['prix']."€";
                $liste .= "</option>";
            }
            echo $liste;
        ?>
        </select>
    </div>
    
    <div>
        <br/>
        <label for="idadresse">Adresse actuelle : <i><?php echo utf8_encode($abonne['pays'] .", ".$abonne['ville'] .", ".$abonne['codepostal'] .", ".$abonne['adresse']); ?></i></label><br/>
        Changer d'adresse ?<br/>
        <select name="idadresse">
        <?php
            $liste = "";
            $adressePresenteDanslaListe = false;
            foreach($stmtAdresse->fetchAll() as $row){
                // $liste.="<option value='".$row['idadresse']."'>";
                $liste .= "<option ";
                    // ajout de la valeur
                    $liste .= "value='".$row['idadresse']."'";
                    if($row['idadresse'] == $abonne["idadresse"]){
                        $liste .= " selected";
                        // A cause de la limite des 25 adresse
                        $adressePresenteDanslaListe = true;
                    }
                $liste .= ">";
                $liste.= utf8_encode($row['pays'] .", ".$row['ville'] .", ".$row['codepostal'] .", ".$row['adresse']);
                $liste.= "</option>";
            }
            // Comme on n'affique que 25 adresses, il est possible que l'adresse actuelle ne soit pas dans la liste
            // Il faut donc 1) vérifier que l'adresse n'est pas dans la liste (on utilise la variable $adressePresenteDanslaListe)
            // 2) si elle n'y est pas l'ajouter
            // Note, une solution plus simple serait d'ajouter systématique l'adresse actuelle comme 1° adresse, le risque, elle apparaitra deux fois
            if($adressePresenteDanslaListe == false){
                $liste .= "<option value='".$abonne["idadresse"]."' selected>";
                $liste .= utf8_encode($abonne['pays'] .", ".$abonne['ville'] .", ".$abonne['codepostal'] .", ".$abonne['adresse']);                
                $liste .= "</option>";
            }
            echo $liste;
        ?>
        </select>
    </div>
    <input type="submit" value="Submit" />
</form>