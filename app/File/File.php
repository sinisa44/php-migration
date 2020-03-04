<?php

namespace App\File;
use App\Message\Message;

class File {
  
  /**
   * Add new row to file
   * 
   * @param string $data
   * @param string $file
   * 
   * @return void
   */
   public static function add_row( $data, $file ){
       $file = fopen( $file, 'a' );

       fwrite( $file, $data.'.php'.PHP_EOL);
       fclose( $file );
   }
     
   /**
    * Remove row to file
    *
    *@param string $name
    *@param string $file
    *
    *@return void
    */
   public static function remove_row( $name, $file ) {;
        $content = file_get_contents( $file );
        $content = str_replace( $name.'.php', '' , $content );

        file_put_contents( $file, $content );
        self::skip_empty_lines( $file);
   }
   
   /**
    * Create new file
    *
    *@param string $file
    *@param string $name
    *@param string $txt
    *
    *@return void
    */
   public static function create_file( $file, $name, $txt ) {
        $file = fopen( $file.$name.'.php', 'w' );

        fwrite( $file, $txt );
        fclose( $file ); 
     //    echo 'create table '. $name;
        echo Message::display_success( 'create ' . $name  );
   }
   
   /**
    *Skips empty lines in file 
    *
    *@param string $file
     *
     * @return void
    */
   private static function skip_empty_lines( $file ) {
        $str = file_get_contents( $file );
        $str = preg_replace( "/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/" , "\n" , $str );

        file_put_contents( $file, $str );
   }

}