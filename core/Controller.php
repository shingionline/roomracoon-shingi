<?php

namespace Core;

use Exception;

/**
 * Base controller
 *
 * PHP version 7.0
 */

abstract class Controller
{
    protected $route_params = [];

    public function __construct($route_params)
    {
        $this->route_params = $route_params;
    }

    public function __call($name, $args)
    {
        $method = $name . 'Action';

        if (method_exists($this, $method)) {
            if ($this->before() !== false) {
                call_user_func_array([$this, $method], $args);
                $this->after();
            }
        } else {
            
            throw new Exception("Method $method not found in controller " . get_class($this));
        }
    }

    protected function before()
    {
        // any code that needs to be run before the action eg: authentication
    }

    protected function after()
    {
        // any code that needs to be run after the action eg: logging
    }

}