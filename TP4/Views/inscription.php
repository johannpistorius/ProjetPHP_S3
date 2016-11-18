<?php
	$titre="Inscription";
	ob_start();
	echo '<form method="post" action="index.php?action=subscribe">';
			echo '<p><input name="Login" placeholder="Enter your username" type="text" required/></p>';
			echo '<p><input name="Name" placeholder="Enter your name" type="text" required/></p>';
			echo '<p><input name="Pass" placeholder="Enter your password" type="password" required/></p>';
			echo '<p><input name="Pass1" placeholder="Repeat your password" type="password" required/></p>';
			echo '<p><input name="Mail" placeholder="Enter your e-mail" type="email" required/></p>';
			echo '<p><input type="submit" value="Subscribe"></p>';
	echo '</form>';
	echo '<p>Site créé exclusivement en PHP5, HTML5 et CSS3</p>';
	$contenu=ob_get_clean();
	require("Views/layout.php");
?>