<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200109102735 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE instructeur (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE leden (id INT AUTO_INCREMENT NOT NULL, gebruikersnaam VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, voornaam VARCHAR(255) NOT NULL, achternaam VARCHAR(255) NOT NULL, geboortedatum DATE NOT NULL, geslacht VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE lessen DROP FOREIGN KEY FK_1234565');
        $this->addSql('DROP INDEX fk_1234565 ON lessen');
        $this->addSql('CREATE INDEX IDX_29B9C795A8A0A1 ON lessen (activiteit_id)');
        $this->addSql('ALTER TABLE lessen ADD CONSTRAINT FK_1234565 FOREIGN KEY (activiteit_id) REFERENCES activiteiten (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE instructeur');
        $this->addSql('DROP TABLE leden');
        $this->addSql('ALTER TABLE lessen DROP FOREIGN KEY FK_29B9C795A8A0A1');
        $this->addSql('DROP INDEX idx_29b9c795a8a0a1 ON lessen');
        $this->addSql('CREATE INDEX FK_1234565 ON lessen (activiteit_id)');
        $this->addSql('ALTER TABLE lessen ADD CONSTRAINT FK_29B9C795A8A0A1 FOREIGN KEY (activiteit_id) REFERENCES activiteiten (id)');
    }
}
