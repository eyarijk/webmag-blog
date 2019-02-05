<?php

namespace App\Command;

use App\Entity\Article;
use App\Entity\Subscriber;
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
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * @var EmailNotificatorForArticles
     */
    private $emailNotificatorForArticles;

    /**
     * SendTodayPopularArticlesEmailNotification constructor.
     * @param EntityManagerInterface $em
     * @param EmailNotificatorForArticles $emailNotificatorForArticles
     */
    public function __construct(EntityManagerInterface $em, EmailNotificatorForArticles $emailNotificatorForArticles)
    {
        parent::__construct();

        $this->em = $em;
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
            ->em
            ->getRepository(Article::class)
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
            ->em
            ->getRepository(Subscriber::class)
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
