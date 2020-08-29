<?php

namespace App\Entity;

use App\Repository\AnimeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

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
    private $current_season;

    /**
     * @ORM\Column(type="integer")
     */
    private $max_season;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Manga", inversedBy="animes")
     * @ORM\JoinColumn(name="manga_id", referencedColumnName="id")
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

    public function getCurrentSeason(): ?int
    {
        return $this->current_season;
    }

    public function setCurrentSeason(int $current_season): self
    {
        $this->current_season = $current_season;

        return $this;
    }

    public function getMaxSeason(): ?int
    {
        return $this->max_season;
    }

    public function setMaxSeason(int $max_season): self
    {
        $this->max_season = $max_season;
        return $this;
    }

    public function getManga(): ?Manga
    {
        return $this->manga;
    }

    public function setManga(Manga $manga): self
    {
        $this->manga = $manga;
        return $this;
    }




}
