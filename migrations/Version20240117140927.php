<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240117140927 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE boat_image (id INT AUTO_INCREMENT NOT NULL, boat_id INT DEFAULT NULL, image_name VARCHAR(255) NOT NULL, image_file VARBINARY(255) NOT NULL, image_size INT DEFAULT NULL, INDEX IDX_4FE3EF33A1E84A29 (boat_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE boat_image ADD CONSTRAINT FK_4FE3EF33A1E84A29 FOREIGN KEY (boat_id) REFERENCES boat (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE boat_image DROP FOREIGN KEY FK_4FE3EF33A1E84A29');
        $this->addSql('DROP TABLE boat_image');
    }
}
