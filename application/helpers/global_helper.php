<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists("show_json")) {
	function show_json($var)
	{
		echo json_encode($var, JSON_PRETTY_PRINT);
	}
}

if (!function_exists("arryToJSON")) {
	function arryToJSON(array $var)
	{
		return json_encode($var, JSON_PRETTY_PRINT);
	}
}

if (!function_exists("jsonToArry")) {
	function jsonToArry(object $var)
	{
		return json_decode(json_encode($var, JSON_PRETTY_PRINT), true);
	}
}

if (!function_exists("isValidVal")) {
	function isValidVal($val, $key = null, $get = 'bool', $other = null)
	{
		switch ($get) {
			case 'value':
				return getVarValue($val, $key, $other);
			case 'equal':
				return isValEqual($val, $key, $other);
			default:
				return valNotEmpty($val, $key);
		}
	}
}

if (!function_exists("getVarValue")) {
	function getVarValue($val, $key = null, $default = null)
	{
		$tmpVal = (($key === null) && !empty($val) ? $val : $default);
		if (($key !== null) && is_array($val)) {
			$tmpVal = (isset($val[$key]) && !empty($val[$key]) ? $val : $tmpVal);
		}

		return (is_string($tmpVal) ? trim($tmpVal) : $tmpVal);
	}
}

if (!function_exists("isValEqual")) {
	function isValEqual($var, $key = null, $value)
	{
		$tmpVar = getVarValue($var, $key);
		return $tmpVar == $value;
	}
}

if (!function_exists("valNotEmpty")) {
	function valNotEmpty($var, $key = null)
	{
		$tmpVar = getVarValue($var, $key);
		return isset($tmpVar) && !empty($tmpVar);
	}
}

if (!function_exists("ajaxJSONReturn")) {
	function ajaxJSONReturn($code, $status, $msg, $data = [])
	{
		$return = [
			'code' => $code,
			'status' => $status,
			'message' => $msg,
			'data' => $data
		];
		return arryToJSON($return);
	}
}

if (!function_exists('env')) {
	function env($key, $default = null)
	{
		if (getenv($key) !== false) {
			return getenv($key);
		}

		if (isset($_ENV[$key])) {
			return $_ENV[$key];
		}

		if (isset($_SERVER[$key])) {
			return $_SERVER[$key];
		}

		return $default;
	}
}

if (!function_exists('dd')) {
	function dd(...$vars)
	{
		echo "<pre style='background:#000;color:#0f0;padding:10px;border-radius:5px;'>";
		foreach ($vars as $var) {
			print_r($var);
		}
		echo "</pre>";
		die();
	}
}

// Response JSON START
if (!function_exists("statusResAPI")) {
	function statusResAPI($key)
	{
		$status = [
			200 => "OK",
			201 => "Created",
			202 => "Accepted",
			400 => "Bad Request",
			401 => "Unauthorized",
			403 => "Forbidden",
			404 => "Not Found",
			422 => "Unprocessable Entity",
			429 => "Too Many Requests",
			500 => "Internal Server Error",
			504 => "Gateway Timeout"
		];

		return getVarValue($status, $key);
	}
}

if (!function_exists("OKE")) {
	function OKE($msg, $datas = [])
	{
		$msg = ($msg ?? statusResAPI(200));
		return ajaxJSONReturn(200, "success", $msg, $datas);
	}
}

if (!function_exists("CREATED")) {
	function CREATED($msg, $datas = [])
	{
		$msg = ($msg ?? statusResAPI(201));
		return ajaxJSONReturn(201, "success", $msg, $datas);
	}
}

if (!function_exists("ACCEPTED")) {
	function ACCEPTED($msg, $datas = [])
	{
		$msg = ($msg ?? statusResAPI(202));
		return ajaxJSONReturn(202, "success", $msg, $datas);
	}
}

if (!function_exists("BAD_REQUEST")) {
	function BAD_REQUEST($msg, $datas = [])
	{
		$msg = ($msg ?? statusResAPI(400));
		return ajaxJSONReturn(400, "failed", $msg, $datas);
	}
}

if (!function_exists("UNAUTHORIZED")) {
	function UNAUTHORIZED($msg, $datas = [])
	{
		$msg = ($msg ?? statusResAPI(401));
		return ajaxJSONReturn(401, "failed", $msg, $datas);
	}
}

if (!function_exists("FORBIDDEN")) {
	function FORBIDDEN($msg, $datas = [])
	{
		$msg = ($msg ?? statusResAPI(403));
		return ajaxJSONReturn(403, "failed", $msg, $datas);
	}
}

if (!function_exists("NOT_FOUND")) {
	function NOT_FOUND($msg, $datas = [])
	{
		$msg = ($msg ?? statusResAPI(404));
		return ajaxJSONReturn(404, "failed", $msg, $datas);
	}
}

if (!function_exists("UNPROCESS_ENTITY")) {
	function UNPROCESS_ENTITY($msg, $datas = [])
	{
		$msg = ($msg ?? statusResAPI(422));
		return ajaxJSONReturn(422, "failed", $msg, $datas);
	}
}

if (!function_exists("TO_MANY_REQ")) {
	function TO_MANY_REQ($msg, $datas = [])
	{
		$msg = ($msg ?? statusResAPI(429));
		return ajaxJSONReturn(429, "failed", $msg, $datas);
	}
}

if (!function_exists("SERVER_ERROR")) {
	function SERVER_ERROR($msg, $datas = [])
	{
		$msg = ($msg ?? statusResAPI(500));
		return ajaxJSONReturn(500, "failure", $msg, $datas);
	}
}

if (!function_exists("SERVER_TIMEOUT")) {
	function SERVER_TIMEOUT($msg, $datas = [])
	{
		$msg = ($msg ?? statusResAPI(504));
		return ajaxJSONReturn(504, "failure", $msg, $datas);
	}
}
// Response JSON END
