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
 * @ORM\Entity(repositoryClass="App\Repository\ArticleRepository")
 * @UniqueEntity("slug")
 */
class Article
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"userArticle", "userArticleEdit"})
     */
    private $id;

    /**
     * @Assert\NotBlank()
     * @Assert\Type(
     *     type="string"
     * )
     * @ORM\Column(type="string", length=255)
     * @Groups({"userArticle", "userArticleEdit"})
     */
    private $title;

    /**
     * @Assert\Type(
     *     type="string"
     * )
     * @Gedmo\Slug(fields={"title"}, unique=true)
     * @Gedmo\Blameable(field="title", on="update")
     * @ORM\Column(type="string", length=255, unique=true)
     * @Groups({"userArticle", "userArticleEdit"})
     */
    private $slug;

    /**
     * @Assert\Type(
     *     type="bool"
     * )
     * @ORM\Column(type="boolean")
     * @Groups({"userArticle", "userArticleEdit"})
     */
    private $isEnabled;

    /**
     * @Assert\NotBlank()
     * @Assert\Type(
     *     type="string"
     * )
     * @ORM\Column(type="string", length=5000)
     * @Groups({"userArticle", "userArticleEdit"})
     */
    private $description;

    /**
     * @Assert\NotBlank()
     * @Assert\Type(
     *     type="string"
     * )
     * @ORM\Column(type="string", length=1500, nullable=true)
     * @Groups({"userArticle", "userArticleEdit"})
     */
    private $shortDescription;

    /**
     * @Assert\Type(
     *     type="datetime"
     * )
     * @ORM\Column(type="datetime")
     * @Groups({"userArticle"})
     */
    private $createdAt;

    /**
     * @Gedmo\Timestampable()
     * @ORM\Column(type="datetime")
     * @Groups({"userArticle"})
     */
    private $updatedAt;

    /**
     * @Assert\Type(
     *     type="datetime"
     * )
     * @ORM\Column(type="datetime", nullable=true)
     * @Groups({"userArticle", "userArticleEdit"})
     */
    private $publishedAt;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="articles")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @Assert\NotBlank()
     * @ORM\ManyToOne(targetEntity="App\Entity\Category", inversedBy="articles", cascade={"persist"})
     * @Groups({"userArticle", "userArticleEdit"})
     */
    private $category;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Tag", inversedBy="articles", cascade={"persist"})
     * @Groups({"userArticleEdit"})
     */
    private $tags;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ArticleView", mappedBy="article")
     */
    private $articleViews;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ArticleComment", mappedBy="article", orphanRemoval=true)
     */
    private $articleComments;

    /**
     * @Assert\Type(
     *     type="bool"
     * )
     * @ORM\Column(type="boolean")
     * @Groups({"userArticle", "userArticleEdit"})
     */
    private $isMain;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\ArticleImage", cascade={"persist", "remove"})
     * @Groups({"userArticle", "userArticleEdit"})
     */
    private $mainImage;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\ArticleImage", cascade={"persist", "remove"})
     * @Groups({"userArticle", "userArticleEdit"})
     */
    private $headerImage;

    /**
     * Article constructor.
     */
    public function __construct()
    {
        $this->tags = new ArrayCollection();
        $this->articleViews = new ArrayCollection();
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
        $this->articleComments = new ArrayCollection();
        $this->isMain = false;
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
     * @return Article
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

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
     * @return Article
     */
    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

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
     * @return Article
     */
    public function setIsEnabled(bool $isEnabled): self
    {
        $this->isEnabled = $isEnabled;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Article
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getShortDescription(): ?string
    {
        return $this->shortDescription;
    }

    /**
     * @param string|null $shortDescription
     * @return Article
     */
    public function setShortDescription(?string $shortDescription): self
    {
        $this->shortDescription = $shortDescription;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTimeInterface $createdAt
     * @return Article
     */
    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTimeInterface $updatedAt
     * @return Article
     */
    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getPublishedAt(): ?\DateTimeInterface
    {
        return $this->publishedAt;
    }

    /**
     * @param \DateTimeInterface|null $publishedAt
     * @return Article
     */
    public function setPublishedAt(?\DateTimeInterface $publishedAt): self
    {
        $this->publishedAt = $publishedAt;

        return $this;
    }

    /**
     * @return User|null
     */
    public function getUser(): ?User
    {
        return $this->user;
    }

    /**
     * @param User|null $user
     * @return Article
     */
    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Category|null
     */
    public function getCategory(): ?Category
    {
        return $this->category;
    }

    /**
     * @param Category $category
     * @return Article
     */
    public function setCategory(Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Collection|Tag[]
     */
    public function getTags(): Collection
    {
        return $this->tags;
    }

    /**
     * @param Tag $tag
     * @return Article
     */
    public function addTag(Tag $tag): self
    {
        if (!$this->tags->contains($tag)) {
            $this->tags[] = $tag;
        }

        return $this;
    }

    /**
     * @param Tag $tag
     * @return Article
     */
    public function removeTag(Tag $tag): self
    {
        if ($this->tags->contains($tag)) {
            $this->tags->removeElement($tag);
        }

        return $this;
    }

    /**
     * @return ArticleView[]|Collection
     */
    public function getArticleViews(): Collection
    {
        return $this->articleViews;
    }

    /**
     * @param ArticleView $articleView
     * @return Article
     */
    public function addArticleView(ArticleView $articleView): self
    {
        if (!$this->articleViews->contains($articleView)) {
            $this->articleViews[] = $articleView;
            $articleView->setArticle($this);
        }

        return $this;
    }

    /**
     * @param ArticleView $articleView
     * @return Article
     */
    public function removeArticleView(ArticleView $articleView): self
    {
        if ($this->articleViews->contains($articleView)) {
            $this->articleViews->removeElement($articleView);
            if ($articleView->getArticle() === $this) {
                $articleView->setArticle(null);
            }
        }

        return $this;
    }

    /**
     * @return ArticleComment[]|Collection
     */
    public function getArticleComments(): Collection
    {
        return $this->articleComments;
    }

    /**
     * @param ArticleComment $articleComment
     * @return Article
     */
    public function addArticleComment(ArticleComment $articleComment): self
    {
        if (!$this->articleComments->contains($articleComment)) {
            $this->articleComments[] = $articleComment;
            $articleComment->setArticle($this);
        }

        return $this;
    }

    /**
     * @param ArticleComment $articleComment
     * @return Article
     */
    public function removeArticleComment(ArticleComment $articleComment): self
    {
        if ($this->articleComments->contains($articleComment)) {
            $this->articleComments->removeElement($articleComment);
            if ($articleComment->getArticle() === $this) {
                $articleComment->setArticle(null);
            }
        }

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsMain(): ?bool
    {
        return $this->isMain;
    }

    /**
     * @param bool $isMain
     * @return Article
     */
    public function setIsMain(bool $isMain): self
    {
        $this->isMain = $isMain;

        return $this;
    }

    /**
     * @return ArticleImage|null
     */
    public function getMainImage(): ?ArticleImage
    {
        return $this->mainImage;
    }

    /**
     * @param ArticleImage|null $mainImage
     * @return Article
     */
    public function setMainImage(?ArticleImage $mainImage): self
    {
        $this->mainImage = $mainImage;

        return $this;
    }

    /**
     * @return ArticleImage|null
     */
    public function getHeaderImage(): ?ArticleImage
    {
        return $this->headerImage;
    }

    /**
     * @param ArticleImage|null $headerImage
     * @return Article
     */
    public function setHeaderImage(?ArticleImage $headerImage): self
    {
        $this->headerImage = $headerImage;

        return $this;
    }
}
