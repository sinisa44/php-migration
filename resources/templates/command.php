<?php

return '<?php


class '. $class_name .' {

    /*
    *Command name
    *
    *@var string
    */
    private $name = "command:command";
    
    /*
    *Command descritpion
    *
    *@var string
    */
    private $description = "decsription";

    /*
    *The run command
    *
    *@param mixed
    /
    public function run( $option = null ) {
        echo "ok";
     }
    

     /*
     *The getter of $name
     * 
     * /
    public function get_name() {
        return $this->name;
    }
    
    /*
    *The getter of $description
    *
    */
    public function get_description() {
        return $this->description;
    }
 }';
