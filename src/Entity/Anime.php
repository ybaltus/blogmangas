<?php

namespace App\Entity;

use App\Repository\AnimeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=AnimeRepository::class)
 */
class Anime
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $current_episode;

    /**
     * @ORM\Column(type="integer")
     */
    private $max_episode;

    /**
     * @ORM\Column(type="integer")
     */
    private $season;


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Manga", inversedBy="animes", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="manga_id", referencedColumnName="id", nullable=false)
     * @Assert\Type(type="App\Entity\Manga")
     */
    private $manga;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCurrentEpisode(): ?int
    {
        return $this->current_episode;
    }

    public function setCurrentEpisode(int $currentEpisode): self
    {
        $this->current_episode= $currentEpisode;

        return $this;
    }

    public function getMaxEpisode(): ?int
    {
        return $this->max_episode;
    }

    public function setMaxEpisode(int $max_episode): self
    {
        $this->max_episode = $max_episode;

        return $this;
    }

    public function getSeason(): ?int
    {
        return $this->season;
    }

    public function setSeason(int $season): self
    {
        $this->season = $season;

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
