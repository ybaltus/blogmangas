<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200829163624 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE anime (id INT AUTO_INCREMENT NOT NULL, manga_id INT DEFAULT NULL, current_episode INT NOT NULL, max_episode INT NOT NULL, current_season INT NOT NULL, max_season INT NOT NULL, INDEX IDX_130459427B6461 (manga_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE manga (id INT AUTO_INCREMENT NOT NULL, manga_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, type INT NOT NULL, year INT NOT NULL, author VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, country VARCHAR(255) NOT NULL, exist_episode TINYINT(1) DEFAULT \'0\' NOT NULL, exist_scan TINYINT(1) DEFAULT \'1\' NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, title_slug VARCHAR(255) NOT NULL, complete TINYINT(1) DEFAULT \'0\' NOT NULL, UNIQUE INDEX UNIQ_765A9E037B6461 (manga_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE scans (id INT AUTO_INCREMENT NOT NULL, manga_id INT DEFAULT NULL, current_chapter INT NOT NULL, max_chapter INT NOT NULL, UNIQUE INDEX UNIQ_2AA4F2577B6461 (manga_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE anime ADD CONSTRAINT FK_130459427B6461 FOREIGN KEY (manga_id) REFERENCES manga (id)');
        $this->addSql('ALTER TABLE manga ADD CONSTRAINT FK_765A9E037B6461 FOREIGN KEY (manga_id) REFERENCES scans (id)');
        $this->addSql('ALTER TABLE scans ADD CONSTRAINT FK_2AA4F2577B6461 FOREIGN KEY (manga_id) REFERENCES manga (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE anime DROP FOREIGN KEY FK_130459427B6461');
        $this->addSql('ALTER TABLE scans DROP FOREIGN KEY FK_2AA4F2577B6461');
        $this->addSql('ALTER TABLE manga DROP FOREIGN KEY FK_765A9E037B6461');
        $this->addSql('DROP TABLE anime');
        $this->addSql('DROP TABLE manga');
        $this->addSql('DROP TABLE scans');
    }
}
