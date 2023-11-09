<?php
$corps = <<<EOT
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Mon site de musique</title>
    <link rel="stylesheet" href="style/style.css">
  </head>
    <body>
      <header id=acc>
        <h1>Bienvenue sur mon site de musique !</h1>
      </header>

  <div class="images">
    <img src="image/bn.jpg" alt="image">
  </div>

  <main>
    <section id=par>
      L'objectif du projet est de réaliser un mini site web qui permet aux utilisateurs
      de gérer des données de musique en utilisant les opérations CRUD (Create, Read, Update, Delete) avec PHP et MySQL.

      Pour ce faire, nous allons développer une site web qui permettra à l'utilisateur
      d'ajouter de nouvelles musiques, de les modifier ou de les supprimer de la base de données.
      Le site web affichera également les détails des musiques stockées dans la base de données.

      Nous avons choisi la musique comme thème de notre site web car elle est universelle
      et représente un intérêt commun à beaucoup de personnes. De plus, cela permettra d'avoir 
      une variété de données pour travailler dessus et tester les différentes fonctionnalités 
      de notre site web.

      Notre site web sera développée en PHP en utilisant les bibliothèques 
      tels que PDO, qui permet la connexion à la base de données MySQL qui 
      facilitera la mise en page et le style de notre site web.

      Nous sommes conscients que le projet peut être ambitieux, mais nous sommes déterminés 
      à le mener à bien en suivant une méthode de travail rigoureuse et en nous appuyant sur 
      des ressources fiables et expérimentées
    </section>
  </main>

  </body>

</html>
EOT;
$zonePrincipale = $corps;
