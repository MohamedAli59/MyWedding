<?php

namespace App\Entity;

use App\Repository\PrestationsMariagesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PrestationsMariagesRepository::class)
 */
class PrestationsMariages
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $budget;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Quantite;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Type;

    /**
     * @ORM\ManyToOne(targetEntity=mariages::class, inversedBy="prestationsMariages")
     */
    private $mariage;

    /**
     * @ORM\ManyToOne(targetEntity=Prestations::class, inversedBy="prestationsMariages")
     */
    private $prestation;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_add;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_update;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date_delete;

    /**
     * @ORM\Column(type="integer")
     */
    private $activate;


    public function __construct()
    {
        $this->activate = 1;
        $this->date_add = new \DateTime();
        $this->date_update = new \DateTime();
    }



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBudget(): ?int
    {
        return $this->budget;
    }

    public function setBudget(?int $budget): self
    {
        $this->budget = $budget;

        return $this;
    }

    public function getQuantite(): ?int
    {
        return $this->Quantite;
    }

    public function setQuantite(?int $Quantite): self
    {
        $this->Quantite = $Quantite;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->Type;
    }

    public function setType(string $Type): self
    {
        $this->Type = $Type;

        return $this;
    }

    public function getMariage(): ?mariages
    {
        return $this->mariage;
    }

    public function setMariage(?mariages $mariage): self
    {
        $this->mariage = $mariage;

        return $this;
    }

    public function getPrestation(): ?Prestations
    {
        return $this->prestation;
    }

    public function setPrestation(?Prestations $prestation): self
    {
        $this->prestation = $prestation;

        return $this;
    }
    public function getDateAdd(): ?\DateTimeInterface
    {
        return $this->date_add;
    }

    public function setDateAdd(\DateTimeInterface $date_add): self
    {
        $this->date_add = $date_add;

        return $this;
    }

    public function getDateUpdate(): ?\DateTimeInterface
    {
        return $this->date_update;
    }

    public function setDateUpdate(?\DateTimeInterface $date_update): self
    {
        $this->date_update = $date_update;

        return $this;
    }

    public function getDateDelete(): ?\DateTimeInterface
    {
        return $this->date_delete;
    }

    public function setDateDelete(?\DateTimeInterface $date_delete): self
    {
        $this->date_delete = $date_delete;

        return $this;
    }

    public function getActivate(): ?bool
    {
        return $this->activate;
    }

    public function setActivate(bool $activate): self
    {
        $this->activate = $activate;

        return $this;
    }
}
