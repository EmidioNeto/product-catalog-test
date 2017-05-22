<?php

namespace App\Validation;

/**
 * Description of nputFilterValidation
 *
 * @author reginaldo.neto
 */
class InputFilterValidation
{
    private $invalidInputs;
    private $validInputs;
    private $errorMessages;

    public function __construct()
    {
        $this->invalidInputs = [];
        $this->validInputs   = [];
        $this->errorMessages = [];
    }

    function validate($data, $inputFilterSpecification)
    {
        $valid = true;
        if (is_array($data)) {
            foreach ($data as $wms) {
                foreach ((array) $wms as $attribute => $input) {
                    if (isset($inputFilterSpecification[$attribute])) {
                        $validators = null;
                        if (isset($inputFilterSpecification[$attribute]['validators'])) {
                            $validators = $inputFilterSpecification[$attribute]['validators'];
                            foreach ($validators as $validator) {
                                $validator = \App\Validator\Factory::invoke($validator);
                                if (is_array($input)) {
                                    foreach ($input as $value) {
                                        if (!$validator->isValid($value)) {
                                            $this->addInvalidInputs([$attribute => $value]);
                                            $valid = false;
//                                            throw new \RuntimeException("The value {$value} for the attribute {$attribute}  is invalid. ".get_class($validator));
                                            $this->addErrorMessages("The value {$value} for the attribute {$attribute}  is invalid. ".get_class($validator));
                                        }
                                    }
                                } else {
                                    if (!$validator->isValid($input)) {
                                        $this->addInvalidInputs([$attribute => $input]);
                                        $valid = false;
                                        $this->addErrorMessages("The value {$input} for the attribute {$attribute}  is invalid. ".get_class($validator));
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        return $valid;
    }

    function getInvalidInputs()
    {
        return $this->invalidInputs;
    }

    function setInvalidInputs($invalidInputs)
    {
        $this->invalidInputs = $invalidInputs;
    }

    function addInvalidInputs($invalidInput)
    {
        $this->invalidInputs[] = $invalidInput;
    }

    function getValidInputs()
    {
        return $this->validInputs;
    }

    function setValidInputs($validInputs)
    {
        $this->validInputs = $validInputs;
    }

    function getErrorMessages()
    {
        return $this->errorMessages;
    }

    function setErrorMessages($errorMessages)
    {
        $this->errorMessages = $errorMessages;
    }

    function addErrorMessages($message)
    {
        $this->errorMessages[] = $message;
    }
}