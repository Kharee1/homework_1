<?php

	$username ='keo6';
	$password ='gntCaHLz';
	$hostname = 'sql2.njit.edu';

	$dsn = "mysql:host=$hostname;dbname=$username";

	try { 
		$db = new PDO($dsn, $username, $password);
		echo 'Connected successfully <br />';
	} catch (PDOException $error){
		echo '<h3>DB Error</h3><br />';
		echo $error -> getMessage();
		exit();
	}
	

	$query = 'SELECT * FROM accounts WHERE id < :id';
	$statement = $db ->prepare($query);
	$statement ->bindValue(':id', 6);
	$statement -> execute();
	$accounts = $statement->fetchAll();
	$statement ->closeCursor();
	/*print_r($accounts);*/
	?>


	<table border='1'>
	<tr><td>ID</td>
	<td>Email</td></tr>
	<?php foreach ($accounts as $account) {?>
	<tr>
		<td><?php echo $account['id'] ?></td>
		<td><?php echo $account['email'] ?></td>
	</tr>
	<br>
	<?php } ?>

