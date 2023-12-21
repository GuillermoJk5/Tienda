<?php

namespace App\Entity;

use App\Repository\CategoriasRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoriasRepository::class)]
class Categorias
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToMany(mappedBy: 'id_categoria', targetEntity: Idiomascategorias::class, orphanRemoval: true)]
    private Collection $idiomascategorias;

    #[ORM\OneToMany(mappedBy: 'id_categoria', targetEntity: Productos::class, orphanRemoval: true)]
    private Collection $productos;

    public function __construct()
    {
        $this->idiomascategorias = new ArrayCollection();
        $this->productos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return Collection<int, Idiomascategorias>
     */
    public function getIdiomascategorias(): Collection
    {
        return $this->idiomascategorias;
    }

    public function addIdiomascategoria(Idiomascategorias $idiomascategoria): static
    {
        if (!$this->idiomascategorias->contains($idiomascategoria)) {
            $this->idiomascategorias->add($idiomascategoria);
            $idiomascategoria->setIdCategoria($this);
        }

        return $this;
    }

    public function removeIdiomascategoria(Idiomascategorias $idiomascategoria): static
    {
        if ($this->idiomascategorias->removeElement($idiomascategoria)) {
            // set the owning side to null (unless already changed)
            if ($idiomascategoria->getIdCategoria() === $this) {
                $idiomascategoria->setIdCategoria(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Productos>
     */
    public function getProductos(): Collection
    {
        return $this->productos;
    }

    public function addProducto(Productos $producto): static
    {
        if (!$this->productos->contains($producto)) {
            $this->productos->add($producto);
            $producto->setIdCategoria($this);
        }

        return $this;
    }

    public function removeProducto(Productos $producto): static
    {
        if ($this->productos->removeElement($producto)) {
            // set the owning side to null (unless already changed)
            if ($producto->getIdCategoria() === $this) {
                $producto->setIdCategoria(null);
            }
        }

        return $this;
    }
}
