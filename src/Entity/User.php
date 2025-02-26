<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $firstname = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $lastname = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $email = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $password = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $question = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $answer = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $pseudo = null;

    #[ORM\Column]
    private ?bool $admin = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $created_at = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $updated_at = null;

    /**
     * @var Collection<int, Comment>
     */
    #[ORM\OneToMany(targetEntity: Comment::class, mappedBy: 'user_id', orphanRemoval: true)]
    private Collection $getComments;

    /**
     * @var Collection<int, UserLikeCollaborator>
     */
    #[ORM\OneToMany(targetEntity: UserLikeCollaborator::class, mappedBy: 'user_id', orphanRemoval: true)]
    private Collection $getLikes;

    public function __construct()
    {
        $this->getComments = new ArrayCollection();
        $this->getLikes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(?string $firstname): static
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(?string $lastname): static
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    public function getQuestion(): ?string
    {
        return $this->question;
    }

    public function setQuestion(?string $question): static
    {
        $this->question = $question;

        return $this;
    }

    public function getAnswer(): ?string
    {
        return $this->answer;
    }

    public function setAnswer(?string $answer): static
    {
        $this->answer = $answer;

        return $this;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo): static
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    public function isAdmin(): ?bool
    {
        return $this->admin;
    }

    public function setAdmin(bool $admin): static
    {
        $this->admin = $admin;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): static
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(?\DateTimeInterface $updated_at): static
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    /**
     * @return Collection<int, Comment>
     */
    public function getGetComments(): Collection
    {
        return $this->getComments;
    }

    public function addGetComment(Comment $getComment): static
    {
        if (!$this->getComments->contains($getComment)) {
            $this->getComments->add($getComment);
            $getComment->setUserId($this);
        }

        return $this;
    }

    public function removeGetComment(Comment $getComment): static
    {
        if ($this->getComments->removeElement($getComment)) {
            // set the owning side to null (unless already changed)
            if ($getComment->getUserId() === $this) {
                $getComment->setUserId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, UserLikeCollaborator>
     */
    public function getGetLikes(): Collection
    {
        return $this->getLikes;
    }

    public function addGetLike(UserLikeCollaborator $getLike): static
    {
        if (!$this->getLikes->contains($getLike)) {
            $this->getLikes->add($getLike);
            $getLike->setUserId($this);
        }

        return $this;
    }

    public function removeGetLike(UserLikeCollaborator $getLike): static
    {
        if ($this->getLikes->removeElement($getLike)) {
            // set the owning side to null (unless already changed)
            if ($getLike->getUserId() === $this) {
                $getLike->setUserId(null);
            }
        }

        return $this;
    }
}
