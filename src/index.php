<?php

require_once(__DIR__."/../vendor/autoload.php");

// Creating Dot Env Intsnce
$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

// Creating Facebook Instance

$fb = new Facebook\Facebook([
	"app_id" => getenv("FB_APP_ID"),
	"app_secret" =>getenv("FB_APP_SECRET"),
	"default_graph_version" =>getenv("FB_API_VERSION")
]);