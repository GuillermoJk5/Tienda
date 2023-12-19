<?php

namespace App\Entity;

use App\Repository\ProductoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductoRepository::class)]
class Producto
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nombre = null;

    #[ORM\Column]
    private ?float $precio = null;

    #[ORM\Column]
    private ?int $existencias = null;

    #[ORM\ManyToOne(inversedBy: 'producto')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Idiomas $idioma = null;

    #[ORM\ManyToOne(inversedBy: 'producto')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Marcas $marca = null;

    #[ORM\ManyToOne(inversedBy: 'producto')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Categorias $categoria = null;

    #[ORM\OneToMany(mappedBy: 'producto', targetEntity: Pedido::class)]
    private Collection $pedido;

    public function __construct()
    {
        $this->pedido = new ArrayCollection();
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

    public function getIdioma(): ?Idiomas
    {
        return $this->idioma;
    }

    public function setIdioma(?Idiomas $idioma): static
    {
        $this->idioma = $idioma;

        return $this;
    }

    public function getMarca(): ?Marcas
    {
        return $this->marca;
    }

    public function setMarca(?Marcas $marca): static
    {
        $this->marca = $marca;

        return $this;
    }

    public function getCategoria(): ?Categorias
    {
        return $this->categoria;
    }

    public function setCategoria(?Categorias $categoria): static
    {
        $this->categoria = $categoria;

        return $this;
    }

    /**
     * @return Collection<int, Pedido>
     */
    public function getPedido(): Collection
    {
        return $this->pedido;
    }

    public function addPedido(Pedido $pedido): static
    {
        if (!$this->pedido->contains($pedido)) {
            $this->pedido->add($pedido);
            $pedido->setProducto($this);
        }

        return $this;
    }

    public function removePedido(Pedido $pedido): static
    {
        if ($this->pedido->removeElement($pedido)) {
            // set the owning side to null (unless already changed)
            if ($pedido->getProducto() === $this) {
                $pedido->setProducto(null);
            }
        }

        return $this;
    }
}
