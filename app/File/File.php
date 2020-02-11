<?php

namespace App\Folder;

class File {

   public static function add_row( $data, $file ){
       $file = fopen( $file, 'a' );

       fwrite( $file, $data.'.php'.PHP_EOL);
       fclose( $file );
   }

   public static function remove_row( $name, $file ) {;
        $content = file_get_contents( $file );
        $content = str_replace( $name['1'].'.php', '' , $content );

        file_put_contents( $file, $content );
        self::skip_empty_lines( $file);
   }

   public static function create_file( $file, $name, $txt ) {
        $file = fopen( $file.$name.'.php', 'w' );

        fwrite( $file, $txt );
        fclose( $file ); 
        echo 'create table '. $name;
   }

   private static function skip_empty_lines( $file ) {
        $str = file_get_contents( $file );
        $str = preg_replace( "/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/" , "\n" , $str );

        file_put_contents( $file, $str );
   }

}