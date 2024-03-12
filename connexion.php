<?php

if (isset($_POST['username']) && isset($_POST['psw'])) {
    $username=$_POST['username'];
    $typedPsw = $_POST['psw'];
    $connexion = new mysqli();
    $connectRequete = "SELECT USR_PSW FROM USER WHERE USR_LOGIN='$username'";
    $resultVerif = $connexion -> query($connectRequete);
    foreach ($resultVerif as $psw) {
        if (password_verify($typedPsw,$psw['USR_PSW'])==true){
            if($psw['USR_ADMIN']==1){
                session_start();
                $_SESSION["username"]=$username;
                $_SESSION["connected"]==true;
                header("Location: adminMain.php?page=adminMain"); 
            }else{
                $_SESSION["username"]=$username;
                $_SESSION["connected"]==true;
                header("Location: order.php?page=order");
            }
            
        }
    }
}else{
    echo "<script type='text/javascript'> alert('Veuillez rentrer un mot de passe et un nom d'utilisateur correct') </script>";
}