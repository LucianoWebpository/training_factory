<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LessenRepository")
 */
class Lessen
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $tijd;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $locatie;

    /**
     * @ORM\Column(type="integer")
     */
    private $max_personen;


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Activiteiten", inversedBy="lessen")
     * @ORM\JoinColumn(nullable=false)
     */
    private $activiteit;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Registratie", mappedBy="les")
     */
    private $registraties;

    public function __construct()
    {
        $this->registraties = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTijd(): ?\datetime
    {
        return $this->tijd;
    }

    public function setTijd(\datetime $tijd): self
    {
        $this->tijd = $tijd;

        return $this;
    }

    public function getLocatie(): ?string
    {
        return $this->locatie;
    }

    public function setLocatie(string $locatie): self
    {
        $this->locatie = $locatie;

        return $this;
    }

    public function getMaxPersonen(): ?int
    {
        return $this->max_personen;
    }

    public function setMaxPersonen(int $max_personen): self
    {
        $this->max_personen = $max_personen;

        return $this;
    }





    public function getActiviteit(): ?Activiteiten
    {
        return $this->activiteit;
    }

    public function setActiviteit(?Activiteiten $activiteit): self
    {
        $this->activiteit = $activiteit;

        return $this;
    }

    /**
     * @return Collection|Registratie[]
     */
    public function getRegistraties(): Collection
    {
        return $this->registraties;
    }

    public function addRegistraty(Registratie $registraty): self
    {
        if (!$this->registraties->contains($registraty)) {
            $this->registraties[] = $registraty;
            $registraty->setLessen($this);
        }

        return $this;
    }

    public function removeRegistraty(Registratie $registraty): self
    {
        if ($this->registraties->contains($registraty)) {
            $this->registraties->removeElement($registraty);
            // set the owning side to null (unless already changed)
            if ($registraty->getLessen() === $this) {
                $registraty->setLessen(null);
            }
        }

        return $this;
    }
}
