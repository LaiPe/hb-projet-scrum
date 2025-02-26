<?php

namespace App\Entity;

use App\Repository\CollaboratorRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CollaboratorRepository::class)]
class Collaborator
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $logo = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $created_at = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $update_at = null;

    /**
     * @var Collection<int, Comment>
     */
    #[ORM\OneToMany(targetEntity: Comment::class, mappedBy: 'Collaborator_id', orphanRemoval: true)]
    private Collection $getComments;

    /**
     * @var Collection<int, UserLikeCollaborator>
     */
    #[ORM\OneToMany(targetEntity: UserLikeCollaborator::class, mappedBy: 'Collaborator_id', orphanRemoval: true)]
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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(string $logo): static
    {
        $this->logo = $logo;

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

    public function getUpdateAt(): ?\DateTimeInterface
    {
        return $this->update_at;
    }

    public function setUpdateAt(?\DateTimeInterface $update_at): static
    {
        $this->update_at = $update_at;

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
            $getComment->setCollaboratorId($this);
        }

        return $this;
    }

    public function removeGetComment(Comment $getComment): static
    {
        if ($this->getComments->removeElement($getComment)) {
            // set the owning side to null (unless already changed)
            if ($getComment->getCollaboratorId() === $this) {
                $getComment->setCollaboratorId(null);
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
            $getLike->setCollaboratorId($this);
        }

        return $this;
    }

    public function removeGetLike(UserLikeCollaborator $getLike): static
    {
        if ($this->getLikes->removeElement($getLike)) {
            // set the owning side to null (unless already changed)
            if ($getLike->getCollaboratorId() === $this) {
                $getLike->setCollaboratorId(null);
            }
        }

        return $this;
    }
}
