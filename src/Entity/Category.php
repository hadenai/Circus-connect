<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategoryRepository")
 */
class Category
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Clown", mappedBy="category")
     */
    private $clowns;

    public function __construct()
    {
        $this->clowns = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return Collection|Clown[]
     */
    public function getClowns(): Collection
    {
        return $this->clowns;
    }

    public function addClown(Clown $clown): self
    {
        if (!$this->clowns->contains($clown)) {
            $this->clowns[] = $clown;
            $clown->setCategory($this);
        }

        return $this;
    }

    public function removeClown(Clown $clown): self
    {
        if ($this->clowns->contains($clown)) {
            $this->clowns->removeElement($clown);
            // set the owning side to null (unless already changed)
            if ($clown->getCategory() === $this) {
                $clown->setCategory(null);
            }
        }

        return $this;
    }
}
