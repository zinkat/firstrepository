<?php
class Facture{
	private $dateEmission;
	private $numero;
	private $dateVente;
	private $acheteurDenominationSociale;
	private $acheteurAdresse;
	private $vendeurStatut;
	private $vendeurDenominationSociale;
	private $vendeurAdresse;
	private $vendeurNumeroRCS;
	private $vendeurNumeroTva;
	private $produitDesignation;
	private $produitPrix;
	private $produitQuantite;
	private $produitQuantiteUnite;
	private $tauxTVA;
	private $sommeHT;
	private $sommeTTC;

	function __construct($dateEmission, $numero, $dateVente, $acheteurDenominationSociale, $acheteurAdresse, $vendeurStatut, $vendeurDenominationSociale, $vendeurAdresse, $vendeurNumeroRCS, $vendeurNumeroTva, $produitDesignation, $produitPrix, $produitQuantite, $produitQuantiteUnite, $tauxTVA, $sommeHT, $sommeTTC){
		$this->dateEmission = $dateEmission;
		$this->numero = $numero;
		$this->dateVente = $dateVente;
		$this->acheteurDenominationSociale = $acheteurDenominationSociale;
		$this->acheteurAdresse = $acheteurAdresse;
		$this->vendeurStatut = $vendeurStatut;
		$this->vendeurDenominationSociale = $vendeurDenominationSociale;
		$this->vendeurAdresse = $vendeurAdresse;
		$this->vendeurNumeroRCS = $vendeurNumeroRCS;
		$this->vendeurNumeroTva = $vendeurNumeroTva;
		$this->produitDesignation = $produitDesignation;
		$this->produitPrix = $produitPrix;
		$this->produitQuantite = $produitQuantite;
		$this->produitQuantiteUnite = $produitQuantiteUnite;
		$this->tauxTVA = $tauxTVA;
		$this->sommeHT = $sommeHT;
		$this->sommeTTC = $sommeTTC;
	}

    /**
     * This function takes an XML file and generates a PDF invoice from it
     * 
     * @param xml The XML file to be parsed.
     */
    public static function generateFactureFrom($xml){
       // Your code here
    }

    /**
     * It generates an HTML table from the data of the invoice.
     * 
     * @return The HTML code of the invoice.
     */
    public static function generateHTML(){
        
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
          
          <?php 
          return;
    }

    /**
     * @return mixed
     */
    public function getDateEmission()
    {
        return $this->dateEmission;
    }
    
    /**
     * @param mixed $dateEmission
     *
     * @return self
     */
    public function setDateEmission($dateEmission)
    {
        $this->dateEmission = $dateEmission;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @param mixed $numero
     *
     * @return self
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDateVente()
    {
        return $this->dateVente;
    }

    /**
     * @param mixed $dateVente
     *
     * @return self
     */
    public function setDateVente($dateVente)
    {
        $this->dateVente = $dateVente;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAcheteurDenominationSociale()
    {
        return $this->acheteurDenominationSociale;
    }

    /**
     * @param mixed $acheteurDenominationSociale
     *
     * @return self
     */
    public function setAcheteurDenominationSociale($acheteurDenominationSociale)
    {
        $this->acheteurDenominationSociale = $acheteurDenominationSociale;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAcheteurAdresse()
    {
        return $this->acheteurAdresse;
    }

    /**
     * @param mixed $acheteurAdresse
     *
     * @return self
     */
    public function setAcheteurAdresse($acheteurAdresse)
    {
        $this->acheteurAdresse = $acheteurAdresse;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getVendeurStatut()
    {
        return $this->vendeurStatut;
    }

    /**
     * @param mixed $vendeurStatut
     *
     * @return self
     */
    public function setVendeurStatut($vendeurStatut)
    {
        $this->vendeurStatut = $vendeurStatut;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getVendeurDenominationSociale()
    {
        return $this->vendeurDenominationSociale;
    }

    /**
     * @param mixed $vendeurDenominationSociale
     *
     * @return self
     */
    public function setVendeurDenominationSociale($vendeurDenominationSociale)
    {
        $this->vendeurDenominationSociale = $vendeurDenominationSociale;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getVendeurAdresse()
    {
        return $this->vendeurAdresse;
    }

    /**
     * @param mixed $vendeurAdresse
     *
     * @return self
     */
    public function setVendeurAdresse($vendeurAdresse)
    {
        $this->vendeurAdresse = $vendeurAdresse;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getVendeurNumeroRCS()
    {
        return $this->vendeurNumeroRCS;
    }

    /**
     * @param mixed $vendeurNumeroRCS
     *
     * @return self
     */
    public function setVendeurNumeroRCS($vendeurNumeroRCS)
    {
        $this->vendeurNumeroRCS = $vendeurNumeroRCS;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getVendeurNumeroTva()
    {
        return $this->vendeurNumeroTva;
    }

    /**
     * @param mixed $vendeurNumeroTva
     *
     * @return self
     */
    public function setVendeurNumeroTva($vendeurNumeroTva)
    {
        $this->vendeurNumeroTva = $vendeurNumeroTva;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getProduitDesignation()
    {
        return $this->produitDesignation;
    }

    /**
     * @param mixed $produitDesignation
     *
     * @return self
     */
    public function setProduitDesignation($produitDesignation)
    {
        $this->produitDesignation = $produitDesignation;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getProduitPrix()
    {
        return $this->produitPrix;
    }

    /**
     * @param mixed $produitPrix
     *
     * @return self
     */
    public function setProduitPrix($produitPrix)
    {
        $this->produitPrix = $produitPrix;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getProduitQuantite()
    {
        return $this->produitQuantite;
    }

    /**
     * @param mixed $produitQuantite
     *
     * @return self
     */
    public function setProduitQuantite($produitQuantite)
    {
        $this->produitQuantite = $produitQuantite;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getProduitQuantiteUnite()
    {
        return $this->produitQuantiteUnite;
    }

    /**
     * @param mixed $produitQuantiteUnite
     *
     * @return self
     */
    public function setProduitQuantiteUnite($produitQuantiteUnite)
    {
        $this->produitQuantiteUnite = $produitQuantiteUnite;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTauxTVA()
    {
        return $this->tauxTVA;
    }

    /**
     * @param mixed $tauxTVA
     *
     * @return self
     */
    public function setTauxTVA($tauxTVA)
    {
        $this->tauxTVA = $tauxTVA;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSommeHT()
    {
        return $this->sommeHT;
    }

    /**
     * @param mixed $sommeHT
     *
     * @return self
     */
    public function setSommeHT($sommeHT)
    {
        $this->sommeHT = $sommeHT;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSommeTTC()
    {
        return $this->sommeTTC;
    }

    /**
     * @param mixed $sommeTTC
     *
     * @return self
     */
    public function setSommeTTC($sommeTTC)
    {
        $this->sommeTTC = $sommeTTC;

        return $this;
    }
}


Facture::generateHTML();
Facture::getProduitDesignation();
