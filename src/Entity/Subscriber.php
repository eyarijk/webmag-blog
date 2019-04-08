<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SubscriberRepository")
 * @UniqueEntity("email")
 * @UniqueEntity("token")
 */
class Subscriber
{
    /**
     * @var int
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     * @Assert\NotBlank()
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $email;

    /**
     * @var bool
     * @ORM\Column(type="boolean")
     */
    private $isActive;

    /**
     * @var \DateTimeInterface
     * @Gedmo\Timestampable()
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    private $token;

    /**
     * @var string
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    private $locale;

    /**
     * Subscriber constructor.
     */
    public function __construct()
    {
        $this->isActive = true;
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
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return Subscriber
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsActive(): ?bool
    {
        return $this->isActive;
    }

    /**
     * @param bool $isActive
     * @return Subscriber
     */
    public function setIsActive(bool $isActive): self
    {
        $this->isActive = $isActive;

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
     * @return Subscriber
     */
    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getToken(): ?string
    {
        return $this->token;
    }

    /**
     * @param string $token
     * @return Subscriber
     */
    public function setToken(string $token): self
    {
        $this->token = $token;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getLocale(): ?string
    {
        return $this->locale;
    }

    /**
     * @param string $locale
     * @return Subscriber
     */
    public function setLocale(string $locale): self
    {
        $this->locale = $locale;

        return $this;
    }
}
