<?php

namespace App\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * Warehouse
 *
 * @ORM\Table(name="warehouse")
 * @ORM\Entity
 */
class Warehouse
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
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    function getId(): int
    {
        return $this->id;
    }

    function getName(): string
    {
        return $this->name;
    }

    function setId(int $id)
    {
        $this->id = $id;
    }

    function setName(string $name)
    {
        $this->name = $name;
    }
}