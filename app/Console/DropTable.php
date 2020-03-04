<?php

use App\Database\Database;
use App\Message\Message;

class DropTable {
    private $name = "drop:table";

    private $description = "drop table from current database";

    public function run( $option = null ) {
        if( empty( $option ) ){
          echo  Message::display_error( 'Table name is required' );
            exit;
        }
        Database::drop_table( $option, 'resources/files/table_names.txt' );
     }
        
    public function get_name() {
        return $this->name;
    }

    public function get_description() {
        return $this->description;
    }
}