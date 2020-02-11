<?php

require_once 'bootstrap.php';

use App\Migrations\Migration;

 $table_names = file( 'resources/table_names.txt', FILE_IGNORE_NEW_LINES);
 $migration = new Migration( $table_names );
 $migration->migrate();

?>