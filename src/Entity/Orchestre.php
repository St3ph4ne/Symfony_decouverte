<?php

namespace App\Entity;

use App\Repository\OrchestreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrchestreRepository::class)]
class Orchestre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 100)]
    private $nom;

    #[ORM\Column(type: 'string', length: 100)]
    private $directeur;

    #[ORM\ManyToMany(targetEntity: Instrumentiste::class)]
    private $fk_instrumentiste;

    public function __construct()
    {
        $this->fk_instrumentiste = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDirecteur(): ?string
    {
        return $this->directeur;
    }

    public function setDirecteur(string $directeur): self
    {
        $this->directeur = $directeur;

        return $this;
    }

    /**
     * @return Collection|Instrumentiste[]
     */
    public function getFkInstrumentiste(): Collection
    {
        return $this->fk_instrumentiste;
    }

    public function addFkInstrumentiste(Instrumentiste $fkInstrumentiste): self
    {
        if (!$this->fk_instrumentiste->contains($fkInstrumentiste)) {
            $this->fk_instrumentiste[] = $fkInstrumentiste;
        }

        return $this;
    }

    public function removeFkInstrumentiste(Instrumentiste $fkInstrumentiste): self
    {
        $this->fk_instrumentiste->removeElement($fkInstrumentiste);

        return $this;
    }

}
