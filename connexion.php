<?php

if (isset($_POST['username']) && isset($_POST['psw'])) {
    $connexion = new mysqli("localhost", "root", "", "BOVIET");
    $username=$_POST['username'];
    $typedPsw = $_POST['psw'];
    
    $connectRequete = "SELECT USR_ID,USR_PSW, USR_ADMIN FROM USER WHERE USR_LOGIN='$username'";
    $resultVerif = $connexion -> query($connectRequete);
    foreach ($resultVerif as $psw) {
        
        if (password_verify($typedPsw,$psw['USR_PSW'])==true){
            if($psw['USR_ADMIN']==1){
                session_start();
                $_SESSION['id']=$psw['USR_ID'];
                $_SESSION["username"]=$username;
                $_SESSION["connected"]=true;
                $_SESSION["admin"]=true;
                header("Location: index.php?page=admin"); 
            }else{
                session_start();
                $_SESSION['id']=$psw['USR_ID'];
                $_SESSION["username"]=$username;
                $_SESSION["connected"]=true;
                $_SESSION["admin"]=false;
                header("Location: index.php?page=order"); 
            }
            
        }
    }
}else{
    echo "<script type='text/javascript'> alert('Veuillez rentrer un mot de passe et un nom d'utilisateur correct')</script>";
}