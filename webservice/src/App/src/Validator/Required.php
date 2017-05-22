<?php

namespace App\Validator;

/**
 * Description of Required
 *
* @author reginaldo.neto <emidioneto1@gmail.com>
 */
class Required
{

    public function isValid($value)
    {
        if ((empty($value) || is_null($value))) {
            return false;
        }
        return true;
    }
}