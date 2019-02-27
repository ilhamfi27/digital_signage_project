<?php
class User_session {
    private $_ci;
    public function __construct() {
        parent::__construct();
        $this->_ci->library('session');
    }

    
}
