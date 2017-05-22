<?php

namespace App\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductCategory
 *
 * @ORM\Table(name="product_category", indexes={@ORM\Index(name="fk_product_idx", columns={"id_product"}), @ORM\Index(name="fk_category0_idx", columns={"id_category"})})
 * @ORM\Entity
 */
class ProductCategory
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
     * @var \App\Model\Category
     *
     * @ORM\ManyToOne(targetEntity="App\Model\Category")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_category", referencedColumnName="id")
     * })
     */
    private $idCategory;

    /**
     * @var \App\Model\Product
     *
     * @ORM\ManyToOne(targetEntity="App\Model\Product")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_product", referencedColumnName="id")
     * })
     */
    private $idProduct;

    function getId()
    {
        return $this->id;
    }

//    function getIdCategory(): \App\Model\Category
    function getIdCategory()
    {
        return $this->idCategory;
    }

//    function getIdProduct(): \App\Model\Product
    function getIdProduct()
    {
        return $this->idProduct;
    }

    function setId($id)
    {
        $this->id = $id;
    }

    function setIdCategory(\App\Model\Category $idCategory)
    {
        $this->idCategory = $idCategory;
    }

    function setIdProduct(\App\Model\Product $idProduct)
    {
        $this->idProduct = $idProduct;
    }
}