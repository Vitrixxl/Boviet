






<div class="bigAdminContainer">
<div class="adminContainer">
    <h1 class="title">Que voulez vous faire ?</h1>
    <form action="launchCard.php">
            <input type="submit" value="Lancer la commande">
    </form>
    
    <form action="startCard.php">
            <input type="submit" value="Ouvrir les commandes">
    </form>
</div>
<?php 


$host = 'mysql-db';
$user = 'db_devuser';
$pass = 'J&_9VZ8Tej9xk9%';
$db = 'lab_database';

$connexion= new mysqli($host, $user,$pass, $db);
$select = "SELECT usr_login, hpn_content from histo_panier inner join user on histo_panier.usr_id=user.usr_id";
$result = $connexion->query($select);
echo"<div class='contentContainer'>";
foreach ($result as $row) {
    $name= $row['usr_login'];
    echo "<div class='contentAdmin'><h3>Commande de $name</h3>";
    $contentArray = explode("|", $row["hpn_content"]);
    foreach ($contentArray as $content) {
        echo $content."<br>"."<br>";
    }
    echo "</div>";
}
echo "</div>";
?>
</div>

<?php

if (isset($_GET['start'])){
    
    echo "<script type='text/javascript'> alert('Les commandes ont été lancés, prevenez vite vos collèges !')</script>";
}

?>