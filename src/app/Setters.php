<?php

namespace App;

trait Setters
{
    public function set($fieldName, $value)
    {
        $this->$fieldName = $value;
    }
}