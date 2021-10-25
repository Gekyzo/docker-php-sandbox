<?php

namespace App;

trait Getters
{
    public function get($campo)
    {
        $attribute = strtolower($campo);

        return $this->{$campo};
    }
}