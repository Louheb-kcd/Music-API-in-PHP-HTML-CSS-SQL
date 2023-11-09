<!doctype html>
<html lang="fr">
<head>
  <title> Mon Site De Musique</title>
  <link rel="stylesheet" href="style/style.css"  type="text/css" >
</head>
<body class="body">
  <h1 class="header">Mini-Site de Musique TW3</h1>
  <table class="tabM">
    <tr>
        <p class="nav">
          <a href="index.php?action=accueil">Accueil</a><br>
          <a href="index.php?action=insert">Ajouter une Musique</a><br>
          <a href="index.php?action=liste">Liste des Musiques</a><br>
          <a href="index.php?action=apropos">À propos</a><br>
        </p>
      <td class="tdM"><?php echo $zonePrincipale; ?></td>
    </tr>
  </table>
  <footer class="footer">
    <h2>Université de Caen Normandie - L2 Informatique</h2>
    <p>KACED Louheb</p>
    <p>Numéro étudiant: 22111744</p>
  </footer>
</body>
</html>
