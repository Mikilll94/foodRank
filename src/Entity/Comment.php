<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommentRepository")
 * @ORM\Table(name="comments")
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
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="comments")
     */
    private $author;

    /**
     * @ORM\Column(type="string", length=500)
     * @Assert\NotBlank(message = "Komentarz nie może być pusty.")
     */
    private $content;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(message="Musisz wystawić ocenę.")
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

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Reply", mappedBy="comment")
     */
    private $replies;

    public function __construct()
    {
        $this->replies = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getRestaurant()
    {
        return $this->restaurant;
    }

    public function setRestaurant($restaurant): void
    {
        $this->restaurant = $restaurant;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function setAuthor($author): void
    {
        $this->author = $author;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content): void
    {
        $this->content = $content;
    }

    public function getRate()
    {
        return $this->rate;
    }

    public function setRate($rate): void
    {
        $this->rate = $rate;
    }

    public function getPostingDate()
    {
        return $this->posting_date;
    }

    public function setPostingDate($posting_date): void
    {
        $this->posting_date = $posting_date;
    }

    /**
     * @return mixed
     */
    public function getReplies()
    {
        return $this->replies;
    }

    /**
     * @param mixed $replies
     */
    public function setReplies($replies): void
    {
        $this->replies = $replies;
    }
}
