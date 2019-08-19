<?php 
require_once __DIR__ . '/vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Xclient\Xclient;
use Xclient\Sandbox;

$code = ' $browser->navigate("facebook.com"); ';
$Xclient = new Xclient(
		[
			
			'base_uri' => 'http://127.0.0.1:7674'
		], 
		new Sandbox($code)
);
	
//\WEB::$browser->navigate('rambler.ru');
//$response = $Xclient->client->send($request);
var_dump($Xclient->sandboxCode());
 //$request = $client->get('/API/jsonI.php?length=10&type=uint8');
	
    /** @var $response Response */
   // $response = $request->send();

    /** @var $body EntityBody */
//    $body = $response->getBody(true);
//    var_dump($body);
# Send an asynchronous request.
//$request = new \GuzzleHttp\Psr7\Request('GET', 'http://httpbin.org');
//$promise = $client->sendAsync($request)->then(function ($response) {
//    echo 'I completed! ' . $response->getBody();
//});

//$promise->wait();	


