<?php
ini_set("display_errors",1);
ini_set("display_startup_errors",1);
error_reporting(E_ALL);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require "exo5/vendor/autoload.php";

 $_POST["br-sapin"]." ".$_POST["pd-sapin"];

 envoyerEmail("formationdiw2@gmail.com", "Sapin", afficherSapin($_POST["br-sapin"]));
 echo afficherSapin($_POST["br-sapin"]);

function afficherSapin($niveausapin){
  
    $resultatHautSapin = "";
    $resultatBasSapin = "";
    $star = 1;
    for($i=1; $i<=$niveausapin; $i++){
        
            $spacevalue = $niveausapin-$i;
            $resultat = str_repeat('&nbsp; ',$spacevalue) . str_repeat("*",$star)."<br>";
            $star = $star+2;
            $resultatHautSapin.= $resultat;
    }
    $star = $star-2;
    $numbr=intval($star/2);
    $resultatBasSapin = $_POST["pd-sapin"] = str_repeat('&nbsp; ',$numbr) . "|"." "."|"." "."|";
    return $resultatHautSapin . $resultatBasSapin;
}

function envoyerEmail($destinataire, $sujet, $message){
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    
        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'formationdiw2@gmail.com';                     //SMTP username
            $mail->Password   = 'Zineb1982+';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
            //Recipients
            $mail->setFrom('formationdiw2@gmail.com', 'Mailer');
            $mail->addAddress($destinataire);
        
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $sujet;
            $mail->Body    = $message;
        
            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }    }

        // <?php
        // ini_set('display_errors', 1);
        // ini_set('display_startup_errors', 1);
        // error_reporting(E_ALL);
        
        // // $_GET["nb_marches"] = 0;
        // // require_once("../exo5b/result_escalier.php");
        
        // echo createSapin($_GET["hauteur"]);
        
        // // envoyerEmail("remi.formation@yahoo.com", "Sapin", createSapin($_GET["hauteur"]));
        
        // function createSapin($hauteur){
        //     $espace = "&nbsp;";
        //     $sapin = "";
        
        //     for($i=0; $i<$hauteur; $i++){
        //         $niveau = "*";
        
        //         for($y=0; $y<$i; $y++){
        //             $niveau = $niveau . "**";
        //         }
        
        //         // on ajoute les espaces pour centrer le niveau
        //         // le centre est égale à $hauteur/2 (comme le tronc)
        //         // mais il faut prendre en compte le nombre d'éléments du niveau (les feuilles)
        //         $nombreDeFeuilles = strlen($niveau);
        //         $longueurMax = ($hauteur*2);
        //         $dif = ($longueurMax-$nombreDeFeuilles);
        //         $nbEspaceAAjouter = ($dif-1)/2;
        //         echo "hauteur : ".$hauteur;
        //         echo " | longueur max : ".$longueurMax;
        //         echo " | nb feuilles : ".$nombreDeFeuilles;
        //         echo " | dif : ".$dif;
        //         echo " | espace à ajouter : ".$nbEspaceAAjouter;
        //         echo "<br/>";
        
        //         $espaceAAjouterStr = "";
        //         for($x=0; $x<$nbEspaceAAjouter; $x++){
        //             $espaceAAjouterStr = $espaceAAjouterStr . $espace;
        //         }
        
        //         // on ajout le niveau au sapin
        //         $sapin = $sapin . $espaceAAjouterStr . $niveau;
        //         // retour à la ligne pour le prochain niveau ou le tronc
        //         $sapin = $sapin . "<br/>";
        //     }
        
        //     // Ajout de l'espace
        //     for($i=0; $i < $hauteur-2; $i++){
        //         $sapin = $sapin . $espace;
        //     }
        //     $sapin = $sapin . "|||";
        //     return $sapin;
        // }
           