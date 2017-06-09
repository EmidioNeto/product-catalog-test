<?php

namespace App\Validator;

/**
 * Description of IsNumeric
 *
 * @author reginaldo.neto <emidioneto1@gmail.com>
 */
class IsNumeric implements ValidatorInterface
{

    public function isValid(string $value): bool
    {
        if (empty($value)) {
            return true;
        }
        $isNumeric = (
            is_numeric($value)
            );
        return $isNumeric;
    }
}