<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MariagesRepository")
 */
class Mariages
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
    private $nom;

    /**
     * @ORM\Column(type="date")
     */
    private $Date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Lieu;

    /**
     * @ORM\Column(type="integer")
     */
    private $NB_Invites;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_add;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date_update;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date_delete;

    /**
     * @ORM\Column(type="boolean")
     */
    private $activate;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Clients", mappedBy="mariage", orphanRemoval=true)
     */
    private $client;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Commentaires", mappedBy="mariage", orphanRemoval=true)
     */
    private $commentaire;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Prestations", inversedBy="mariage", orphanRemoval=true)
     */
    private $prestation;



    /**
     * @ORM\OneToMany(targetEntity=PrestationsMariages::class, mappedBy="mariage",cascade={"persist"})
     */
    private $prestationsMariages;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $Budget;



    public function __construct()
    {
        $this->client = new ArrayCollection();
        $this->commentaire = new ArrayCollection();
        $this->date_add = new \DateTime();
        $this->activate = 1;
        $this->prestation = new ArrayCollection();
        $this->prestationsMariages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }
    public function __toString() {
        return (string) $this->getNom();
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->Date;
    }

    public function setDate(\DateTimeInterface $Date): self
    {
        $this->Date = $Date;

        return $this;
    }

    public function getLieu(): ?string
    {
        return $this->Lieu;
    }

    public function setLieu(string $Lieu): self
    {
        $this->Lieu = $Lieu;

        return $this;
    }

    public function getNBInvites(): ?int
    {
        return $this->NB_Invites;
    }

    public function setNBInvites(int $NB_Invites): self
    {
        $this->NB_Invites = $NB_Invites;

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

    /**
     * @return Collection|Clients[]
     */
    public function getClient(): Collection
    {
        return $this->client;
    }

    public function addClient(Clients $client): self
    {
        if (!$this->client->contains($client)) {
            $this->client[] = $client;
            $client->setMariage($this);
        }

        return $this;
    }

    public function removeClient(Clients $client): self
    {
        if ($this->client->contains($client)) {
            $this->client->removeElement($client);
            // set the owning side to null (unless already changed)
            if ($client->getMariage() === $this) {
                $client->setMariage(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Commentaires[]
     */
    public function getCommentaire(): Collection
    {
        return $this->commentaire;
    }

    public function addCommentaire(Commentaires $commentaire): self
    {
        if (!$this->commentaire->contains($commentaire)) {
            $this->commentaire[] = $commentaire;
            $commentaire->setMariage($this);
        }

        return $this;
    }

    public function removeCommentaire(Commentaires $commentaire): self
    {
        if ($this->commentaire->contains($commentaire)) {
            $this->commentaire->removeElement($commentaire);
            // set the owning side to null (unless already changed)
            if ($commentaire->getMariage() === $this) {
                $commentaire->setMariage(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Prestations[]
     */
    public function getPrestation(): Collection
    {
        return $this->prestation;
    }

    public function addPrestation(Prestations $prestation): self
    {
        if (!$this->prestation->contains($prestation)) {
            $this->prestation[] = $prestation;
            $prestation->addMariage($this);
        }

        return $this;
    }

    public function removePrestation(Prestations $prestation): self
    {
        if ($this->prestation->contains($prestation)) {
            $this->prestation->removeElement($prestation);
            $prestation->removeMariage($this);
        }

        return $this;
    }


    /**
     * @return Collection|PrestationsMariages[]
     */
    public function getPrestationsMariages(): Collection
    {
        return $this->prestationsMariages;
    }

    public function addPrestationsMariage(PrestationsMariages $prestationsMariage): self
    {
        if (!$this->prestationsMariages->contains($prestationsMariage)) {
            $this->prestationsMariages[] = $prestationsMariage;
            $prestationsMariage->setMariage($this);
        }

        return $this;
    }

    public function removePrestationsMariage(PrestationsMariages $prestationsMariage): self
    {
        if ($this->prestationsMariages->contains($prestationsMariage)) {
            $this->prestationsMariages->removeElement($prestationsMariage);
            // set the owning side to null (unless already changed)
            if ($prestationsMariage->getMariage() === $this) {
                $prestationsMariage->setMariage(null);
            }
        }

        return $this;
    }

    public function getBudget(): ?string
    {
        return $this->Budget;
    }

    public function setBudget(?string $Budget): self
    {
        $this->Budget = $Budget;

        return $this;
    }

}
