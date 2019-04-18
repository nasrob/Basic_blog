<?php

/**
 * App Core class
 * Creates URL and loads Base (core) Controller
 * URL format: /controller/method/params
 */
class Core {
    
    protected $current_controller = 'Pages';
    protected $current_method = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->getUrl();

        // look for controller
        if (file_exists('app/controllers/' . ucwords($url[1]) . '.php')) {
            // assigne new controller value
            $this->current_controller = ucwords($url[1]);
            // unset controller name from url array
            //array_splice($url, 0, 2);
        }
        
        // require the controller
        require_once 'app/controllers/' . $this->current_controller . '.php';
        
        // Instantiate controller class
        $this->current_controller = new $this->current_controller;
        
        // extract the method form the url
        if (isset($url[2])) {
            if (method_exists($this->current_controller, $url[2])) {
                $this->current_method = $url[2];
            }

            // unset controller and method name from url array
            array_splice($url, 0, 3);
        }
        
        // extract url params
        $this->params = $url ? array_values($url) : [];
        
        // make a callback to this->current_method with array of params
        call_user_func_array(
            [
                $this->current_controller,
                $this->current_method
            ],
            $this->params
        );
    }

    /**
     * extract URL from request
     *
     * @return string $url
     */
    public function getUrl()
    {
        
        if (isset($_SERVER['REQUEST_URI'])) {
            $url = rtrim($_SERVER['REQUEST_URI'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}