<?php
$corps = '<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet"> 
		  <link rel="stylesheet" href="style/liste.css">';

$corps .= "<label id = menu for='trie'>Trier par</label>
<select id='trie' name='trie' onchange='location = this.value;'>
<option value='index.php?action=triAlpha'>Ordre alphabétique</option>
  <option value='index.php?action=liste'>Aléatoire</option>
  <option value='index.php?action=triDate'>Date</option>
 
</select>";

$corps.="<body>";
$connection =connecter();
$requete="SELECT * FROM MUSIQUE ORDER BY titre ASC";

$query  = $connection->query($requete);

$query->setFetchMode(PDO::FETCH_OBJ);
		

while( $enregistrement = $query->fetch() )
{

    $corps.= "<div class='musique'>";
    $idP=$enregistrement->idM;
    $nom=$enregistrement->titre;
    $artiste=$enregistrement->artiste;
    $tab_Musique[$idP]=array($titre,$artiste);
    $corps.= "<span class='c1'><u><b>".$enregistrement->idM."</b></u></span> <span class='c1'>".$enregistrement->titre." </span><span class='c1'>". $enregistrement->artiste."</span>";
    $corps.=  '<span class="c1"><a href="index.php?action=select&idM='. $enregistrement->idM.'  "><span class="fa fa-info"></span></a>';
    $corps.=  '<a href="index.php?action=update&idM='. $enregistrement->idM.'  "><span class="fa fa-pencil"></span></a>';
    $corps.=  '<a href="index.php?action=delete&idM='. $enregistrement->idM.'  "><span class="fa fa-trash"></span></a>';
    $corps.="<br>";
    $corps.= "</span>";
    $corps.= "</div>";
  
}
$corps.="</body>";
$zonePrincipale=$corps ;
$query = null;
$connection = null;


?>