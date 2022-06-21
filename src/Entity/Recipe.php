<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use App\Repository\RecipeRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RecipeRepository")
 * @ApiResource(
 *     itemOperations={
 *          "get",
 *          "put"={
 *              "access_control"="is_granted('IS_AUTHENTICATED_FULLY') and object.getAuthor() == user"
 *          },
 *          "delete"={
 *              "access_control"="is_granted('IS_AUTHENTICATED_FULLY') and object.getAuthor() == user"
 *          }
 *      },
 *     collectionOperations={
 *          "get",
 *          "post"={
 *              "access_control"="is_granted('IS_AUTHENTICATED_FULLY')"
 *          }
 *       },
 * )
 */
class Recipe
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Length(min=5)
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank()
     * @Assert\Length(min=5)
     */
    private $ingredients;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank()
     * @Assert\Length(min=5)
     */
    private $steps;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $company;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Assert\NotBlank()
     * @Assert\Length(min=5)
     */
    private $timeToEat;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Image")
     * @ORM\JoinTable()
     * @ApiSubresource()
     */
    private $image;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="author")
     * ORM\JoinColumn(nullable=false)
     * @Groups({"post"})
     */
    private $author;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getIngredients(): ?string
    {
        return $this->ingredients;
    }

    public function setIngredients(string $ingredients): self
    {
        $this->ingredients = $ingredients;

        return $this;
    }

    public function getSteps(): ?string
    {
        return $this->steps;
    }

    public function setSteps(string $steps): self
    {
        $this->steps = $steps;

        return $this;
    }

    public function getCompany(): ?string
    {
        return $this->company;
    }

    public function setCompany($company): self
    {
        $this->company = $company;

        return $this;
    }

    public function getTimeToEat(): ?string
    {
        return $this->timeToEat;
    }

    public function setTimeToEat($timeToEat): self
    {
        $this->timeToEat = $timeToEat;

        return $this;
    }

    public function getAuthor(): User
    {
        return $this->author;
    }

    public function setAuthor(User $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage(Image $image): self
    {
        $this->image = $image;

        return $this;
    }
}
