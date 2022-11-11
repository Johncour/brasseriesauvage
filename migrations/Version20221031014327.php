<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221031014327 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE shop DROP FOREIGN KEY FK_AC6A4CA25DE7DD61');
        $this->addSql('DROP INDEX IDX_AC6A4CA25DE7DD61 ON shop');
        $this->addSql('ALTER TABLE shop ADD email_user VARCHAR(255) NOT NULL, DROP kk_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE shop ADD kk_id INT DEFAULT NULL, DROP email_user');
        $this->addSql('ALTER TABLE shop ADD CONSTRAINT FK_AC6A4CA25DE7DD61 FOREIGN KEY (kk_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_AC6A4CA25DE7DD61 ON shop (kk_id)');
    }
}
