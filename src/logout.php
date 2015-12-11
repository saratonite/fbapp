<?php
require(__DIR__."/bootstrap.php");
unset($_SESSION['facebook_access_token']);
header('Location: login.php');