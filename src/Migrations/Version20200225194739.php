<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200225194739 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE swims ADD user_id INT NOT NULL, ADD height_at_time INT NOT NULL, ADD weight_at_time INT NOT NULL, ADD birth_date_at_time INT NOT NULL');
        $this->addSql('ALTER TABLE swims ADD CONSTRAINT FK_D0E130E4A76ED395 FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_D0E130E4A76ED395 ON swims (user_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE swims DROP FOREIGN KEY FK_D0E130E4A76ED395');
        $this->addSql('DROP INDEX IDX_D0E130E4A76ED395 ON swims');
        $this->addSql('ALTER TABLE swims DROP user_id, DROP height_at_time, DROP weight_at_time, DROP birth_date_at_time');
    }
}
