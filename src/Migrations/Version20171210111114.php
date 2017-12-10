<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171210111114 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('DROP SEQUENCE restaurant_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE restaurants_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE restaurants (id INT NOT NULL, name VARCHAR(100) NOT NULL, image_url VARCHAR(255) NOT NULL, short_description VARCHAR(500) NOT NULL, description TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('DROP TABLE restaurant');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE restaurants_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE restaurant_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE restaurant (id INT NOT NULL, name VARCHAR(100) NOT NULL, image_url VARCHAR(255) NOT NULL, short_description VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('DROP TABLE restaurants');
    }
}
