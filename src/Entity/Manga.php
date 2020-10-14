<?php

namespace App\Entity;

use App\Repository\MangaRepository;
use Cocur\Slugify\Slugify;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;


/**
 * @ORM\Entity(repositoryClass=MangaRepository::class)
 * @UniqueEntity(
 *     fields={"title_slug"},
 *     message="Ce titre existe déjà."
 *     )
 * @Vich\Uploadable
 */
class Manga
{
    const TYPEMANGA = [
        1 => 'shonen',
        2 => 'seinen',
        3 => 'josei',
        4 => 'shojo',
        5 => 'kodomo'
    ];

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     *
     * @var string|null
     * @ORM\Column(type="string", length=255)
     */
    private $fileName;

    /**
     * @var File|null
     * @Vich\UploadableField(mapping="manga_thumb", fileNameProperty="fileName")
     * @Assert\Image(
     *  mimeTypes="image/jpeg"
     * )
     */
    private $imageFile;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private $title;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="integer")
     * @Assert\GreaterThan(0)
     */
    private $type;

    /**
     * @ORM\Column(type="integer")
     * @Assert\PositiveOrZero
     * @Assert\Regex(
     *     pattern="/^[0-9]{4}/",
     *     message="L'année doit être composée de 4 chiffres."
     * )
     */
    private $year;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private $author;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private $country;

    /**
     * @ORM\Column(type="boolean", options={"default": false})
     */
    private $exist_episode = false;

    /**
     * @ORM\Column(type="boolean", options={"default": true})
     */
    private $exist_scan = true;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updated_at;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $title_slug;

    /**
     * @ORM\Column(type="boolean", options={"default":false})
     */
    private $complete=false;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Anime", mappedBy="manga", cascade={"persist", "remove"})
     */
    private $animes;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Scans", mappedBy="manga", cascade={"persist", "remove"})
     */
    private $scans;

    /**
     * @ORM\ManyToMany(targetEntity=Options::class, inversedBy="mangas")
     */
    private $options;

    /**
     * @ORM\OneToMany(targetEntity=ImagesManga::class, mappedBy="manga", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    private $images;

    public function __construct()
    {
        $this->created_at = new \DateTime('now');
        $this->animes = new ArrayCollection();
        $this->options = new ArrayCollection();
        $this->images = new ArrayCollection();
    }

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
        $slugify = new Slugify();
        $this->setTitleSlug($slugify->slugify($this->title));

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getType(): ?int
    {
        return $this->type;
    }

    public function getTypeName():string
    {
        return self::TYPEMANGA[$this->type];
    }

    public function setType(int $type): self
    {
        $this->type = $type;
        return $this;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(int $year): self
    {
        $this->year = $year;

        return $this;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(string $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getExistEpisode(): ?bool
    {
        return $this->exist_episode;
    }

    public function setExistEpisode(bool $exist_episode): self
    {
        $this->exist_episode = $exist_episode;

        return $this;
    }

    public function getExistScan(): ?bool
    {
        return $this->exist_scan;
    }

    public function setExistScan(bool $exist_scan): self
    {
        $this->exist_scan = $exist_scan;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(?\DateTimeInterface $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    public function getTitleSlug(): ?string
    {
        return $this->title_slug;
    }

    public function setTitleSlug(string $title_slug): self
    {
        $this->title_slug = $title_slug;

        return $this;
    }

    public function getComplete(): ?bool
    {
        return $this->complete;
    }

    public function setComplete(bool $complete): self
    {
        $this->complete = $complete;

        return $this;
    }

    public function getAnimes(): ?Collection
    {
        return $this->animes;
    }

    public function addAnime(Anime $anime): self
    {
        $anime->setManga($this);
        $this->animes->add($anime);
        return $this;
    }

    public function removeAnime(Anime $anime):   self
    {
        $this->animes->removeElement($anime);
        return $this;
    }

    public function getScans(): ?Scans
    {
        return $this->scans;
    }

    public function setScans(Scans $scans): self
    {
        $this->scans = $scans;
        $this->scans->setManga($this);
        return $this;
    }

    /**
     * @return Collection|Options[]
     */
    public function getOptions(): Collection
    {
        return $this->options;
    }

    public function addOption(Options $option): self
    {
        if (!$this->options->contains($option)) {
            $this->options[] = $option;
            $option->addName($this);
        }

        return $this;
    }

    public function removeOption(Options $option): self
    {
        if ($this->options->contains($option)) {
            $this->options->removeElement($option);
            $option->removeName($this);
        }

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFileName(): ?string
    {
        return $this->fileName;
    }

    /**
     * @param string|null $fileName
     */
    public function setFileName(?string $fileName): void
    {
        $this->fileName = $fileName;
    }

    /**
     * @return File
     */
    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    /**
     * @param File $imageFile
     */
    public function setImageFile(File $imageFile): void
    {
        $this->imageFile = $imageFile;

        if($imageFile !== null)
            $this->updated_at = new \DateTime('now');
    }

    /**
     * @return Collection|ImagesManga[]
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(ImagesManga $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
            $image->setManga($this);
        }

        return $this;
    }

    public function removeImage(ImagesManga $image): self
    {
        if ($this->images->contains($image)) {
            $this->images->removeElement($image);
            // set the owning side to null (unless already changed)
            if ($image->getManga() === $this) {
                $image->setManga(null);
            }
        }

        return $this;
    }

}
