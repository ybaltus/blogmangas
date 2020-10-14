<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200830150553 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE manga DROP FOREIGN KEY FK_765A9E037B6461');
        $this->addSql('DROP INDEX UNIQ_765A9E037B6461 ON manga');
        $this->addSql('ALTER TABLE manga DROP manga_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE manga ADD manga_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE manga ADD CONSTRAINT FK_765A9E037B6461 FOREIGN KEY (manga_id) REFERENCES scans (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_765A9E037B6461 ON manga (manga_id)');
    }
}
