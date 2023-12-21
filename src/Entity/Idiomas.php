<?php

namespace App\Entity;

use App\Repository\IdiomasRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IdiomasRepository::class)]
class Idiomas
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nombre = null;

    #[ORM\OneToMany(mappedBy: 'id_idioma', targetEntity: Idiomascategorias::class, orphanRemoval: true)]
    private Collection $idiomascategorias;

    #[ORM\OneToMany(mappedBy: 'id_idioma', targetEntity: Idiomasproductos::class, orphanRemoval: true)]
    private Collection $idiomasproductos;

    public function __construct()
    {
        $this->idiomascategorias = new ArrayCollection();
        $this->idiomasproductos = new ArrayCollection();
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
            $idiomascategoria->setIdIdioma($this);
        }

        return $this;
    }

    public function removeIdiomascategoria(Idiomascategorias $idiomascategoria): static
    {
        if ($this->idiomascategorias->removeElement($idiomascategoria)) {
            // set the owning side to null (unless already changed)
            if ($idiomascategoria->getIdIdioma() === $this) {
                $idiomascategoria->setIdIdioma(null);
            }
        }

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
            $idiomasproducto->setIdIdioma($this);
        }

        return $this;
    }

    public function removeIdiomasproducto(Idiomasproductos $idiomasproducto): static
    {
        if ($this->idiomasproductos->removeElement($idiomasproducto)) {
            // set the owning side to null (unless already changed)
            if ($idiomasproducto->getIdIdioma() === $this) {
                $idiomasproducto->setIdIdioma(null);
            }
        }

        return $this;
    }
}
