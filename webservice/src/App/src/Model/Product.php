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
        $this->sizes             = new ArrayCollection();
    }

    function getId(): int
    {
        return $this->id;
    }

    function getSku(): string
    {
        return $this->sku;
    }

    function getPrice(): float
    {
        return $this->price;
    }

    function getName(): string
    {
        return $this->name;
    }

    function getDescription(): string
    {
        return $this->description;
    }

    function getProductImageUrl(): string
    {
        return $this->productImageUrl;
    }

    function getSpecialPrice(): float
    {
        return $this->specialPrice;
    }

    function getIdBrand(): \App\Model\Brand
    {
        return $this->idBrand;
    }

    function getProductCategories() : \Doctrine\ORM\PersistentCollection
    {
        return $this->productCategories;
    }

    function getCategories(): ArrayCollection
    {
        return $this->categories;
    }

    function getProductSizes(): \Doctrine\ORM\PersistentCollection
    {
        return $this->productSizes;
    }

    function getSizes(): ArrayCollection
    {
        return $this->sizes;
    }

    function setId(int $id)
    {
        $this->id = $id;
    }

    function setSku(string $sku)
    {
        $this->sku = $sku;
    }

    function setPrice(float $price)
    {
        $this->price = $price;
    }

    function setName(string $name)
    {
        $this->name = $name;
    }

    function setDescription(string $description)
    {
        $this->description = $description;
    }

    function setProductImageUrl(string $productImageUrl)
    {
        $this->productImageUrl = $productImageUrl;
    }

    function setSpecialPrice(float $specialPrice)
    {
        $this->specialPrice = $specialPrice;
    }

    function setIdBrand(\App\Model\Brand $idBrand)
    {
        $this->idBrand = $idBrand;
    }

    function setProductCategories(ArrayCollection $productCategories)
    {
        $this->productCategories = $productCategories;
    }

    function setCategories(ArrayCollection $categories)
    {
        $this->categories = $categories;
    }

    function setProductSizes(ArrayCollection $productSizes)
    {
        $this->productSizes = $productSizes;
    }

    function setSizes(ArrayCollection $sizes)
    {
        $this->sizes = $sizes;
    }
}