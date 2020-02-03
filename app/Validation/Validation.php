<?php

namespace App\Validation;

use Throwable;

class Validation {

    private static $errors = [];

    public static function validate( $value, $rules = [] ) {

        foreach( $rules as $rule ) {
            if( strpos($rule, 'min' ) !== false ){
              static::min( $value , substr( $rule, 4 ) );
            }

            if( strpos( $rule, 'max' ) !== false ) {
                static::max( $value, substr( $rule, 4) );
            }

            if( $rule == 'required'  || $rule == 'email' || $rule == 'integer' ){
                static::$rule( $value );
            }
        }
        
        foreach( static::$errors as $err ){
          if( ! empty( $err ) ) {
              exit ( $err );
          }
        }
        
        return true;
    }

    private function required( $string ) {
        if( empty( $string ) ) {
            
            // exit( 'error field is required' );
            static::$errors['req_err'] = 'error value is required';
        }
      
    }
    

    private function email(){}
    private function integer( $value ){
        if( ! is_int( $value ) ) {
            // exit( 'error value is not integer' );
            static::$errors['int_err'] = 'error value is not integer';
        }
    }

    private function min( $value, $length ) {

        if( strlen(( string ) $value ) <= $length ) {
            static::$errors['min_err'] = 'error min value is '. $length;
        }
       
    }
    private function max( $value, $length ) {
        if( strlen( ( string ) $value) >= $length ) {
            static::$errors['int_err'] = 'error max value is ' . $length;
        }
    }

}