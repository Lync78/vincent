<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20261012154848 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE alers (id INT AUTO_INCREMENT NOT NULL, pack_id INT NOT NULL, alerts_follow VARCHAR(255) NOT NULL, alerts_donation VARCHAR(255) NOT NULL, alerts_bits VARCHAR(255) NOT NULL, alerts_subscribe VARCHAR(255) NOT NULL, alerts_host VARCHAR(255) NOT NULL, alerts_raid VARCHAR(255) NOT NULL, alerts_subgift VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8999D3621919B217 (pack_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE badges (id INT AUTO_INCREMENT NOT NULL, pack_id INT NOT NULL, one_month VARCHAR(255) DEFAULT NULL, two_month VARCHAR(255) DEFAULT NULL, three_month VARCHAR(255) DEFAULT NULL, six_month VARCHAR(255) DEFAULT NULL, nine_month VARCHAR(255) DEFAULT NULL, one_year VARCHAR(255) DEFAULT NULL, one_year_half VARCHAR(255) DEFAULT NULL, two_year_more VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_78F6539A1919B217 (pack_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE biographie (id INT AUTO_INCREMENT NOT NULL, pseudo VARCHAR(255) NOT NULL, marque VARCHAR(255) NOT NULL, texte_1 VARCHAR(255) DEFAULT NULL, texte_2 VARCHAR(255) DEFAULT NULL, texte_3 VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE book (id INT AUTO_INCREMENT NOT NULL, category_id INT NOT NULL, description VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, INDEX IDX_CBE5A33112469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE book_category (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE book_image (id INT AUTO_INCREMENT NOT NULL, book_id INT NOT NULL, image VARCHAR(255) NOT NULL, INDEX IDX_CBFF112616A2B381 (book_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE carousel (id INT AUTO_INCREMENT NOT NULL, first TINYINT(1) NOT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE exclusivite (id INT AUTO_INCREMENT NOT NULL, img VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pack (id INT AUTO_INCREMENT NOT NULL, slug VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, hors_ligne VARCHAR(255) NOT NULL, banniere VARCHAR(255) NOT NULL, profil VARCHAR(255) NOT NULL, scene_start_live VARCHAR(255) NOT NULL, scene_end_live VARCHAR(255) NOT NULL, scene_break VARCHAR(255) NOT NULL, scene_game VARCHAR(255) NOT NULL, scene_switch VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE panneaux (id INT AUTO_INCREMENT NOT NULL, pack_id INT NOT NULL, slot1 VARCHAR(255) DEFAULT NULL, slot2 VARCHAR(255) DEFAULT NULL, slot3 VARCHAR(255) DEFAULT NULL, slot4 VARCHAR(255) DEFAULT NULL, slot5 VARCHAR(255) DEFAULT NULL, slot6 VARCHAR(255) DEFAULT NULL, slot7 VARCHAR(255) DEFAULT NULL, slot8 VARCHAR(255) DEFAULT NULL, slot9 VARCHAR(255) DEFAULT NULL, slot10 VARCHAR(255) DEFAULT NULL, slot11 VARCHAR(255) DEFAULT NULL, slot12 VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_B9347C351919B217 (pack_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE price (id INT AUTO_INCREMENT NOT NULL, category_id INT NOT NULL, name VARCHAR(255) NOT NULL, price INT NOT NULL, color VARCHAR(255) NOT NULL, argu1 VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE service (id INT AUTO_INCREMENT NOT NULL, category_id INT NOT NULL, description VARCHAR(255) NOT NULL, position VARCHAR(255) NOT NULL, actif TINYINT(1) NOT NULL, background VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, INDEX IDX_E19D9AD212469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, biographie_id INT DEFAULT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, lastlog DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), UNIQUE INDEX UNIQ_8D93D649EF361ABC (biographie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE alers ADD CONSTRAINT FK_8999D3621919B217 FOREIGN KEY (pack_id) REFERENCES pack (id)');
        $this->addSql('ALTER TABLE badges ADD CONSTRAINT FK_78F6539A1919B217 FOREIGN KEY (pack_id) REFERENCES pack (id)');
        $this->addSql('ALTER TABLE book ADD CONSTRAINT FK_CBE5A33112469DE2 FOREIGN KEY (category_id) REFERENCES book_category (id)');
        $this->addSql('ALTER TABLE book_image ADD CONSTRAINT FK_CBFF112616A2B381 FOREIGN KEY (book_id) REFERENCES book (id)');
        $this->addSql('ALTER TABLE panneaux ADD CONSTRAINT FK_B9347C351919B217 FOREIGN KEY (pack_id) REFERENCES pack (id)');
        $this->addSql('ALTER TABLE service ADD CONSTRAINT FK_E19D9AD212469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649EF361ABC FOREIGN KEY (biographie_id) REFERENCES biographie (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE alers DROP FOREIGN KEY FK_8999D3621919B217');
        $this->addSql('ALTER TABLE badges DROP FOREIGN KEY FK_78F6539A1919B217');
        $this->addSql('ALTER TABLE book DROP FOREIGN KEY FK_CBE5A33112469DE2');
        $this->addSql('ALTER TABLE book_image DROP FOREIGN KEY FK_CBFF112616A2B381');
        $this->addSql('ALTER TABLE panneaux DROP FOREIGN KEY FK_B9347C351919B217');
        $this->addSql('ALTER TABLE service DROP FOREIGN KEY FK_E19D9AD212469DE2');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649EF361ABC');
        $this->addSql('DROP TABLE alers');
        $this->addSql('DROP TABLE badges');
        $this->addSql('DROP TABLE biographie');
        $this->addSql('DROP TABLE book');
        $this->addSql('DROP TABLE book_category');
        $this->addSql('DROP TABLE book_image');
        $this->addSql('DROP TABLE carousel');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE exclusivite');
        $this->addSql('DROP TABLE pack');
        $this->addSql('DROP TABLE panneaux');
        $this->addSql('DROP TABLE price');
        $this->addSql('DROP TABLE service');
        $this->addSql('DROP TABLE user');
    }
}
