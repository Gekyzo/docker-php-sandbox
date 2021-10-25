<?php

namespace App;

use ReflectionException;

class Hello
{
    /**
     * @throws ReflectionException
     */
    public function salute()
    {
        $person = new Person(new PersonaNombre('Ciro'), 33, new Phone(612345678));

        echo '<pre>';

        print_r(PersonaMapper::map($person, PersonOutputDto::class));

        echo '</pre>';
    }
}
