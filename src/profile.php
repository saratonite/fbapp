<?php
require(__DIR__."/bootstrap.php");

if(isset($_SESSION['facebook_access_token'])){


	$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);

	
	try{
		// Its a hack not a perfect solution
		$me = $fb->get('/me');
		if(!$me){
			header('Location: login.php');
			exit;
		}

	}

	catch(Exception $e) {

	}

	
}

// Get Profile data
try{
	$response = $fb->get('/me?fields=id,name,picture,email,birthday,currency,devices,education,gender,hometown,bio');
    $userNode = $response->getGraphUser();	
}
catch(Exception $e){
	echo $e->getMessage();
	die("Error");
}

//var_dump($userNode);

require('partials/header.php');php

?>
<div class="container">
	<div class="row">
		<div class="page-header"><h1>Profile</h1></div>
		<div class="col-md-6">
			<div>
				<img src="<?= $userNode['picture']['url'] ?>">
			</div>
			<table class="table table-bordered">
				<tr>
					<td>Name</td><td> <?= $userNode['name'] ;?> </td>
				</tr>
				<tr>
					<td>Email</td><td> <?= $userNode['email'];?></td>
				</tr>
				<tr>
					<td>Birthday</td><td> <?= $userNode['birthday']->format('d-m-Y'); ?></td>
				</tr>
				<tr>
					<td>Gender</td><td> <?= ucfirst($userNode['gender']);?></td>
				</tr>
				<tr>
					<td>Bio</td><td> <?= $userNode['bio'];?></td>
				</tr>
			</table>
		</div>
	</div>
</div>