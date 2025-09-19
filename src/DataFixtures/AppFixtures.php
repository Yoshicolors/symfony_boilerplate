<?php

namespace App\DataFixtures;

use App\Entity\Pain;
use App\Entity\Oignon;
use App\Entity\Sauce;
use App\Entity\Image;
use App\Entity\Commentaire;
use App\Entity\Burger;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        
        $pain1 = (new Pain())->setName('Brioche');
        $pain2 = (new Pain())->setName('Sesame');
        $manager->persist($pain1);
        $manager->persist($pain2);

        
        $o1 = (new Oignon())->setName('Oignon rouge');
        $o2 = (new Oignon())->setName('Oignon frit');
        $manager->persist($o1);
        $manager->persist($o2);

        
        $s1 = (new Sauce())->setName('Sauce BBQ');
        $s2 = (new Sauce())->setName('Sauce Samurai');
        $manager->persist($s1);
        $manager->persist($s2);

        
        $img1 = (new Image())->setName('img/burger.webp');
        $img2 = (new Image())->setName('img/burger1.webp');
        $manager->persist($img1);
        $manager->persist($img2);

        
        $burger1 = (new Burger())
            ->setName('Classic')
            ->setPrice('7.50')
            ->setPain($pain1)
            ->setImage($img1);
        $burger1->addOignon($o1);
        $burger1->addSauce($s1);
        $manager->persist($burger1);

        $burger2 = (new Burger())
            ->setName('Double Cheese')
            ->setPrice('9.90')
            ->setPain($pain2)
            ->setImage($img2);
        $burger2->addOignon($o2);
        $burger2->addSauce($s2);
        $manager->persist($burger2);

        
        $c1 = (new Commentaire())
            ->setName('Très bon burger !')
            ->setBurger($burger1);
        $manager->persist($c1);

        $c2 = (new Commentaire())
            ->setName('Un peu sec.')
            ->setBurger($burger2);
        $manager->persist($c2);

        $manager->flush();
    }
}
