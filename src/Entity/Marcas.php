<?php

namespace App\Entity;

use App\Repository\MarcasRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MarcasRepository::class)]
class Marcas
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nombre = null;

    #[ORM\OneToMany(mappedBy: 'marca', targetEntity: Producto::class, orphanRemoval: true)]
    private Collection $producto;

    public function __construct()
    {
        $this->producto = new ArrayCollection();
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

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): static
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * @return Collection<int, Producto>
     */
    public function getProducto(): Collection
    {
        return $this->producto;
    }

    public function addProducto(Producto $producto): static
    {
        if (!$this->producto->contains($producto)) {
            $this->producto->add($producto);
            $producto->setMarca($this);
        }

        return $this;
    }

    public function removeProducto(Producto $producto): static
    {
        if ($this->producto->removeElement($producto)) {
            // set the owning side to null (unless already changed)
            if ($producto->getMarca() === $this) {
                $producto->setMarca(null);
            }
        }

        return $this;
    }
}
