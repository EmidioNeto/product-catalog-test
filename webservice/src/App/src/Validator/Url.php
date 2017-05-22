<?php

namespace App\Validator;

/**
 * Description of Url
 *
 * @author reginaldo.neto <emidioneto1@gmail.com>
 */
class Url
{

    public function isValid($value)
    {
        $pattern = '#((http?)://(\S*?\.\S*?))([\s)\[\]{},;"\':<]|\.\s|$)#i';
        return preg_match($pattern, $value) == 1;
    }
}