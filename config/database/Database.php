<?php

namespace Cnf\Database;

use Illuminate\Database\Capsule\Manager as Capsule;

class Database {
    public function __construct()
    {
      $capsule = new Capsule();

      $capsule->addConnection( 
          [
            'driver' => 'mysql',
            'host'   => 'localhost',
            'database' => 'sakila',
            'username' => 'root',
            'password' => '',
            'charset'  => 'utf',
            'collation' => 'utf8_unicode_ci',
          ]
          );

        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }
}