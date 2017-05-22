<?php
chdir(dirname(__DIR__));

require 'vendor/autoload.php';

$json = file_get_contents(__DIR__.'/../wms_product_data.json');

$data = json_decode($json);

$wmsRules = new \App\Rules\WmsRules();

$inputFilterSpecification = $wmsRules->getInputFilterSpecification();

$inputFilterValidation = new \App\Validation\InputFilterValidation();

if (!$inputFilterValidation->validate($data, $inputFilterSpecification)) {
    var_dump($inputFilterValidation->getInvalidInputs());
    var_dump($inputFilterValidation->getErrorMessages());
}

