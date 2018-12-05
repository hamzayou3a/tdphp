<?php
	if(isset($_POST['page']))
	{
		setcookie("preference", $_POST['page'], time() + 2628000, "/~parentl/PHP/TD7Application");
		header("Location: ../index.php");
	}
	else
	{
		header("Location: preference.php");
	}