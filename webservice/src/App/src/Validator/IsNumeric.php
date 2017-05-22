<?php

namespace App\Validator;

/**
 * Description of IsNumeric
 *
* @author reginaldo.neto <emidioneto1@gmail.com>
 */
class IsNumeric {

    public function isValid($value) {
        if (empty($value)) {
            return true;
        }
        $isNumeric = (
                is_numeric($value)
                );        
        return $isNumeric;
    }

}
