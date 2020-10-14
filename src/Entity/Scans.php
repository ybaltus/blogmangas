<?php

namespace App\Entity;

use App\Repository\ScansRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ScansRepository::class)
 */
class Scans
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank
     * @Assert\PositiveOrZero
     */
    private $current_chapter;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank
     * @Assert\PositiveOrZero
     */
    private $max_chapter;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Manga", inversedBy="scans", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="manga_id", referencedColumnName="id", nullable=false)
     * @Assert\Type(type="App\Entity\Manga")
     */
    private $manga;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCurrentChapter(): ?int
    {
        return $this->current_chapter;
    }

    public function setCurrentChapter(int $current_chapter): self
    {
        $this->current_chapter = $current_chapter;

        return $this;
    }

    public function getMaxChapter(): ?int
    {
        return $this->max_chapter;
    }

    public function setMaxChapter(int $max_chapter): self
    {
        $this->max_chapter = $max_chapter;

        return $this;
    }


    public function getManga(): Manga
    {
        return $this->manga;
    }

    public function setManga(Manga $manga): self
    {
        $this->manga = $manga;
        return $this;
    }

}
