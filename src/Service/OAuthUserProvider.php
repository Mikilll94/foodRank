<?php

namespace App\Service;

use Doctrine\ORM\EntityManager;
use HWI\Bundle\OAuthBundle\Security\Core\User\OAuthAwareUserProviderInterface;
use HWI\Bundle\OAuthBundle\OAuth\Response\UserResponseInterface;
use Symfony\Component\Security\Core\Encoder\EncoderFactory;
use Symfony\Component\Security\Core\User\UserInterface;
use \Symfony\Component\BrowserKit\Response;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use App\Entity\User;

class OAuthUserProvider implements OAuthAwareUserProviderInterface, UserProviderInterface
{
    protected $em;

    protected $factory;

    public function __construct(EntityManager $em, EncoderFactory $factory)
    {
        $this->em = $em;
        $this->factory = $factory;
    }

    /**
     * @param UserResponseInterface $response
     * @return User|mixed|UserInterface
     * @throws \Doctrine\ORM\NonUniqueResultException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function loadUserByOAuthUserResponse(UserResponseInterface $response)
    {
        $data = $response->getData();
        $existingUser = $this->em->getRepository(User::class)->createQueryBuilder('u')
            ->where('u.facebook_id = :facebook_id')
            ->setParameters([
                'facebook_id' => $data['id'],
            ])
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();

        if ($existingUser === null) {
            $user = new User();
            $user->setFacebookId($data['id']);
            $user->setUsername($data['name']);
            if (array_key_exists('email', $data)) {
                $user->setEmail($data['email']);
            } else {
                $user->setEmail($data['name']);
            }

            $encoder = $this->factory->getEncoder($user);
            $password = $encoder->encodePassword(md5(uniqid()), $user->getSalt());
            $user->setPassword($password);

            $this->em->persist($user);
            $this->em->flush();

            return $user;
        }

        return $existingUser;
    }

    /**
     * @param string $username
     * @return mixed|UserInterface
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function loadUserByUsername($username)
    {
        return $this->em->getRepository(User::class)->createQueryBuilder('u')
            ->where('u.username = :username')
            ->setParameter('username', $username)
            ->getQuery()
            ->getOneOrNullResult();
    }


    /**
     * @param UserInterface $user
     * @return mixed|UserInterface
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function refreshUser(UserInterface $user)
    {
        if (!$user instanceof User) {
            throw new UnsupportedUserException(
                sprintf('Instances of "%s" are not supported.', get_class($user))
            );
        }

        return $this->loadUserByUsername($user->getUsername());
    }

    public function supportsClass($class)
    {
        return $class === 'App\Entity\User';
    }
}