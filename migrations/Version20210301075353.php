<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210301075353 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE anime (id INT AUTO_INCREMENT NOT NULL, day_id INT NOT NULL, statut_id INT NOT NULL, ani_name VARCHAR(255) NOT NULL, ani_current_nb INT DEFAULT 0 NOT NULL, ani_full_nb INT NOT NULL, ani_link VARCHAR(255) NOT NULL, ani_hour TIME NOT NULL, ani_start DATE NOT NULL, ani_delay INT DEFAULT 0 NOT NULL, ani_image VARCHAR(255) NOT NULL, INDEX IDX_130459429C24126 (day_id), INDEX IDX_13045942F6203804 (statut_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE day (id INT AUTO_INCREMENT NOT NULL, day_name VARCHAR(10) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE statut (id INT AUTO_INCREMENT NOT NULL, sta_name VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE anime ADD CONSTRAINT FK_130459429C24126 FOREIGN KEY (day_id) REFERENCES day (id)');
        $this->addSql('ALTER TABLE anime ADD CONSTRAINT FK_13045942F6203804 FOREIGN KEY (statut_id) REFERENCES statut (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE anime DROP FOREIGN KEY FK_130459429C24126');
        $this->addSql('ALTER TABLE anime DROP FOREIGN KEY FK_13045942F6203804');
        $this->addSql('DROP TABLE anime');
        $this->addSql('DROP TABLE day');
        $this->addSql('DROP TABLE statut');
    }
	
	public function isTransactional(): bool
	{
		return false;
	}
	
}
