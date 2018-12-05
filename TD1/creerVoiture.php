<?php
    require_once 'Voiture.php';

    if(!empty($_POST))
    {
        $voiture1 = new Voiture($_POST['marque'], $_POST['couleur'], $_POST['immatriculation']);
        $voiture1->afficher();
    }
?>