<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200109111755 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user ADD voornaam VARCHAR(255) NOT NULL, ADD prefix VARCHAR(255) DEFAULT NULL, ADD achternaam VARCHAR(255) NOT NULL, ADD geboortedatum DATE NOT NULL, ADD geslacht VARCHAR(255) NOT NULL, ADD gebruikersnaam VARCHAR(255) NOT NULL, ADD aangenomen DATE DEFAULT NULL, ADD salaris DOUBLE PRECISION DEFAULT NULL, ADD straatnaam VARCHAR(255) DEFAULT NULL, ADD postcode VARCHAR(255) DEFAULT NULL, ADD woonplaats VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user DROP voornaam, DROP prefix, DROP achternaam, DROP geboortedatum, DROP geslacht, DROP gebruikersnaam, DROP aangenomen, DROP salaris, DROP straatnaam, DROP postcode, DROP woonplaats');
    }
}
