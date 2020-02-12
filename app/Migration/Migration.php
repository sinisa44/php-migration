<?php
namespace App\Migrations;

use App\File\File;
use Illuminate\Database\Capsule\Manager as Capsule;

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
            $name->create_table( $this->set_table_name( $file ) );
            
        }
    }

    public static function make_migration( $command, $template, $file_name ) {
        $class_name = $command;
        File::create_file( 'database/tables/', $command, include( $template ) );
        File::add_row( $command, $file_name  );
    }

    public static function drop_migration( $command, $file ) {
        Capsule::schema()->drop( $command );
        File::remove_row( $command, $file );
        echo 'delete table ' . $command;
    }

    private function set_table_name( $name ) {
        return rtrim( $name, '.php' );
    }
}