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

            $name = $this->set_table_name( $file );
            $name = new $name;

            $name->create_table( $this->set_table_name( $file ) );
        }
    }

    private function set_table_name( $name ) {
        return rtrim( $name, '.php' );
    }
}