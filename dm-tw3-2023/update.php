<?php
        $cible = "update";
        $idM=$_GET["idM"];
        $connection =connecter();

        $requete="SELECT * FROM MUSIQUE where idM like $idM";
        $query  = $connection->query($requete);
        $query->setFetchMode(PDO::FETCH_OBJ);
        while( $enregistrement = $query->fetch() )
        {
            $idM=$enregistrement->idM;
            $titre=$enregistrement->titre;
            $artiste = $enregistrement->artiste;
            $genre=$enregistrement->genre;
            $dateSortie = $enregistrement->dateSortie;
            $langue = $enregistrement->langue;
            $commentaire = $enregistrement->commentaire;
        }

		if (!isset($_POST["titre"]) && !isset($_POST["artiste"]) && !isset($_POST["dateSortie"]) && !isset($_POST["langue"]) && !isset($_POST["commentaire"])) 
		{
			include("formulaireMusique.html");
		}
		else{
			$titre = key_exists('titre', $_POST)? trim($_POST['titre']): null;
			$genre = key_exists('genre', $_POST)? trim($_POST['genre']): null;
      $artiste = key_exists('artiste', $_POST)? trim($_POST['artiste']): null;
			$dateSortie = key_exists('dateSortie',$_POST)? date('Y-m-d',strtotime($_POST['dateSortie'])):null;
			$langue = key_exists('langue',$_POST)? trim($_POST['langue']): null;
			$commentaire = key_exists('commentaire',$_POST)? trim($_POST['commentaire']): null;

      if (!controlerAlphanum($titre)) 	$erreur["titre"] ="titre invalide !"; 
			if (!controleNomPrenom($artiste)) $erreur["artiste"] ="nom artiste invalide !"; 	
			if (!controlerDate($dateSortie)) $erreur["dateSortie"] = "Date de naissance invalide !";
			if (!controlerAlphanum($langue)) 	$erreur["langue"] ="langue invalide !"; 
			if (!controlerAlphanum($commentaire)) 	$erreur["commentaire"] ="commentaire invalide !"; 
			
      
      $compteur_erreur=count($erreur);
			foreach ($erreur as $cle=>$valeur){
        if ($valeur==null) $compteur_erreur=$compteur_erreur-1;
      }


			

  if ($compteur_erreur == 0) {
    $sql="UPDATE MUSIQUE SET titre='$titre', artiste='$artiste',genre='$genre',dateSortie='$dateSortie',langue='$langue',commentaire='$commentaire' where idM='$idM'";
    $tab ='<form action="index.php?action=sauvegarde" method="post">
        <input type="hidden" name="type" value="'.'confirmupdate'.'"/>
        <input type="hidden" name="idM" value="'.$idM.'"/>
        <input type="hidden" name="sql" value="'.$sql.'"/>
        <p>Etes vous sûr de vouloir mettre à jour cette musique ?</p>
        <p>
          <input type="submit" value="Enregistrer" class="btn btn-danger">
          <a href="index.php" class="btn btn-secondary">Annuler</a>
        </p>
    </form>';
    $corps = $tab;  
    $zonePrincipale=$corps ;
  }
  else {
    include("formulaireMusique.html");
  }
}

$connection = null;
?> 