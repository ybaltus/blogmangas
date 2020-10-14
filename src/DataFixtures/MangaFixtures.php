<?php

namespace App\DataFixtures;

use App\Entity\Anime;
use App\Entity\Manga;
use App\Entity\Scans;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class MangaFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        for($i=0; $i<100; $i++)
        {
            $manga = new Manga();
            $manga->setTitle($faker->unique()->word());
            $manga->setDescription($faker->sentences(3, true));
            $manga->setType($faker->numberBetween(1,5));
            $manga->setYear($faker->numberBetween(2010,2020));
            $manga->setAuthor($faker->name());
            $manga->setCity($faker->city());
            $manga->setCountry($faker->country());
            $manga->setExistScan(true);

            /** @var Factory $faker */
            $anime = $this->addAnime($faker);
            $scans = $this->addScans($faker);
            $manga->addAnime($anime);
            $manga->setScans($scans);

            if(($anime->getCurrentEpisode() == $anime->getMaxEpisode()) && ($scans->getCurrentChapter() == $scans->getMaxChapter()))
            {
                $manga->setComplete(true);
            }
            $manager->persist($manga);
        }

        $manager->flush();
    }

    /**
     * @param Factory $faker
     * @return Anime
     */
    private function addAnime($faker)
    {
        $anime = new Anime();
        $anime->setCurrentEpisode($faker->numberBetween(1,300));
        $anime->setMaxEpisode(300);
        $anime->setSeason(1);
        return $anime;
    }

    /**
     * @param Factory $faker
     * @return Scans
     */
    private function addScans($faker)
    {
        $scans = new Scans();
        $scans->setCurrentChapter($faker->numberBetween(1,200));
        $scans->setMaxChapter(200);
        return $scans;
    }
}
