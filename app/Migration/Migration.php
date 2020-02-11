<?php
namespace App\Migrations;

class Migration {
    private $files;

    public function __construct( $files = [] ) {
        $this->files = $files;
    }
    
        
    public function migrate() {
        foreach( $this->files as $file ) {
            if( empty( $file ) ) {
                continue;
            }
            require_once( 'database/tables/'.$file );

            $name = $this->set_table_name( $file );
            $name = new $name;
            $m = $name->create_table( $this->set_table_name( $file ) );
            
        }
    }

    private function set_table_name( $name ) {
        return rtrim( $name, '.php' );
    }
}