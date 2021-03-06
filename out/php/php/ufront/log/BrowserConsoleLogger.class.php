<?php

class ufront_log_BrowserConsoleLogger implements ufront_app_UFLogHandler{
	public function __construct() {
		;
	}
	public $appMessages;
	public function log($ctx, $appMessages) {
		if($ctx->response->get_contentType() === "text/html") {
			$results = (new _hx_array(array()));
			{
				$_g = 0;
				$_g1 = $ctx->messages;
				while($_g < $_g1->length) {
					$msg = $_g1[$_g];
					++$_g;
					$results->push($this->formatMessage($msg));
					unset($msg);
				}
			}
			if($results->length > 0) {
				$ctx->response->write("\x0A<script type=\"text/javascript\">\x0A" . _hx_string_or_null($results->join("\x0A")) . "\x0A</script>");
			}
		}
		return ufront_core_Sync::success();
	}
	public function formatMessage($m) {
		$type = null;
		{
			$_g = $m->type;
			switch($_g->index) {
			case 0:{
				$type = "log";
			}break;
			case 1:{
				$type = "info";
			}break;
			case 2:{
				$type = "warn";
			}break;
			case 3:{
				$type = "error";
			}break;
			}
		}
		$extras = null;
		if(_hx_field($m, "pos") !== null && $m->pos->customParams !== null) {
			$extras = " " . _hx_string_or_null($m->pos->customParams->join(" "));
		} else {
			$extras = "";
		}
		$msg = "" . _hx_string_or_null($m->pos->className) . "." . _hx_string_or_null($m->pos->methodName) . "(" . _hx_string_rec($m->pos->lineNumber, "") . "): " . Std::string($m->msg) . _hx_string_or_null($extras);
		return "console." . _hx_string_or_null($type) . "(decodeURIComponent(\"" . _hx_string_or_null(rawurlencode($msg)) . "\"))";
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
	function __toString() { return 'ufront.log.BrowserConsoleLogger'; }
}
