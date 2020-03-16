<?php
require_once '../function/search.php'
?>
<form method="get">

  <input type="text" name="s" id="" placeholder="Recherche..." />

  <input type="submit" value="Rechercher" />

</form>
<?php

if (isset($_GET['s'])) {

    $search = $_GET['s'];
  
    $query = "select * FROM users where name LIKE :search";
  
    $stmt = $pdo->prepare($query);
  
    $stmt->execute(['search' => "%$search%"]);
  
  
  
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
  
  
  
    var_dump($results);
  
  }
?>
<!-- Je rencontre un problème qui m'empéche d'utiliser un serveur interne (je ne peut accéder à mon port 8000, j'ai une erreur 404)
 Je dois donc utiliser mes fichier seul sur Firefox ce qui expliquerai en partie (peut-être) pourquoi rien ne marche

[Mon Mar 16 11:22:29 2020] PHP 7.4.3 Development Server (http://localhost:8001) started
[Mon Mar 16 11:22:33 2020] [::1]:53499 Accepted
[Mon Mar 16 11:22:33 2020] [::1]:53499 [404]: (null) / - No such file or directory
[Mon Mar 16 11:22:33 2020] [::1]:53499 Closing
[Mon Mar 16 11:22:34 2020] [::1]:53500 Accepted
[Mon Mar 16 11:22:34 2020] [::1]:53500 [404]: (null) /favicon.ico - No such file or directory 
voilà les seuls messages que mon terminal me montre -->