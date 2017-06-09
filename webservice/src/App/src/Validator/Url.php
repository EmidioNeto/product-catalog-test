<?php

namespace App\Validator;

/**
 * Description of Url
 *
 * @author reginaldo.neto <emidioneto1@gmail.com>
 */
class Url implements ValidatorInterface
{

    public function isValid(string $value): bool
    {
        $pattern = '#((http?)://(\S*?\.\S*?))([\s)\[\]{},;"\':<]|\.\s|$)#i';
        return preg_match($pattern, $value) == 1;
    }
}