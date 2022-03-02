<?php

namespace App\Entity;

use App\Repository\RecursoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RecursoRepository::class)]
class Recurso
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nombre;

    #[ORM\OneToMany(mappedBy: 'recurso', targetEntity: Descripcion::class)]
    private $descripcions;

    #[ORM\OneToMany(mappedBy: 'recurso', targetEntity: Reserva::class)]
    private $reservas;

    #[ORM\ManyToOne(targetEntity: Categoria::class, inversedBy: 'recursos')]
    #[ORM\JoinColumn(nullable: false)]
    private $categoria;

    public function __construct()
    {
        $this->descripcions = new ArrayCollection();
        $this->reservas = new ArrayCollection();
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
            $descripcion->setRecurso($this);
        }

        return $this;
    }

    public function removeDescripcion(Descripcion $descripcion): self
    {
        if ($this->descripcions->removeElement($descripcion)) {
            // set the owning side to null (unless already changed)
            if ($descripcion->getRecurso() === $this) {
                $descripcion->setRecurso(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Reserva[]
     */
    public function getReservas(): Collection
    {
        return $this->reservas;
    }

    public function addReserva(Reserva $reserva): self
    {
        if (!$this->reservas->contains($reserva)) {
            $this->reservas[] = $reserva;
            $reserva->setRecurso($this);
        }

        return $this;
    }

    public function removeReserva(Reserva $reserva): self
    {
        if ($this->reservas->removeElement($reserva)) {
            // set the owning side to null (unless already changed)
            if ($reserva->getRecurso() === $this) {
                $reserva->setRecurso(null);
            }
        }

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
