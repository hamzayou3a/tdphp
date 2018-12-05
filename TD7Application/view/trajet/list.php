<?php
    foreach ($tab_v as $u)
        echo '<p> <a href="index.php?controller=trajet&action=read&id=' . rawurlencode($u->get('id')) . '">Trajet '. $u->get('id') . ' de ' . $u->get('depart') .' vers ' . $u->get('arrivee') . '</a></p>';
?>