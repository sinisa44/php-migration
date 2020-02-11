<?php
require_once 'bootstrap.php';
use App\Folder\Folder;

$txt = '<?php

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

Folder::create_file( 'database/tables/', $argv['1'], $txt);
Folder::add_row( $argv['1'], 'resources/table_names.txt' );




echo 'create table ' . $argv['1'];