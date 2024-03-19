<?php
if (isset ($_GET['copied'])) {
    if ($_GET["copied"] == true) {
        if (isset ($_GET["node"])) {
            if ($_GET["node"] == "true") {
                $gitPull = 'cd .\\\Desktop\\\DOC\\\VS_Code\\\vraiRepoViet\\\boviet ; git pull'; // Ajout && pour exécuter la commande git pull après le cd
                echo "<script>
                    let gitPull = '" . $gitPull . "';
                    navigator.clipboard.writeText(gitPull).then(() => alert('Git pull copié!'));
                </script>";
            } else {
                $host = 'mysql-db';
                $user = 'db_devuser';
                $pass = 'J&_9VZ8Tej9xk9%';
                $db = 'lab_database';

                $connexion = new mysqli("localhost", "root", "", "boviet");
                $commande = $connexion->query("SELECT * from panier");
                foreach ($commande as $row) {
                    $pan_content=str_replace(`"`,`\"`, $row["pan_content"]);
                    
                    $shellCommande = "cd .\\\Desktop\\\DOC\\\VS_Code\\\\vraiRepoViet\\\boviet ; "."`$pan_content`";
                    $shellCommande = str_replace("`","'",$shellCommande);
                    echo "<script>
                    let gitPull = `$shellCommande`;
                    navigator.clipboard.writeText(gitPull).then(() => alert('$pan_content'));
                    </script>";
                }
                
            }
        }

    }
}


?>




<div class="bigAdminContainer">
    <div class="adminContainer">
        <h1 class="title">Que voulez vous faire ?</h1>
        <form action="./index.php?page=admin&copied=true&node=false" method="post">
            <input type="submit" value="Copier la commande">
        </form>

        <form action="./index.php?page=admin&copied=true&node=true" method="post">
            <input type="submit" value="Mise a jour du script">
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

    $connexion = new mysqli("localhost", "root", "", "boviet");
    $select = "SELECT usr_login, hpn_content from histo_panier inner join user on histo_panier.usr_id=user.usr_id";
    $result = $connexion->query($select);
    echo "<div class='contentContainer'>";
    foreach ($result as $row) {
        $name = $row['usr_login'];
        echo "<div class='contentAdmin'><h3>Commande de $name</h3>";
        $contentArray = explode("|", $row["hpn_content"]);
        foreach ($contentArray as $content) {
            echo $content . "<br>" . "<br>";
        }
        echo "</div>";
    }
    echo "</div>";
    ?>
</div>

<?php

if (isset ($_GET['start'])) {

    echo "<script type='text/javascript'> alert('Les commandes ont été lancés, prevenez vite vos collèges !')</script>";
}

?>