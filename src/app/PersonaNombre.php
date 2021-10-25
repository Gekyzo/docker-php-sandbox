<?php

namespace App;

class PersonaNombre
{
    use Getters;

    public function __construct(
        public string $value,
    ) {
    }

}