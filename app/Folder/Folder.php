<?php

namespace App\Folder;

class Folder {

   public static function remove_row( $name, $file ) {;
        $content = file_get_contents( $file );
        $content = str_replace( $name['1'].'.php', '' , $content );
        file_put_contents( $file, $content );
   }

}