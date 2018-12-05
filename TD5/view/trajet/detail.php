<?php
	echo '<a style="margin-right: 1%" href="index.php?controller=trajet&action=update&id=' . rawurlencode($v->get('id')) . '">Mettre a jour ce trajet</a>';
	echo '<a style="margin-right: 1%" href="index.php?controller=trajet&action=deleted&id=' . rawurlencode($v->get('id')) . '">Supprimer ce trajet</a>';

	$v_depart = $v->get('depart');
	$v_arrivee = $v->get('arrivee');
	$v_date = $v->get('date');
	$v_nbplaces = $v->get('nbplaces');
	$v_prix = $v->get('prix');
	$v_conduteur = $v->get('conducteur_login');

 	echo <<< EOT
 		<p>
 		Trajet au depart de $v_depart 
 		et a destination de $v_arrivee 
 		le $v_date 
 		pour $v_nbplaces 
 		pour $v_prix$
 		conduit par 
 			<a href="index.php?controller=utilisateur&action=read&login=$v_conduteur">$v_conduteur</a>
 		</p>
EOT;
?>