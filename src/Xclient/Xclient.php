<?php

namespace Xclient;

define('BASE_PATH', __DIR__  );
define('TEMPLATES_PATH', BASE_PATH . DIRECTORY_SEPARATOR . 'Templates');
define('XCLIENT_OBJECTS', TEMPLATES_PATH . DIRECTORY_SEPARATOR . 'xweb_human_emulator.php');
define('XCLIENT_EXE', BASE_PATH . DIRECTORY_SEPARATOR . 'XWebRT.exe');
define('XCLIENT_SCRIPT_PATH', BASE_PATH . DIRECTORY_SEPARATOR . 'My Scripts' . DIRECTORY_SEPARATOR);

use \GuzzleHttp\Client;
use \GuzzleHttp\Psr7\Request as Request;
use \GuzzleHttp\Psr7\Response as Response;
use \Spatie\Selenium\Client as SeleniumClient;
use Xclient\Sandbox;


class Xclient {
	public $client;
	public $xhe_host;
	public $sandbox;

	function __construct($client = array(), Sandbox $sandbox) {

		$this->client = new \GuzzleHttp\Client($client);
		$this->xhe_host = $this->client->getConfig()['base_uri']->getHost() . ':' . $this->client->getConfig()['base_uri']->getPort();

		if ($sandbox)
			$this->setSandbox($sandbox);
	}

	public function getSandbox() {
		return $this->sandbox;
	}

	public function setSandbox(Sandbox $sandbox) {
		$this->sandbox = $sandbox;
		return $this;
	}

	function sandboxCode() {
		return $this->sandbox->sandbox($this->xhe_host);
	}


}