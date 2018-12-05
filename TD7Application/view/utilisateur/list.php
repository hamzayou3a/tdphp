<?php
    foreach ($tab_v as $u)
        echo '<p> <a href="index.php?controller=utilisateur&action=read&login=' . rawurlencode($u->get('login')) . '">Utilisateur '. $u->get('prenom') . ' ' . $u->get('nom') .' avec le pseudo ' . $u->get('login') . '</a></p>';
?>