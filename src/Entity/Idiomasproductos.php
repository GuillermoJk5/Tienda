<?php

namespace App\Entity;

use App\Repository\IdiomasproductosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IdiomasproductosRepository::class)]
class Idiomasproductos
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'idiomasproductos')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Productos $id_producto = null;

    #[ORM\ManyToOne(inversedBy: 'idiomasproductos')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Idiomas $id_idioma = null;

    #[ORM\Column(length: 255)]
    private ?string $nombre = null;

    #[ORM\Column(length: 255)]
    private ?string $descripcion = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

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

    public function getIdIdioma(): ?Idiomas
    {
        return $this->id_idioma;
    }

    public function setIdIdioma(?Idiomas $id_idioma): static
    {
        $this->id_idioma = $id_idioma;

        return $this;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): static
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): static
    {
        $this->descripcion = $descripcion;

        return $this;
    }
}
