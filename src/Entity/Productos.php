<?php

namespace App\Entity;

use App\Repository\ProductosRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductosRepository::class)]
class Productos
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $precio = null;

    #[ORM\Column]
    private ?int $existencias = null;

    #[ORM\ManyToOne(inversedBy: 'productos')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Marcas $id_marca = null;

    #[ORM\ManyToOne(inversedBy: 'productos')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Categorias $id_categoria = null;

    #[ORM\OneToMany(mappedBy: 'id_producto', targetEntity: Idiomasproductos::class, orphanRemoval: true)]
    private Collection $idiomasproductos;

    #[ORM\OneToMany(mappedBy: 'id_producto', targetEntity: Pedidos::class)]
    private Collection $pedidos;

    #[ORM\OneToMany(mappedBy: 'id_producto', targetEntity: Resenas::class, orphanRemoval: true)]
    private Collection $resenas;

    public function __construct()
    {
        $this->idiomasproductos = new ArrayCollection();
        $this->pedidos = new ArrayCollection();
        $this->resenas = new ArrayCollection();
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

    public function getPrecio(): ?float
    {
        return $this->precio;
    }

    public function setPrecio(float $precio): static
    {
        $this->precio = $precio;

        return $this;
    }

    public function getExistencias(): ?int
    {
        return $this->existencias;
    }

    public function setExistencias(int $existencias): static
    {
        $this->existencias = $existencias;

        return $this;
    }

    public function getIdMarca(): ?Marcas
    {
        return $this->id_marca;
    }

    public function setIdMarca(?Marcas $id_marca): static
    {
        $this->id_marca = $id_marca;

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

    /**
     * @return Collection<int, Idiomasproductos>
     */
    public function getIdiomasproductos(): Collection
    {
        return $this->idiomasproductos;
    }

    public function addIdiomasproducto(Idiomasproductos $idiomasproducto): static
    {
        if (!$this->idiomasproductos->contains($idiomasproducto)) {
            $this->idiomasproductos->add($idiomasproducto);
            $idiomasproducto->setIdProducto($this);
        }

        return $this;
    }

    public function removeIdiomasproducto(Idiomasproductos $idiomasproducto): static
    {
        if ($this->idiomasproductos->removeElement($idiomasproducto)) {
            // set the owning side to null (unless already changed)
            if ($idiomasproducto->getIdProducto() === $this) {
                $idiomasproducto->setIdProducto(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Pedidos>
     */
    public function getPedidos(): Collection
    {
        return $this->pedidos;
    }

    public function addPedido(Pedidos $pedido): static
    {
        if (!$this->pedidos->contains($pedido)) {
            $this->pedidos->add($pedido);
            $pedido->setIdProducto($this);
        }

        return $this;
    }

    public function removePedido(Pedidos $pedido): static
    {
        if ($this->pedidos->removeElement($pedido)) {
            // set the owning side to null (unless already changed)
            if ($pedido->getIdProducto() === $this) {
                $pedido->setIdProducto(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Resenas>
     */
    public function getResenas(): Collection
    {
        return $this->resenas;
    }

    public function addResena(Resenas $resena): static
    {
        if (!$this->resenas->contains($resena)) {
            $this->resenas->add($resena);
            $resena->setIdProducto($this);
        }

        return $this;
    }

    public function removeResena(Resenas $resena): static
    {
        if ($this->resenas->removeElement($resena)) {
            // set the owning side to null (unless already changed)
            if ($resena->getIdProducto() === $this) {
                $resena->setIdProducto(null);
            }
        }

        return $this;
    }
}
