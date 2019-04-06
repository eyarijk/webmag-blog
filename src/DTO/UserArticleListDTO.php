<?php

namespace App\DTO;

use App\Entity\Category;
use Symfony\Component\Serializer\Annotation\Groups;

class UserArticleListDTO
{
    /**
     * @var int
     * @Groups({"userArticle"})
     */
    private $countComments = 0;

    /**
     * @var int
     * @Groups({"userArticle"})
     */
    private $countView = 0;

    /**
     * @var string
     * @Groups({"userArticle"})
     */
    private $editLink;

    /**
     * @var string|null
     * @Groups({"userArticle"})
     */
    private $headerImageUrl;

    /**
     * @var string|null
     * @Groups({"userArticle"})
     */
    private $mainImageUrl;

    /**
     * @var string
     * @Groups({"userArticle"})
     */
    private $title;

    /**
     * @var string
     * @Groups({"userArticle"})
     */
    private $shortDescription;

    /**
     * @var \DateTimeInterface|null
     * @Groups({"userArticle"})
     */
    private $publishedAt;

    /**
     * @var Category
     * @Groups({"userArticle"})
     */
    private $category;

    /**
     * @var string
     * @Groups({"userArticle"})
     */
    private $linkPublic;

    /**
     * @return int
     */
    public function getCountComments(): int
    {
        return $this->countComments;
    }

    /**
     * @param int $countComments
     */
    public function setCountComments(int $countComments): void
    {
        $this->countComments = $countComments;
    }

    /**
     * @return int
     */
    public function getCountView(): int
    {
        return $this->countView;
    }

    /**
     * @param int $countView
     */
    public function setCountView(int $countView): void
    {
        $this->countView = $countView;
    }

    /**
     * @return string
     */
    public function getEditLink(): string
    {
        return $this->editLink;
    }

    /**
     * @param string $editLink
     */
    public function setEditLink(string $editLink): void
    {
        $this->editLink = $editLink;
    }

    /**
     * @return string|null
     */
    public function getHeaderImageUrl(): ?string
    {
        return $this->headerImageUrl;
    }

    /**
     * @param string|null $headerImageUrl
     */
    public function setHeaderImageUrl(?string $headerImageUrl): void
    {
        $this->headerImageUrl = $headerImageUrl;
    }

    /**
     * @return string|null
     */
    public function getMainImageUrl(): ?string
    {
        return $this->mainImageUrl;
    }

    /**
     * @param string|null $mainImageUrl
     */
    public function setMainImageUrl(?string $mainImageUrl): void
    {
        $this->mainImageUrl = $mainImageUrl;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getShortDescription(): string
    {
        return $this->shortDescription;
    }

    /**
     * @param string $shortDescription
     */
    public function setShortDescription(string $shortDescription): void
    {
        $this->shortDescription = $shortDescription;
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
     */
    public function setPublishedAt(?\DateTimeInterface $publishedAt): void
    {
        $this->publishedAt = $publishedAt;
    }

    /**
     * @return Category
     */
    public function getCategory(): Category
    {
        return $this->category;
    }

    /**
     * @param Category $category
     */
    public function setCategory(Category $category): void
    {
        $this->category = $category;
    }

    /**
     * @return string
     */
    public function getLinkPublic(): string
    {
        return $this->linkPublic;
    }

    /**
     * @param string $linkPublic
     */
    public function setLinkPublic(string $linkPublic): void
    {
        $this->linkPublic = $linkPublic;
    }
}
