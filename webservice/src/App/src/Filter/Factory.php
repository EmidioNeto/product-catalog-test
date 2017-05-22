<?php

namespace App\Filter;

/**
 * Description of Factory
 *
 * @author reginaldo.neto <emidioneto1@gmail.com>
 */
class Factory
{

    public static function invoke($requestedName)
    {
        return new $requestedName();
    }
}