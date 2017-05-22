<?php

namespace App\Model;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Product
 *
 * @ORM\Table(name="product", indexes={@ORM\Index(name="fk_brand_idx", columns={"id_brand"})})
 * @ORM\Entity
 */
class Product
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
     * @var string
     *
     * @ORM\Column(name="sku", type="string", length=255, nullable=false)
     */
    private $sku;

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $price;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="product_image_url", type="string", length=255, nullable=false)
     */
    private $productImageUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="special_price", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $specialPrice;

    /**
     * @var \App\Model\Brand
     *
     * @ORM\ManyToOne(targetEntity="App\Model\Brand")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_brand", referencedColumnName="id")
     * })
     */
    private $idBrand;

    /**
     * @ORM\OneToMany(targetEntity="App\Model\ProductCategory", mappedBy="idProduct")
     */
    private $productCategories;

    /**
     * @ORM\OneToMany(targetEntity="App\Model\ProductSize", mappedBy="idProduct")
     */
    private $productSizes;
    private $categories;
    private $sizes;

    public function __construct()
    {
        $this->productCategories = new ArrayCollection();
        $this->productSizes      = new ArrayCollection();
        $this->categories        = new ArrayCollection();
        $this->sizes        = new ArrayCollection();
    }

    function getId()
    {
        return $this->id;
    }

    function getSku()
    {
        return $this->sku;
    }

    function getPrice()
    {
        return $this->price;
    }

    function getName()
    {
        return $this->name;
    }

    function getDescription()
    {
        return $this->description;
    }

    function getProductImageUrl()
    {
        return $this->productImageUrl;
    }

    function getSpecialPrice()
    {
        return $this->specialPrice;
    }

//    function getIdBrand(): \App\Model\Brand
    function getIdBrand()
    {
        return $this->idBrand;
    }

    function getProductCategories()
    {
        return $this->productCategories;
    }

    function getCategories()
    {
        return $this->categories;
    }

    function getProductSizes()
    {
        return $this->productSizes;
    }

    function getSizes()
    {
        return $this->sizes;
    }

    function setId($id)
    {
        $this->id = $id;
    }

    function setSku($sku)
    {
        $this->sku = $sku;
    }

    function setPrice($price)
    {
        $this->price = $price;
    }

    function setName($name)
    {
        $this->name = $name;
    }

    function setDescription($description)
    {
        $this->description = $description;
    }

    function setProductImageUrl($productImageUrl)
    {
        $this->productImageUrl = $productImageUrl;
    }

    function setSpecialPrice($specialPrice)
    {
        $this->specialPrice = $specialPrice;
    }

    function setIdBrand(\App\Model\Brand $idBrand)
    {
        $this->idBrand = $idBrand;
    }

    function setProductCategories($productCategories)
    {
        $this->productCategories = $productCategories;
    }

    function setCategories($categories)
    {
        $this->categories = $categories;
    }

    function setProductSizes($productSizes)
    {
        $this->productSizes = $productSizes;
    }

    function setSizes($sizes)
    {
        $this->sizes = $sizes;
    }


}