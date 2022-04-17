<?php
include_once("_includes.php");
session_start();

$db = new DB();
$pdo = $db->getDB();

if(isset($_POST['login']) && isset($_POST['mdp'])){
    $typeConnection = detectLogin($_POST['login']);

    if($typeConnection == "nom"){
        // On récupère l'idabonné qui correspond, dans l'idéal on utilise un identifiant unique (login/email/tel/etc.)
        // Ici on cherche une personne par son nom (notre login) comme il peut y avoir des doublons, on ne cherche que dans les admins  
        $stmtId = $pdo->prepare("SELECT idabonne 
                                FROM abonne 
                                WHERE nom = :nom 
                                AND admin = 1");
        $stmtId->bindParam(':nom', $_POST['login']);
        $stmtId->execute();

        $resultatId = $stmtId->fetch();
    
        $idabonne = -1;
        if($resultatId != null){
            $idabonne = $resultatId['idabonne'];
        }
        

        $password = sha1(sha1($idabonne) . CONFIG['SLAT'] . $_POST['mdp']);

        $stmt = $pdo->prepare("SELECT count(*) as nb 
                                FROM abonne 
                                WHERE nom = :nom 
                                AND password = :password
                                AND admin = 1");
        $stmt->bindParam(':nom', $_POST['login']);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        $result = $stmt->fetch(); 
    }
    // sinon on utilise un numéro de téléphone pour se connecter
    else{
        $stmtId = $pdo->prepare("SELECT idabonne 
                                FROM abonne 
                                WHERE telephone = :telephone 
                                AND admin = 1");
        $stmtId->bindParam(':telephone', $_POST['login']);
        $stmtId->execute();

        $resultatId = $stmtId->fetch();
    
        $idabonne = -1;
        if($resultatId != null){
            $idabonne = $resultatId['idabonne'];
        }
        
        $password = sha1(sha1($idabonne) . CONFIG['SLAT'] . $_POST['mdp']);

        $stmt = $pdo->prepare("SELECT count(*) as nb 
                                FROM abonne 
                                WHERE telephone = :telephone 
                                AND password = :password
                                AND admin = 1");
        $stmt->bindParam(':telephone', $_POST['login']);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        $result = $stmt->fetch(); 
        

    }

    if($result['nb'] == 1){
        $_SESSION['admin'] = true;
        print_r($_SESSION);
        echo "vous êtes connecté";
        
        sleep(2);
        header('Location: bo.php');
    }
    else{
        echo "Erreur dans le login/mdp";
    }
}
else{
?>
<h1>Connexion</h1>
<form action="connexion.php" method="POST">
    <div>
        <label for="login">Login (nom/tel) :</label>
        <input type="text" id="login" name="login">
    </div>
    <div>
        <label for="mdp">Mot de passe :</label>
        <input type="password" id="mdp" name="mdp">
    </div>
    
    <input type="submit" value="Submit" />
</form>
<?php
}