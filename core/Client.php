<?php namespace Contentful;

class Client {
	/**
	 * @var array
	 */
	private static $clients = array ();
	/**
	 * @var Client
	 */
	private static $active_client;
	
	/**
	 * @param string $access_token
	 * @return Client
	 */
	public static function get ($access_token) {
		if (!isset (self::$clients[$access_token])) {
			self::$clients[$access_token] = new self ($access_token);
		}
		
		self::$active_client = self::$clients[$access_token];
		return self::$active_client;
	}
	/**
	 * @return Client
	 */
	public static function active_client () {
		return self::$active_client;
	}
	
	
	/**
	 * @var string
	 */
	private $access_token;

	private function __construct ($access_token) {
		$this->access_token = $access_token;
	}
	public function access_token () {
		return "Bearer {$this->access_token}";
	}
	
	
	public function space ($space_name) {
		$r = Unirest::get ("https://cdn.contentful.com/spaces/{$space_name}");
		
		return $r->body;
	}
	public function contentTypes ($space_name) {
		$r = Unirest::get ("https://cdn.contentful.com/spaces/{$space_name}/content_types");
		
		return $r->body;
	}
	public function contentType ($id, $space_name) {
		$r = Unirest::get ("https://cdn.contentful.com/spaces/{$space_name}/content_types/{$id}");
		
		return $r->body;
	}
	public function entries ($space_name) {
		$r = Unirest::get ("https://cdn.contentful.com/spaces/{$space_name}/entries");
		
		return $r->body;
	}
	public function entry ($id, $space_name) {
		$r = Unirest::get ("https://cdn.contentful.com/spaces/{$space_name}/entries/{$id}");
		
		return $r->body;
	}
	public function assets ($space_name) {
		$r = Unirest::get ("https://cdn.contentful.com/spaces/{$space_name}/assets");
		
		return $r->body;
	}
	public function asset ($id, $space_name) {
		$r = Unirest::get ("https://cdn.contentful.com/spaces/{$space_name}/assets/{$id}");
		
		return $r->body;
	}
	
}