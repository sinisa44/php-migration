<?php

namespace App\Database;

use App\File\File;
use Illuminate\Database\Capsule\Manager as Capsule;

class Database {

    public static function show_tables( $table_name ){
        $tables =  Capsule::schema()->getAllTables();
        
        if( $tables ) {
            for( $i = 0; $i < count( $tables ); $i++ ) {
               echo '| Table | ' . $tables[$i]->$table_name . PHP_EOL;
            }
        }
    }
  
    public static function show_columns( $table_name ) {
        $table = Capsule::schema()->getColumnListing( $table_name );
    
        if( $table ) {
        for( $i = 0; $i < count( $table ); $i++ ) {
            $column_type = Capsule::schema()->getColumnType( $table_name, $table[$i] );
            
                echo $i . ' | '. $column_type . ' | ' . $table[$i] . PHP_EOL;
        }
        }else{
            echo $table_name . ' does not exist in database' . PHP_EOL;
        } 
    }

    public static function drop_table( $command, $file ) {
    
    echo "Are you sure you want to delete table ". $command . ' ? ';

    $handle = fopen( 'php://stdin', 'r' );
    $line = fgets( $handle );
    
    if( trim( $line) != 'yes' ){
        echo "ABORTING.. \n";
        exit;
    }else{
        Capsule::schema()->drop( $command );
        File::remove_row( $command, $file );
        echo 'delete table ' . $command;

    } 
}

    
}