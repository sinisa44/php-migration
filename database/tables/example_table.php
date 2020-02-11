<?php

use Illuminate\Database\Capsule\Manager as Capsule;

class example_table {

    public function create_table( $table_name ) {
        if( ! Capsule::schema()->hasTable( $table_name ) ) {
            
            Capsule::schema()->create ($table_name, function ( $table ) {
                $table->increments("id");
                $table->string( 'name' );
                $table->string( 'email' );
                $table->integer( 'age' );
                $table->timestamps();
            });

        }else {
            echo "table ".$table_name." exists";
        }
    }
}