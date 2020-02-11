<?php
require_once 'bootstrap.php';


use Illuminate\Database\Capsule\Manager as Capsule;
use App\Folder\Folder;

try{
    Folder::remove_row( $argv, 'resources/table_names.txt' );

     echo 'delete table ' . $argv['1'] ;
}catch( Throwable $th ) {
    echo $th->getMessage();
}

