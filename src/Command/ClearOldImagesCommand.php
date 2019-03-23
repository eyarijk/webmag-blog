<?php

namespace App\Command;

use App\Repository\ArticleImageRepository;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class ClearOldImagesCommand extends Command
{
    /**
     * @var ArticleImageRepository
     */
    private $articleImageRepository;

    /**
     * ClearOldImagesCommand constructor.
     * @param ArticleImageRepository $articleImageRepository
     */
    public function __construct(ArticleImageRepository $articleImageRepository)
    {
        parent::__construct(null);

        $this->articleImageRepository = $articleImageRepository;
    }

    protected static $defaultName = 'clear-old-images';

    protected function configure(): void
    {
        $this->setDescription('This command remove useless images.');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $now = new \DateTime();

        $toDate = $now->modify('-1day');

        $this->articleImageRepository->removeOldImages($toDate);

        $io = new SymfonyStyle($input, $output);

        $io->success('Useless images has been removed!');
    }
}
