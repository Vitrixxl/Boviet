
<div class="hugeOrderContainer">
<?php 


$host = 'mysql-db';
$user = 'db_devuser';
$pass = 'J&_9VZ8Tej9xk9%';
$db = 'lab_database';
$hashed = password_hash("boviet123", PASSWORD_DEFAULT);
$connexion = new mysqli($host, $user, $pass, $db);





if ($connexion->connect_error) {
    die("Connection failed: " . $connexion->connect_error);
}



$selectOrder = "SELECT ORD_CONTENT, USR_ID FROM `order`";
$select= $connexion->query($selectOrder);
foreach ($select as $order) {
    $userid = $order['USR_ID'];
    $orderContent = $order['ORD_CONTENT'];
    $linkUser = "SELECT usr_name from user where usr_id ='$userid'";
    $link = $connexion->query($linkUser);
    if($userid==61){
        $usr_name="Maitre Vietnamien";
    }else{
        foreach ($link as $name) {
            $usr_name = $name['usr_name'];
        }
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