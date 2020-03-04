<?php

return '<?php

use Illuminate\Database\Capsule\Manager as Capsule;
use App\Message\Message;

class '. $class_name .' {

    public function create_table( $table_name ) {
        if( ! Capsule::schema()->hasTable( $table_name ) ) {
            
            Capsule::schema()->create ($table_name, function ( $table ) {
                $table->increments("id");
                $table->timestamps();
            });
         
          echo  Message::display_success( "table " . $table_name . " created" );
        }else {
          
          echo  Message::display_error( "Table " . $table_name. " exists in database");
        }
    }
}';
