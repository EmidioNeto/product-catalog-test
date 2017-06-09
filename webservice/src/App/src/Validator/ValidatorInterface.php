<?php

namespace App\Validator;

/**
 *
 * @author reginaldo.neto <emidioneto1@gmail.com>
 */
interface ValidatorInterface
{

    function isValid(string $value): bool;
}