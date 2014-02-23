<?php

class Math {
	public function __construct(){}
	static $PI;
	static $NaN;
	static $POSITIVE_INFINITY;
	static $NEGATIVE_INFINITY;
	static function abs($v) {
		return abs($v);
	}
	static function sin($v) {
		return sin($v);
	}
	static function cos($v) {
		return cos($v);
	}
	static function sqrt($v) {
		return sqrt($v);
	}
	static function round($v) {
		return (int) floor($v + 0.5);
	}
	static function floor($v) {
		return (int) floor($v);
	}
	static function ceil($v) {
		return (int) ceil($v);
	}
	static function asin($v) {
		return asin($v);
	}
	static function pow($v, $exp) {
		return pow($v, $exp);
	}
	static function random() {
		return mt_rand() / mt_getrandmax();
	}
	static function isNaN($f) {
		return is_nan($f);
	}
	static function isFinite($f) {
		return is_finite($f);
	}
	function __toString() { return 'Math'; }
}
{
	Math::$PI = M_PI;
	Math::$NaN = acos(1.01);
	Math::$NEGATIVE_INFINITY = log(0);
	Math::$POSITIVE_INFINITY = -Math::$NEGATIVE_INFINITY;
}
