<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Table;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommentRepository")
 * @Table(name="comments")
 */
class Comment
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Restaurant", inversedBy="comments")
     */
    private $restaurant;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getRestaurant()
    {
        return $this->restaurant;
    }

    /**
     * @param mixed $restaurant
     */
    public function setRestaurant($restaurant): void
    {
        $this->restaurant = $restaurant;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     */
    public function setAuthor($author): void
    {
        $this->author = $author;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content): void
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * @param mixed $rate
     */
    public function setRate($rate): void
    {
        $this->rate = $rate;
    }

    /**
     * @return mixed
     */
    public function getPostingDate()
    {
        return $this->posting_date;
    }

    /**
     * @param mixed $posting_date
     */
    public function setPostingDate($posting_date): void
    {
        $this->posting_date = $posting_date;
    }

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $author;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $content;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Range(min = 1, max = 5,
     *      minMessage = "Nie możesz wystawić oceny mniejsze niż {{ limit }}.",
     *      maxMessage = "Nie możesz wystawić oceny większe niż {{ limit }}."
     * )
     */
    private $rate;

    /**
     * @ORM\Column(type="datetime")
     */
    private $posting_date;
}
