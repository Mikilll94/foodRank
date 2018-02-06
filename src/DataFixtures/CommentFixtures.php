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
        // Tutti Santi

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

        // Restauracja papierówka

        $comment5 = new Comment();
        $comment5->setAuthor($this->getReference('chuck'));
        $comment5->setContent('Bardzo fajne miejsce');
        $comment5->setPostingDate(new \DateTime('2018-02-06 21:04:50'));
        $comment5->setRate('4');
        $comment5->setRestaurant($this->getReference('restauracja_papierowka'));
        $manager->persist($comment5);

        $comment6 = new Comment();
        $comment6->setAuthor($this->getReference('gosia'));
        $comment6->setContent('Super restauracja');
        $comment6->setPostingDate(new \DateTime('2018-02-06 12:32:12'));
        $comment6->setRate('5');
        $comment6->setRestaurant($this->getReference('restauracja_papierowka'));
        $manager->persist($comment6);

        // Weranda Caffe

        $comment7 = new Comment();
        $comment7->setAuthor($this->getReference('chris'));
        $comment7->setContent('Bardzo fajne miejsce');
        $comment7->setPostingDate(new \DateTime('2018-01-31 21:16:23'));
        $comment7->setRate('4');
        $comment7->setRestaurant($this->getReference('weranda_caffe'));
        $manager->persist($comment7);

        $comment8 = new Comment();
        $comment8->setAuthor($this->getReference('sonya'));
        $comment8->setContent('Wieczorny wypad we dwoje');
        $comment8->setPostingDate(new \DateTime('2018-02-03 12:32:23'));
        $comment8->setRate('5');
        $comment8->setRestaurant($this->getReference('weranda_caffe'));
        $manager->persist($comment8);

        // Figaro

        $comment9 = new Comment();
        $comment9->setAuthor($this->getReference('kamila_nowak'));
        $comment9->setContent('Ładna restauracja,kelnerki pomocne makaron z grzybami i truflą lekko rozgotowany spodziewaliśmy się  dużo lepszej kuchni.Jeszcze wrócimy.');
        $comment9->setPostingDate(new \DateTime('2018-02-03 12:32:23'));
        $comment9->setRate('3');
        $comment9->setRestaurant($this->getReference('figaro'));
        $manager->persist($comment9);

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