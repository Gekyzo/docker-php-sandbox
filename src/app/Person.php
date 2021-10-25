<?php

namespace App;

class Person
{
    use Getters;

    public PersonaNombre $nombre;

    public int $edad;

    public Phone $phone;

    public function __construct(PersonaNombre $nombre, int $edad, Phone $phone)
    {
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->phone = $phone;
    }

    public function values(): array
    {
        $vars = get_class_vars(__CLASS__);

        $str = [];

        foreach ($vars as $key => $value) {
            $str[$key] = $this->{$key};
        }

        return $str;
    }
}