<?php

namespace App;

use ReflectionClass;
use ReflectionException;

class PersonaMapper extends Mapper
{

    /**
     * @throws ReflectionException
     */
    #[MapAttr('PersonaNombre.nombre')]
    public static function map($object, $dto): dto
    {
        $c = new ReflectionClass(PersonaMapper::class);
        $m = $c->getMethod('map');
        $methodAnnotations = $m->getAttributes();
        $entityAttrs = $object->values();
        $dtoInstance = new $dto;
        $dtoAttrs = get_class_vars($dto);

        foreach ($dtoAttrs as $dtoAttrKey => $dtoAttrVal) {
            if (array_key_exists($dtoAttrKey, $entityAttrs)) {
                foreach ($methodAnnotations as $methodAnnot) {
                    $methodAnn = $methodAnnot->newInstance();
                    if ($methodAnn instanceof MapAttr) {
                        $c = $methodAnn->getObject();
                        if ($dtoAttrKey == $methodAnn->getCampoDto()) {
                            $rc = new ReflectionClass($entityAttrs[$dtoAttrKey]);
                            if ($rc->getShortName() == $c) {
                                $dtoInstance->set($dtoAttrKey, $object->{$methodAnn->getCampoDto()}->get('value'));
                            }
                        } else {
                            $dtoInstance->set($dtoAttrKey, $entityAttrs[$dtoAttrKey]);
                        }
                    }
                }
            }
        }

        return $dtoInstance;
    }

}

function debug($a)
{
    echo '<pre>';
    echo "\n\n\n+++DEBUG:+++\n\n\n";
    print_r($a);
    echo '</pre>';
}