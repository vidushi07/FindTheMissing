<?php

	require __DIR__ .'/vendor/autoload.php';

	use Kreait\Firebase\Factory;
	use Kreait\Firebase\ServiceAccount;
	
	$factory = (new Factory)->withServiceAccount(__DIR__ .'/lostandfound-72457-firebase-adminsdk-dmtai-fab99b23d2.json')
							->withDatabaseUri('https://lostandfound-72457-default-rtdb.firebaseio.com');
							
	$database = $factory->createDatabase();
?>