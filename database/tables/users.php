<?php

use Illuminate\Database\Capsule\Manager as Capsule;
use App\Message\Message;

class users {

    public function create_table( $table_name ) {
        if( ! Capsule::schema()->hasTable( $table_name ) ) {
            
            Capsule::schema()->create ($table_name, function ( $table ) {
                $table->increments("id");
		$table->string('name', 45);
		$table->string('email', 45);
		$table->string('password', 45);
		$table->string('token');
                $table->timestamps();
            });
         
            Message::display_success( "table " . $table_name . " created" );
        }else {
          
            Message::display_error( "Table " . $table_name. " exists in database");
        }
    }
}
