<?php

require(__DIR__."/bootstrap.php");
$permissions=['email','user_likes','user_birthday','user_about_me','user_actions.music'];

// Check if Session Consist

if(isset($_SESSION['facebook_access_token'])){


	$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);

	
	try{
		// Its a hack not a perfect solution
		$me = $fb->get('/me');
		if($me){
			header('Location: profile.php');
			exit;
		}

	}

	catch(Exception $e) {

	}

	
}


require('partials/header.php');
// Create login url

$helper = $fb->getRedirectLoginHelper();


?>

<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="page-header">
					<h1>Login With Facebook</h1>
				</div>
				<form>
					<a class="btn btn-primary" href="<?= $helper->getLoginUrl('http://localhost:3000/src/fb_callback.php',$permissions);?>">Connect Facebook</a>
				</form>
			</div>
		</div>
	</div>