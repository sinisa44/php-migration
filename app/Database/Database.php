<?php

namespace App\Database;

use App\File\File;
use Illuminate\Database\Capsule\Manager as Capsule;
use App\Message\Message;

class Database {

    public static function show_tables( $table_name ){
        $tables =  Capsule::schema()->getAllTables();
        
        if( $tables ) {
            for( $i = 0; $i < count( $tables ); $i++ ) {
                  echo Message::color_text( ' TABLE ', '44') .
                       Message::color_text( $tables[$i]->$table_name, '104') . PHP_EOL;
            }
        }
    }
  
    public static function show_columns( $table_name ) {
     
        $table = Capsule::schema()->getColumnListing( $table_name );
    
        if( $table ) {
        for( $i = 0; $i < count( $table ); $i++ ) {
            $column_type = Capsule::schema()->getColumnType( $table_name, $table[$i] );
            
            echo Message::color_text( $i, '44' ) .
                 Message::color_text( $column_type, '104') .
                 Message::color_text( $table[$i], '44' ) . PHP_EOL.PHP_EOL;
        }
        }else{
            Message::display_error( $table_name.' does not exist in database' );
        } 
    }

    public static function drop_table( $command, $file ) {
    
        Message::display_info( 'Are you sure you want to delete table ' . $command . ' ? (yes/no)' );

        $handle = fopen( 'php://stdin', 'r' );
        $line   = fgets( $handle );
        
        if( trim( $line) != 'yes' ){
            Message::display_error_action( 'ABORTING . . .' );
            exit;
        }else{
            Capsule::schema()->drop( $command );

            File::remove_row( $command, $file );
            
            Message::display_success( 'Deleting table ' . $command .' . . .');

        } 
    }

    
}