<?php
require_once("animal.php");

class Chat extends Animal{
    protected $litiere;

    function __construct($identifiant, $espece, $nom, $litiere){
        $this->identifiant = $identifiant;
        $this->espece = $espece;
        $this->nom = $nom;
        $this->litiere = $litiere;
	}

    public function tour(){
        echo "Marcher le clavier";
    }
    

    /**
     * Get the value of litiere
     */ 
    public function getLitiere()
    {
        return $this->litiere;
    }

    /**
     * Set the value of litiere
     *
     * @return  self
     */ 
    public function setLitiere($litiere)
    {
        $this->litiere = $litiere;

        return $this;
    }

    public function __toString()
    {
        $str="";

        $str.="Identifiant ".$this->identifiant;
        $str.=" | ";
        $str.="Espece ".$this->espece;
        $str.=" | ";
        $str.="Nom ".$this->nom;
        $str.=" | ";
        if($this->litiere == true){
            $str.="Litiere : oui";
        }
        else{
            $str.="Litiere : non";
        }
        
        echo $str;
    }
}