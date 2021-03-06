<?php

class Core {

    public $load;

    public function __construct() {
        $this->load = $this;
    }

    public function _CLASS($class) {
        if (is_array($class)) {
            foreach ($class as $name) {
                $this->model($name);
            }
        }

        if ($class == '') {
            return;
        }

        $name = strtolower($class);
        if (!isset($this->$name))
            $this->$name = new $class();
    }

}

class Controller extends Core {

    public function __construct() {
        parent::__construct();
    }

}

class Model extends Core {

    public function __construct() {
        parent::__construct();
    }

}
