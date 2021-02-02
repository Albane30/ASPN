<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true, nullable=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json", nullable=true)
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string", nullable=true)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstname;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isPlayer;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isCoach;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isReferee;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isLeadership;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $positionHeld;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $avatar;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isVerified = false;

    /**
     * @ORM\ManyToMany(targetEntity=Team::class, mappedBy="user")
     */
    private $team;

    /**
     * @ORM\ManyToMany(targetEntity=Convocation::class, mappedBy="user")
     */
    private $convocation;

    public function __construct()
    {
        $this->team = new ArrayCollection();
        $this->convocation = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getIsPlayer(): ?bool
    {
        return $this->isPlayer;
    }

    public function setIsPlayer(?bool $isPlayer): self
    {
        $this->isPlayer = $isPlayer;

        return $this;
    }

    public function getIsCoach(): ?bool
    {
        return $this->isCoach;
    }

    public function setIsCoach(?bool $isCoach): self
    {
        $this->isCoach = $isCoach;

        return $this;
    }

    public function getIsReferee(): ?bool
    {
        return $this->isReferee;
    }

    public function setIsReferee(?bool $isReferee): self
    {
        $this->isReferee = $isReferee;

        return $this;
    }

    public function getIsLeadership(): ?bool
    {
        return $this->isLeadership;
    }

    public function setIsLeadership(?bool $isLeadership): self
    {
        $this->isLeadership = $isLeadership;

        return $this;
    }

    public function getPositionHeld(): ?string
    {
        return $this->positionHeld;
    }

    public function setPositionHeld(?string $positionHeld): self
    {
        $this->positionHeld = $positionHeld;

        return $this;
    }

    public function getAvatar(): ?string
    {
        return $this->avatar;
    }

    public function setAvatar(?string $avatar): self
    {
        $this->avatar = $avatar;

        return $this;
    }

    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    public function setIsVerified(bool $isVerified): self
    {
        $this->isVerified = $isVerified;

        return $this;
    }

    /**
     * @return Collection|Team[]
     */
    public function getTeam(): Collection
    {
        return $this->team;
    }

    public function addTeam(Team $team): self
    {
        if (!$this->team->contains($team)) {
            $this->team[] = $team;
            $team->addUser($this);
        }

        return $this;
    }

    public function removeTeam(Team $team): self
    {
        if ($this->team->removeElement($team)) {
            $team->removeUser($this);
        }

        return $this;
    }

    /**
     * @return Collection|Convocation[]
     */
    public function getConvocation(): Collection
    {
        return $this->convocation;
    }

    public function addConvocation(Convocation $convocation): self
    {
        if (!$this->convocation->contains($convocation)) {
            $this->convocation[] = $convocation;
            $convocation->addUser($this);
        }

        return $this;
    }

    public function removeConvocation(Convocation $convocation): self
    {
        if ($this->convocation->removeElement($convocation)) {
            $convocation->removeUser($this);
        }

        return $this;
    }
}
