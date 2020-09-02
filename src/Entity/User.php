<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Cocur\Slugify\Slugify;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @UniqueEntity(
 *     fields={"username_slug"},
 *     message="Cette utilisateur existe déjà."
 * )
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
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string
     * @ORM\Column(type="string", length=12, nullable=false)
     * @Assert\NotBlank
     * @Assert\Length(
     *     min= 6,
     *     max= 12,
     *     minMessage="Le nom d'utilisateur doit contenir au moins 6 caractères",
     *     maxMessage="Le nom d'utilisateur doit contenir au plus 12 caractères"
     * )
     * @Assert\Regex("/^\w+/")
     */
    private $username;

    /**
     * @var string
     * @ORM\Column(type="string", name="username_slug", length=20, nullable=false, unique=true)
     * @Assert\NotBlank
     */
    private $usernameSlug;

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

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
        return $this->username;
//        return (string) $this->email;
    }

    public function setUsername($username): self
    {
        $this->username = $username;
        $slugify = new Slugify();
        $this->setUsernameSlug($slugify->slugify($this->username));
        return $this;
    }

    /**
     * @return string
     */
    public function getUsernameSlug(): string
    {
        return $this->usernameSlug;
    }

    /**
     * @param string $usernameSlug
     * @return $this
     */
    public function setUsernameSlug(string $usernameSlug): self
    {
        $this->usernameSlug = $usernameSlug;
        return $this;
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
}
