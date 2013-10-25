<?php namespace Contentful;

class Client {
	/**
	 * @var array
	 */
	private static $clients = array ();

	/**
	 * @param string $access_token
	 * @return Client
	 */
	public static function get ($access_token) {
		if (!isset (self::$clients[$access_token])) {
			self::$clients[$access_token] = new self ($access_token);
		}
		
		return self::$clients[$access_token];
	}
	
	
	/**
	 * @var string
	 */
	private $access_token;

	private function __construct ($access_token) {
		$this->access_token = $access_token;
	}
	
	
	public function space ($space_name) {
		$r = Unirest::get ("https://cdn.contentful.com/spaces/{$space_name}", array (
			'Content-Type' => 'application/vnd.contentful.management.v1+json',
			'Authorization' => "Bearer {$this->access_token}"
		));
		
		return $r->body;
	}
	public function contentTypes ($space_name) {
		$r = Unirest::get ("https://cdn.contentful.com/spaces/{$space_name}/content_types", array (
			'Content-Type' => 'application/vnd.contentful.management.v1+json',
			'Authorization' => "Bearer {$this->access_token}"
		));
		
		return $r->body;
	}
	public function contentType ($id, $space_name) {
		$r = Unirest::get ("https://cdn.contentful.com/spaces/{$space_name}/content_types/{$id}", array (
			'Content-Type' => 'application/vnd.contentful.management.v1+json',
			'Authorization' => "Bearer {$this->access_token}"
		));
		
		return $r->body;
	}
	public function entries ($space_name) {
		$r = Unirest::get ("https://cdn.contentful.com/spaces/{$space_name}/entries", array (
			'Content-Type' => 'application/vnd.contentful.management.v1+json',
			'Authorization' => "Bearer {$this->access_token}"
		));
		
		return $r->body;
	}
	public function entry ($id, $space_name) {
		$r = Unirest::get ("https://cdn.contentful.com/spaces/{$space_name}/entries/{$id}", array (
			'Content-Type' => 'application/vnd.contentful.management.v1+json',
			'Authorization' => "Bearer {$this->access_token}"
		));
		
		return $r->body;
	}
	public function assets ($space_name) {
		$r = Unirest::get ("https://cdn.contentful.com/spaces/{$space_name}/assets", array (
			'Content-Type' => 'application/vnd.contentful.management.v1+json',
			'Authorization' => "Bearer {$this->access_token}"
		));
		
		return $r->body;
	}
	public function asset ($id, $space_name) {
		$r = Unirest::get ("https://cdn.contentful.com/spaces/{$space_name}/assets/{$id}", array (
			'Content-Type' => 'application/vnd.contentful.management.v1+json',
			'Authorization' => "Bearer {$this->access_token}"
		));
		
		return $r->body;
	}
	
}