<?php

namespace App\Entity;

use App\Repository\ExtrasRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExtrasRepository::class)]
class Extras
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nombre;

    #[ORM\OneToMany(mappedBy: 'extra', targetEntity: Descripcion::class)]
    private $descripcions;

    public function __construct()
    {
        $this->descripcions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * @return Collection|Descripcion[]
     */
    public function getDescripcions(): Collection
    {
        return $this->descripcions;
    }

    public function addDescripcion(Descripcion $descripcion): self
    {
        if (!$this->descripcions->contains($descripcion)) {
            $this->descripcions[] = $descripcion;
            $descripcion->setExtra($this);
        }

        return $this;
    }

    public function removeDescripcion(Descripcion $descripcion): self
    {
        if ($this->descripcions->removeElement($descripcion)) {
            // set the owning side to null (unless already changed)
            if ($descripcion->getExtra() === $this) {
                $descripcion->setExtra(null);
            }
        }

        return $this;
    }

}
