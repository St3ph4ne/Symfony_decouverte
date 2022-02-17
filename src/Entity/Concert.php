<?php

namespace App\Entity;

use App\Repository\ConcertRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConcertRepository::class)]
class Concert
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'date')]
    private $date;

    #[ORM\Column(type: 'time', nullable: true)]
    private $heure;

    #[ORM\Column(type: 'integer')]
    private $jauge;

    #[ORM\Column(type: 'string', length: 255)]
    private $adresse;

    #[ORM\ManyToMany(targetEntity: Partition::class)]
    private $fk_partition;

    #[ORM\ManyToOne(targetEntity: Orchestre::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $fk_orchestre;

    public function __construct()
    {
        $this->fk_partition = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getHeure(): ?\DateTimeInterface
    {
        return $this->heure;
    }

    public function setHeure(?\DateTimeInterface $heure): self
    {
        $this->heure = $heure;

        return $this;
    }

    public function getJauge(): ?int
    {
        return $this->jauge;
    }

    public function setJauge(int $jauge): self
    {
        $this->jauge = $jauge;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * @return Collection|Partition[]
     */
    public function getFkPartition(): Collection
    {
        return $this->fk_partition;
    }

    public function addFkPartition(Partition $fkPartition): self
    {
        if (!$this->fk_partition->contains($fkPartition)) {
            $this->fk_partition[] = $fkPartition;
        }

        return $this;
    }

    public function removeFkPartition(Partition $fkPartition): self
    {
        $this->fk_partition->removeElement($fkPartition);

        return $this;
    }

    public function getFkOrchestre(): ?Orchestre
    {
        return $this->fk_orchestre;
    }

    public function setFkOrchestre(?Orchestre $fk_orchestre): self
    {
        $this->fk_orchestre = $fk_orchestre;

        return $this;
    }
}
