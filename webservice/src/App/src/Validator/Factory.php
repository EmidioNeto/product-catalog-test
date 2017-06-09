<?php

namespace App\Validator;

/**
 * Description of Factory
 *
 * @author reginaldo.neto <emidioneto1@gmail.com>
 */
class Factory
{

    public static function invoke($requestedName): ValidatorInterface
    {
        return new $requestedName();
    }
}