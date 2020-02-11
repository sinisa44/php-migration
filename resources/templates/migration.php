<?php

return '<?php

use Illuminate\Database\Capsule\Manager as Capsule;

class '. $argv['1'].' {

    public function create_table( $table_name ) {
        if( ! Capsule::schema()->hasTable( $table_name ) ) {
            
            Capsule::schema()->create ($table_name, function ( $table ) {
                $table->increments("id");
                $table->timestamps();
            });

        }else {
            echo "table ".$table_name." exists";
        }
    }
}';
