<?php
	echo '<a style="margin-right: 1%" href="index.php?controller=utilisateur&action=update&login=' . htmlspecialchars($v->get('login')) . '">Mettre a jour cet utilisateur</a>';
	echo '<a style="margin-right: 1%" href="index.php?controller=utilisateur&action=deleted&login=' . htmlspecialchars($v->get('login')) . '">Supprimer cet utilisateur</a>';
	echo '<p>Utilisateur '. $v->get('prenom') . ' ' . $v->get('nom') .' avec le pseudo ' . $v->get('login') . '</p>';
?>