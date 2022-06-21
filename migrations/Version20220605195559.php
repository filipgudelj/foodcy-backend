<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220605195559 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_64820E8DF675F31B');
        $this->addSql('CREATE TEMPORARY TABLE __temp__advice AS SELECT id, author_id, title, content FROM advice');
        $this->addSql('DROP TABLE advice');
        $this->addSql('CREATE TABLE advice (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, author_id INTEGER DEFAULT NULL, title VARCHAR(255) NOT NULL, content CLOB NOT NULL, CONSTRAINT FK_64820E8DF675F31B FOREIGN KEY (author_id) REFERENCES user (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO advice (id, author_id, title, content) SELECT id, author_id, title, content FROM __temp__advice');
        $this->addSql('DROP TABLE __temp__advice');
        $this->addSql('CREATE INDEX IDX_64820E8DF675F31B ON advice (author_id)');
        $this->addSql('DROP INDEX IDX_DA88B137F675F31B');
        $this->addSql('CREATE TEMPORARY TABLE __temp__recipe AS SELECT id, author_id, title, ingredients, steps FROM recipe');
        $this->addSql('DROP TABLE recipe');
        $this->addSql('CREATE TABLE recipe (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, author_id INTEGER DEFAULT NULL, title VARCHAR(255) NOT NULL, ingredients CLOB NOT NULL, steps CLOB NOT NULL, CONSTRAINT FK_DA88B137F675F31B FOREIGN KEY (author_id) REFERENCES user (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO recipe (id, author_id, title, ingredients, steps) SELECT id, author_id, title, ingredients, steps FROM __temp__recipe');
        $this->addSql('DROP TABLE __temp__recipe');
        $this->addSql('CREATE INDEX IDX_DA88B137F675F31B ON recipe (author_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_64820E8DF675F31B');
        $this->addSql('CREATE TEMPORARY TABLE __temp__advice AS SELECT id, author_id, title, content FROM advice');
        $this->addSql('DROP TABLE advice');
        $this->addSql('CREATE TABLE advice (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, author_id INTEGER DEFAULT NULL, title VARCHAR(255) NOT NULL, content CLOB NOT NULL)');
        $this->addSql('INSERT INTO advice (id, author_id, title, content) SELECT id, author_id, title, content FROM __temp__advice');
        $this->addSql('DROP TABLE __temp__advice');
        $this->addSql('CREATE INDEX IDX_64820E8DF675F31B ON advice (author_id)');
        $this->addSql('DROP INDEX IDX_DA88B137F675F31B');
        $this->addSql('CREATE TEMPORARY TABLE __temp__recipe AS SELECT id, author_id, title, ingredients, steps FROM recipe');
        $this->addSql('DROP TABLE recipe');
        $this->addSql('CREATE TABLE recipe (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, author_id INTEGER DEFAULT NULL, title VARCHAR(255) NOT NULL, ingredients CLOB NOT NULL, steps CLOB NOT NULL)');
        $this->addSql('INSERT INTO recipe (id, author_id, title, ingredients, steps) SELECT id, author_id, title, ingredients, steps FROM __temp__recipe');
        $this->addSql('DROP TABLE __temp__recipe');
        $this->addSql('CREATE INDEX IDX_DA88B137F675F31B ON recipe (author_id)');
    }
}
