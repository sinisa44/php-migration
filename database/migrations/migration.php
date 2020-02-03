<?php
namespace DB\Migrations;

class Migration {
    private $files;

    public function __construct( $files = [] ) {
        $this->files = $files;
    }
    
        
    public function migrate() {
        foreach( $this->files as $file ) {
            require_once( $file );

            $name = rtrim( $file, '.php' );

            $name = new $name;
            $name->create_table();
        }
    }
}