<?php

function connecter()
{
    try {

        $dns="mysql:host=mysql.info.unicaen.fr;port=3306;dbname=kaced211_1;charset=utf8";
        $utilisateur="kaced211";
        $motDePasse="eingeiTeiquaach1";

        $pdo = new PDO($dns, $utilisateur, $motDePasse);
        
        $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                        );
        $connection = new PDO( $dns, $utilisateur, $motDePasse, $options );
        return($connection);
    
    
    } catch ( Exception $e ) {
        echo "Connection à MySQL impossible : ", $e->getMessage();
        die();
    }
}



function controleNomPrenom($valeur) {
    if(empty($valeur)) {
        return false;
    }
    if(!preg_match("/^[a-zA-Z\- àáâäãåçèéêëìíîïñòóôöõùúûüýÿ]*$/u", $valeur)) {
        return false;
    }
    return true;
}

function controlerDate($valeur) {
    if (preg_match("/^(\d{4})[\-](\d{2})[\-](\d{2})$/", $valeur, $regs)) {
        $an = $regs[1];
        $mois = $regs[2];
        $jour = $regs[3];
        if (checkdate($mois, $jour, $an)) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function controlerAlphanum($valeur) {
    if (preg_match("/^[\w|\d|\s|'|\"|\\|,|\.|\-|&|#|;àáâäãåçèéêëìíîïñòóôöõùúûüýÿ]+$/u", $valeur)) {
        return true;
    } else {
        return false;
    }
}

class Musique
{
    private $idM;
    private $titre;
    private $artiste;
    private $genre;
    private $dateSortie;
    private $langue;
    private $commentaire;

    //Constructeur
    public function __construct($idM,$titre,$artiste,$genre,$dateSortie,$langue,$commentaire)
    {
        $this->idM=$idM;
        $this->titre=$titre;
        $this->artiste=$artiste;
        $this->genre=$genre;
        $this->dateSortie=$dateSortie;
        $this->langue=$langue;
        $this->commentaire = $commentaire;

    }

    //
    public function __toString()
{   
    $ligneT = "<head>
	<meta charset='UTF-8'>
	<link rel='stylesheet' href='style/detail.css'>
    </head>";
    $ligneT .= "<body>";
    $ligneT.= "<div class='music-details'>";
    $ligneT .= "<h1>Détails de la Musique</h1>";
    $ligneT.= "<b> Id Musique : </b><u>".$this->idM."</u><br>";
    $ligneT.= "<b> Titre : </b><u>".$this->titre."</u><br>";
    $ligneT.= "<b> Artiste : </b><u>".$this->artiste."</u><br>";
    $ligneT.= "<b> Genre : </b><u>".$this->genre."</u><br>";
    $ligneT.= "<b> date Sortie : </b><u>".$this->dateSortie."</u><br>";
    $ligneT.= "<b> Langue : </b><u>".$this->langue."</u><br>";
    $ligneT.= "<b> Commentaire : </b><u>".$this->commentaire."</u><br>";
    $ligneT.= "</div>";
    $ligneT .= "</body>";
    return $ligneT;
}

    
}



$idM=null;$artiste = null;$titre = null;$genre = null;$dateSortie =  null;$langue = null;$commentaire = null;			
$erreur=array("titre"=>null,"artiste"=>null,"dateSortie"=>null,"genre"=>null,"langue"=>null,"commentaire"=>null);
$tab_Musique=array();
?>
