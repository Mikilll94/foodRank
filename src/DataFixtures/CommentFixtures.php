<?php

namespace App\DataFixtures;

use App\Entity\Comment;
use App\Entity\Reply;
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
        $comment1 = new Comment();
        $comment1->setAuthor($this->getReference('anna_kowalska'));
        $comment1->setContent('Pizza super ale obsługa do wymiany + kucharz który pizzę przy dwóch stolikach zajętych robił 35 MINUT !!! 😫. W suszonych czeka się max 25min 🙂 kelnerka żeby zyskać napiwek nawet do stolika nie przyszła żeby wziąsc rachunek i spytać czy wydać resztę. Masakra');
        $comment1->setPostingDate(new \DateTime('2017-01-23 21:23:56'));
        $comment1->setRate('3');
        $comment1->setRestaurant($this->getReference('tutti_santi'));
        $manager->persist($comment1);

        $reply1_to_comment1 = new Reply();
        $reply1_to_comment1->setAuthor($this->getReference('chris'));
        $reply1_to_comment1->setContent('Ja tam nie miałem problemów z obsługą');
        $reply1_to_comment1->setPostingDate(new \DateTime('2017-01-24 15:34:32'));
        $reply1_to_comment1->setComment($comment1);
        $manager->persist($reply1_to_comment1);

        $reply2_to_comment1 = new Reply();
        $reply2_to_comment1->setAuthor($this->getReference('anna_kowalska'));
        $reply2_to_comment1->setContent('To może trafiłam na zły moment');
        $reply2_to_comment1->setPostingDate(new \DateTime('2017-01-24 18:12:23'));
        $reply2_to_comment1->setComment($comment1);
        $manager->persist($reply2_to_comment1);

        $comment2 = new Comment();
        $comment2->setAuthor($this->getReference('sonya'));
        $comment2->setContent('pizza wyśmienita, potwierdzam, szczególnie ta na białym sosie z marynowanymi grzybkami!!!');
        $comment2->setPostingDate(new \DateTime('2017-03-15 12:15:36'));
        $comment2->setRate('5');
        $comment2->setRestaurant($this->getReference('tutti_santi'));
        $manager->persist($comment2);

        $comment3 = new Comment();
        $comment3->setAuthor($this->getReference('chris'));
        $comment3->setContent('Fantastyczna, prawdziwa włoska pizza. Na pewno powrócę do Tutti Santi');
        $comment3->setPostingDate(new \DateTime('2017-05-08 16:27:43'));
        $comment3->setRate('5');
        $comment3->setRestaurant($this->getReference('tutti_santi'));
        $manager->persist($comment3);

        $comment4 = new Comment();
        $comment4->setAuthor($this->getReference('kamila_nowak'));
        $comment4->setContent('Pizza słaba, ceny dość wysokie za taką jakość. Są w Poznaniu dużo lepsze pizzerie. Plusem jest miła obsługa. Wnętrze ładne i czyste, ale bez charakteru. Była to moja pierwsza i ostatnia wizyta.');
        $comment4->setPostingDate(new \DateTime('2017-05-15 15:30:50'));
        $comment4->setRate('2');
        $comment4->setRestaurant($this->getReference('tutti_santi'));
        $manager->persist($comment4);

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