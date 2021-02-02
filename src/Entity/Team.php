<?php

namespace App\Entity;

use App\Repository\TeamRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TeamRepository::class)
 */
class Team
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
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=Picture::class, mappedBy="team")
     */
    private $pictures;

    /**
     * @ORM\OneToOne(targetEntity=Convocation::class, mappedBy="team", cascade={"persist", "remove"})
     */
    private $convocation;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, inversedBy="team")
     */
    private $user;

    public function __construct()
    {
        $this->picture = new ArrayCollection();
        $this->user = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|Picture[]
     */
    public function getPictures(): Collection
    {
        return $this->pictures;
    }

    public function addPicture(Picture $picture): self
    {
        if (!$this->pictures->contains($picture)) {
            $this->pictures[] = $picture;
            $picture->setTeam($this);
        }

        return $this;
    }

    public function removePicture(Picture $picture): self
    {
        if ($this->picture->removeElement($picture)) {
            // set the owning side to null (unless already changed)
            if ($picture->getTeam() === $this) {
                $picture->setTeam(null);
            }
        }

        return $this;
    }

    public function getConvocation(): ?Convocation
    {
        return $this->convocation;
    }

    public function setConvocation(?Convocation $convocation): self
    {
        // unset the owning side of the relation if necessary
        if ($convocation === null && $this->convocation !== null) {
            $this->convocation->setTeam(null);
        }

        // set the owning side of the relation if necessary
        if ($convocation !== null && $convocation->getTeam() !== $this) {
            $convocation->setTeam($this);
        }

        $this->convocation = $convocation;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUser(): Collection
    {
        return $this->user;
    }

    public function addUser(User $user): self
    {
        if (!$this->user->contains($user)) {
            $this->user[] = $user;
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        $this->user->removeElement($user);

        return $this;
    }
}
