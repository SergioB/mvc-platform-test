<?php

class ufront_web_HttpCookie {
	public function __construct($name, $value, $expires = null, $domain = null, $path = null, $secure = null) {
		if(!php_Boot::$skip_constructor) {
		if($secure === null) {
			$secure = false;
		}
		$this->name = $name;
		$this->set_value($value);
		$this->expires = $expires;
		$this->domain = $domain;
		$this->path = $path;
		$this->secure = $secure;
	}}
	public $domain;
	public $expires;
	public $name;
	public $path;
	public $secure;
	public $value;
	public function setName($v) {
		if(null === $v) {
			throw new HException(new thx_error_NullArgument("v", "invalid null argument '{0}' for method {1}.{2}()", _hx_anonymous(array("fileName" => "HttpCookie.hx", "lineNumber" => 35, "className" => "ufront.web.HttpCookie", "methodName" => "setName"))));
		}
		return $this->name = $v;
	}
	public function set_value($v) {
		if(null === $v) {
			throw new HException(new thx_error_NullArgument("v", "invalid null argument '{0}' for method {1}.{2}()", _hx_anonymous(array("fileName" => "HttpCookie.hx", "lineNumber" => 41, "className" => "ufront.web.HttpCookie", "methodName" => "set_value"))));
		}
		return $this->value = $v;
	}
	public function toString() {
		return _hx_string_or_null($this->name) . ": " . Std::string((isset($this->description) ? $this->description: array($this, "description")));
	}
	public function description() {
		$buf = new StringBuf();
		$buf->add($this->value);
		if($this->expires !== null) {
			ufront_web_HttpCookie::addPair($buf, "expires", DateTools::format($this->expires, "%a, %d-%b-%Y %H:%M:%S GMT"), null);
		}
		ufront_web_HttpCookie::addPair($buf, "domain", $this->domain, null);
		ufront_web_HttpCookie::addPair($buf, "path", $this->path, null);
		if($this->secure) {
			ufront_web_HttpCookie::addPair($buf, "secure", null, true);
		}
		return $buf->b;
	}
	public function __call($m, $a) {
		if(isset($this->$m) && is_callable($this->$m))
			return call_user_func_array($this->$m, $a);
		else if(isset($this->__dynamics[$m]) && is_callable($this->__dynamics[$m]))
			return call_user_func_array($this->__dynamics[$m], $a);
		else if('toString' == $m)
			return $this->__toString();
		else
			throw new HException('Unable to call <'.$m.'>');
	}
	static function addPair($buf, $name, $value = null, $allowNullValue = null) {
		if($allowNullValue === null) {
			$allowNullValue = false;
		}
		if(!$allowNullValue && null === $value) {
			return;
		}
		$buf->add("; ");
		$buf->add($name);
		if(null === $value) {
			return;
		}
		$buf->add("=");
		$buf->add($value);
	}
	static $__properties__ = array("set_value" => "set_value");
	function __toString() { return $this->toString(); }
}
