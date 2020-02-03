<?php
$name = $argv['1'].'.php';

$myfile = fopen('database/tables/' . $name , 'w' );

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


fwrite( $myfile, $txt );
fclose( $myfile );


$fp = fopen('resources/table_names.txt', 'a' );
if ($fp) {
    $bytes_written = fwrite( $fp, $argv['1'].'.php'. PHP_EOL );

    $success = fclose( $fp );
}