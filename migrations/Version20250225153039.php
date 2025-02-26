<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250225153039 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comment DROP CONSTRAINT comment_user_id_fkey');
        $this->addSql('ALTER TABLE comment DROP CONSTRAINT comment_collaborator_id_fkey');
        $this->addSql('ALTER TABLE user_like_collaborator DROP CONSTRAINT user_like_collaborator_user_id_fkey');
        $this->addSql('ALTER TABLE user_like_collaborator DROP CONSTRAINT user_like_collaborator_collaborator_id_fkey');
        $this->addSql('DROP TABLE collaborator');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE "user"');
        $this->addSql('DROP TABLE user_like_collaborator');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE TABLE collaborator (id INT NOT NULL, name TEXT NOT NULL, description TEXT NOT NULL, logo TEXT NOT NULL, created_at TIMESTAMP(0) WITH TIME ZONE DEFAULT \'now()\' NOT NULL, updated_at TIMESTAMP(0) WITH TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX collaborator_logo_key ON collaborator (logo)');
        $this->addSql('CREATE UNIQUE INDEX collaborator_description_key ON collaborator (description)');
        $this->addSql('CREATE UNIQUE INDEX collaborator_name_key ON collaborator (name)');
        $this->addSql('CREATE TABLE comment (id INT NOT NULL, user_id INT NOT NULL, collaborator_id INT NOT NULL, content TEXT NOT NULL, created_at TIMESTAMP(0) WITH TIME ZONE DEFAULT \'now()\' NOT NULL, updated_at TIMESTAMP(0) WITH TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_9474526CA76ED395 ON comment (user_id)');
        $this->addSql('CREATE INDEX IDX_9474526C30098C8C ON comment (collaborator_id)');
        $this->addSql('CREATE TABLE "user" (id INT NOT NULL, firstname TEXT DEFAULT NULL, lastname TEXT DEFAULT NULL, email TEXT DEFAULT NULL, password TEXT NOT NULL, question TEXT DEFAULT NULL, answer TEXT DEFAULT NULL, pseudo TEXT NOT NULL, admin BOOLEAN DEFAULT false NOT NULL, created_at TIMESTAMP(0) WITH TIME ZONE DEFAULT \'now()\' NOT NULL, updated_at TIMESTAMP(0) WITH TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX user_pseudo_key ON "user" (pseudo)');
        $this->addSql('CREATE UNIQUE INDEX user_email_key ON "user" (email)');
        $this->addSql('CREATE TABLE user_like_collaborator (id INT NOT NULL, user_id INT NOT NULL, collaborator_id INT NOT NULL, created_at TIMESTAMP(0) WITH TIME ZONE DEFAULT \'now()\' NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_92C1989EA76ED395 ON user_like_collaborator (user_id)');
        $this->addSql('CREATE INDEX IDX_92C1989E30098C8C ON user_like_collaborator (collaborator_id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT comment_user_id_fkey FOREIGN KEY (user_id) REFERENCES "user" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT comment_collaborator_id_fkey FOREIGN KEY (collaborator_id) REFERENCES collaborator (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE user_like_collaborator ADD CONSTRAINT user_like_collaborator_user_id_fkey FOREIGN KEY (user_id) REFERENCES "user" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE user_like_collaborator ADD CONSTRAINT user_like_collaborator_collaborator_id_fkey FOREIGN KEY (collaborator_id) REFERENCES collaborator (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }
}
