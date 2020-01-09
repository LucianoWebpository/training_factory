<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ActiviteitenRepository")
 */
class Activiteiten
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $naam;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $beschrijving;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $duur;

    /**
     * @ORM\Column(type="float")
     */
    private $prijs;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Lessen", mappedBy="activiteit")
     */
    private $lessen;

    public function __construct()
    {
        $this->lessen = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNaam(): ?string
    {
        return $this->naam;
    }

    public function setNaam(string $naam): self
    {
        $this->naam = $naam;

        return $this;
    }

    public function getBeschrijving(): ?string
    {
        return $this->beschrijving;
    }

    public function setBeschrijving(string $beschrijving): self
    {
        $this->beschrijving = $beschrijving;

        return $this;
    }

    public function getDuur(): ?string
    {
        return $this->duur;
    }

    public function setDuur(string $duur): self
    {
        $this->duur = $duur;

        return $this;
    }

    public function getPrijs(): ?float
    {
        return $this->prijs;
    }

    public function setPrijs(float $prijs): self
    {
        $this->prijs = $prijs;

        return $this;
    }

    /**
     * @return Collection|Lessen[]
     */
    public function getLessen(): Collection
    {
        return $this->lessen;
    }

    public function addLessen(Lessen $lessen): self
    {
        if (!$this->lessen->contains($lessen)) {
            $this->lessen[] = $lessen;
            $lessen->setActiviteit($this);
        }

        return $this;
    }

    public function removeLessen(Lessen $lessen): self
    {
        if ($this->lessen->contains($lessen)) {
            $this->lessen->removeElement($lessen);
            // set the owning side to null (unless already changed)
            if ($lessen->getActiviteit() === $this) {
                $lessen->setActiviteit(null);
            }
        }

        return $this;
    }
}
