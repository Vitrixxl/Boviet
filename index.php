<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viet</title>
    <link rel="stylesheet" href="style.css?4">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&display=swap" rel="stylesheet">
</head>
<body>
    <?php
    session_start();
        include("./nav.php");
        $connexion = new mysqli("localhost", "root", "", "BOVIET");
        
   
       
        if(isset($_GET['page'])==true){

            $currentPage=$_GET['page'];

            switch ($currentPage) {
                case 'connect':



                    if(isset($_SESSION['connected'])){
                        if($_SESSION['connected']==true){
                            include './accueil.php';
                            break;
                        }
                        include './connectUI.php';
                        break;
                    }else{
                        include './connectUI.php';
                        break;
                    }











                case 'order';

                    if(isset($_SESSION['connected'])){
                        if($_SESSION['connected']==true){
                            include './order.php';
                            break;
                        }
                        include './connectUI.php';
                        break;
                    }else{
                        include './order.php';
                        break;
                    }
                    






                case'horaire';






                    if(isset($_SESSION['connected'])){
                        if($_SESSION['connected']==true){
                            include './horaire.php';
                        break;
                        }
                        include './connectUI.php';
                        break;
                    }else{
                    include './horaire.php';
                    break;}





                case 'admin';
                    if(isset($_SESSION['connected'])){
                        if($_SESSION['connected']==true){
                            if($_SESSION['admin']==false){
                                include './nonAdmin.php';
                                break;
                            }else{
                                include './adminMain.php';
                                break;
                            }
                        }else{
                            include './connectUI.php';
                            break;
                        }
                    }else{
                        include './connectUI.php';
                        break;
                    }
                    
                
                case 'deco';
                include './deco.php';
                break;
            }
        }else{
            if(isset($_SESSION['connected'])){
                if($_SESSION['connected']==true){   
                    include './accueil.php';
                }else{
                    include './connectUI.php';
                }
            }
        }

 
    ?>

</body>
</html>