<?php


namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
class MangaSearch
{
    /**
     * @var int|null
     * @Assert\GreaterThan(0)
     */
    private $type;

    /**
     * @var int|null
     * @Assert\PositiveOrZero
     * @Assert\Regex(
     *     pattern="/^[0-9]{4}/",
     *     message="L'année doit être composée de 4 chiffres."
     * )
     * @Assert\Range(
     *      min = 1960,
     *      max = 2020,
     *      notInRangeMessage = "L'année doit être comprise entre {{ min }} et {{ max }}s",
     * )     */
    private $min_year;

    /**
     * @var int|null
     * @Assert\PositiveOrZero
     * @Assert\Regex(
     *     pattern="/^[0-9]{4}/",
     *     message="L'année doit être composée de 4 chiffres."
     * )
     * @Assert\Range(
     *      min = 1960,
     *      max = 2020,
     *      notInRangeMessage = "L'année doit être comprise entre {{ min }} et {{ max }}s",
     * )     */
    private $max_year;

    /**
     * @var boolean
     */
    private $complete = false;

    /**
     * @return int|null
     */
    public function getType(): ?int
    {
        return $this->type;
    }

    /**
     * @param int|null $type
     */
    public function setType(?int $type): void
    {
        $this->type = $type;
    }

    /**
     * @return int|null
     */
    public function getMinYear(): ?int
    {
        return $this->min_year;
    }

    /**
     * @param int|null $min_year
     */
    public function setMinYear(?int $min_year): void
    {
        $this->min_year = $min_year;
    }

    /**
     * @return int|null
     */
    public function getMaxYear(): ?int
    {
        return $this->max_year;
    }

    /**
     * @param int|null $max_year
     */
    public function setMaxYear(?int $max_year): void
    {
        $this->max_year = $max_year;
    }

    /**
     * @return bool
     */
    public function isComplete(): bool
    {
        return $this->complete;
    }

    /**
     * @param bool $complete
     */
    public function setComplete(bool $complete): void
    {
        $this->complete = $complete;
    }


}