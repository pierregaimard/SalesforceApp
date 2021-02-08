<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        # Marie-pierre
        $user1 = new User();
        $user1->setUsername('mpderuggiero');
        $user1->setPassword(
            '$argon2id$v=19$m=65536,t=4,p=1$bDKrGdYiMy7hKekVIbya5A$l/5eiq9bSjsm+Ej+CECbeIGv6KX15B21cB+urXaDx6o'
        );
        $manager->persist($user1);

        # Philippe
        $user2 = new User();
        $user2->setUsername('pbrocard');
        $user2->setPassword(
            '$argon2id$v=19$m=65536,t=4,p=1$bDKrGdYiMy7hKekVIbya5A$l/5eiq9bSjsm+Ej+CECbeIGv6KX15B21cB+urXaDx6o'
        );
        $manager->persist($user2);

        $manager->flush();
    }
}
