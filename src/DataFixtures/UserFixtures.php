<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    /**
     * @param ObjectManager $manager
     * @throws \Doctrine\Common\DataFixtures\BadMethodCallException
     */
    public function load(ObjectManager $manager)
    {
        $admin = new User();
        $admin->setUsername('admin');
        $admin->setPassword('$2a$08$jHZj/wJfcVKlIwr5AvR78euJxYK7Ku5kURNhNx.7.CSIJ3Pq6LEPC');
        $admin->setEmail('admin@gmail.com');
        $admin->setIsActive('1');
        $manager->persist($admin);

        $anna_kowalska = new User();
        $anna_kowalska->setUsername('Anna Kowalska');
        $anna_kowalska->setPassword('$2y$13$G3g8z/5S8VgIK2r0hfI8X.oPAm/iM.BAJfSVBZxYMY11OwOdtbdRS');
        $anna_kowalska_avatar = stream_get_contents(fopen(__DIR__ . '/avatars/anna_avatar.jpg', 'rb'));
        $anna_kowalska->setAvatar($anna_kowalska_avatar);
        $anna_kowalska->setEmail('anna.kowalska@gmail.com');
        $anna_kowalska->setIsActive('1');
        $manager->persist($anna_kowalska);

        $sonya = new User();
        $sonya->setUsername('sonya');
        $sonya->setPassword('$2y$13$G3g8z/5S8VgIK2r0hfI8X.oPAm/iM.BAJfSVBZxYMY11OwOdtbdRS');
        $sonya_avatar = stream_get_contents(fopen(__DIR__ . '/avatars/sonya_avatar.png', 'rb'));
        $sonya->setAvatar($sonya_avatar);
        $sonya->setEmail('sonya@gmail.com');
        $sonya->setIsActive('1');
        $manager->persist($sonya);

        $chris = new User();
        $chris->setUsername('chris');
        $chris->setPassword('$2y$13$G3g8z/5S8VgIK2r0hfI8X.oPAm/iM.BAJfSVBZxYMY11OwOdtbdRS');
        $chris_avatar = stream_get_contents(fopen(__DIR__ . '/avatars/chris_avatar.png', 'rb'));
        $chris->setAvatar($chris_avatar);
        $chris->setEmail('chris@gmail.com');
        $chris->setIsActive('1');
        $manager->persist($chris);

        $kamila_nowak = new User();
        $kamila_nowak->setUsername('Kamila Nowak');
        $kamila_nowak->setPassword('$2y$13$G3g8z/5S8VgIK2r0hfI8X.oPAm/iM.BAJfSVBZxYMY11OwOdtbdRS');
        $kamila_nowak_avatar = stream_get_contents(fopen(__DIR__ . '/avatars/kamila_avatar.jpg', 'rb'));
        $kamila_nowak->setAvatar($kamila_nowak_avatar);
        $kamila_nowak->setEmail('kamila.nowak@gmail.com');
        $kamila_nowak->setIsActive('1');
        $manager->persist($kamila_nowak);

        $chuck = new User();
        $chuck->setUsername('chuck');
        $chuck->setPassword('$2y$13$G3g8z/5S8VgIK2r0hfI8X.oPAm/iM.BAJfSVBZxYMY11OwOdtbdRS');
        $chuck_avatar = stream_get_contents(fopen(__DIR__ . '/avatars/chuck_avatar.jpg', 'rb'));
        $chuck->setAvatar($chuck_avatar);
        $chuck->setEmail('chuck@gmail.com');
        $chuck->setIsActive('1');
        $manager->persist($chuck);

        $gosia = new User();
        $gosia->setUsername('gosia');
        $gosia->setPassword('$2y$13$G3g8z/5S8VgIK2r0hfI8X.oPAm/iM.BAJfSVBZxYMY11OwOdtbdRS');
        $gosia_avatar = stream_get_contents(fopen(__DIR__ . '/avatars/gosia_avatar.jpg', 'rb'));
        $gosia->setAvatar($gosia_avatar);
        $gosia->setEmail('gosia@gmail.com');
        $gosia->setIsActive('1');
        $manager->persist($gosia);

        $manager->flush();

        $this->addReference('anna_kowalska', $anna_kowalska);
        $this->addReference('sonya', $sonya);
        $this->addReference('chris', $chris);
        $this->addReference('kamila_nowak', $kamila_nowak);
        $this->addReference('chuck', $chuck);
        $this->addReference('gosia', $gosia);
    }
}