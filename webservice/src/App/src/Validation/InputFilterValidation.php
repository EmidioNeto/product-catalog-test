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

    function validate(array $data, array $inputFilterSpecification): bool
    {
        $valid = true;
        foreach ($data as $inputs) {
            foreach ($inputs as $attribute => $input) {
                if (isset($inputFilterSpecification[$attribute])) {
                    if (!$this->validateInput($attribute, $input,
                            $inputFilterSpecification)) {
                        $valid = false;
                    }
                }
            }
        }
        return $valid;
    }

    function validateInput(string $attribute, $input, $inputFilterSpecification): bool
    {
        $validators = [];
        $filters = [];
        $valid      = true;

        if (isset($inputFilterSpecification[$attribute]['validators'])) {
            $validators = $inputFilterSpecification[$attribute]['validators'];
        }

        if (isset($inputFilterSpecification[$attribute]['filters'])) {
            $filters = $inputFilterSpecification[$attribute]['filters'];
        }

        foreach ($filters as $filter) {
            $filter = \App\Filter\Factory\Factory::invoke($filter);
            $input = $filter->filter($input);
        }

        foreach ($validators as $validator) {
            $validator = \App\Validator\Factory::invoke($validator);
            if (is_array($input)) {
                foreach ($input as $value) {
                    if (!$validator->isValid($value)) {
                        $this->addInvalidInputs([$attribute => $value]);
                        $this->addErrorMessages("The value {$value} for the attribute {$attribute}  is invalid. ".get_class($validator));
                        $valid = false;
                    }
                }
            } else {
                if (!$validator->isValid($input)) {
                    $this->addInvalidInputs([$attribute => $input]);
                    $this->addErrorMessages("The value {$input} for the attribute {$attribute}  is invalid. ".get_class($validator));
                    $valid = false;
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