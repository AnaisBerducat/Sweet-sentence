<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 */
class Category
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Name;

    /**
     * @ORM\OneToMany(targetEntity=Sentence::class, mappedBy="category")
     */
    private $Sentence;

    public function __construct()
    {
        $this->Sentence = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    /**
     * @return Collection|Sentence[]
     */
    public function getSentence(): Collection
    {
        return $this->Sentence;
    }

    public function addSentence(Sentence $sentence): self
    {
        if (!$this->Sentence->contains($sentence)) {
            $this->Sentence[] = $sentence;
            $sentence->setCategory($this);
        }

        return $this;
    }

    public function removeSentence(Sentence $sentence): self
    {
        if ($this->Sentence->removeElement($sentence)) {
            // set the owning side to null (unless already changed)
            if ($sentence->getCategory() === $this) {
                $sentence->setCategory(null);
            }
        }

        return $this;
    }
}
