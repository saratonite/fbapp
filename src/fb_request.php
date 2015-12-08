<?php
require('bootstrap.php');


$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);

try {
  $response = $fb->get('/me?fields=id,name,picture,email,birthday,currency,devices,education,gender,hometown,bio');
  //$plainOldArray = $response->getDecodedBody(); // Plain old array
  $userNode = $response->getGraphUser();


  var_dump($userNode);
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

echo $userNode->getId();
echo "<br/>".$userNode->getName();
echo "<br/>".$userNode->getEmail();
$pic = $userNode->getPicture();
echo "<br><img src='".$pic->getUrl()."' >";
echo '<br>'.$userNode->getGender();
echo '<br/>'.$userNode['birthday']->date;