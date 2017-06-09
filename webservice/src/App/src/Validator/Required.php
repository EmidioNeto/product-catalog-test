<?php

namespace App\Validator;

/**
 * Description of Required
 *
* @author reginaldo.neto <emidioneto1@gmail.com>
 */
class Required implements ValidatorInterface
{

    public function isValid(string $value) : bool
    {
        if ((empty($value) || is_null($value))) {
            return false;
        }
        return true;
    }
}