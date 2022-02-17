<?php

namespace App\Entity;

use App\Repository\InstrumentisteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InstrumentisteRepository::class)]
class Instrumentiste
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\OneToOne(targetEntity: Personne::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private $fk_personne;

    #[ORM\ManyToOne(targetEntity: Instrument::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $fk_instrument;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFkPersonne(): ?Personne
    {
        return $this->fk_personne;
    }

    public function setFkPersonne(Personne $fk_personne): self
    {
        $this->fk_personne = $fk_personne;

        return $this;
    }

    public function getFkInstrument(): ?Instrument
    {
        return $this->fk_instrument;
    }

    public function setFkInstrument(?Instrument $fk_instrument): self
    {
        $this->fk_instrument = $fk_instrument;

        return $this;
    }

}
