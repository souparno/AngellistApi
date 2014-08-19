<?php

class Index extends Controller {

    public function __construct() {
        parent::__construct();
        $this->load->_CLASS("Jobs");
        $this->load->_CLASS("Tags");
    }

    public function retrieve($ajaxify = NULL) {
        
        if (sizeof($_POST)) {
            $slct = $_POST["slct"];
            $result=$this->tags->get($slct);
        }
        
        $response = $this->jobs->get();
        require_once './views/index.php';
    }

}

class AngenList extends Controller {

    public $endpointUrl = 'https://api.angel.co/1';

    public function __construct() {
        parent::__construct();
    }

    public function getResponse($url) {
        $response = array();
        if ($json = file_get_contents($url)) {
            if ($response = json_decode($json, true)) {
                return $response;
            }
        }
        return $response;
    }

}

class Jobs extends AngenList {

    public $name = 'jobs';

    public function __construct() {
        parent::__construct();
    }

    public function get($id = null) {
        $url = $this->endpointUrl . '/' . $this->name . '/' . $id;
        return $this->getResponse($url);
    }

}

class Tags extends Jobs {
    
    public $name= "tags";

    public function __construct() {
        parent::__construct();
    }

    public function get($id = null) {
        $url = $this->endpointUrl . '/' . $this->name . '/' . $id ."/jobs";
        return $this->getResponse($url);
    }

}
