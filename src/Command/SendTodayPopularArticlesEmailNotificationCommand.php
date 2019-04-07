<?php

namespace App\Command;

use App\Entity\Subscriber;
use App\Repository\ArticleRepository;
use App\Repository\SubscriberRepository;
use App\Service\EmailNotificatorForArticles;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SendTodayPopularArticlesEmailNotificationCommand extends Command
{
    /**
     * @var string
     */
    protected static $defaultName = 'send:today:popular:article:notification';

    /**
     * @var EmailNotificatorForArticles
     */
    private $emailNotificatorForArticles;

    /**
     * @var ArticleRepository
     */
    private $articleRepository;

    /**
     * @var SubscriberRepository
     */
    private $subscriberRepository;

    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * SendTodayPopularArticlesEmailNotificationCommand constructor.
     * @param EmailNotificatorForArticles $emailNotificatorForArticles
     * @param ArticleRepository $articleRepository
     * @param SubscriberRepository $subscriberRepository
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(
        EmailNotificatorForArticles $emailNotificatorForArticles,
        ArticleRepository $articleRepository,
        SubscriberRepository $subscriberRepository,
        EntityManagerInterface $entityManager
    ) {
        parent::__construct();

        $this->em = $entityManager;
        $this->subscriberRepository = $subscriberRepository;
        $this->articleRepository = $articleRepository;
        $this->emailNotificatorForArticles = $emailNotificatorForArticles;
    }

    protected function configure(): void
    {
        $this
            ->setHelp('Sending popular articles today to subscribers.')
            ->setDescription('Sending popular articles today to subscribers.')
        ;
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|void|null
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $popularArticlesForToday = $this
            ->articleRepository
            ->getPopularByDate(new \DateTime())
        ;

        if (\count($popularArticlesForToday) === 0) {
            $output->writeln('Today there are no article views!');

            return;
        }

        /**
         * @var Subscriber[][] $iterableActiveSubscribers
         */
        $iterableActiveSubscribers = $this
            ->subscriberRepository
            ->getActiveSubscribersQuery()
            ->iterate()
        ;

        $output->writeln('Start sending!');

        foreach ($iterableActiveSubscribers as $subscriber) {
            $this
                ->emailNotificatorForArticles
                ->notifySubscriber($subscriber[0], $popularArticlesForToday)
            ;

            $output->writeln(date('Y-m-d H:i:s') . ': Send to ' . $subscriber[0]->getEmail());

            $this->em->detach($subscriber[0]);
        }

        $output->writeln('Finish sending!');
    }
}
