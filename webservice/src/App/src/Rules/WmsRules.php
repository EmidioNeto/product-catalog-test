<?php

namespace App\Rules;

/**
 * Description of WmsRules
 *
 * @author reginaldo.neto
 */
class WmsRules implements RuleInterface
{

    public function getInputFilterSpecification()
    {
        return [
            'sku' => [
                'validators' => [\App\Validator\Required::class],
            ],
            'price' => [
                'validators' => [\App\Validator\Required::class, \App\Validator\IsNumeric::class],
            ],
            'name' => [
                'validators' => [\App\Validator\Required::class],
            ],
            'description' => [
                'validators' => [\App\Validator\Required::class],
            ],
            'size' => [
                'validators' => [\App\Validator\Required::class],
            ],
            'brand' => [
                'validators' => [\App\Validator\Required::class],
            ],
            'categories' => [
                'validators' => [\App\Validator\Required::class],
            ],
            'product_image_url' => [
                'validators' => [
                    \App\Validator\Required::class,
                    \App\Validator\Url::class,
                ],
                'filters' => [
                    \App\Filter\UrlFilter::class
                ],
            ],
            'special_price' => [
                'validators' => [\App\Validator\IsNumeric::class],
            ],
        ];
    }
}