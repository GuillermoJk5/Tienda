<?php

namespace App\Entity;

use App\Repository\DatosusuariosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DatosusuariosRepository::class)]
class Datosusuarios
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nombre = null;

    #[ORM\Column(length: 255)]
    private ?string $apellidos = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 20)]
    private ?string $dni = null;

    #[ORM\Column(length: 255)]
    private ?string $direccion = null;

    #[ORM\Column(length: 255)]
    private ?string $localidad = null;

    #[ORM\Column]
    private ?float $puntos = null;

    #[ORM\OneToOne(mappedBy: 'id_datos', cascade: ['persist', 'remove'])]
    private ?Usuarios $id_usuarios = null;

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

    public function getApellidos(): ?string
    {
        return $this->apellidos;
    }

    public function setApellidos(string $apellidos): static
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getDni(): ?string
    {
        return $this->dni;
    }

    public function setDni(string $dni): static
    {
        $this->dni = $dni;

        return $this;
    }

    public function getDireccion(): ?string
    {
        return $this->direccion;
    }

    public function setDireccion(string $direccion): static
    {
        $this->direccion = $direccion;

        return $this;
    }

    public function getLocalidad(): ?string
    {
        return $this->localidad;
    }

    public function setLocalidad(string $localidad): static
    {
        $this->localidad = $localidad;

        return $this;
    }

    public function getPuntos(): ?float
    {
        return $this->puntos;
    }

    public function setPuntos(float $puntos): static
    {
        $this->puntos = $puntos;

        return $this;
    }

    public function getIdUsuarios(): ?Usuarios
    {
        return $this->id_usuarios;
    }

    public function setIdUsuarios(?Usuarios $id_usuarios): static
    {
        // unset the owning side of the relation if necessary
        if ($id_usuarios === null && $this->id_usuarios !== null) {
            $this->id_usuarios->setIdDatos(null);
        }

        // set the owning side of the relation if necessary
        if ($id_usuarios !== null && $id_usuarios->getIdDatos() !== $this) {
            $id_usuarios->setIdDatos($this);
        }

        $this->id_usuarios = $id_usuarios;

        return $this;
    }
}
