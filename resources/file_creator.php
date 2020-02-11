<?php
require_once 'bootstrap.php';
use App\File\File;


File::create_file( 'database/tables/', $argv['1'] , include( 'templates/migration.php' ) );
File::add_row( $argv['1'], 'resources/files/table_names.txt' );

