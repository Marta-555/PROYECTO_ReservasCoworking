<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\TarifaRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: TarifaRepository::class)]
class Tarifa
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $tramo;

    #[ORM\OneToMany(mappedBy: 'tarifa', targetEntity: Precio::class)]
    private $precios;

    public function __construct()
    {
        $this->precios = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTramo(): ?string
    {
        return $this->tramo;
    }

    public function setTramo(string $tramo): self
    {
        $this->tramo = $tramo;

        return $this;
    }

    /**
     * @return Collection|Precio[]
     */
    public function getPrecios(): Collection
    {
        return $this->precios;
    }

    public function addPrecio(Precio $precio): self
    {
        if (!$this->precios->contains($precio)) {
            $this->precios[] = $precio;
            $precio->setTarifa($this);
        }

        return $this;
    }

    public function removePrecio(Precio $precio): self
    {
        if ($this->precios->removeElement($precio)) {
            // set the owning side to null (unless already changed)
            if ($precio->getTarifa() === $this) {
                $precio->setTarifa(null);
            }
        }

        return $this;
    }
}
