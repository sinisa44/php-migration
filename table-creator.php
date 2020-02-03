<?php

require_once 'bootstrap.php';

use DB\Migrations\Migration;


 $files = [
     'test_table.php',
     'test2_table.php'
 ];

 $migration = new Migration( $files );
 $migration->migrate();
 
