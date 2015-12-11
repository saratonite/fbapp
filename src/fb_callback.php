<?php 
require(__DIR__."/bootstrap.php");

$helper = $fb->getRedirectLoginHelper();

try{
	$accessToken = $helper->getAccessToken();
}
catch(Facebook\Exceptions\FacebookResponseException $e){
	 echo 'Graph returned an error: ' . $e->getMessage();
  exit;
}

catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

if (isset($accessToken)) {
  // Logged in!
  $_SESSION['facebook_access_token'] = (string) $accessToken;

  //echo $_SESSION['facebook_access_token'];

  // Now you can redirect to another page and use the
  // access token from $_SESSION['facebook_access_token']
  
  header("Location : profile.php");
}

