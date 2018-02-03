<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SubcommentRepository")
 * @ORM\Table(name="replies")
 */
class Reply
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Comment", inversedBy="replies")
     */
    private $comment;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="replies")
     * @ORM\JoinColumn(onDelete="SET NULL")
     */
    private $author;

    /**
     * @ORM\Column(type="string", length=500)
     * @Assert\NotBlank(message = "Komentarz nie może być pusty.")
     */
    private $content;

    /**
     * @ORM\Column(type="datetime")
     */
    private $posting_date;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param mixed $comment
     */
    public function setComment($comment): void
    {
        $this->comment = $comment;
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
}
