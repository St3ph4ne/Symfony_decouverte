<?php

namespace App\Entity;

use App\Repository\PartitionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PartitionRepository::class)]
#[ORM\Table(name: '`partition`')]
class Partition
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $annee;

    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private $opus;

    #[ORM\Column(type: 'string', length: 255)]
    private $titre;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $duree;

    #[ORM\ManyToOne(targetEntity: Compositeur::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $fk_compositeur;

    #[ORM\ManyToOne(targetEntity: Instrument::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $fk_instrument;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnnee(): ?int
    {
        return $this->annee;
    }

    public function setAnnee(int $annee): self
    {
        $this->annee = $annee;

        return $this;
    }

    public function getOpus(): ?string
    {
        return $this->opus;
    }

    public function setOpus(?string $opus): self
    {
        $this->opus = $opus;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDuree(): ?int
    {
        return $this->duree;
    }

    public function setDuree(?int $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    public function getFkCompositeur(): ?Compositeur
    {
        return $this->fk_compositeur;
    }

    public function setFkCompositeur(?Compositeur $fk_compositeur): self
    {
        $this->fk_compositeur = $fk_compositeur;

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
