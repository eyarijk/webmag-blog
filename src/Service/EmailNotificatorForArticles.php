<?php

namespace App\Service;

use App\Entity\Subscriber;
use Swift_Mailer;
use Swift_Message;
use Symfony\Component\Templating\EngineInterface;
use Symfony\Component\Translation\Translator;
use Symfony\Contracts\Translation\TranslatorInterface;

class EmailNotificatorForArticles
{
    /**
     * @var
     */
    private $swiftMailer;

    /**
     * @var string
     */
    private $fromEmail;

    /**
     * @var EngineInterface
     */
    private $templating;

    /**
     * @var Translator|TranslatorInterface
     */
    private $translator;

    /**
     * EmailNotificatorForArticles constructor.
     * @param Swift_Mailer $swiftMailer
     * @param string $fromEmail
     * @param EngineInterface $templating
     * @param TranslatorInterface $translator
     */
    public function __construct(Swift_Mailer $swiftMailer, string $fromEmail, EngineInterface $templating, TranslatorInterface $translator)
    {
        $this->fromEmail = $fromEmail;
        $this->templating = $templating;
        $this->swiftMailer = $swiftMailer;
        $this->translator = $translator;
    }

    /**
     * @param Subscriber $subscriber
     * @param iterable $articles
     */
    public function notifySubscriber(Subscriber $subscriber, iterable $articles): void
    {
        $this->translator->setLocale($subscriber->getLocale());
        $subjectForPopularArticles = $this->translator->trans('email.today_popular_articles.subject');

        $message = new Swift_Message($subjectForPopularArticles);
        $message = $message
            ->setFrom($this->fromEmail)
            ->setTo($subscriber->getEmail())
            ->setBody(
                $this->templating->render('mail/subscriber_articles.html.twig', [
                    'subscriber' => $subscriber,
                    'articles' => $articles,
                ]),
                'text/html'
            )
        ;

        $this->swiftMailer->send($message);
    }
}
