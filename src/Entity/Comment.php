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
