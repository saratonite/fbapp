<?php
require_once('bootstrap.php');


$helper = $fb->getRedirectLoginHelper();
$permissions=['email','user_likes','user_birthday','user_about_me','user_actions.music'];

$login_url = $helper->getLoginUrl('http://localhost:3000/src/login_callback.php',$permissions);

echo '<a href="'.$login_url.'">Login with facebook</a>';