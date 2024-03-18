<?php
$panier = [];
$panier = $_SESSION['panier'];
$username = $_SESSION['username'];
// print_r(json_encode($panier));
echo "<div class='cartContainer'><h1>Bienvenue $username</h1><h1>Voila votre commande</h1>";
// W
$chemin_fichier_json = './plat.json';
$contenu_json = file_get_contents($chemin_fichier_json);
$data = json_decode($contenu_json, true);
// echo "";
$_SESSION['hsp_content']="";
if (isset ($panier[0])) {

    foreach ($panier as $PANIER => $plat) {
        $optArray = [];
        foreach ($plat as $key => $value) {
            if ($key != "id") {
                array_push($optArray, $value);
            }

        }
        $currentID=$plat['id'];
        $platJson=trouverPlatParId($currentID,$data);
        $_SESSION['hsp_content']=$_SESSION['hsp_content'].$platJson['nom'].' ';
        echo $platJson['nom'].' ';
        $i=0;
        foreach ($platJson['option'] as $optionSection => $value) {
            $currentChoix = $optArray[$i];
            echo $value['opt'.$currentChoix].' ';
            $_SESSION['hsp_content']=$_SESSION['hsp_content'].$value['opt'.$currentChoix].' ';
            $i++;
        }
        echo'<br>';
        $_SESSION['hsp_content']=$_SESSION['hsp_content'].'|';
    }
    echo $_SESSION['hsp_content'];


}
function trouverPlatParId($id, $data)
{

    foreach ($data['plat']['avecOption'] as $section) {
        foreach ($section as $platJSON) {
            if ($platJSON['id'] == $id) {
                return $platJSON;
            }
        }
    }
    // Retourner null si le plat n'est pas trouvé
    return null;
}

?>
<div style="display: flex; gap:10px;">
    <form action="deletePanier.php">
        <input type="submit" value="Vider votre panier">
    </form>
    <form action="sendCard.php">
        <input type="submit" value="Valider">
    </form>
</div>

</div>