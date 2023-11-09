<?php
require_once("Lib.php");

$action = key_exists('action', $_GET)? trim($_GET['action']): null;
$sauvegarde = key_exists('sauvegarde', $_GET)? trim($_GET['sauvegarde']): null;


switch ($action) {

	case "sauvegarde":
		include("sauvegarde.php");
		break;

	case "liste": 
		include("liste.php");
		break;
		
	case "insert": 
		include("insert.php");
		break;

	case "select":
		include("detail.php");
		break;
	
	case "delete":
		include("delete.php");
		break;
	
	case "update":
		include("update.php");
		break;
		
	case "accueil":
		include("accueil.php");
		break;
	
	case "apropos":
		include("apropos.php");
		break;
	
	case "triAlpha":
		include("triAlpha.php");
		break;
	
		case "triDate":
			include("triDate.php");
			break;

 default:
   $zonePrincipale="" ;
   break;
   
}
include("squelette.php");

?>
