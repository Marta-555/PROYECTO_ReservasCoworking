<?php

namespace App\Entity;

use App\Repository\PrecioRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PrecioRepository::class)]
class Precio
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $cantidad;

    #[ORM\ManyToOne(targetEntity: Tarifa::class, inversedBy: 'precios')]
    #[ORM\JoinColumn(nullable: false)]
    private $tarifa;

    #[ORM\ManyToOne(targetEntity: Categoria::class, inversedBy: 'precios')]
    #[ORM\JoinColumn(nullable: false)]
    private $categoria;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCantidad(): ?int
    {
        return $this->cantidad;
    }

    public function setCantidad(int $cantidad): self
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    public function getTarifa(): ?Tarifa
    {
        return $this->tarifa;
    }

    public function setTarifa(?Tarifa $tarifa): self
    {
        $this->tarifa = $tarifa;

        return $this;
    }

    public function getCategoria(): ?Categoria
    {
        return $this->categoria;
    }

    public function setCategoria(?Categoria $categoria): self
    {
        $this->categoria = $categoria;

        return $this;
    }
}
