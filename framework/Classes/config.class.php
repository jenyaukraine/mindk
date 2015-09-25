<?php
class Config {
    private $_parameters;
    public function __construct($stringConfig = array() ) {
        if ( empty($stringConfig) )
            $stringConfig = json_decode(file_get_contents('../app/config.json'));
        $this->_parameters = $stringConfig;
    }
    public function __get($param) {
		$result = '';
        if ( !empty($this->_parameters->$param) )
            $result = $this->_parameters->$param;
        if ( is_array($this->_parameters->$param) )
            $result = new Config($this->_parameters->$param);
        return $result;
    }
    public function __toString() {
        return '';
    }
}