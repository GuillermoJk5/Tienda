<?php

namespace App\Entity;

use App\Repository\UsuariosRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UsuariosRepository::class)]
class Usuarios
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $usuario = null;

    #[ORM\Column(length: 255)]
    private ?string $contrasena = null;

    #[ORM\Column(length: 255)]
    private ?string $rol = null;

    #[ORM\OneToOne(inversedBy: 'id_usuarios', cascade: ['persist', 'remove'])]
    private ?Datosusuarios $id_datos = null;

    #[ORM\OneToMany(mappedBy: 'id_usuario', targetEntity: Compra::class)]
    private Collection $compras;

    #[ORM\OneToMany(mappedBy: 'id_usuario', targetEntity: Resenas::class, orphanRemoval: true)]
    private Collection $resenas;

    public function __construct()
    {
        $this->compras = new ArrayCollection();
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

    public function getUsuario(): ?string
    {
        return $this->usuario;
    }

    public function setUsuario(string $usuario): static
    {
        $this->usuario = $usuario;

        return $this;
    }

    public function getContrasena(): ?string
    {
        return $this->contrasena;
    }

    public function setContrasena(string $contrasena): static
    {
        $this->contrasena = $contrasena;

        return $this;
    }

    public function getRol(): ?string
    {
        return $this->rol;
    }

    public function setRol(string $rol): static
    {
        $this->rol = $rol;

        return $this;
    }

    public function getIdDatos(): ?Datosusuarios
    {
        return $this->id_datos;
    }

    public function setIdDatos(?Datosusuarios $id_datos): static
    {
        $this->id_datos = $id_datos;

        return $this;
    }

    /**
     * @return Collection<int, Compra>
     */
    public function getCompras(): Collection
    {
        return $this->compras;
    }

    public function addCompra(Compra $compra): static
    {
        if (!$this->compras->contains($compra)) {
            $this->compras->add($compra);
            $compra->setIdUsuario($this);
        }

        return $this;
    }

    public function removeCompra(Compra $compra): static
    {
        if ($this->compras->removeElement($compra)) {
            // set the owning side to null (unless already changed)
            if ($compra->getIdUsuario() === $this) {
                $compra->setIdUsuario(null);
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
            $resena->setIdUsuario($this);
        }

        return $this;
    }

    public function removeResena(Resenas $resena): static
    {
        if ($this->resenas->removeElement($resena)) {
            // set the owning side to null (unless already changed)
            if ($resena->getIdUsuario() === $this) {
                $resena->setIdUsuario(null);
            }
        }

        return $this;
    }
}
