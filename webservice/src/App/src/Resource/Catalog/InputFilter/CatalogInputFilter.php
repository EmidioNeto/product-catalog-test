<?php

namespace App\Resource\Catalog\InputFilter;

use Zend\InputFilter\InputFilter;

/**
 * Description of CatalogInputFilter
 *
 * @author reginaldo.neto
 */
class CatalogInputFilter extends InputFilter
{

    public function __construct()
    {
        $this->add(
            [
                'name' => 'sku',
                'required' => true,
                'filters' => [
                    [
                        'name' => 'Zend\Filter\StringTrim',
                        'options' => ['options' => ['charlist' => ' .\\']],
                    ],
                ],
                'validators' => [],
                'allow_empty' => false,
                'continue_if_empty' => false,
            ]
        );


        $this->add(
            [
                'name' => 'price',
                'required' => true,
                'filters' => [
                    [
                        'name' => 'Zend\I18n\Filter\NumberFormat',
                        'options' => ['type' => \NumberFormatter::TYPE_DOUBLE],
                    ],
                    [
                        'name' => 'Zend\Filter\Digits',
                        'options' => [],
                    ],
                ],
                'validators' => [
                ],
                'allow_empty' => false,
                'continue_if_empty' => false,
            ]
        );


        $this->add(
            [
                'name' => 'name',
                'required' => true,
                'filters' => [
                    [
                        'name' => 'Zend\Filter\StringTrim',
                        'options' => ['options' => ['charlist' => ' .\\']],
                    ],
                ],
                'validators' => [],
                'allow_empty' => false,
                'continue_if_empty' => false,
            ]
        );


        $this->add(
            [
                'name' => 'description',
                'required' => true,
                'filters' => [
                    [
                        'name' => 'Zend\Filter\StringTrim',
                        'options' => ['options' => ['charlist' => ' .\\']],
                    ],
                ],
                'validators' => [],
                'allow_empty' => false,
                'continue_if_empty' => false,
            ]
        );


        $this->add(
            [
                'name' => 'brand',
                'required' => true,
                'filters' => [
                    [
                        'name' => 'Zend\Filter\StringTrim',
                        'options' => ['options' => ['charlist' => ' .\\']],
                    ],
                ],
                'validators' => [],
                'allow_empty' => false,
                'continue_if_empty' => false,
            ]
        );


        $this->add(
            [
                'name' => 'product_image_url',
                'required' => true,
                'filters' => [
                    [
                        'name' => 'Zend\Filter\StringTrim',
                        'options' => ['options' => ['charlist' => ' .\\']],
                    ],
                ],
                'validators' => [
                    [
                        'name' => 'Zend\Validator\Regex',
                        'options' => ['pattern' => '"^(http(s?))?://(?:[a-z0-9-]+.)+[a-z]{2,6}(?:/[^/#?]+)+.(?:jpg|jpeg|gif|png)$"'],
                    ],
                ],
                'allow_empty' => false,
                'continue_if_empty' => false,
            ]
        );

        $this->add(
            [
                'name' => 'special_price',
                'required' => false,
                'filters' => [
                    [
                        'name' => 'Zend\I18n\Filter\NumberFormat',
                        'options' => ['type' => \NumberFormatter::TYPE_DOUBLE],
                    ],
                    [
                        'name' => 'Zend\Filter\Digits',
                        'options' => [],
                    ],
                ],
                'validators' => [],
                'allow_empty' => true,
                'continue_if_empty' => false,
            ]
        );
    }
}