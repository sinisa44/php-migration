<?php
require_once 'bootstrap.php';


use Illuminate\Database\Capsule\Manager as Capsule;
use App\Folder\Folder;

try{
    Capsule::schema()->drop( $argv['1'] );

    Folder::remove_row( $argv, 'resources/files/table_names.txt' );

     echo 'delete table ' . $argv['1'] ;
}catch( Throwable $th ) {
    echo $th->getMessage();
}

