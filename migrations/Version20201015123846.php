<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201015123846 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE guinot_location (id INT AUTO_INCREMENT NOT NULL, created_at DATETIME NOT NULL, denomination VARCHAR(255) NOT NULL, categorie VARCHAR(250) NOT NULL, photo VARCHAR(250) NOT NULL, description LONGTEXT NOT NULL, surface DOUBLE PRECISION NOT NULL, type_maison VARCHAR(255) NOT NULL, chambre INT NOT NULL, etage TINYINT(1) DEFAULT NULL, cout DOUBLE PRECISION NOT NULL, adresse LONGTEXT NOT NULL, accessibilite LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE guinot_vente (id INT AUTO_INCREMENT NOT NULL, created_at DATETIME NOT NULL, denomination VARCHAR(255) NOT NULL, categorie VARCHAR(255) NOT NULL, photo VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, surface DOUBLE PRECISION NOT NULL, type_maison VARCHAR(255) NOT NULL, chambre INT NOT NULL, etage TINYINT(1) DEFAULT NULL, cout DOUBLE PRECISION NOT NULL, adresse LONGTEXT NOT NULL, accessibilite LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE guinot_location');
        $this->addSql('DROP TABLE guinot_vente');
    }
}
