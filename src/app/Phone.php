<?php

namespace App;

class Phone
{
    use Getters;

    public function __construct(
        public int $value,
    ) {
    }
}