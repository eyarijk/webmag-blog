<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190119075508 extends AbstractMigration
{
    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE article_comment ADD parent_comment_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE article_comment ADD CONSTRAINT FK_79A616DBBF2AF943 FOREIGN KEY (parent_comment_id) REFERENCES article_comment (id)');
        $this->addSql('CREATE INDEX IDX_79A616DBBF2AF943 ON article_comment (parent_comment_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE article_comment DROP FOREIGN KEY FK_79A616DBBF2AF943');
        $this->addSql('DROP INDEX IDX_79A616DBBF2AF943 ON article_comment');
        $this->addSql('ALTER TABLE article_comment DROP parent_comment_id');
    }
}
