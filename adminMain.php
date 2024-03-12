
<div class="hugeOrderContainer">
<?php 

$connexion = new mysqli("localhost", "root", "", "BOVIET");

$selectOrder = "SELECT ORD_CONTENT, USR_ID FROM `order`";
$select= $connexion->query($selectOrder);
foreach ($select as $order) {
    $userid = $order['USR_ID'];
    $orderContent = $order['ORD_CONTENT'];
    $linkUser = "SELECT usr_login from user where usr_id ='$userid'";
    $link = $connexion->query($linkUser);
    foreach ($link as $name) {
        $usr_name = $name['usr_login'];
    };
    echo "
    <div class='commandeContainer'>
        <h2>Commande de $usr_name</h2>
        <p>$orderContent</p>
    </div>
    
    ";
}
?>
</div>
<!-- <div class="commandeContainer">
    <h2>Commande de ''</h2>
    <p></p>
</div> -->