<?php

require('partials/header.php');
$permissions=['email','user_likes','user_birthday','user_about_me','user_actions.music'];
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
					<a class="btn btn-primary" href="<?= $helper->getLoginUrl('http://localhost:3000/src/login_callback.php',$permissions);?>">Connect Facebook</a>
				</form>
			</div>
		</div>
	</div>