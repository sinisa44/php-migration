<?php

use App\Database\Database;

class RenameTable {
    private $name = "rename:table";
    private $description = "Rename selected table in current database";

    public function run( $option = null ) {
    Database::rename_table() ;     
    }
        
    public function get_name() {
        return $this->name;
    }

    public function get_description() {
        return $this->description;
    }
 }