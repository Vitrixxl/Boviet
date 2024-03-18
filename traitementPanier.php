<?php
session_start();
if (isset($_GET['id']) ){
    $currentID = $_GET['id'];
    $plat = array("id" => $currentID);
    $i = 1;
    while (isset ($_POST[$i])) {
        echo $_POST[$i];
        $plat["$i"] = $_POST[$i];
        echo $plat["$i"];
        $i++;
    }
    if (!is_array($_SESSION["panier"])) {
        $_SESSION["panier"] = array();
    }
    
    array_push($_SESSION["panier"], $plat);
    print_r($_SESSION["panier"]);
    switch ($_GET['from']) {
        case 'viandes':
            header("Location: index.php?page=plat&plat=viandes&insert=true");
            break;
        
        case 'poisson':
            header("Location: index.php?page=plat&plat=poissons&insert=true");
            break;
        
        case 'entree':
            header("Location: index.php?page=plat&plat=entree&insert=true");
            break;
        

        case 'plat':
            header("Location: index.php?page=plat&plat=plat&insert=true");
            break;
        
        case 'desserts':
            header("Location: index.php?page=plat&plat=desserts&insert=true");
            break;

        case 'accompagnement':
            header("Location: index.php?page=plat&plat=accompagnement&insert=true");
            break;
        
    }
    
    echo "<button onclick='getPanier()'>Voir le contenu du panier</button>";
}

if (isset ($_GET['test'])) {

    $connexion= new mysqli("localhost", "root", "", "boviet");

    if (isset ($_SESSION["panier"])){
        $panier = $_SESSION["panier"];
    } else {
        $panier = array();
    }
    $panier=json_encode($panier);
    $insertPanier = "DELETE from panier";

    $connexion->query($insertPanier); 
    $insertPanier = "INSERT INTO panier (pan_content) value ('$panier')";
    $connexion->query($insertPanier); 
    $chemin_script_node = './script.js';

    // Commande pour exécuter Node.js avec le script en argument
    $commande = 'node ' . $chemin_script_node;

    // Exécute la commande et récupère la sortie
    $output = shell_exec($commande);
    echo''. $output .'';


}

?>
<form action="deletePanier.php">
    <input type="submit" value="delete">

</form>
<form action="traitementPanier.php?test=test&id=1" method="post">
    <input type="submit" value="delete">

</form>
</body>
<script type="text/javascript" src="script.js"></script>