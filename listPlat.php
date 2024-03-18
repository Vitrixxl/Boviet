<?php
// session_start();
$chemin_fichier_json = './plat.json';
$contenu_json = file_get_contents($chemin_fichier_json);
$data = json_decode($contenu_json, true);
if (isset($_GET['insert'])){
    echo "<script type='text/javascript'> alert('Article ajouté au panier !')</script>";
}
if (isset ($_GET['plat'])) {
    if ($_GET['plat'] == "plat") {
        echo "<div class='gigaContainer'>";
        echo "<div class='platContainer'>";

        foreach ($data['plat']['avecOption']['platEntier'] as $plat) {
            echo "<div class='cardPlatmargin'>";
            echo "<div class='cardPlat'>";
            $nom = $plat['nom'];
            $id = $plat['id'];
            $options = $plat['option'];

            echo "<h3 style='text-decoration:underline;'>$nom</h3>";
            $i=1;
            foreach ($options as $option => $choix) {

                
                echo "<form action='traitementPanier.php?id=$id&from=plat' method='post' style='height:100%'>";
                echo "<div style='display:flex;gap:5px'><p style='margin:0;'>$option: </p>";
                echo "<select name='$i' id='$id'>";
                if (is_array($choix)) {

                    $ii=1;
                    foreach ($choix as $lib) {
                        echo "<option value='$ii'>$lib</option>";
                        $ii++;
                    }
                    echo "</select></div>";
                } else {
                    echo $choix;
                }
                $i++;
            }
           
            echo "<input type='submit' value='Ajouter au panier'>";
            echo "</form>";
            echo "</div>";
            echo '</div>';
        }
        // Chemin vers le fichier JSON
        echo '</div>';
        
        echo '</div>';
    }elseif ($_GET['plat'] == "entree"){
        echo "<div class='gigaContainer'>";
        echo "<div class='platContainer'>";
    
        foreach ($data['plat']['avecOption']['entree'] as $plat) {
            echo "<div class='cardPlatmargin'>";
            echo "<div class='cardPlat'>";
            $nom = $plat['nom'];
            $id = $plat['id'];
            $options = $plat['option'];

       
            echo "<h3 style='text-decoration:underline;'>$nom</h3>";
            $i=1;
            foreach ($options as $option => $choix) {
                
                
                echo "<form action='traitementPanier.php?id=$id&from=entree' method='post' style='height:100%'>";
                echo "<div style='display:flex;gap:5px'><p style='margin:0;'>$option: </p>";
                echo "<select name='$i' id='$id'>";
                if (is_array($choix)) {
                   
                    $ii=1;
                    foreach ($choix as $lib) {
                        echo "<option value='$ii'>$lib</option>";
                        $ii++;
                    }
                    echo "</select></div>";
                } else {
                    echo $choix;
                }
                $i++;
            }
           
            echo "<input type='submit' value='Ajouter au panier'>";
            echo "</form>";
            echo "</div>";
            echo "</div>";
            
        }
        
        echo '</div>';
        echo '</div>';
    }elseif ($_GET['plat'] == 'viandes'){

        echo "<div class='gigaContainer'>";
        echo "<div class='platContainer'>";
        
        foreach ($data['plat']['avecOption']['viandes'] as $plat) {
            echo "<div class='cardPlatmargin'>";
            echo "<div class='cardPlat'>";
            $nom = $plat['nom'];
            $id = $plat['id'];
            $options = $plat['option'];
            echo "<h3 style='text-decoration:underline;'>$nom</h3>";
            $i=1;
            foreach ($options as $option => $choix) {
                
                echo "<form action='traitementPanier.php?id=$id&from=viandes' method='post' style='height:100%'>";
                echo "<div style='display:flex;gap:5px'><p style='margin:0;'>$option: </p>";
                echo "<select name='$i' id='$id'>";
                if (is_array($choix)) {
                    $ii=1;
                    foreach ($choix as $lib) {
                        echo "<option value='$ii'>$lib</option>";
                        $ii++;
                    }
                    echo "</select></div>";
                } else {
                    echo $choix;
                }
                $i++;
            }
           
            echo "<input type='submit' value='Ajouter au panier'>";
            echo "</form>";
            echo "</div>";
            echo "</div>";
        }
       
        echo '</div>';
        echo '</div>';
    }elseif ($_GET['plat'] == 'poissons'){

        echo "<div class='gigaContainer'>";
        echo "<div class='platContainer'>";

        foreach ($data['plat']['avecOption']['poisson'] as $plat) {
            echo "<div class='cardPlatmargin'>";
            echo "<div class='cardPlat'>";
            $nom = $plat['nom'];
            $id = $plat['id'];
            $options = $plat['option'];

            echo "<h3 style='text-decoration:underline;'>$nom</h3>";
            $i=1;
            foreach ($options as $option => $choix) {
                echo "<form action='traitementPanier.php?id=$id&from=poisson' method='post' style='height:100%'>";
                echo "<div style='display:flex;gap:5px'><p style='margin:0;'>$option: </p>";
                echo "<select name='$i' id='$id'>";
                if (is_array($choix)) {
                    $ii=1;
                    foreach ($choix as $lib) {
                        echo "<option value='$ii'>$lib</option>";
                        $ii++;
                    }
                    echo "</select></div>";
                } else {
                    echo $choix;
                }
                $i++;
            }
           
            echo "<input type='submit' value='Ajouter au panier'>";
            echo "</form>";
            echo "</div>";
            echo "</div>";
        }
        echo '</div>';
        echo '</div>';

    }elseif ($_GET['plat'] == "accompagnement"){
        echo "<div class='gigaContainer'>";
        echo "<div class='platContainer'>";
    
        foreach ($data['plat']['avecOption']['accompagnement'] as $plat) {
            echo "<div class='cardPlatmargin'>";
            echo "<div class='cardPlat'>";
            $nom = $plat['nom'];
            $id = $plat['id'];
            $options = $plat['option'];

       
            echo "<h3 style='text-decoration:underline;'>$nom</h3>";
            $i=1;
            foreach ($options as $option => $choix) {
                
                
                echo "<form action='traitementPanier.php?id=$id&from=accompagnement' method='post' style='height:100%'>";
                echo "<div style='display:flex;gap:5px'><p style='margin:0;'>$option: </p>";
                echo "<select name='$i' id='$id'>";
                if (is_array($choix)) {
                   
                    $ii=1;
                    foreach ($choix as $lib) {
                        echo "<option value='$ii'>$lib</option>";
                        $ii++;
                    }
                    echo "</select></div>";
                } else {
                    echo $choix;
                }
                $i++;
            }
           
            echo "<input type='submit' value='Ajouter au panier'>";
            echo "</form>";
            echo "</div>";
            echo "</div>";
            
        }
        
        echo '</div>';
        echo '</div>';
    }elseif ($_GET['plat'] == "desserts"){
        echo "<div class='gigaContainer'>";
        echo "<div class='platContainer'>";
    
        foreach ($data['plat']['avecOption']['desserts'] as $plat) {
            echo "<div class='cardPlatmargin'>";
            echo "<div class='cardPlat'>";
            $nom = $plat['nom'];
            $id = $plat['id'];
            $options = $plat['option'];

       
            echo "<h3 style='text-decoration:underline;'>$nom</h3>";
            $i=1;
            foreach ($options as $option => $choix) {
                
                
                echo "<form action='traitementPanier.php?id=$id&from=desserts' method='post' style='height:100%'>";
                echo "<div style='display:flex;gap:5px'><p style='margin:0;'>$option: </p>";
                echo "<select name='$i' id='$id'>";
                if (is_array($choix)) {
                   
                    $ii=1;
                    foreach ($choix as $lib) {
                        echo "<option value='$ii'>$lib</option>";
                        $ii++;
                    }
                    echo "</select></div>";
                } else {
                    echo $choix;
                }
                $i++;
            }
           
            echo "<input type='submit' value='Ajouter au panier'>";
            echo "</form>";
            echo "</div>";
            echo "</div>";
            
        }
        
        echo '</div>';
        echo '</div>';
    }


}


?>
<!-- <form action="">
    <input type="submit" value="addToCart">
</form>
 -->
