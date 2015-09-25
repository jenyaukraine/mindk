<?php
class Routing extends Students
{  
    var $main_action = 'index';
    function __construct()
    {
        $this->routs = explode('/', $_SERVER['REQUEST_URI']);
        if (isset($this->routs[1])) {
            $this->action = $this->routs[1];
            $this->get_routs();
        }
    }    
    function get_routs()
    {
        $action      = $this->action;
        $main_action = $this->main_action;
        if (method_exists($this, $action))
            $this->$action();
        else
            $this->$main_action();   
    }    
}
?>