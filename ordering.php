<?php
session_start();
echo $_SESSION['id'];
$usr_id=$_SESSION['id'];
$connexion = new mysqli("localhost", "root", "", "BOVIET");
$order = $_POST['order'];
$requeteOrder = "INSERT INTO `order` (ord_content,usr_id) values ('$order',$usr_id)";
echo $requeteOrder;
if ($order != '') {
    $connexion->query($requeteOrder);
    header("Location: index.php?page=order&done=1"); 
}