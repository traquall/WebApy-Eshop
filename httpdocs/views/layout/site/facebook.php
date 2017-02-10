<?php
// include the facebook sdk
require_once('assets/plugins/facebook-sdk/src/facebook.php');

// connect to app
$config = array();
$config['appId'] = '1663206980675411';
$config['secret'] = '39a4e7bd179d136cd25a24e4b1a5c016';
$config['fileUpload'] = false; // optional

// instantiate
$facebook = new Facebook($config);

// set page id
$pageid = "181884451961063";

// now we can access various parts of the graph, starting with the feed
$pagefeed = $facebook->api("/" . $pageid . "/feed");

echo "<pre>";
print_r($pagefeed);
echo "</pre>";

?>