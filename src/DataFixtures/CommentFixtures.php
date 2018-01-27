<?php

namespace App\DataFixtures;

use App\Entity\Comment;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class CommentFixtures extends Fixture implements DependentFixtureInterface
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $comment1_tutti_santi = new Comment();
        $comment1_tutti_santi->setAuthor($this->getReference('anna_kowalska'));
        $comment1_tutti_santi->setContent('Pizza super ale obsługa do wymiany + kucharz który pizzę przy dwóch stolikach zajętych robił 35 MINUT !!! 😫. W suszonych czeka się max 25min 🙂 kelnerka żeby zyskać napiwek nawet do stolika nie przyszła żeby wziąsc rachunek i spytać czy wydać resztę. Masakra');
        $comment1_tutti_santi->setPostingDate(new \DateTime('2017-01-23 21:23:56'));
        $comment1_tutti_santi->setRate('3');
        $comment1_tutti_santi->setRestaurant($this->getReference('tutti_santi'));
        $manager->persist($comment1_tutti_santi);

        $comment2_tutti_santi = new Comment();
        $comment2_tutti_santi->setAuthor($this->getReference('sonya'));
        $comment2_tutti_santi->setContent('pizza wyśmienita, potwierdzam, szczególnie ta na białym sosie z marynowanymi grzybkami!!!');
        $comment2_tutti_santi->setPostingDate(new \DateTime('2017-03-15 12:15:36'));
        $comment2_tutti_santi->setRate('5');
        $comment2_tutti_santi->setRestaurant($this->getReference('tutti_santi'));
        $manager->persist($comment2_tutti_santi);

        $comment3_tutti_santi = new Comment();
        $comment3_tutti_santi->setAuthor($this->getReference('chris'));
        $comment3_tutti_santi->setContent('Fantastyczna, prawdziwa włoska pizza. Na pewno powrócę do Tutti Santi');
        $comment3_tutti_santi->setPostingDate(new \DateTime('2017-03-15 12:15:36'));
        $comment3_tutti_santi->setRate('5');
        $comment3_tutti_santi->setRestaurant($this->getReference('tutti_santi'));
        $manager->persist($comment3_tutti_santi);

        $comment4_tutti_santi = new Comment();
        $comment4_tutti_santi->setAuthor($this->getReference('kamila_nowak'));
        $comment4_tutti_santi->setContent('Pizza słaba, ceny dość wysokie za taką jakość. Są w Poznaniu dużo lepsze pizzerie. Plusem jest miła obsługa. Wnętrze ładne i czyste, ale bez charakteru. Była to moja pierwsza i ostatnia wizyta.');
        $comment4_tutti_santi->setPostingDate(new \DateTime('2017-05-15 15:30:50'));
        $comment4_tutti_santi->setRate('2');
        $comment4_tutti_santi->setRestaurant($this->getReference('tutti_santi'));
        $manager->persist($comment4_tutti_santi);

        $manager->flush();
    }

    /**
     * @return array
     */
    function getDependencies()
    {
        return [ UserFixtures::class, RestaurantFixtures::class ];
    }
}