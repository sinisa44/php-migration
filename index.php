<?php
require_once "bootstrap.php";

use App\Validation\Validation;


$name = 'sinisa';
Validation::validate($name, ['required']);
?>