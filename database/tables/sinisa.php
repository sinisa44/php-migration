<?php

use Illuminate\Database\Capsule\Manager as Capsule;
use App\Message\Message;

class sinisa {

    public function create_table( $table_name ) {
        if( ! Capsule::schema()->hasTable( $table_name ) ) {
            
            Capsule::schema()->create ($table_name, function ( $table ) {
                $table->increments("id");
                $table->timestamps();
            });
         
            Message::display_success( "table " . $table_name . " created" );
        }else {
          
            Message::display_error( "Table " . $table_name. " exists in database");
        }
    }
}