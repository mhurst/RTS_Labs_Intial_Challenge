<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class cache {
	public $cache_data = [];
	protected $cache_data_max_limit = 3;

	public function __construct($cache_data_max_limit) {
		$this->cache_data_max_limit = $cache_data_max_limit;
	}

	public function set_cache($cache_key, $cache_data) {
		if (
			count($this->cache_data) == $this->cache_data_max_limit
			&& !isset($this->cache_data[$cache_key])
		) {
			array_shift($this->cache_data);
			$this->cache_data[$cache_key] = $cache_data;
		} else {
			$this->cache_data[$cache_key] = $cache_data;
		}

		
	}

	public function get_cache_by_key($key) {
		return $this->cache_data[$key];
	}

	public function set_cache_data_max_limit($new_cache_size) {
		if (
			$new_cache_size < $this->cache_data_max_limit 
			&& count($this->cache_data) >= $new_cache_size
		) {
			$this->reduce_cache_size($new_cache_size);
		}

		$this->cache_data_max_limit = $new_cache_size;

	}

	public function reduce_cache_size($new_cache_size) {	
		$size_off_by = count($this->cache_data) - $new_cache_size;

		for($i=0;$i<$size_off_by;$i++) {
			array_shift($this->cache_data);
		}
	}
}

$cache = new Cache(4);

$cache->set_cache('first key', 'My first cache');
$cache->set_cache('second key', 'My first cache');
$cache->set_cache('third key', 'My first cache');

echo '<pre>';
var_dump($cache->cache_data);
echo '</pre>';

$cache->set_cache_data_max_limit(2);

echo '<pre>';
var_dump($cache->cache_data);
echo '</pre>';