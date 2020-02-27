<?php

use App\Database\Database;
use App\Message\Message;

class ShowColumns {
    private $name = "show:columns";
    private $description = "display columns for selected table";

    public function run( $option = null ) {
        if( empty( $option ) ) {
            Message::display_error( 'Table name is reuqired' );
        }
        Database::show_columns( $option );
     }
        
    public function get_name() {
        return $this->name;
    }

    public function get_description() {
        return $this->description;
    }
 }