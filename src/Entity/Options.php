<?php

namespace App\Entity;

use App\Repository\OptionsRepository;
use Cocur\Slugify\Slugify;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OptionsRepository::class)
 */
class Options
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @ORM\Column(name="name_slug", type="string", length=255, nullable=false)
     */
    private $nameSlug;

    /**
     * @ORM\ManyToMany(targetEntity=Manga::class, mappedBy="options")
     */
    private $mangas;
    

    public function __construct()
    {
        $this->mangas = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        $slugify = new Slugify();
        $this->setNameSlug($slugify->slugify($this->name));

        return $this;
    }

    /**
     * @return string
     */
    public function getNameSlug(): ?string
    {
        return $this->nameSlug;
    }

    /**
     * @param string $nameSlug
     * @return $this
     */
    public function setNameSlug(string $nameSlug): self
    {
        $this->nameSlug = $nameSlug;
        return $this;
    }

    /**
     * @return Collection|Manga[]
     */
    public function getMangas(): Collection
    {
        return $this->mangas;
    }

    public function addManga(Manga $manga): self
    {
        if (!$this->mangas->contains($manga)) {
            $this->mangas[] = $manga;
        }

        return $this;
    }

    public function removeManga(Manga $manga): self
    {
        if ($this->mangas->contains($manga)) {
            $this->mangas->removeElement($manga);
        }

        return $this;
    }
}
