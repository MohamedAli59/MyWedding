<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200512090624 extends AbstractMigration
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
        $this->addSql('ALTER TABLE clients CHANGE mariage_id mariage_id INT DEFAULT NULL, CHANGE password password VARCHAR(255) DEFAULT NULL, CHANGE date_update date_update DATETIME DEFAULT NULL, CHANGE date_delete date_delete DATETIME DEFAULT NULL, CHANGE civilite civilite VARCHAR(255) DEFAULT NULL, CHANGE role role VARCHAR(255) DEFAULT \'ROLE_USER\' NOT NULL');
        $this->addSql('ALTER TABLE commentaires CHANGE date_update date_update DATETIME DEFAULT NULL, CHANGE date_delete date_delete DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE mariages CHANGE date_update date_update DATETIME DEFAULT NULL, CHANGE date_delete date_delete DATETIME DEFAULT NULL, CHANGE budget budget INT DEFAULT NULL');
        $this->addSql('ALTER TABLE prestations CHANGE date_update date_update DATETIME DEFAULT NULL, CHANGE date_delete date_delete DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE prestations_mariages ADD quantite INT DEFAULT NULL, DROP quantit, CHANGE budget budget INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reset_password_request CHANGE user_id user_id INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE adresses CHANGE date_update date_update DATETIME DEFAULT \'NULL\', CHANGE date_delete date_delete DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE clients CHANGE mariage_id mariage_id INT DEFAULT NULL, CHANGE password password VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE civilite civilite VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE role role VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'\'\'ROLE_USER\'\'\' NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE date_update date_update DATETIME DEFAULT \'NULL\', CHANGE date_delete date_delete DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE commentaires CHANGE date_update date_update DATETIME DEFAULT \'NULL\', CHANGE date_delete date_delete DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE mariages CHANGE date_update date_update DATETIME DEFAULT \'NULL\', CHANGE date_delete date_delete DATETIME DEFAULT \'NULL\', CHANGE budget budget INT DEFAULT NULL');
        $this->addSql('ALTER TABLE prestations CHANGE date_update date_update DATETIME DEFAULT \'NULL\', CHANGE date_delete date_delete DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE prestations_mariages ADD quantit INT DEFAULT NULL, DROP quantite, CHANGE budget budget INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reset_password_request CHANGE user_id user_id INT DEFAULT NULL');
    }
}
