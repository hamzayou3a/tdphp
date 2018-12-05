<?php
	/*if(!isset($_COOKIE["TD"]))
	{
		$array = array("Je", "suis", "ton", "pere");
		setcookie("TD", serialize($array), time() + 608400);
		echo "<h1>Cookie Created</h1>";
	}
	else
	{
		if(!isset($_GET['delete']))
		{
			var_dump(unserialize($_COOKIE['TD']));
			echo '<a href="index.php?delete=true">Supprimer le Cookie</a>';
		}
		else
		{
			setcookie("TD", "", time() - 1);
			echo '<h1>Cookie Deleted</h1>';
		}
	}*/

	session_start();

	if(isset($_GET['disconect']) && $_GET['disconect'] == 1)
	{
		session_unset();
		session_destroy();
		setcookie(session_name(),'',time()-1); 	
	}
	else
	{
		if(!isset($_SESSION['login']) || !isset($_SESSION['password']) || !isset($_SESSION['cart']))
		{
			$_SESSION['login'] = "parentl";
			$_SESSION['password'] = "xxxxxxx";
			$_SESSION['cart'] = array("Mouse", "Keyboard", "Screen", "Ventirad");

			echo '<h1>Session Just Opened Reload the page</h1>';
		}
		else
		{
			if(isset($_GET['clear']) && $_GET['clear'] == 'cart')
			{
				unset($_SESSION['cart']);
			}
			echo '<h1>Welcome ' . $_SESSION['login'] . ' with pwd ' . $_SESSION['password'] . '</h1>';

			echo '<h2>Cart : </h2><a href="index.php?clear=cart">Clear</a><ul>';

			if(isset($_SESSION['cart']))
			{
				foreach($_SESSION['cart'] as $item)
				{
					echo "<li>" . $item . "</li>";
				}
			}
			else
			{
				echo "<li>empty</li>";
			}
			
			echo '</ul>';

			echo '<a href="index.php?disconect=1">Log Out</a>';
		}
	}
?>