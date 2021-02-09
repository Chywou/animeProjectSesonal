<?php

namespace App\Entity;

use App\Repository\AnimeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AnimeRepository::class)
 */
class Anime
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $aniName;

    /**
     * @ORM\Column(type="integer", options={"default" : 0})
     */
    private $aniCurrentNB;

    /**
     * @ORM\Column(type="integer")
     */
    private $aniFullNB;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $aniLink;

    /**
     * @ORM\Column(type="time")
     */
    private $aniHour;

    /**
     * @ORM\Column(type="date")
     */
    private $aniStart;

    /**
     * @ORM\Column(type="integer", options={"default" : 0})
     */
    private $aniDelay;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $aniImage;

    /**
     * @ORM\ManyToOne(targetEntity=Day::class, inversedBy="animes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $day;

    /**
     * @ORM\ManyToOne(targetEntity=Statut::class, inversedBy="animes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Statut;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAniName(): ?string
    {
        return $this->aniName;
    }

    public function setAniName(string $aniName): self
    {
        $this->aniName = $aniName;

        return $this;
    }

    public function getAniCurrentNB(): ?int
    {
        return $this->aniCurrentNB;
    }

    public function setAniCurrentNB(int $aniCurrentNB): self
    {
        $this->aniCurrentNB = $aniCurrentNB;

        return $this;
    }

    public function getAniFullNB(): ?int
    {
        return $this->aniFullNB;
    }

    public function setAniFullNB(int $aniFullNB): self
    {
        $this->aniFullNB = $aniFullNB;

        return $this;
    }

    public function getAniLink(): ?string
    {
        return $this->aniLink;
    }

    public function setAniLink(string $aniLink): self
    {
        $this->aniLink = $aniLink;

        return $this;
    }

    public function getAniHour(): ?\DateTimeInterface
    {
        return $this->aniHour;
    }

    public function setAniHour(\DateTimeInterface $aniHour): self
    {
        $this->aniHour = $aniHour;

        return $this;
    }

    public function getAniStart(): ?\DateTimeInterface
    {
        return $this->aniStart;
    }

    public function setAniStart(\DateTimeInterface $aniStart): self
    {
        $this->aniStart = $aniStart;

        return $this;
    }

    public function getAniDelay(): ?int
    {
        return $this->aniDelay;
    }

    public function setAniDelay(int $aniDelay): self
    {
        $this->aniDelay = $aniDelay;

        return $this;
    }

    public function getAniImage(): ?string
    {
        return $this->aniImage;
    }

    public function setAniImage(string $aniImage): self
    {
        $this->aniImage = $aniImage;

        return $this;
    }

    public function getDay(): ?Day
    {
        return $this->day;
    }

    public function setDay(?Day $day): self
    {
        $this->day = $day;

        return $this;
    }

    public function getStatut(): ?Statut
    {
        return $this->Statut;
    }

    public function setStatut(?Statut $Statut): self
    {
        $this->Statut = $Statut;

        return $this;
    }
}
