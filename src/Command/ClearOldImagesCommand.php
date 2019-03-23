<?php

namespace App\Command;

use App\Entity\ArticleImage;
use App\Repository\ArticleImageRepository;
use App\Service\ImageRemove;
use Doctrine\ORM\EntityManagerInterface;
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
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * @var ImageRemove
     */
    private $imageRemove;

    /**
     * ClearOldImagesCommand constructor.
     * @param EntityManagerInterface $em
     * @param ArticleImageRepository $articleImageRepository
     * @param ImageRemove $imageRemove
     */
    public function __construct(EntityManagerInterface $em, ArticleImageRepository $articleImageRepository, ImageRemove $imageRemove)
    {
        parent::__construct(null);

        $this->em = $em;
        $this->imageRemove = $imageRemove;
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

        /**
         * @var ArticleImage[][] $useLessImages
         */
        $useLessImages = $this->articleImageRepository->findUselessToDateIterate($toDate);

        $index = 0;

        foreach ($useLessImages as $image) {

            try {
                $this->imageRemove->remove($image[0]->getName());

                $this->em->remove($image[0]);

                $output->writeln(date('Y-m-d H:i:s') . ': Remove ' . $image[0]->getName());

            } catch (\Exception $exception) {
                $output->writeln(sprintf('Image: %s (ID:%d). Error: %s', $image[0]->getName(), $image[0]->getId(), $exception->getMessage()));
            }

            $index++;

            if (($index % 100) === 0) {
                $this->em->flush();
                $this->em->clear();
            }
        }

        $this->em->flush();
        $this->em->clear();

        $io = new SymfonyStyle($input, $output);

        $io->success('Useless images has been removed!');
    }
}
