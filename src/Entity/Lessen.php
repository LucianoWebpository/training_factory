<?php

namespace App\Entity;

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
}
