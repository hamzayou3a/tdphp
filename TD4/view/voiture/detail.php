<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Détail d'une voiture</title>
    </head>
    <body>
        <?php
        echo '<p> Voiture ' . $v->getImmatriculation() . ' de marque ' . $v->getMarque() . ' (couleur ' . $v->getCouleur() . ') </p>';

        ?>
    </body>
</html>
