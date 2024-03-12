<?php
if (isset($_GET['done'])) {
    echo "
        <div>
            <H1>Votre demande a bien été envoyée au maitre Vietnamien !</h1>
            <a href='./index.php'>Revenir au menu principal</a> 
        </div>";
} else {
    echo "<div class='orderContainer'>
        <h2>Que voulez vous commander aujourd'hui ?</h2>
        <form action='./ordering.php' method='post' class='formOrder'>
            <p>
                <label for='from'>Votre commande :</label>
                <br />
                <textarea name='order' id='message'
                    style='height: 200px; width: 500px;'>Entrez votre commande ici ...</textarea>
            </p>
            <input type='submit' value='Envoyer la commande'>
        </form>
    </div>";
}


?>
