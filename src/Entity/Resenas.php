<?php

namespace App\Entity;

use App\Repository\ResenasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ResenasRepository::class)]
class Resenas
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'resenas')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Usuarios $id_usuario = null;

    #[ORM\ManyToOne(inversedBy: 'resenas')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Productos $id_producto = null;

    #[ORM\Column(length: 255)]
    private ?string $comentario = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getIdUsuario(): ?Usuarios
    {
        return $this->id_usuario;
    }

    public function setIdUsuario(?Usuarios $id_usuario): static
    {
        $this->id_usuario = $id_usuario;

        return $this;
    }

    public function getIdProducto(): ?Productos
    {
        return $this->id_producto;
    }

    public function setIdProducto(?Productos $id_producto): static
    {
        $this->id_producto = $id_producto;

        return $this;
    }

    public function getComentario(): ?string
    {
        return $this->comentario;
    }

    public function setComentario(string $comentario): static
    {
        $this->comentario = $comentario;

        return $this;
    }
}
