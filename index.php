<?php
require_once "bootstrap.php";

use App\Validation\Validation;


$name = 'sinisaail.com';
 Validation::validate( $name, ['required', 'email'] );
?>