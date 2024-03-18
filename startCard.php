<?php 
$connexion= new mysqli("localhost", "root", "", "boviet");

$insertNewCard = "UPDATE panier set pan_content = '[{}]'";
$deleteHSTCard = "DELETE from histo_panier";
$connexion->query($insertNewCard);
$connexion->query($deleteHSTCard);
header("Location: index.php?page=admin&start=true");

