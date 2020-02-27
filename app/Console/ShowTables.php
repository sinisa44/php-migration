<?php

use App\Database\Database;

class ShowTables {
    private $name = "show:tables";
    private $description = "display tables from current database";

    public function run( $option = null ) {
        $name = 'Tables_in_'.getenv( 'DB_DATABASE' );
        Database::show_tables( $name );
     }
        
    public function get_name() {
        return $this->name;
    }

    public function get_description() {
        return $this->description;
    }
 }