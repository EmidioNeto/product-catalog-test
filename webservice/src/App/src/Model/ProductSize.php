<?php

namespace App\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductSize
 *
 * @ORM\Table(name="product_size", indexes={@ORM\Index(name="fk_product_idx", columns={"id_product"}), @ORM\Index(name="fk_size_idx", columns={"id_size"})})
 * @ORM\Entity
 */
class ProductSize
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \App\Model\Product
     *
     * @ORM\ManyToOne(targetEntity="App\Model\Product")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_product", referencedColumnName="id")
     * })
     */
    private $idProduct;

    /**
     * @var \App\Model\Size
     *
     * @ORM\ManyToOne(targetEntity="App\Model\Size")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_size", referencedColumnName="id")
     * })
     */
    private $idSize;

    function getId()
    {
        return $this->id;
    }

//    function getIdProduct(): \App\Model\Product
    function getIdProduct()
    {
        return $this->idProduct;
    }

//    function getIdSize(): \App\Model\Size
    function getIdSize()
    {
        return $this->idSize;
    }

    function setId($id)
    {
        $this->id = $id;
    }

    function setIdProduct(\App\Model\Product $idProduct)
    {
        $this->idProduct = $idProduct;
    }

    function setIdSize(\App\Model\Size $idSize)
    {
        $this->idSize = $idSize;
    }
}