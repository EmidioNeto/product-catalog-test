<?php

namespace App\Filter\Factory;

/**
 * Description of Factory
 *
 * @author reginaldo.neto <emidioneto1@gmail.com>
 */
class Factory
{

    public static function invoke(string $requestedName): \App\Filter\FilterInterface
    {
        return new $requestedName();
    }
}