<?php

namespace App\Database;

use App\File\File;
use Illuminate\Database\Capsule\Manager as Capsule;
use App\Message\Message;

class Database {
    
    /** 
    *Display all tables from database
    *
    *@param string $table_name
    *
    *@return void
    **/
    public static function show_tables( $table_name ){
        $tables =  Capsule::schema()->getAllTables();
        
        if( $tables ) {
            for( $i = 0; $i < count( $tables ); $i++ ) {
                  echo Message::color_text( ' TABLE ', '44') .
                       Message::color_text( $tables[$i]->$table_name, '104' ) . PHP_EOL;
            }
        }
    }
    
    /** 
    *Display columns for selected table
    *
    *@param string $table_name
    *
    *@throws Error if table is not exist
    **/
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
            Message::display_error( 'Table ' .$table_name.' does not exist in database' );
        } 
    }
    
    /**
     * Drops table from current database and remove row from file
     * 
     * @param string $command
     * @param file $file
     * 
     * @throws Error if table is not exist
     */
    public static function drop_table( $command, $file ) {
        if( ! Capsule::schema()->hasTable( $command ) ){
            Message::display_error( $command. ' does not exist in database' );
            exit;
        }

        Message::display_info( 'Are you sure you want to delete table ' . $command . ' ? (yes/no)' );

        $handle = fopen( 'php://stdin', 'r' );
        $line   = fgets( $handle );
        
        if( trim( $line) != 'yes' ){
            Message::display_error_action( 'ABORTING . . .' );
            exit;
        }else{
          
        Capsule::schema()->drop( $command );
        File::remove_row( $command, $file );        
        Message::display_success( 'Deleting table ' . $command .' . . .' );

        } 
    }
    /**
     * Rename table
     *
     * @throws Message error if table is not exist 
     * @return void
     */

    public static function rename_table() {
        $tables = Capsule::schema()->getAllTables();
        
         Message::display_info( 'Which table do you want to rename ?');

         $old_name = self::handle_cli( 'php://stdin');
        
         if( Capsule::schema()->hasTable( $old_name ) ) {
            Message::display_info( 'chose new name for table' );
 
            $new_name = self::handle_cli( 'php://stdin' );
            
            $rename =  Capsule::schema()->rename( $old_name, $new_name );
                
            Message::display_success( 'Table ' . $old_name . ' is renamed to ' . $new_name );
            
        }else{
            Message::display_error( 'There is no table with name: "' . $old_name . '"' );
        }
    }
    

    /**
     * Trims file name
     * 
     * @param string
     * 
     * @return string
     */
    private static function handle_cli( $handle ) {
        return trim( fgets( fopen( $handle, 'r' ) ) );
    }
}