<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210129135602 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) DEFAULT NULL, content LONGTEXT NOT NULL, created_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE convocation (id INT AUTO_INCREMENT NOT NULL, team_id INT DEFAULT NULL, date DATETIME NOT NULL, type VARCHAR(255) DEFAULT NULL, place VARCHAR(255) NOT NULL, opponent VARCHAR(255) NOT NULL, meeting LONGTEXT NOT NULL, content LONGTEXT DEFAULT NULL, UNIQUE INDEX UNIQ_C03B3F5F296CD8AE (team_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE convocation_user (convocation_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_2179CB80E8746F65 (convocation_id), INDEX IDX_2179CB80A76ED395 (user_id), PRIMARY KEY(convocation_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE picture (id INT AUTO_INCREMENT NOT NULL, article_id INT DEFAULT NULL, team_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, legend VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_16DB4F897294869C (article_id), INDEX IDX_16DB4F89296CD8AE (team_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE program (id INT AUTO_INCREMENT NOT NULL, date DATETIME NOT NULL, content LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE result (id INT AUTO_INCREMENT NOT NULL, date DATETIME NOT NULL, content LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE team (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE team_user (team_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_5C722232296CD8AE (team_id), INDEX IDX_5C722232A76ED395 (user_id), PRIMARY KEY(team_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, is_player TINYINT(1) DEFAULT NULL, is_coach TINYINT(1) DEFAULT NULL, is_referee TINYINT(1) DEFAULT NULL, is_leadership TINYINT(1) DEFAULT NULL, position_held VARCHAR(255) DEFAULT NULL, avatar VARCHAR(255) DEFAULT NULL, is_verified TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE convocation ADD CONSTRAINT FK_C03B3F5F296CD8AE FOREIGN KEY (team_id) REFERENCES team (id)');
        $this->addSql('ALTER TABLE convocation_user ADD CONSTRAINT FK_2179CB80E8746F65 FOREIGN KEY (convocation_id) REFERENCES convocation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE convocation_user ADD CONSTRAINT FK_2179CB80A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE picture ADD CONSTRAINT FK_16DB4F897294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE picture ADD CONSTRAINT FK_16DB4F89296CD8AE FOREIGN KEY (team_id) REFERENCES team (id)');
        $this->addSql('ALTER TABLE team_user ADD CONSTRAINT FK_5C722232296CD8AE FOREIGN KEY (team_id) REFERENCES team (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE team_user ADD CONSTRAINT FK_5C722232A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE picture DROP FOREIGN KEY FK_16DB4F897294869C');
        $this->addSql('ALTER TABLE convocation_user DROP FOREIGN KEY FK_2179CB80E8746F65');
        $this->addSql('ALTER TABLE convocation DROP FOREIGN KEY FK_C03B3F5F296CD8AE');
        $this->addSql('ALTER TABLE picture DROP FOREIGN KEY FK_16DB4F89296CD8AE');
        $this->addSql('ALTER TABLE team_user DROP FOREIGN KEY FK_5C722232296CD8AE');
        $this->addSql('ALTER TABLE convocation_user DROP FOREIGN KEY FK_2179CB80A76ED395');
        $this->addSql('ALTER TABLE team_user DROP FOREIGN KEY FK_5C722232A76ED395');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE convocation');
        $this->addSql('DROP TABLE convocation_user');
        $this->addSql('DROP TABLE picture');
        $this->addSql('DROP TABLE program');
        $this->addSql('DROP TABLE result');
        $this->addSql('DROP TABLE team');
        $this->addSql('DROP TABLE team_user');
        $this->addSql('DROP TABLE user');
    }
}
