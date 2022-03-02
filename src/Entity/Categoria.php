<?php

namespace App\Entity;

use App\Repository\CategoriaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoriaRepository::class)]
class Categoria
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nombre;

    #[ORM\OneToMany(mappedBy: 'categoria', targetEntity: Precio::class)]
    private $precios;

    #[ORM\OneToMany(mappedBy: 'categoria', targetEntity: Recurso::class)]
    private $recursos;

    public function __construct()
    {
        $this->precios = new ArrayCollection();
        $this->recursos = new ArrayCollection();
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
            $precio->setCategoria($this);
        }

        return $this;
    }

    public function removePrecio(Precio $precio): self
    {
        if ($this->precios->removeElement($precio)) {
            // set the owning side to null (unless already changed)
            if ($precio->getCategoria() === $this) {
                $precio->setCategoria(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Recurso[]
     */
    public function getRecursos(): Collection
    {
        return $this->recursos;
    }

    public function addRecurso(Recurso $recurso): self
    {
        if (!$this->recursos->contains($recurso)) {
            $this->recursos[] = $recurso;
            $recurso->setCategoria($this);
        }

        return $this;
    }

    public function removeRecurso(Recurso $recurso): self
    {
        if ($this->recursos->removeElement($recurso)) {
            // set the owning side to null (unless already changed)
            if ($recurso->getCategoria() === $this) {
                $recurso->setCategoria(null);
            }
        }

        return $this;
    }
}
