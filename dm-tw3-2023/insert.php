<?php

$cible='insert';
		if (!isset($_POST["titre"]) && !isset($_POST["artiste"]) && !isset($_POST["genre"]) && !isset($_POST["dateSortie"]) && !isset($_POST["langue"]) && !isset($_POST["commentaire"])) 
		{
			include("formulaireMusique.html");
		}
		else{
			$titre = key_exists('titre', $_POST)? trim($_POST['titre']): null;
			$artiste = key_exists('artiste', $_POST)? trim($_POST['artiste']): null;
			$dateSortie = key_exists('dateSortie',$_POST)? date('Y-m-d',strtotime($_POST['dateSortie'])):null;
			$genre = key_exists('genre',$_POST)? trim($_POST['genre']): null;
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
				$connection =connecter();
				
				$musique = new Musique($idM,$titre,$artiste,$genre,$dateSortie,$langue,$commentaire);
				$corps = $musique;


				try{
					$rq = "INSERT INTO `MUSIQUE` (`titre`, `artiste`, `dateSortie`, `genre`, `langue`, `commentaire`) VALUES (:titre,:artiste,:dateSortie,:genre,:langue,:commentaire);";
				
				$stmt=$connection->prepare($rq);

				$data = array(':titre' => $titre,
							   ':artiste' => $artiste,
							   ':dateSortie' => $dateSortie,
							   ':genre' => $genre,
							   ':langue' => $langue,
							   ':commentaire' => $commentaire,
				);

				$stmt->execute($data);
				}
				catch(PDOException $e){
					echo 'impossibe' .$e->getMessage();
				}
				

				
				
				$zonePrincipale=$corps ;
				$connection = null;
			}
			else {
				include("formulaireMusique.html");
			}
		}
		

?>