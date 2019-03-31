<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategoryRepository")
 * @UniqueEntity("slug")
 */
class Category
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"forArticle","userArticleEdit"})
     */
    private $id;
    /**
     * @Assert\NotBlank()
     * @Assert\Type(
     *     type="string"
     * )
     * @ORM\Column(type="string", length=255)
     * @Groups({"forArticle","userArticle","userArticleEdit"})
     */
    private $title;

    /**
     * @Assert\Type(
     *     type="bool"
     * )
     * @ORM\Column(type="boolean", name="is_enabled")
     */
    private $isEnabled;

    /**
     * @Assert\Type(
     *     type="string"
     * )
     * @Gedmo\Slug(fields={"title"}, unique=true)
     * @Gedmo\Blameable(field="title", on="update")
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $slug;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Article", mappedBy="category")
     */
    private $articles;

    /**
     * @Assert\Type(
     *     type="bool"
     * )
     * @ORM\Column(type="boolean")
     */
    private $isShowMenu;

    /**
     * @Assert\NotBlank()
     * @Assert\Regex("/#([a-f0-9]{3}){1,2}\b/i")
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"userArticle"})
     */
    private $color;

    public function __construct()
    {
        $this->articles = new ArrayCollection();
        $this->isShowMenu = false;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Category
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsEnabled(): ?bool
    {
        return $this->isEnabled;
    }

    /**
     * @param bool $isEnabled
     * @return Category
     */
    public function setIsEnabled(bool $isEnabled): self
    {
        $this->isEnabled = $isEnabled;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSlug(): ?string
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     * @return Category
     */
    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * @return Article[]|Collection
     */
    public function getArticles(): Collection
    {
        return $this->articles;
    }

    /**
     * @param Article $article
     * @return Category
     */
    public function addArticle(Article $article): self
    {
        if (!$this->articles->contains($article)) {
            $this->articles[] = $article;
            $article->setCategory($this);
        }

        return $this;
    }

    /**
     * @param Article $article
     * @return Category
     */
    public function removeArticle(Article $article): self
    {
        if ($this->articles->contains($article)) {
            $this->articles->removeElement($article);
            if ($article->getCategory() === $this) {
                $article->setCategory(null);
            }
        }

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsShowMenu(): ?bool
    {
        return $this->isShowMenu;
    }

    /**
     * @param bool $isShowMenu
     * @return Category
     */
    public function setIsShowMenu(bool $isShowMenu): self
    {
        $this->isShowMenu = $isShowMenu;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getColor(): ?string
    {
        return $this->color;
    }

    /**
     * @param string|null $color
     * @return Category
     */
    public function setColor(?string $color): self
    {
        $this->color = $color;

        return $this;
    }
}
