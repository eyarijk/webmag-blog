<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ArticleImageRepository")
 */
class ArticleImage
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"forCreate", "userArticleEdit"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"forCreate", "userArticleEdit"})
     */
    private $name;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Article", mappedBy="mainImage", cascade={"persist", "remove"})
     */
    private $articleMain;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Article", mappedBy="headerImage", cascade={"persist", "remove"})
     */
    private $articleHeader;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
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
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return ArticleImage
     */
    public function setName(string $name): self
    {
        $this->name = $name;

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
     * @param \DateTimeInterface|null $createdAt
     * @return ArticleImage
     */
    public function setCreatedAt(?\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return ArticleComment|null
     */
    public function getArticleMain(): ?ArticleComment
    {
        return $this->articleMain;
    }

    /**
     * @param ArticleComment|null $articleMain
     * @return ArticleImage
     */
    public function setArticleMain(?ArticleComment $articleMain): self
    {
        $this->articleMain = $articleMain;

        $newImage = $articleMain === null ? null : $this;
        if ($newImage !== $articleMain->getImage()) {
            $articleMain->setImage($newImage);
        }

        return $this;
    }

    /**
     * @return ArticleComment|null
     */
    public function getArticleHeader(): ?ArticleComment
    {
        return $this->articleHeader;
    }

    /**
     * @param ArticleComment|null $articleHeader
     * @return ArticleImage
     */
    public function setArticleHeader(?ArticleComment $articleHeader): self
    {
        $this->articleHeader = $articleHeader;

        $newImage = $articleHeader === null ? null : $this;
        if ($newImage !== $articleHeader->getImage()) {
            $articleHeader->setImage($newImage);
        }

        return $this;
    }
}
