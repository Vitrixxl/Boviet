<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viet</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php

        if(isset($_GET['page'])==true){

            $currentPage=$_GET['page'];

            switch ($currentPage) {
                case 'connect':
                    include './connexionUI.php';
                    break;
                case 'adminMain':
                    include './adminMain.php';
                    break;
                case 'order';
                    include './order.php';
                    break;
                case'horaire';
                    include './horaire.php';
                    break;
            }
        }else{
            include 'connexionUI.php';
        }

 
    ?>





































</body>
</html>