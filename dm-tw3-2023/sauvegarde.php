 <?php
    $connection =connecter();
    $type = key_exists('type',$_POST)? $_POST['type']: null;
    $idP = key_exists('idM',$_POST)? $_POST['idM']: null;
    $sql = key_exists('sql',$_POST)? $_POST['sql']: null;
    if ($type =='confirmupdate'){
        $corps="<h1>Mise à jour de la Musique ".$idM."</h1>" ;
    }
    else{
        $corps="<h1>Suppression de la Musique".$idM."</h1>" ;    
    }

    $req=$connection->prepare($sql);
    $req->execute();        
    $connection = null;
    $zonePrincipale=$corps ;
?> 