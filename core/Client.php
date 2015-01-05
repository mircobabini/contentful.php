<?php namespace Contentful;

class Client {
	/**
	 * @var array
	 */
	protected static $clients = array ();
	/**
	 * @var Client
	 */
	protected static $active_client;
	
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
	protected $access_token;

	protected function __construct ($access_token) {
		$this->access_token = $access_token;
	}
	public function access_token () {
		return "Bearer {$this->access_token}";
	}
	
	
	public function space ($id) {
		$r = Unirest::get ("https://cdn.contentful.com/spaces/{$id}");
		
		return $r->body;
	}
	public function contentTypes ($space_id, $params = '') {
		$params = $this -> buildparams($params);
		$r = Unirest::get ("https://cdn.contentful.com/spaces/{$space_id}/content_types{$params}");
		
		return $r->body;
	}
	public function contentType ($id, $space_id, $params = '') {
		$params = $this -> buildparams($params);
		$r = Unirest::get ("https://cdn.contentful.com/spaces/{$space_id}/content_types/{$id}{$params}");
		
		return $r->body;
	}
	public function entries ($space_id, $params = '') {
		$params = $this -> buildparams($params);
		$r = Unirest::get ("https://cdn.contentful.com/spaces/{$space_id}/entries{$params}");
		
		return $r->body;
	}
	public function entry ($id, $space_id, $params = '') {
		$params = $this -> buildparams($params);
		$r = Unirest::get ("https://cdn.contentful.com/spaces/{$space_id}/entries/{$id}{$params}");
		
		return $r->body;
	}
	public function assets ($space_id, $params = '') {
		$params = $this -> buildparams($params);
		$r = Unirest::get ("https://cdn.contentful.com/spaces/{$space_id}/assets{$params}");
		
		return $r->body;
	}
	public function asset ($id, $space_id, $params = '') {
		$params = $this -> buildparams($params);
		$r = Unirest::get ("https://cdn.contentful.com/spaces/{$space_id}/assets/{$id}{$params}");
		
		return $r->body;
	}
	private function buildparams($params) {
		if(empty($params)) return '';
		
		if(is_array($params)) {
			foreach($params as $key=>$value) {
				$p_array[] = urlencode($key) . "=" . urlencode($value);
			}
			$result = implode("&",$p_array);
		} else $result = $params;
		return '?'.$result;
	}
	
}