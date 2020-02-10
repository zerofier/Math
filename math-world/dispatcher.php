<?php

class dispatcher
{

	protected $routes = array();

	protected $uuid = null;

	public function __construct()
	{
		$this->uuid = uniqid(__CLASS__);
	}

	/**
	 *
	 * @param string $path
	 */
	public function find($path)
	{
		if (isset($this->routes[$path])) {
			return $this->routes[$path];
		} else {
			return null;
		}
	}

	/**
	 *
	 * @param string $path
	 * @param callable $callable
	 */
	public function route($path, $callable)
	{
		$this->routes[$path] = $callable;
	}
	
	
	public function __get($name)
	{
		if ($name == 'routes') {
			return $this->routes;
		}
	}
}

/**
 *
 * @var dispatcher $route
 */
$dispatcher = new dispatcher();
require_once __DIR__ . '/control/index.php';

