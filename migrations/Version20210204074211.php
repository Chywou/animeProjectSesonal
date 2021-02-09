<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210204074211 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE anime ADD day_id INT NOT NULL, ADD statut_id INT NOT NULL');
        $this->addSql('ALTER TABLE anime ADD CONSTRAINT FK_130459429C24126 FOREIGN KEY (day_id) REFERENCES day (id)');
        $this->addSql('ALTER TABLE anime ADD CONSTRAINT FK_13045942F6203804 FOREIGN KEY (statut_id) REFERENCES statut (id)');
        $this->addSql('CREATE INDEX IDX_130459429C24126 ON anime (day_id)');
        $this->addSql('CREATE INDEX IDX_13045942F6203804 ON anime (statut_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE anime DROP FOREIGN KEY FK_130459429C24126');
        $this->addSql('ALTER TABLE anime DROP FOREIGN KEY FK_13045942F6203804');
        $this->addSql('DROP INDEX IDX_130459429C24126 ON anime');
        $this->addSql('DROP INDEX IDX_13045942F6203804 ON anime');
        $this->addSql('ALTER TABLE anime DROP day_id, DROP statut_id');
    }
}
