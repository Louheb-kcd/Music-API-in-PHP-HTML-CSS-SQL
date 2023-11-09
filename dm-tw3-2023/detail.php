<?php

if(isset($_GET["idM"])){
    $idM = $_GET["idM"];

$connection = connecter();

$requete = "SELECT * FROM MUSIQUE WHERE idM like $idM";

$query = $connection->query($requete);

$query->setFetchMode(PDO::FETCH_OBJ);

$donnees = $query->fetch();

$musique = new Musique($donnees->idM,$donnees->titre,$donnees->artiste,$donnees->genre,$donnees->dateSortie,$donnees->langue,$donnees->commentaire);

$corps = $musique->__toString();

$zonePrincipale = $corps;
$query = null;
$connection = null;

}
else{
    $zonePrincipale = "Erreur : Musique introuvable";
}


?>