<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200427083703 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE adresses CHANGE date_update date_update DATETIME DEFAULT NULL, CHANGE date_delete date_delete DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE clients CHANGE mariage_id mariage_id INT DEFAULT NULL, CHANGE password password VARCHAR(255) DEFAULT NULL, CHANGE date_update date_update DATETIME DEFAULT NULL, CHANGE date_delete date_delete DATETIME DEFAULT NULL, CHANGE civilite civilite VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE commentaires CHANGE date_update date_update DATETIME DEFAULT NULL, CHANGE date_delete date_delete DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE mariages CHANGE date_update date_update DATETIME DEFAULT NULL, CHANGE date_delete date_delete DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE prestations CHANGE date_update date_update DATETIME DEFAULT NULL, CHANGE date_delete date_delete DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE prestations_mariages ADD mariage_id INT DEFAULT NULL, ADD prestation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE prestations_mariages ADD CONSTRAINT FK_31D7915E192813B FOREIGN KEY (mariage_id) REFERENCES mariages (id)');
        $this->addSql('ALTER TABLE prestations_mariages ADD CONSTRAINT FK_31D7915E9E45C554 FOREIGN KEY (prestation_id) REFERENCES prestations (id)');
        $this->addSql('CREATE INDEX IDX_31D7915E192813B ON prestations_mariages (mariage_id)');
        $this->addSql('CREATE INDEX IDX_31D7915E9E45C554 ON prestations_mariages (prestation_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE adresses CHANGE date_update date_update DATETIME DEFAULT \'NULL\', CHANGE date_delete date_delete DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE clients CHANGE mariage_id mariage_id INT DEFAULT NULL, CHANGE password password VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE civilite civilite VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE date_update date_update DATETIME DEFAULT \'NULL\', CHANGE date_delete date_delete DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE commentaires CHANGE date_update date_update DATETIME DEFAULT \'NULL\', CHANGE date_delete date_delete DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE mariages CHANGE date_update date_update DATETIME DEFAULT \'NULL\', CHANGE date_delete date_delete DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE prestations CHANGE date_update date_update DATETIME DEFAULT \'NULL\', CHANGE date_delete date_delete DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE prestations_mariages DROP FOREIGN KEY FK_31D7915E192813B');
        $this->addSql('ALTER TABLE prestations_mariages DROP FOREIGN KEY FK_31D7915E9E45C554');
        $this->addSql('DROP INDEX IDX_31D7915E192813B ON prestations_mariages');
        $this->addSql('DROP INDEX IDX_31D7915E9E45C554 ON prestations_mariages');
        $this->addSql('ALTER TABLE prestations_mariages DROP mariage_id, DROP prestation_id');
    }
}
