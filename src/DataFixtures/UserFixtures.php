<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    /**
     * @var UserPasswordEncoderInterface
     */
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $admin = $this->createAdmin();
        $manager->persist($admin);
        $manager->flush();
    }

    private function createAdmin():User
    {
        $userAdmin = new User();
        $userAdmin->setUsername("admin");
        $userAdmin->setEmail("admin.@outlook.com");
        $userAdmin->setPassword($this->passwordEncoder->encodePassword($userAdmin, "admin"));
        $userAdmin->setRoles(['ROLE_ADMIN']);
        return $userAdmin;

    }
}
