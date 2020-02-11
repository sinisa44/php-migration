<?php

require_once "vendor/autoload.php";


use Illuminate\Database\Capsule\Manager as Capsule;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$capsule = new Capsule();

$capsule->addConnection( 
    [
      'driver'    => getenv( 'DB_DRIVER' ),
      'host'      => getenv( 'DB_HOST' ),
      'database'  => getenv( 'DB_DATABASE' ),
      'username'  => getenv( 'DB_USERNAME' ),
      'password'  => getenv( 'DB_PASSWORD' ),
      'charset'   => 'utf8',
      'collation' => 'utf8_unicode_ci',
    ]
    );


  $capsule->setAsGlobal();
  $capsule->bootEloquent();
