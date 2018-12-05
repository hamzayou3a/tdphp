<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title> Mon premier php </title>
    </head>

    <body>
        Voici le résultat du script PHP :
        <?php
            $texte = "hello world !";
            echo $texte;

            $voiture1 = array('marque' => 'Renault', 'couleur' => 'bleu', 'immatriculation' => '256AB34');
            $voiture2 = array('marque' => 'Citroen', 'couleur' => 'rouge', 'immatriculation' => '384XY66');
            $voiture3 = array('marque' => 'Peugeot', 'couleur' => 'vert', 'immatriculation' => '465IJ34');

            var_dump($voiture1);

            $voitures = array($voiture1, $voiture2, $voiture3);

            echo '<h1>Liste de voiture</h1>';

            if(empty($voitures))
            {
                echo '<em>Il n\'y a aucune voiture</em>';
            }
            else
            {
                echo '<ul>';
                foreach ($voitures as $voiture)
                {
                    echo '<li> Voiture ' . $voiture['immatriculation'] . ' de marque ' . $voiture['marque'] . ' (couleur ' . $voiture['couleur'] . ') </li>';
                }
                echo '</ul>';
            }
        ?>
    </body>
</html>