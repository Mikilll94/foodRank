<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RestaurantRepository")
 * @ORM\Table(name="restaurants")
 */
class Restaurant
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @ORM\Column(type="blob")
     */
    private $image;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $short_description;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Comment", mappedBy="restaurant")
     */
    private $comments;

    public function getComments()
    {
        return $this->comments;
    }

    public function setComments($comments): void
    {
        $this->comments = $comments;
    }

    public function __construct()
    {
        $this->comments = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function getImageSrc()
    {
        rewind($this->image);
        return 'data:image/jpeg;base64,' . base64_encode(stream_get_contents($this->image));
    }

    public function setImage($image): void
    {
        $this->image = $image;
    }

    public function getShortDescription()
    {
        return $this->short_description;
    }

    public function setShortDescription($short_description): void
    {
        $this->short_description = $short_description;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description): void
    {
        $this->description = $description;
    }
}
