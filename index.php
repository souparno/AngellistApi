<?php
include_once './_core/class.Core.php';
include_once './controllers/controllers.php';

Class RouteEngine extends Core {

    public function __construct() {
        parent::__construct();
        $this->load->_CLASS("Index");
    }

    public function dispatch($requestURI) {
        $requestURI=  explode("?", $requestURI)[0];
        switch ($requestURI) {

            case "/":    
                $this->load->_CLASS("Index");
                $this->index->retrieve();
                break;
            
        }
    }

}

$routeEngine = new RouteEngine();
$routeEngine->dispatch($_SERVER["REQUEST_URI"]);







