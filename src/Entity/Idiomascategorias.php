<?php

namespace App\Entity;

use App\Repository\IdiomascategoriasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IdiomascategoriasRepository::class)]
class Idiomascategorias
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nombre = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $descripcion = null;

    #[ORM\ManyToOne(inversedBy: 'idiomascategorias')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Categorias $id_categoria = null;

    #[ORM\ManyToOne(inversedBy: 'idiomascategorias')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Idiomas $id_idioma = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

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

    public function setDescripcion(?string $descripcion): static
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getIdCategoria(): ?Categorias
    {
        return $this->id_categoria;
    }

    public function setIdCategoria(?Categorias $id_categoria): static
    {
        $this->id_categoria = $id_categoria;

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
}
