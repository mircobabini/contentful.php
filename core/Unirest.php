<?php namespace Contentful;

class Unirest extends \Unirest {
	public static function get ($url, $headers = array ()) {
		$_headers = self::_headers ($headers);
		return parent::get ($url, $_headers);
	}
	public static function post ($url, $headers = array (), $body = NULL) {
		$_headers = self::_headers ($headers);
		return parent::post ($url, $_headers, $body);
	}
	public static function delete ($url, $headers = array ()) {
		$_headers = self::_headers ($headers);
		return parent::delete ($url, $_headers);
	}
	public static function put ($url, $headers = array (), $body = NULL) {
		$_headers = self::_headers ($headers);
		return parent::put ($url, $_headers, $body);
	}
	public static function patch ($url, $headers = array (), $body = NULL) {
		$_headers = self::_headers ($headers);
		return parent::patch ($url, $_headers, $body);
	}
	
	protected static function _headers ($headers) {
		if (!isset ($headers['Content-Type'])) {
			$headers['Content-Type'] = 'application/vnd.contentful.management.v1+json';
		}
		
		if (!isset ($headers['Authorization'])) {
			$access_token = Client::active_client ()->access_token ();
			$headers['Authorization'] = $access_token;
		}
		
		return $headers;
	}
}