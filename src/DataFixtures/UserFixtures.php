<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{

    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
     {
         $this->passwordEncoder = $passwordEncoder;
     }

    public function load(ObjectManager $manager)
    {

       $user= new User();
       $user->setEmail('302080087@student.rocmondriaan.nl');
       $user->setRoles(['ROLE_ADMIN']);
       $user->setPassword($this->passwordEncoder->encodePassword($user, 'test1234'));


        $user=new User();
        $user->setEmail(('example@gmail.com'));
        $user->setRoles(['ROLE_user']);

        $manager->persist($user);
        $manager->flush();
    }
}
