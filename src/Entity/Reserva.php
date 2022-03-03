<?php

namespace App\Entity;

use App\Repository\ReservaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservaRepository::class)]
class Reserva
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'datetime')]
    private $fechaInicio;

    #[ORM\Column(type: 'datetime')]
    private $fechaFin;

    #[ORM\Column(type: 'integer')]
    private $precioTotal;

    #[ORM\Column(type: 'boolean')]
    private $pago;

    #[ORM\ManyToOne(targetEntity: Recurso::class, inversedBy: 'reservas')]
    #[ORM\JoinColumn(nullable: false)]
    private $recurso;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'reservas')]
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFechaInicio(): ?\DateTimeInterface
    {
        return $this->fechaInicio;
    }

    public function setFechaInicio(\DateTimeInterface $fechaInicio): self
    {
        $this->fechaInicio = $fechaInicio;

        return $this;
    }

    public function getFechaFin(): ?\DateTimeInterface
    {
        return $this->fechaFin;
    }

    public function setFechaFin(\DateTimeInterface $fechaFin): self
    {
        $this->fechaFin = $fechaFin;

        return $this;
    }

    public function getPrecioTotal(): ?int
    {
        return $this->precioTotal;
    }

    public function setPrecioTotal(int $precioTotal): self
    {
        $this->precioTotal = $precioTotal;

        return $this;
    }

    public function getPago(): ?bool
    {
        return $this->pago;
    }

    public function setPago(bool $pago): self
    {
        $this->pago = $pago;

        return $this;
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

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
