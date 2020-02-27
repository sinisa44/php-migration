<?php

use App\Migration\Migration;

class Migrate {
    private $name = "migrate";
    private $description = "migrates table";

    public function run( $option = null ) {
        $name = 'Tables_in_'.getenv( 'DB_database' );
        Migration::migrate( file( 'resources/files/table_names.txt', FILE_IGNORE_NEW_LINES), $name);
     }
        
    public function get_name() {
        return $this->name;
    }

    public function get_description() {
        return $this->description;
    }
 }