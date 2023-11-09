<?php

if(isset($_GET["idM"])){

    $connection = connecter();

    $idM = $_GET["idM"];

    $sql = "DELETE FROM MUSIQUE WHERE idM like $idM";
    
    $tab ='
    <form action="index.php?action=sauvegarde" method="post">
        <input type="hidden" name="type" value="'.'confirmdelete'.'"/>
        <input type="hidden" name="idM" value="'.$idM.'"/>
        <input type="hidden" name="sql" value="'.$sql.'"/>
        <p>Etes vous sûr de vouloir supprimer cette musique ?</p>
        <p>
            <input type="submit" value="Enregistrer" class="btn btn-danger">
            <a href="index.php" class="btn btn-secondary">Annuler</a>
        </p>
    </form>';        
    $corps = $tab;
    $zonePrincipale=$corps ;
    $connection = null;

}
else{
    $zonePrincipale = "Erreur : Supression impossible";
}

?>
