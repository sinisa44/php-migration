<?php
require_once 'bootstrap.php';
use App\Folder\Folder;


Folder::create_file( 'database/tables/', $argv['1'] , include( 'templates/migration.php' ) );
Folder::add_row( $argv['1'], 'resources/table_names.txt' );

