<?php

namespace App;

use Attribute;

#[
    Attribute(Attribute::IS_REPEATABLE | Attribute::TARGET_METHOD)] class MapAttr
{
    private string $object;
    private string $dto;

    public function __construct($c)
    {
        $this->object = explode('.', $c)[0];
        $this->dto = explode('.', $c)[1];
    }

    public function getObject(): string
    {
        return $this->object;
    }

    public function getCampoDto(): string
    {
        return $this->dto;
    }


}