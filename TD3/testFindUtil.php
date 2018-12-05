<?php
	require_once 'Trajet.php';

	$users = Trajet::findPassagers($_GET['trajet_id']);

	foreach($users as $user)
	{
		$user->afficher();
	}