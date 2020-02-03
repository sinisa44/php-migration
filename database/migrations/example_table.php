<?php

use Illuminate\Database\Capsule\Manager as Capsule;

class example_table {

    public function create_table( $table_name ) {
        if( ! Capsule::schema()->hasTable( $table_name) ) {
            
            Capsule::schema()->create ($table_name, function ( $table ) {
                $table->increments('id');
                $table->string('email')->unique();
                $table->timestamps();
            });

        }
    }
}