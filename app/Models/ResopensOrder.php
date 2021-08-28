<?php

namespace App\Models;

class ResopensOrder 
{

    private $status;
    private $message;
    public function __construct( $status,  $message)
    {
        $this-> status =  $status;
        $this-> message =  $message;

    }
  
}
