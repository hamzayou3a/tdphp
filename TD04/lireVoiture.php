<?php
	require_once 'Model.php';
	require_once 'Voiture.php';

	$voit = Voiture::getVoitureByImmat("455AB66");
	$voit->afficher();

	$newVoit = new Voiture('Volkswagen', 'Argentee', '852XY34');
	$newVoit->save();
?>