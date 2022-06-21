<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Lexik\Bundle\JWTAuthenticationBundle\Security\User\JWTUser;
use phpDocumentor\Reflection\Types\Collection;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Bundle\SecurityBundle\Security\UserAuthenticator;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @ApiResource(
 *     itemOperations={
 *          "get"={
 *              "access_control"="is_granted('IS_AUTHENTICATED_FULLY')",
 *              "normalization_context"={
 *                  "groups"={"get"}
 *              }
 *          },
 *          "put"={
 *              "access_control"="is_granted('IS_AUTHENTICATED_FULLY') and object == user",
 *              "denormalization_context"={
 *                  "groups"={"put"}
 *              },
 *              "normalization_context"={
 *                  "groups"={"get"}
 *              }
 *          }
 *      },
 *     collectionOperations={
 *          "get",
 *          "post"={
 *              "denormalization_context"={
 *                  "groups"={"post"}
 *              },
 *              "normalization_context"={
 *                  "groups"={"get"}
 *              }
 *        }
 *     },
 * )
 * @UniqueEntity("username")
 */
class User implements PasswordAuthenticatedUserInterface, UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"get"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"get", "post"})
     * @Assert\NotBlank()
     * @Assert\Length(min=6, max=255)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"get", "post", "put"})
     * @Assert\NotBlank()
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"get", "post", "put"})
     * @Assert\NotBlank()
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"post", "put"})
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"post", "put"})
     * @Assert\NotBlank()
     * @Assert\Length(min=8, max=255)
     */
    private $password;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Recipe", mappedBy="author")
     * @Groups({"get"})
     */
    private $recipes;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Advice", mappedBy="author")
     * @Groups({"get"})
     */
    private $advice;

    public function __construct(){
        $this->recipes = new ArrayCollection();
        $this->advice = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

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

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
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

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }
    public function  getRecipes()
    {
        return $this->recipes;
    }
    public function getAdvice()
    {
        return $this->advice;
    }

    public function getRoles(): array
    {
        return ['ROLE_USER'];
    }

    public function eraseCredentials()
    {
        return null;
    }

    public function getUserIdentifier(): string
    {
        return '';
    }
}
