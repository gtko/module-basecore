<?php


namespace Modules\BaseCore\Helpers;


class HasInterface
{

    public static function has(string $interface, mixed $objet):bool
    {
        if($objet) {
            $implements = collect(class_implements($objet));
            return $implements->has($interface);
        }

        return false;
    }

}
