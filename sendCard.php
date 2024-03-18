<?php
session_start();
if (isset($_SESSION["panier"])){
    $host = 'mysql-db';
    $user = 'db_devuser';
    $pass = 'J&_9VZ8Tej9xk9%';
    $db = 'lab_database';

    $connexion= new mysqli($host, $user,$pass, $db);
    $panier = json_encode($_SESSION['panier']);
    $panier = substr_replace($panier,"]",-1);
    $panier = substr($panier,1);
    $recupPanier = "SELECT pan_id,pan_content from panier";
    $result = $connexion->query($recupPanier);
    $pan_BDD;
    $pan_id;
    foreach ($result as $panierBDD) {
        $pan_BDD = $panierBDD['pan_content'];
        $pan_id = $panierBDD['pan_id'];
    }
    
    $pan_BDD=substr_replace($pan_BDD, ",", -1);
    $pan_BDD=$pan_BDD.$panier;
    
    $insertNewCard = "UPDATE panier set pan_content = '$pan_BDD'";
    $insert= $connexion->query($insertNewCard);
    $_SESSION['panier']=null;
    $id=$_SESSION['id'];
    $content=$_SESSION['hsp_content'];
    $insertHisto = "INSERT into histo_panier (usr_id,hpn_content) values ('$id','$content')";
    $connexion->query($insertHisto);   
    
    header("Location: index.php");
}

?>