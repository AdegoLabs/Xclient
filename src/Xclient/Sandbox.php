<?php

namespace Xclient;

class Sandbox {
	public $code;



	function __construct($code = '') {
		if ($code)
			$this->setCode($code);
	}

	public function getCode() {
		return $this->code;
	}

	public function setCode($code) {
		$this->code = $code;
		return $this;
	}

	function includeBefore($code) {
		$this->setCode($code . $this->getCode());
		return $this;
	}

	function includeAppFinish() {
		return '$app->quit();';
	}

	function includeAfter($code) {
		$this->setCode($this->getCode() . $code);
		return $this;
	}

	function includeTemplates() {
		return include(XCLIENT_OBJECTS);
	}

	function prepareCode() {
		$code = $this->getCode() . ' ';
		
		
		return $code;
	}

	public function sandbox($xhe_host) {
		
		$code = ' ' . '$xhe_host = "' . $xhe_host . '"; ?> ' . $this->includeTemplates() . ' ' . $this->prepareCode() . ' ' . $this->includeAppFinish();

		ob_start();
		eval($code);
		$result = ob_get_clean();

		return $result;
	}


}