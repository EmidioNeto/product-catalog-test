<?php

namespace App\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * Stock
 *
 * @ORM\Table(name="stock", indexes={@ORM\Index(name="id_product_size_idx", columns={"id_product_size"}), @ORM\Index(name="fk_warehouse_idx", columns={"id_warehouse"})})
 * @ORM\Entity(repositoryClass="App\Model\Repository\StockRepository")
 */
class Stock
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
     * @var int
     *
     * @ORM\Column(name="quantity", type="integer", nullable=false)
     */
    private $quantity;

    /**
     * @var \App\Model\ProductSize
     *
     * @ORM\ManyToOne(targetEntity="App\Model\ProductSize")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_product_size", referencedColumnName="id")
     * })
     */
    private $idProductSize;

    /**
     * @var \App\Model\Warehouse
     *
     * @ORM\ManyToOne(targetEntity="App\Model\Warehouse", fetch="EAGER")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_warehouse", referencedColumnName="id")
     * })
     */
    private $idWarehouse;

    function getId(): int
    {
        return $this->id;
    }

    function getQuantity() : int
    {
        return $this->quantity;
    }

    function getIdProductSize(): \App\Model\ProductSize
    {
        return $this->idProductSize;
    }

    function getIdWarehouse(): int
    {
        return $this->idWarehouse->getId();
    }

    function setId(int $id)
    {
        $this->id = $id;
    }

    function setQuantity(int $quantity)
    {
        $this->quantity = $quantity;
    }

    function setIdProductSize(\App\Model\ProductSize $idProductSize)
    {
        $this->idProductSize = $idProductSize;
    }

    function setIdWarehouse(\App\Model\Warehouse $idWarehouse)
    {
        $this->idWarehouse = $idWarehouse;
    }
}