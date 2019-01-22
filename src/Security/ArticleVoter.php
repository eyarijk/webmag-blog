<?php

namespace App\Security;

use App\Entity\Article;
use App\Entity\User;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\Security;

class ArticleVoter extends Voter
{
    public const ARTICLE_VIEW = 'view';
    public const ARTICLE_EDIT = 'edit';
    public const ARTICLE_DELETE = 'delete';

    /**
     * @var Security
     */
    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    /**
     * @param string $attribute
     * @param Article $subject
     * @return bool
     */
    protected function supports($attribute, $subject): bool
    {
        if (!$subject instanceof Article) {
            return false;
        }

        if (!\in_array($attribute, [self::ARTICLE_VIEW, self::ARTICLE_EDIT, self::ARTICLE_DELETE], true)) {
            return false;
        }

        return true;
    }

    /**
     * @param string $attribute
     * @param Article $subject
     * @param TokenInterface $token
     * @return bool
     */
    protected function voteOnAttribute($attribute, $subject, TokenInterface $token): bool
    {
        $user = $token->getUser();

        if (!$user instanceof User) {
            return false;
        }

        if ($this->security->isGranted('ROLE_SUPER_ADMIN')) {
            return true;
        }

        switch ($attribute) {
            case self::ARTICLE_VIEW:
                return $user === $subject->getUser();
            case self::ARTICLE_EDIT:
                return $user === $subject->getUser();
            case self::ARTICLE_DELETE:
                return $user === $subject->getUser();
        }

        throw new \LogicException('This code should not be reached!');
    }
}
