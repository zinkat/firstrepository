<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



//$xml = simplexml_load_file("factures.xml");

//echo "<pre>". print_r($xml,1)."</pre>";

// CHargement du source XML
// function generateHTML(){
   
 
// $xml = new DOMDocument;
// $xml->load('factures.xml');

// $xsl = new DOMDocument;
// $xsl->load('factures.xsl');

// // Configuration du transformateur
// $proc = new XSLTProcessor;
// $proc->importStyleSheet($xsl); // attachement des règles xsl

// $proc->transformToURI($xml, 'file://C:\xampp\htdocs\coursPHP\TP1-06avril\out.html');
// $htmlcontent = file_get_contents('out.html');
// return $htmlcontent;
// }

//$xmlstr = '<<<XML' . '</br>';


function generateHTML(){
        
    $xmlstr =  strval(file_get_contents('factures.xml'));
    //$xmlstr = $xmlstr . 'XML;';
    
    
    //echo $xmlstr;
    
    $xml = new SimpleXMLElement($xmlstr);
    //echo $xml->factues;
    $dateEmission = $xml->facture->date_emission;
    $numero = $xml->facture->numero;
    $dateVente = $xml->facture->date_vente;
    $acheteurDenominationSociale = $xml->facture->acheteur->acheteur_denomination_sociale;
    $acheteurAdresse = $xml->facture->acheteur->acheteur_adresse;
    $vendeurStatut = $xml->facture->vendeur->vendeur_statut;
    $vendeurDenominationSociale = $xml->facture->vendeur->vendeur_denomination_sociale;
    $vendeurAdresse = $xml->facture->vendeur->vendeur_adresse;
    $vendeurNumeroRCS = $xml->facture->vendeur->vendeur_numero_rcs;
    $vendeurNumeroTva  = $xml->facture->vendeur->vendeur_numero_tva;
    $produitDesignation  = $xml->facture->produit->produit_designation;
    $produitPrix = $xml->facture->produit->produit_prix;
    $produitQuantite  = $xml->facture->produit->produit_quantite;
    $produitQuantiteUnite  = $xml->facture->produit->produit_quantite_unite;
    $tauxTVA  = $xml->facture->taux_tva;
    $sommeHT  = $xml->facture->somme_ht;
    $sommeTTC = $xml->facture->somme_ttc;
    ?>
    
    <?php ob_start(); ?>

    <table>
        <th></th>
        <th>N° Facture <?=$numero?></th>
    
        <tr>
          <th>Date emission  <?=$dateEmission?></th>
          <th>Date Vente  <?=$dateVente?></th>
        </tr>
        <tr>
        <td>Acheteur</td>
        <td><?=$acheteurDenominationSociale?></td>
        </tr>
        <tr>
            <td></td>
        <td><?=$acheteurAdresse?></td>
        </tr>
        <tr>
        <td>Vendeur</td>
        <td><?=$vendeurStatut?></td>
        </tr>
        <tr>
            <td></td>
        <td><?=$vendeurDenominationSociale?></td>
        </tr>
        <tr>
            <td></td>
        <td>RCS :<?=$vendeurNumeroRCS?></td>
        </tr>
        <tr>
            <td></td>
        <td>TVA :<?=$vendeurNumeroTva?></td>
        </tr>
    
        
        <tr>
            <td>Produit</td>
        <td><?=$produitDesignation?></td>
        </tr>
        <tr>
            <td></td>
        <td> Prix:<?=$produitPrix?></td>
        </tr>
        <tr>
            <td></td>
        <td>Quantite :<?=$produitQuantite?></td>
        </tr>
        <tr>
            <td> </td>
        <td> 5 <?=$produitQuantiteUnite?></td>
        </tr>
    
        <tr>
            <td>Total</td>
            
        <td>Tx TVA:<?=$tauxTVA?></td>
        </tr>
        <tr>
            <td></td>
        <td>Somme HT :<?=$sommeHT?></td>
        </tr>
        <tr>
            <td></td>
        <td> Somme TTC:<?=$sommeTTC?></td>
        </tr>
    
    
      </table>
      <?php $contents = ob_get_contents(); ?>
      <?php 
      return $contents;
}
$msg= generateHTML();
$msg;
//$msg = generateHTML();

//function generateFactureFrom($xml){
  
 //}

  require __DIR__.'/vendor/autoload.php';
 require_once ("/vendor/mpdf/mpdf/mpdf.php");

 use \vendor\spipu\html2pdf\html2pdf;
 
  $mpdf = new \vendor\mpdf\mpdf\mpdf();
  $mpdf->writeHTML('<h1>HelloWorld</h1>This is my first test');
  $mpdf->output();


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//require "/vendor/autoload.php";
require "../GET-Post/exo5/vendor/autoload.php";

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

        envoyerEmail("formationdiw2@gmail.com", "Facture", $msg);