<?php

class thx_error_Error extends thx_util_Message {
	public function __construct($message, $params = null, $param = null, $pos = null) {
		if(!php_Boot::$skip_constructor) {
		parent::__construct($message,$params,$param);
		$this->pos = $pos;
	}}
	public $pos;
	public $inner;
	public function setInner($inner) {
		$this->inner = $inner;
		return $this;
	}
	public function toStringError($pattern = null) {
		$prefix = Strings::format(thx_error_Error_0($this, $pattern), (new _hx_array(array($this->pos->className, $this->pos->methodName, $this->pos->lineNumber, $this->pos->fileName, $this->pos->customParams))), null, null);
		return _hx_string_or_null($prefix) . _hx_string_or_null($this->toString());
	}
	public function toString() {
		try {
			return Strings::format($this->message, $this->params, null, null);
		}catch(Exception $__hx__e) {
			$_ex_ = ($__hx__e instanceof HException) ? $__hx__e->e : $__hx__e;
			$e = $_ex_;
			{
				$ps = _hx_string_or_null($this->pos->className) . "." . _hx_string_or_null($this->pos->methodName) . "(" . _hx_string_rec($this->pos->lineNumber, "") . ")";
				haxe_Log::trace("wrong parameters passed for pattern '" . _hx_string_or_null($this->message) . "' at " . _hx_string_or_null($ps), _hx_anonymous(array("fileName" => "Error.hx", "lineNumber" => 42, "className" => "thx.error.Error", "methodName" => "toString")));
				return "";
			}
		}
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
	static $errorPositionPattern = "{0}.{1}({2}): ";
	function __toString() { return $this->toString(); }
}
function thx_error_Error_0(&$__hx__this, &$pattern) {
	if(null === $pattern) {
		return thx_error_Error::$errorPositionPattern;
	} else {
		return $pattern;
	}
}
