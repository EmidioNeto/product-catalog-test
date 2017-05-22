<?php
namespace App\Resource\Catalog\InputFilter;

use Zend\InputFilter\Factory;
use Interop\Container\ContainerInterface;

/**
 * Description of CatalogInputFilterFactory
 *
 * @author reginaldo.neto
 */
class CatalogInputFilterFactory
{

    public function __invoke(ContainerInterface $container)
    {
        $inputFilter = new CatalogInputFilter();        
        return $inputFilter;
    }
}