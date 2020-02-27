<?php

use App\Message\Message;
use App\Migration\Migration;


class MakeMigration {
    private $name = "make:migration";
    private $description = "decsription";

    public function run( $option = null ) {
        if( empty( $option ) ) {
            Message::display_error( 'migration name is required' );
            exit;
        }

        Migration::make_migration( $option, 'resources/templates/migration.php', 'resources/files/table_names.txt');
       
     }
        
    public function get_name() {
        return $this->name;
    }

    public function get_description() {
        return $this->description;
    }
 }