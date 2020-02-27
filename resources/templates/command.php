<?php

return '<?php


class '. $class_name .' {
    private $name = "command:command";
    private $description = "decsription";

    public function run( $option = null ) {
        echo "ok";
     }
        
    public function get_name() {
        return $this->name;
    }

    public function get_description() {
        return $this->description;
    }
 }';
