<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221021101956 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, pseudo VARCHAR(255) DEFAULT NULL, adress VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, postal_code INT NOT NULL, phone BIGINT NOT NULL, birthday_date DATETIME NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_beer (user_id INT NOT NULL, beer_id INT NOT NULL, INDEX IDX_22772A64A76ED395 (user_id), INDEX IDX_22772A64D0989053 (beer_id), PRIMARY KEY(user_id, beer_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_beer ADD CONSTRAINT FK_22772A64A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_beer ADD CONSTRAINT FK_22772A64D0989053 FOREIGN KEY (beer_id) REFERENCES beer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE shop ADD kk_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE shop ADD CONSTRAINT FK_AC6A4CA25DE7DD61 FOREIGN KEY (kk_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_AC6A4CA25DE7DD61 ON shop (kk_id)');
        $this->addSql('ALTER TABLE shop RENAME INDEX user_id TO IDX_AC6A4CA2A76ED395');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE notice DROP FOREIGN KEY FK_480D45C2A76ED395');
        $this->addSql('ALTER TABLE shop DROP FOREIGN KEY FK_AC6A4CA2A76ED395');
        $this->addSql('ALTER TABLE shop DROP FOREIGN KEY FK_AC6A4CA25DE7DD61');
        $this->addSql('ALTER TABLE user_beer DROP FOREIGN KEY FK_22772A64A76ED395');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_beer');
        $this->addSql('DROP INDEX IDX_AC6A4CA25DE7DD61 ON shop');
        $this->addSql('ALTER TABLE shop DROP kk_id');
        $this->addSql('ALTER TABLE shop RENAME INDEX idx_ac6a4ca2a76ed395 TO user_id');
    }
}
