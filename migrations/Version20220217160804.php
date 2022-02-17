<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220217160804 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE concert_partition (concert_id INT NOT NULL, partition_id INT NOT NULL, INDEX IDX_A4336E3683C97B2E (concert_id), INDEX IDX_A4336E3630D5A4AB (partition_id), PRIMARY KEY(concert_id, partition_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE orchestre_instrumentiste (orchestre_id INT NOT NULL, instrumentiste_id INT NOT NULL, INDEX IDX_33D72B0C99E4C1E9 (orchestre_id), INDEX IDX_33D72B0C5ADB10F0 (instrumentiste_id), PRIMARY KEY(orchestre_id, instrumentiste_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE concert_partition ADD CONSTRAINT FK_A4336E3683C97B2E FOREIGN KEY (concert_id) REFERENCES concert (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE concert_partition ADD CONSTRAINT FK_A4336E3630D5A4AB FOREIGN KEY (partition_id) REFERENCES `partition` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE orchestre_instrumentiste ADD CONSTRAINT FK_33D72B0C99E4C1E9 FOREIGN KEY (orchestre_id) REFERENCES orchestre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE orchestre_instrumentiste ADD CONSTRAINT FK_33D72B0C5ADB10F0 FOREIGN KEY (instrumentiste_id) REFERENCES instrumentiste (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE compositeur CHANGE personne fk_personne_id INT NOT NULL, CHANGE instrument fk_instrument_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE compositeur ADD CONSTRAINT FK_A1491CB7CBED7D26 FOREIGN KEY (fk_personne_id) REFERENCES personne (id)');
        $this->addSql('ALTER TABLE compositeur ADD CONSTRAINT FK_A1491CB768BB685E FOREIGN KEY (fk_instrument_id) REFERENCES instrument (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_A1491CB7CBED7D26 ON compositeur (fk_personne_id)');
        $this->addSql('CREATE INDEX IDX_A1491CB768BB685E ON compositeur (fk_instrument_id)');
        $this->addSql('ALTER TABLE concert CHANGE orchestre fk_orchestre_id INT NOT NULL');
        $this->addSql('ALTER TABLE concert ADD CONSTRAINT FK_D57C02D2B839C3F0 FOREIGN KEY (fk_orchestre_id) REFERENCES orchestre (id)');
        $this->addSql('CREATE INDEX IDX_D57C02D2B839C3F0 ON concert (fk_orchestre_id)');
        $this->addSql('ALTER TABLE instrumentiste ADD fk_personne_id INT NOT NULL, ADD fk_instrument_id INT NOT NULL, DROP personne, DROP instrument');
        $this->addSql('ALTER TABLE instrumentiste ADD CONSTRAINT FK_985CC7A2CBED7D26 FOREIGN KEY (fk_personne_id) REFERENCES personne (id)');
        $this->addSql('ALTER TABLE instrumentiste ADD CONSTRAINT FK_985CC7A268BB685E FOREIGN KEY (fk_instrument_id) REFERENCES instrument (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_985CC7A2CBED7D26 ON instrumentiste (fk_personne_id)');
        $this->addSql('CREATE INDEX IDX_985CC7A268BB685E ON instrumentiste (fk_instrument_id)');
        $this->addSql('ALTER TABLE orchestre DROP instrumentiste');
        $this->addSql('ALTER TABLE `partition` ADD fk_compositeur_id INT NOT NULL, ADD fk_instrument_id INT NOT NULL, DROP compositeur, DROP instrument');
        $this->addSql('ALTER TABLE `partition` ADD CONSTRAINT FK_9EB910E43A296084 FOREIGN KEY (fk_compositeur_id) REFERENCES compositeur (id)');
        $this->addSql('ALTER TABLE `partition` ADD CONSTRAINT FK_9EB910E468BB685E FOREIGN KEY (fk_instrument_id) REFERENCES instrument (id)');
        $this->addSql('CREATE INDEX IDX_9EB910E43A296084 ON `partition` (fk_compositeur_id)');
        $this->addSql('CREATE INDEX IDX_9EB910E468BB685E ON `partition` (fk_instrument_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE concert_partition');
        $this->addSql('DROP TABLE orchestre_instrumentiste');
        $this->addSql('ALTER TABLE compositeur DROP FOREIGN KEY FK_A1491CB7CBED7D26');
        $this->addSql('ALTER TABLE compositeur DROP FOREIGN KEY FK_A1491CB768BB685E');
        $this->addSql('DROP INDEX UNIQ_A1491CB7CBED7D26 ON compositeur');
        $this->addSql('DROP INDEX IDX_A1491CB768BB685E ON compositeur');
        $this->addSql('ALTER TABLE compositeur CHANGE fk_personne_id personne INT NOT NULL, CHANGE fk_instrument_id instrument INT DEFAULT NULL');
        $this->addSql('ALTER TABLE concert DROP FOREIGN KEY FK_D57C02D2B839C3F0');
        $this->addSql('DROP INDEX IDX_D57C02D2B839C3F0 ON concert');
        $this->addSql('ALTER TABLE concert CHANGE fk_orchestre_id orchestre INT NOT NULL');
        $this->addSql('ALTER TABLE instrumentiste DROP FOREIGN KEY FK_985CC7A2CBED7D26');
        $this->addSql('ALTER TABLE instrumentiste DROP FOREIGN KEY FK_985CC7A268BB685E');
        $this->addSql('DROP INDEX UNIQ_985CC7A2CBED7D26 ON instrumentiste');
        $this->addSql('DROP INDEX IDX_985CC7A268BB685E ON instrumentiste');
        $this->addSql('ALTER TABLE instrumentiste ADD personne INT NOT NULL, ADD instrument INT NOT NULL, DROP fk_personne_id, DROP fk_instrument_id');
        $this->addSql('ALTER TABLE orchestre ADD instrumentiste INT NOT NULL');
        $this->addSql('ALTER TABLE `partition` DROP FOREIGN KEY FK_9EB910E43A296084');
        $this->addSql('ALTER TABLE `partition` DROP FOREIGN KEY FK_9EB910E468BB685E');
        $this->addSql('DROP INDEX IDX_9EB910E43A296084 ON `partition`');
        $this->addSql('DROP INDEX IDX_9EB910E468BB685E ON `partition`');
        $this->addSql('ALTER TABLE `partition` ADD compositeur INT NOT NULL, ADD instrument INT NOT NULL, DROP fk_compositeur_id, DROP fk_instrument_id');
    }
}
