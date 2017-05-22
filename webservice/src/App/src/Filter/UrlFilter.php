<?php

namespace App\Filter;

/**
 * Description of UrlFilter
 *
 * @author reginaldo.neto
 */
class UrlFilter implements FilterInterface
{
    public function filter($value)
    {
        if (substr($value, 0, 4) != "http") {
            $value = 'http://'.$value;
        }
        echo $value.PHP_EOL;
        return $value;
    }
}