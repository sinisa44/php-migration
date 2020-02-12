<?php
namespace App\Migrations;

use App\File\File;
use Illuminate\Database\Capsule\Manager as Capsule;

class Migration {
   
    public function __construct( $files = [] ) {
        $this->files = $files;
    }
    
        
    public static function migrate( $table_names ) {
        foreach( $table_names as $t_name ) {
            if( empty( $t_name ) ) { continue; }
            
            require_once( 'database/tables/'.$t_name );

            $name = self::set_table_name( $t_name );
            $name = new $name;
            $name->create_table( self::set_table_name( $t_name ) );
            
        }
    }

    public static function make_migration( $command, $template, $file_name ) {
        $class_name = $command;
         
        File::create_file( 'database/tables/', $command, include( $template ) );
        File::add_row( $command, $file_name  );
    }

    

    public static function show_tables( $table_name ){
      $tables =  Capsule::schema()->getAllTables();
      $i = 0;

      foreach( $tables as $table ){
          $i++;
        echo '| Table | '. $tables[$i-1]->$table_name . PHP_EOL;
      }
    }

    public static function show_columns( $table_name ) {
        $table = Capsule::schema()->getColumnListing( $table_name );
        print_r( $table );
    }

    private static function set_table_name( $name ) {
        return rtrim( $name, '.php' );
    }
}