<?php

namespace App\Entity;

use App\Repository\PostRepository;
use App\Traits\InterfaceEntity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=PostRepository::class)
 */
class Post
{
    use InterfaceEntity;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $header;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $text;

    /**
     * * @Assert\File(
     *     mimeTypes = {"image/jpeg", "image/png"},
     *     mimeTypesMessage = "Please upload a valid image"
     * )
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $img;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Categories", inversedBy="post")
     */
    private $categories;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="posts")
     */
    private $user;

    public function getHeader(): ?string
    {
        return $this->header;
    }

    public function setHeader(string $header): self
    {
        $this->header = $header;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getImg(): ?string
    {
        return $this->img;
    }

    public function setImg($img): self
    {
        $this->img = $img;

        return $this;
    }

    public function getCategories()
    {
        return $this->categories;
    }

    public function setCategories($categories): void
    {
        $this->categories = $categories;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

}
