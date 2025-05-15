<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250515174523 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE covoiturage (id INT AUTO_INCREMENT NOT NULL, date_depart DATE DEFAULT NULL, heure_depart TIME DEFAULT NULL, lieu_depart VARCHAR(255) DEFAULT NULL, date_arrivee DATE DEFAULT NULL, heure_arrivee TIME DEFAULT NULL, lieu_arrivee VARCHAR(255) DEFAULT NULL, statut VARCHAR(255) DEFAULT NULL, nb_place INT DEFAULT NULL, prix_personne INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE user CHANGE prenom prenom VARCHAR(255) NOT NULL
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            DROP TABLE covoiturage
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE user CHANGE prenom prenom VARCHAR(255) DEFAULT NULL
        SQL);
    }
}
