<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240227130019 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE speciality (id INT AUTO_INCREMENT NOT NULL, speciality_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE patient ADD speciality_id INT NOT NULL, DROP speciality');
        $this->addSql('ALTER TABLE patient ADD CONSTRAINT FK_1ADAD7EB3B5A08D7 FOREIGN KEY (speciality_id) REFERENCES speciality (id)');
        $this->addSql('CREATE INDEX IDX_1ADAD7EB3B5A08D7 ON patient (speciality_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE patient DROP FOREIGN KEY FK_1ADAD7EB3B5A08D7');
        $this->addSql('DROP TABLE speciality');
        $this->addSql('DROP INDEX IDX_1ADAD7EB3B5A08D7 ON patient');
        $this->addSql('ALTER TABLE patient ADD speciality VARCHAR(255) NOT NULL, DROP speciality_id');
    }
}
