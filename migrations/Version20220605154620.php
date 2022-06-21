<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220605154620 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE advice (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, title VARCHAR(255) NOT NULL, content CLOB NOT NULL, author VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE user (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, username VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, recipes VARCHAR(255) NOT NULL, advice VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TEMPORARY TABLE __temp__recipe AS SELECT id, title, ingredients, steps, author FROM recipe');
        $this->addSql('DROP TABLE recipe');
        $this->addSql('CREATE TABLE recipe (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, title VARCHAR(255) NOT NULL, ingredients CLOB NOT NULL, steps CLOB NOT NULL, author VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO recipe (id, title, ingredients, steps, author) SELECT id, title, ingredients, steps, author FROM __temp__recipe');
        $this->addSql('DROP TABLE __temp__recipe');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE advice');
        $this->addSql('DROP TABLE user');
        $this->addSql('CREATE TEMPORARY TABLE __temp__recipe AS SELECT id, title, ingredients, steps, author FROM recipe');
        $this->addSql('DROP TABLE recipe');
        $this->addSql('CREATE TABLE recipe (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, title VARCHAR(255) NOT NULL, ingredients VARCHAR(400) NOT NULL, steps VARCHAR(400) NOT NULL, author VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO recipe (id, title, ingredients, steps, author) SELECT id, title, ingredients, steps, author FROM __temp__recipe');
        $this->addSql('DROP TABLE __temp__recipe');
    }
}
