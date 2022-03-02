<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220302200633 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categoria (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE descripcion (id INT AUTO_INCREMENT NOT NULL, recurso_id INT NOT NULL, extra_id INT NOT NULL, INDEX IDX_A02A2F00E52B6C4E (recurso_id), INDEX IDX_A02A2F002B959FC6 (extra_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE extras (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE precio (id INT AUTO_INCREMENT NOT NULL, tarifa_id INT NOT NULL, categoria_id INT NOT NULL, cantidad INT NOT NULL, INDEX IDX_16A9C1A2FE3B76B (tarifa_id), INDEX IDX_16A9C1A23397707A (categoria_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recurso (id INT AUTO_INCREMENT NOT NULL, categoria_id INT NOT NULL, nombre VARCHAR(255) NOT NULL, INDEX IDX_B2BB37643397707A (categoria_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reserva (id INT AUTO_INCREMENT NOT NULL, recurso_id INT NOT NULL, fecha_inicio DATETIME NOT NULL, fecha_fin DATETIME NOT NULL, precio_total INT NOT NULL, pago TINYINT(1) NOT NULL, INDEX IDX_188D2E3BE52B6C4E (recurso_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tarifa (id INT AUTO_INCREMENT NOT NULL, tramo VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE descripcion ADD CONSTRAINT FK_A02A2F00E52B6C4E FOREIGN KEY (recurso_id) REFERENCES recurso (id)');
        $this->addSql('ALTER TABLE descripcion ADD CONSTRAINT FK_A02A2F002B959FC6 FOREIGN KEY (extra_id) REFERENCES extras (id)');
        $this->addSql('ALTER TABLE precio ADD CONSTRAINT FK_16A9C1A2FE3B76B FOREIGN KEY (tarifa_id) REFERENCES tarifa (id)');
        $this->addSql('ALTER TABLE precio ADD CONSTRAINT FK_16A9C1A23397707A FOREIGN KEY (categoria_id) REFERENCES categoria (id)');
        $this->addSql('ALTER TABLE recurso ADD CONSTRAINT FK_B2BB37643397707A FOREIGN KEY (categoria_id) REFERENCES categoria (id)');
        $this->addSql('ALTER TABLE reserva ADD CONSTRAINT FK_188D2E3BE52B6C4E FOREIGN KEY (recurso_id) REFERENCES recurso (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE precio DROP FOREIGN KEY FK_16A9C1A23397707A');
        $this->addSql('ALTER TABLE recurso DROP FOREIGN KEY FK_B2BB37643397707A');
        $this->addSql('ALTER TABLE descripcion DROP FOREIGN KEY FK_A02A2F002B959FC6');
        $this->addSql('ALTER TABLE descripcion DROP FOREIGN KEY FK_A02A2F00E52B6C4E');
        $this->addSql('ALTER TABLE reserva DROP FOREIGN KEY FK_188D2E3BE52B6C4E');
        $this->addSql('ALTER TABLE precio DROP FOREIGN KEY FK_16A9C1A2FE3B76B');
        $this->addSql('DROP TABLE categoria');
        $this->addSql('DROP TABLE descripcion');
        $this->addSql('DROP TABLE extras');
        $this->addSql('DROP TABLE precio');
        $this->addSql('DROP TABLE recurso');
        $this->addSql('DROP TABLE reserva');
        $this->addSql('DROP TABLE tarifa');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
