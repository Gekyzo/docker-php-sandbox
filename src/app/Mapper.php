<?php

namespace App;

class Mapper
{
    protected static function map($object, $dto): dto
    {
        $values = $object->values();
        $dtoInstance = new $dto;
        $attrs = get_class_vars($dto);

        foreach ($attrs as $k => $v) {
            if (array_key_exists($k, $values)) {
                $dtoInstance->set($k, $values[$k]);
            }
        }

        return $dtoInstance;
    }
}