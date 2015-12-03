<?php
require_once('bootstrap.php');


$helper = $fb->getRedirectLoginHelper();
$permissions=['email','user_likes'];

$login_url = $helper->getLoginUrl('http://localhost:3000/src/login_callback.php',$permissions);

echo '<a href="'.$login_url.'">Login with facebook</a>';