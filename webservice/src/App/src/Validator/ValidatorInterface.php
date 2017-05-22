<?php

namespace App\Validator;

/**
 *
 * @author reginaldo.neto <emidioneto1@gmail.com>
 */
interface ValidatorInterface {

    function validate($value, $scope);

    function getMessage();

    function setMessage($message);

    function setOptions(array $options);

    function getOptions();
}
