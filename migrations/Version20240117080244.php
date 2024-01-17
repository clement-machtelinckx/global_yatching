<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240117080244 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE boat (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, loa INT DEFAULT NULL, beam INT DEFAULT NULL, draft DOUBLE PRECISION DEFAULT NULL, year DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', builder VARCHAR(255) DEFAULT NULL, material VARCHAR(255) DEFAULT NULL, accomodation INT DEFAULT NULL, engines VARCHAR(255) DEFAULT NULL, `range` INT DEFAULT NULL, cruise_speed INT DEFAULT NULL, max_speed INT DEFAULT NULL, price VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE boat');
    }
}
