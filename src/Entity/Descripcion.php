<?php

namespace App\Entity;

use App\Repository\DescripcionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DescripcionRepository::class)]
class Descripcion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: Recurso::class, inversedBy: 'descripcions')]
    #[ORM\JoinColumn(nullable: false)]
    private $recurso;

    #[ORM\ManyToOne(targetEntity: Extras::class, inversedBy: 'descripcions')]
    #[ORM\JoinColumn(nullable: false)]
    private $extra;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRecurso(): ?Recurso
    {
        return $this->recurso;
    }

    public function setRecurso(?Recurso $recurso): self
    {
        $this->recurso = $recurso;

        return $this;
    }

    public function getExtra(): ?Extras
    {
        return $this->extra;
    }

    public function setExtra(?Extras $extra): self
    {
        $this->extra = $extra;

        return $this;
    }
}
