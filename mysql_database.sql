-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema dbsportsx
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema dbsportsx
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `dbsportsx` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci ;
USE `dbsportsx` ;

-- -----------------------------------------------------
-- Table `dbsportsx`.`Position`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbsportsx`.`Position` (
                                                      `id` INT NOT NULL AUTO_INCREMENT,
                                                      `PitchPosition` VARCHAR(255) NOT NULL,
                                                      `Designation` VARCHAR(255) NOT NULL,
                                                      PRIMARY KEY (`id`))
    ENGINE = InnoDB
    AUTO_INCREMENT = 4
    DEFAULT CHARACTER SET = utf8mb4
    COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `dbsportsx`.`Player`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbsportsx`.`Player` (
                                                    `id` INT NOT NULL AUTO_INCREMENT,
                                                    `FullName` VARCHAR(255) NOT NULL,
                                                    `Birthdate` DATE NOT NULL,
                                                    `AssociationNumber` INT NOT NULL,
                                                    `PhoneNumber` INT NOT NULL,
                                                    `listedToLoan` INT NULL DEFAULT '0',
                                                    `listedToTransfer` INT NULL DEFAULT '0',
                                                    `PositionID` INT NOT NULL,
                                                    PRIMARY KEY (`id`),
                                                    UNIQUE INDEX `AssociationNumber` (`AssociationNumber` ASC) VISIBLE,
                                                    INDEX `FKPlayer605414` (`PositionID` ASC) VISIBLE,
                                                    CONSTRAINT `FKPlayer605414`
                                                        FOREIGN KEY (`PositionID`)
                                                            REFERENCES `dbsportsx`.`Position` (`id`)
                                                            ON DELETE CASCADE
                                                            ON UPDATE CASCADE)
    ENGINE = InnoDB
    AUTO_INCREMENT = 12
    DEFAULT CHARACTER SET = utf8mb4
    COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `dbsportsx`.`GamePlayer`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbsportsx`.`GamePlayer` (
                                                        `game_id` INT NOT NULL,
                                                        `player_id` INT NOT NULL,
                                                        `IsStarter` INT NOT NULL,
                                                        `Minutes` INT NOT NULL,
                                                        PRIMARY KEY (`game_id`, `player_id`),
                                                        INDEX `FKGamePlayer407206` (`player_id` ASC) VISIBLE,
                                                        CONSTRAINT `FKGamePlayer407206`
                                                            FOREIGN KEY (`player_id`)
                                                                REFERENCES `dbsportsx`.`Player` (`id`)
                                                                ON DELETE CASCADE
                                                                ON UPDATE CASCADE)
    ENGINE = InnoDB
    DEFAULT CHARACTER SET = utf8mb4
    COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `dbsportsx`.`Goal`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbsportsx`.`Goal` (
                                                  `id` INT NOT NULL AUTO_INCREMENT,
                                                  `Minute` INT NOT NULL,
                                                  `GameID` INT NOT NULL,
                                                  `PlayerID` INT NOT NULL,
                                                  PRIMARY KEY (`id`),
                                                  INDEX `FKGoal748150` (`GameID` ASC, `PlayerID` ASC) VISIBLE,
                                                  CONSTRAINT `FKGoal748150`
                                                      FOREIGN KEY (`GameID` , `PlayerID`)
                                                          REFERENCES `dbsportsx`.`GamePlayer` (`game_id` , `player_id`)
                                                          ON DELETE CASCADE
                                                          ON UPDATE CASCADE)
    ENGINE = InnoDB
    DEFAULT CHARACTER SET = utf8mb4
    COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `dbsportsx`.`Assist`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbsportsx`.`Assist` (
                                                    `id` INT NOT NULL AUTO_INCREMENT,
                                                    `Minute` INT NOT NULL,
                                                    `GameID` INT NOT NULL,
                                                    `PlayerID` INT NOT NULL,
                                                    `GoalID` INT NOT NULL,
                                                    PRIMARY KEY (`id`),
                                                    INDEX `FKAssist242682` (`GoalID` ASC) VISIBLE,
                                                    INDEX `FKAssist816137` (`GameID` ASC, `PlayerID` ASC) VISIBLE,
                                                    CONSTRAINT `FKAssist242682`
                                                        FOREIGN KEY (`GoalID`)
                                                            REFERENCES `dbsportsx`.`Goal` (`id`)
                                                            ON DELETE CASCADE
                                                            ON UPDATE CASCADE,
                                                    CONSTRAINT `FKAssist816137`
                                                        FOREIGN KEY (`GameID` , `PlayerID`)
                                                            REFERENCES `dbsportsx`.`GamePlayer` (`game_id` , `player_id`)
                                                            ON DELETE CASCADE
                                                            ON UPDATE CASCADE)
    ENGINE = InnoDB
    DEFAULT CHARACTER SET = utf8mb4
    COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `dbsportsx`.`CardType`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbsportsx`.`CardType` (
                                                      `id` INT NOT NULL AUTO_INCREMENT,
                                                      `Denomination` VARCHAR(255) NOT NULL,
                                                      PRIMARY KEY (`id`))
    ENGINE = InnoDB
    AUTO_INCREMENT = 3
    DEFAULT CHARACTER SET = utf8mb4
    COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `dbsportsx`.`Card`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbsportsx`.`Card` (
                                                  `id` INT NOT NULL AUTO_INCREMENT,
                                                  `Minute` INT NOT NULL,
                                                  `CardTypeID` INT NOT NULL,
                                                  `GameID` INT NOT NULL,
                                                  `PlayerID` INT NOT NULL,
                                                  PRIMARY KEY (`id`),
                                                  INDEX `FKCard616051` (`GameID` ASC, `PlayerID` ASC) VISIBLE,
                                                  INDEX `FKCard626465` (`CardTypeID` ASC) VISIBLE,
                                                  CONSTRAINT `FKCard616051`
                                                      FOREIGN KEY (`GameID` , `PlayerID`)
                                                          REFERENCES `dbsportsx`.`GamePlayer` (`game_id` , `player_id`)
                                                          ON DELETE CASCADE
                                                          ON UPDATE CASCADE,
                                                  CONSTRAINT `FKCard626465`
                                                      FOREIGN KEY (`CardTypeID`)
                                                          REFERENCES `dbsportsx`.`CardType` (`id`)
                                                          ON DELETE CASCADE
                                                          ON UPDATE CASCADE)
    ENGINE = InnoDB
    DEFAULT CHARACTER SET = utf8mb4
    COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `dbsportsx`.`roles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbsportsx`.`roles` (
                                                   `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
                                                   `name` VARCHAR(255) NOT NULL,
                                                   `display_name` VARCHAR(255) NOT NULL,
                                                   `created_at` TIMESTAMP NULL DEFAULT NULL,
                                                   `updated_at` TIMESTAMP NULL DEFAULT NULL,
                                                   PRIMARY KEY (`id`),
                                                   UNIQUE INDEX `roles_name_unique` (`name` ASC) VISIBLE)
    ENGINE = InnoDB
    AUTO_INCREMENT = 6
    DEFAULT CHARACTER SET = utf8mb4
    COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `dbsportsx`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbsportsx`.`users` (
                                                   `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
                                                   `role_id` BIGINT UNSIGNED NULL DEFAULT '1',
                                                   `username` VARCHAR(255) NOT NULL DEFAULT `email`,
                                                   `firstname` VARCHAR(255) NULL DEFAULT NULL,
                                                   `lastname` VARCHAR(255) NULL DEFAULT NULL,
                                                   `email` VARCHAR(255) NOT NULL,
                                                   `avatar` VARCHAR(255) NULL DEFAULT 'users/default.png',
                                                   `email_verified_at` TIMESTAMP NULL DEFAULT NULL,
                                                   `password` VARCHAR(255) NOT NULL,
                                                   `address` VARCHAR(255) NULL DEFAULT NULL,
                                                   `city` VARCHAR(255) NULL DEFAULT NULL,
                                                   `country` VARCHAR(255) NULL DEFAULT NULL,
                                                   `postal` VARCHAR(255) NULL DEFAULT NULL,
                                                   `about` TEXT NULL DEFAULT NULL,
                                                   `remember_token` VARCHAR(100) NULL DEFAULT NULL,
                                                   `settings` TEXT NULL DEFAULT NULL,
                                                   `created_at` TIMESTAMP NULL DEFAULT NULL,
                                                   `updated_at` TIMESTAMP NULL DEFAULT NULL,
                                                   PRIMARY KEY (`id`),
                                                   UNIQUE INDEX `users_email_unique` (`email` ASC) VISIBLE,
                                                   INDEX `users_role_id_foreign` (`role_id` ASC) VISIBLE,
                                                   CONSTRAINT `users_role_id_foreign`
                                                       FOREIGN KEY (`role_id`)
                                                           REFERENCES `dbsportsx`.`roles` (`id`))
    ENGINE = InnoDB
    AUTO_INCREMENT = 3
    DEFAULT CHARACTER SET = utf8mb4
    COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `dbsportsx`.`Coach`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbsportsx`.`Coach` (
                                                   `id` INT NOT NULL AUTO_INCREMENT,
                                                   `FullName` VARCHAR(255) NOT NULL,
                                                   `Birthdate` DATE NOT NULL,
                                                   `Degree` VARCHAR(255) NOT NULL,
                                                   `AssociationNumber` INT NOT NULL,
                                                   `UsersID` BIGINT UNSIGNED NULL DEFAULT NULL,
                                                   PRIMARY KEY (`id`),
                                                   UNIQUE INDEX `AssociationNumber` (`AssociationNumber` ASC) VISIBLE,
                                                   INDEX `fk_users_id` (`UsersID` ASC) VISIBLE,
                                                   CONSTRAINT `fk_users_id`
                                                       FOREIGN KEY (`UsersID`)
                                                           REFERENCES `dbsportsx`.`users` (`id`)
                                                           ON DELETE CASCADE
                                                           ON UPDATE CASCADE)
    ENGINE = InnoDB
    DEFAULT CHARACTER SET = utf8mb4
    COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `dbsportsx`.`CoachRole`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbsportsx`.`CoachRole` (
                                                       `id` INT NOT NULL AUTO_INCREMENT,
                                                       `Denomination` VARCHAR(50) NOT NULL,
                                                       PRIMARY KEY (`id`))
    ENGINE = InnoDB
    DEFAULT CHARACTER SET = utf8mb4
    COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `dbsportsx`.`Coordenator`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbsportsx`.`Coordenator` (
                                                         `id` INT NOT NULL AUTO_INCREMENT,
                                                         `FullName` VARCHAR(100) NOT NULL,
                                                         `Birthdate` DATE NOT NULL,
                                                         `UsersID` BIGINT UNSIGNED NULL DEFAULT NULL,
                                                         PRIMARY KEY (`id`),
                                                         INDEX `fk_c_users_id` (`UsersID` ASC) VISIBLE,
                                                         CONSTRAINT `fk_c_users_id`
                                                             FOREIGN KEY (`UsersID`)
                                                                 REFERENCES `dbsportsx`.`users` (`id`)
                                                                 ON DELETE CASCADE
                                                                 ON UPDATE CASCADE)
    ENGINE = InnoDB
    AUTO_INCREMENT = 2
    DEFAULT CHARACTER SET = utf8mb4
    COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `dbsportsx`.`Field`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbsportsx`.`Field` (
                                                   `id` INT NOT NULL AUTO_INCREMENT,
                                                   `FieldType` INT NOT NULL,
                                                   `Denomination` VARCHAR(255) NOT NULL,
                                                   PRIMARY KEY (`id`))
    ENGINE = InnoDB
    AUTO_INCREMENT = 2
    DEFAULT CHARACTER SET = utf8mb4
    COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `dbsportsx`.`Level`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbsportsx`.`Level` (
                                                   `id` INT NOT NULL AUTO_INCREMENT,
                                                   `Designation` VARCHAR(255) NOT NULL,
                                                   `MaximumAge` INT NOT NULL,
                                                   `CoordenatorID` INT NOT NULL,
                                                   PRIMARY KEY (`id`),
                                                   INDEX `FKLevel544498` (`CoordenatorID` ASC) VISIBLE,
                                                   CONSTRAINT `FKLevel544498`
                                                       FOREIGN KEY (`CoordenatorID`)
                                                           REFERENCES `dbsportsx`.`Coordenator` (`id`)
                                                           ON DELETE CASCADE
                                                           ON UPDATE CASCADE)
    ENGINE = InnoDB
    AUTO_INCREMENT = 2
    DEFAULT CHARACTER SET = utf8mb4
    COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `dbsportsx`.`TeamDirector`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbsportsx`.`TeamDirector` (
                                                          `id` INT NOT NULL AUTO_INCREMENT,
                                                          `FullName` VARCHAR(100) NOT NULL,
                                                          `Birthdate` DATE NOT NULL,
                                                          `UsersID` BIGINT UNSIGNED NULL DEFAULT NULL,
                                                          PRIMARY KEY (`id`),
                                                          INDEX `fk_td_users_id` (`UsersID` ASC) VISIBLE,
                                                          CONSTRAINT `fk_td_users_id`
                                                              FOREIGN KEY (`UsersID`)
                                                                  REFERENCES `dbsportsx`.`users` (`id`)
                                                                  ON DELETE CASCADE
                                                                  ON UPDATE CASCADE)
    ENGINE = InnoDB
    AUTO_INCREMENT = 2
    DEFAULT CHARACTER SET = utf8mb4
    COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `dbsportsx`.`Team`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbsportsx`.`Team` (
                                                  `id` INT NOT NULL AUTO_INCREMENT,
                                                  `Name` VARCHAR(255) NOT NULL,
                                                  `LevelID` INT NOT NULL,
                                                  `TeamDirectorID` INT NOT NULL,
                                                  PRIMARY KEY (`id`),
                                                  INDEX `FKTeam176783` (`LevelID` ASC) VISIBLE,
                                                  INDEX `FKTeam598162` (`TeamDirectorID` ASC) VISIBLE,
                                                  CONSTRAINT `FKTeam176783`
                                                      FOREIGN KEY (`LevelID`)
                                                          REFERENCES `dbsportsx`.`Level` (`id`)
                                                          ON DELETE CASCADE
                                                          ON UPDATE CASCADE,
                                                  CONSTRAINT `FKTeam598162`
                                                      FOREIGN KEY (`TeamDirectorID`)
                                                          REFERENCES `dbsportsx`.`TeamDirector` (`id`)
                                                          ON DELETE CASCADE
                                                          ON UPDATE CASCADE)
    ENGINE = InnoDB
    AUTO_INCREMENT = 2
    DEFAULT CHARACTER SET = utf8mb4
    COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `dbsportsx`.`Game`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbsportsx`.`Game` (
                                                  `id` INT NOT NULL AUTO_INCREMENT,
                                                  `IsAtHome` INT NOT NULL,
                                                  `OpposingTeam` VARCHAR(50) NOT NULL,
                                                  `Date` DATE NOT NULL,
                                                  `StartingTime` TIMESTAMP NOT NULL,
                                                  `GoalsScored` INT NOT NULL,
                                                  `GoalsConceded` INT NOT NULL,
                                                  `EndingTime` TIMESTAMP NOT NULL,
                                                  `FieldFieldID` INT NULL DEFAULT NULL,
                                                  `TeamID` INT NOT NULL,
                                                  PRIMARY KEY (`id`),
                                                  INDEX `FKGame205548` (`FieldFieldID` ASC) VISIBLE,
                                                  INDEX `FKGame90119` (`TeamID` ASC) VISIBLE,
                                                  CONSTRAINT `FKGame205548`
                                                      FOREIGN KEY (`FieldFieldID`)
                                                          REFERENCES `dbsportsx`.`Field` (`id`)
                                                          ON DELETE CASCADE
                                                          ON UPDATE CASCADE,
                                                  CONSTRAINT `FKGame90119`
                                                      FOREIGN KEY (`TeamID`)
                                                          REFERENCES `dbsportsx`.`Team` (`id`)
                                                          ON DELETE CASCADE
                                                          ON UPDATE CASCADE)
    ENGINE = InnoDB
    DEFAULT CHARACTER SET = utf8mb4
    COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `dbsportsx`.`Injury`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbsportsx`.`Injury` (
                                                    `id` INT NOT NULL AUTO_INCREMENT,
                                                    `Denomination` VARCHAR(255) NOT NULL,
                                                    `Location` VARCHAR(255) NOT NULL,
                                                    `EstimatedTimeToRecover` VARCHAR(255) NOT NULL,
                                                    PRIMARY KEY (`id`))
    ENGINE = InnoDB
    DEFAULT CHARACTER SET = utf8mb4
    COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `dbsportsx`.`InjuryPlayer`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbsportsx`.`InjuryPlayer` (
                                                          `id` INT NOT NULL AUTO_INCREMENT,
                                                          `Date` DATE NOT NULL,
                                                          `Observation` VARCHAR(10000) NOT NULL,
                                                          `InjuryID` INT NOT NULL,
                                                          `PlayerID` INT NOT NULL,
                                                          PRIMARY KEY (`id`),
                                                          INDEX `FKInjuryPlay291125` (`PlayerID` ASC) VISIBLE,
                                                          INDEX `FKInjuryPlay740775` (`InjuryID` ASC) VISIBLE,
                                                          CONSTRAINT `FKInjuryPlay291125`
                                                              FOREIGN KEY (`PlayerID`)
                                                                  REFERENCES `dbsportsx`.`Player` (`id`)
                                                                  ON DELETE CASCADE
                                                                  ON UPDATE CASCADE,
                                                          CONSTRAINT `FKInjuryPlay740775`
                                                              FOREIGN KEY (`InjuryID`)
                                                                  REFERENCES `dbsportsx`.`Injury` (`id`)
                                                                  ON DELETE CASCADE
                                                                  ON UPDATE CASCADE)
    ENGINE = InnoDB
    DEFAULT CHARACTER SET = utf8mb4
    COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `dbsportsx`.`Physiotherapist`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbsportsx`.`Physiotherapist` (
                                                             `id` INT NOT NULL AUTO_INCREMENT,
                                                             `FullName` VARCHAR(255) NOT NULL,
                                                             `Birthdate` DATE NOT NULL,
                                                             `UsersID` BIGINT UNSIGNED NULL DEFAULT NULL,
                                                             PRIMARY KEY (`id`),
                                                             INDEX `fk_p_users_id` (`UsersID` ASC) VISIBLE,
                                                             CONSTRAINT `fk_p_users_id`
                                                                 FOREIGN KEY (`UsersID`)
                                                                     REFERENCES `dbsportsx`.`users` (`id`)
                                                                     ON DELETE CASCADE
                                                                     ON UPDATE CASCADE)
    ENGINE = InnoDB
    DEFAULT CHARACTER SET = utf8mb4
    COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `dbsportsx`.`InjuryPlayerTreatment`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbsportsx`.`InjuryPlayerTreatment` (
                                                                   `id` INT NOT NULL AUTO_INCREMENT,
                                                                   `Notes` VARCHAR(10000) NULL DEFAULT NULL,
                                                                   `InjuryPlayerID` INT NOT NULL,
                                                                   `PhysiotherapistID` INT NOT NULL,
                                                                   PRIMARY KEY (`id`),
                                                                   INDEX `FKInjuryPlay228941` (`InjuryPlayerID` ASC) VISIBLE,
                                                                   INDEX `FKInjuryPlay87320` (`PhysiotherapistID` ASC) VISIBLE,
                                                                   CONSTRAINT `FKInjuryPlay228941`
                                                                       FOREIGN KEY (`InjuryPlayerID`)
                                                                           REFERENCES `dbsportsx`.`InjuryPlayer` (`id`)
                                                                           ON DELETE CASCADE
                                                                           ON UPDATE CASCADE,
                                                                   CONSTRAINT `FKInjuryPlay87320`
                                                                       FOREIGN KEY (`PhysiotherapistID`)
                                                                           REFERENCES `dbsportsx`.`Physiotherapist` (`id`)
                                                                           ON DELETE CASCADE
                                                                           ON UPDATE CASCADE)
    ENGINE = InnoDB
    DEFAULT CHARACTER SET = utf8mb4
    COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `dbsportsx`.`TeamCoach`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbsportsx`.`TeamCoach` (
                                                       `team_id` INT NOT NULL,
                                                       `coach_id` INT NOT NULL,
                                                       `CoachRoleID` INT NOT NULL,
                                                       PRIMARY KEY (`team_id`, `coach_id`),
                                                       INDEX `FKTeamCoach635965` (`CoachRoleID` ASC) VISIBLE,
                                                       INDEX `FKTeamCoach77418` (`coach_id` ASC) VISIBLE,
                                                       CONSTRAINT `FKTeamCoach635965`
                                                           FOREIGN KEY (`CoachRoleID`)
                                                               REFERENCES `dbsportsx`.`CoachRole` (`id`)
                                                               ON DELETE CASCADE
                                                               ON UPDATE CASCADE,
                                                       CONSTRAINT `FKTeamCoach77418`
                                                           FOREIGN KEY (`coach_id`)
                                                               REFERENCES `dbsportsx`.`Coach` (`id`)
                                                               ON DELETE CASCADE
                                                               ON UPDATE CASCADE,
                                                       CONSTRAINT `FKTeamCoach858668`
                                                           FOREIGN KEY (`team_id`)
                                                               REFERENCES `dbsportsx`.`Team` (`id`)
                                                               ON DELETE CASCADE
                                                               ON UPDATE CASCADE)
    ENGINE = InnoDB
    DEFAULT CHARACTER SET = utf8mb4
    COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `dbsportsx`.`TeamPlayer`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbsportsx`.`TeamPlayer` (
                                                        `team_id` INT NOT NULL,
                                                        `player_id` INT NOT NULL,
                                                        `Number` INT NOT NULL,
                                                        PRIMARY KEY (`team_id`, `player_id`),
                                                        INDEX `FKTeamPlayer946425` (`player_id` ASC) VISIBLE,
                                                        CONSTRAINT `FKTeamPlayer946425`
                                                            FOREIGN KEY (`player_id`)
                                                                REFERENCES `dbsportsx`.`Player` (`id`)
                                                                ON DELETE CASCADE
                                                                ON UPDATE CASCADE,
                                                        CONSTRAINT `FKTeamPlayer952068`
                                                            FOREIGN KEY (`team_id`)
                                                                REFERENCES `dbsportsx`.`Team` (`id`)
                                                                ON DELETE CASCADE
                                                                ON UPDATE CASCADE)
    ENGINE = InnoDB
    DEFAULT CHARACTER SET = utf8mb4
    COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `dbsportsx`.`Train`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbsportsx`.`Train` (
                                                   `id` INT NOT NULL AUTO_INCREMENT,
                                                   `Date` DATE NOT NULL,
                                                   `StartingTime` TIMESTAMP NOT NULL,
                                                   `EndingTime` TIMESTAMP NOT NULL,
                                                   `TeamID` INT NOT NULL,
                                                   `FieldFieldID` INT NOT NULL,
                                                   PRIMARY KEY (`id`),
                                                   INDEX `FKTrain62289` (`FieldFieldID` ASC) VISIBLE,
                                                   INDEX `FKTrain946859` (`TeamID` ASC) VISIBLE,
                                                   CONSTRAINT `FKTrain62289`
                                                       FOREIGN KEY (`FieldFieldID`)
                                                           REFERENCES `dbsportsx`.`Field` (`id`)
                                                           ON DELETE CASCADE
                                                           ON UPDATE CASCADE,
                                                   CONSTRAINT `FKTrain946859`
                                                       FOREIGN KEY (`TeamID`)
                                                           REFERENCES `dbsportsx`.`Team` (`id`)
                                                           ON DELETE CASCADE
                                                           ON UPDATE CASCADE)
    ENGINE = InnoDB
    AUTO_INCREMENT = 2
    DEFAULT CHARACTER SET = utf8mb4
    COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `dbsportsx`.`data_types`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbsportsx`.`data_types` (
                                                        `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
                                                        `name` VARCHAR(255) NOT NULL,
                                                        `slug` VARCHAR(255) NOT NULL,
                                                        `display_name_singular` VARCHAR(255) NOT NULL,
                                                        `display_name_plural` VARCHAR(255) NOT NULL,
                                                        `icon` VARCHAR(255) NULL DEFAULT NULL,
                                                        `model_name` VARCHAR(255) NULL DEFAULT NULL,
                                                        `policy_name` VARCHAR(255) NULL DEFAULT NULL,
                                                        `controller` VARCHAR(255) NULL DEFAULT NULL,
                                                        `description` VARCHAR(255) NULL DEFAULT NULL,
                                                        `generate_permissions` TINYINT(1) NOT NULL DEFAULT '0',
                                                        `server_side` TINYINT NOT NULL DEFAULT '0',
                                                        `details` TEXT NULL DEFAULT NULL,
                                                        `created_at` TIMESTAMP NULL DEFAULT NULL,
                                                        `updated_at` TIMESTAMP NULL DEFAULT NULL,
                                                        PRIMARY KEY (`id`),
                                                        UNIQUE INDEX `data_types_name_unique` (`name` ASC) VISIBLE,
                                                        UNIQUE INDEX `data_types_slug_unique` (`slug` ASC) VISIBLE)
    ENGINE = InnoDB
    DEFAULT CHARACTER SET = utf8mb4
    COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `dbsportsx`.`data_rows`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbsportsx`.`data_rows` (
                                                       `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
                                                       `data_type_id` INT UNSIGNED NOT NULL,
                                                       `field` VARCHAR(255) NOT NULL,
                                                       `type` VARCHAR(255) NOT NULL,
                                                       `display_name` VARCHAR(255) NOT NULL,
                                                       `required` TINYINT(1) NOT NULL DEFAULT '0',
                                                       `browse` TINYINT(1) NOT NULL DEFAULT '1',
                                                       `read` TINYINT(1) NOT NULL DEFAULT '1',
                                                       `edit` TINYINT(1) NOT NULL DEFAULT '1',
                                                       `add` TINYINT(1) NOT NULL DEFAULT '1',
                                                       `delete` TINYINT(1) NOT NULL DEFAULT '1',
                                                       `details` TEXT NULL DEFAULT NULL,
                                                       `order` INT NOT NULL DEFAULT '1',
                                                       PRIMARY KEY (`id`),
                                                       INDEX `data_rows_data_type_id_foreign` (`data_type_id` ASC) VISIBLE,
                                                       CONSTRAINT `data_rows_data_type_id_foreign`
                                                           FOREIGN KEY (`data_type_id`)
                                                               REFERENCES `dbsportsx`.`data_types` (`id`)
                                                               ON DELETE CASCADE
                                                               ON UPDATE CASCADE)
    ENGINE = InnoDB
    DEFAULT CHARACTER SET = utf8mb4
    COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `dbsportsx`.`failed_jobs`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbsportsx`.`failed_jobs` (
                                                         `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
                                                         `uuid` VARCHAR(255) NOT NULL,
                                                         `connection` TEXT NOT NULL,
                                                         `queue` TEXT NOT NULL,
                                                         `payload` LONGTEXT NOT NULL,
                                                         `exception` LONGTEXT NOT NULL,
                                                         `failed_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
                                                         PRIMARY KEY (`id`),
                                                         UNIQUE INDEX `failed_jobs_uuid_unique` (`uuid` ASC) VISIBLE)
    ENGINE = InnoDB
    DEFAULT CHARACTER SET = utf8mb4
    COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `dbsportsx`.`menus`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbsportsx`.`menus` (
                                                   `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
                                                   `name` VARCHAR(255) NOT NULL,
                                                   `created_at` TIMESTAMP NULL DEFAULT NULL,
                                                   `updated_at` TIMESTAMP NULL DEFAULT NULL,
                                                   PRIMARY KEY (`id`),
                                                   UNIQUE INDEX `menus_name_unique` (`name` ASC) VISIBLE)
    ENGINE = InnoDB
    DEFAULT CHARACTER SET = utf8mb4
    COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `dbsportsx`.`menu_items`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbsportsx`.`menu_items` (
                                                        `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
                                                        `menu_id` INT UNSIGNED NULL DEFAULT NULL,
                                                        `title` VARCHAR(255) NOT NULL,
                                                        `url` VARCHAR(255) NOT NULL,
                                                        `target` VARCHAR(255) NOT NULL DEFAULT '_self',
                                                        `icon_class` VARCHAR(255) NULL DEFAULT NULL,
                                                        `color` VARCHAR(255) NULL DEFAULT NULL,
                                                        `parent_id` INT NULL DEFAULT NULL,
                                                        `order` INT NOT NULL,
                                                        `created_at` TIMESTAMP NULL DEFAULT NULL,
                                                        `updated_at` TIMESTAMP NULL DEFAULT NULL,
                                                        `route` VARCHAR(255) NULL DEFAULT NULL,
                                                        `parameters` TEXT NULL DEFAULT NULL,
                                                        PRIMARY KEY (`id`),
                                                        INDEX `menu_items_menu_id_foreign` (`menu_id` ASC) VISIBLE,
                                                        CONSTRAINT `menu_items_menu_id_foreign`
                                                            FOREIGN KEY (`menu_id`)
                                                                REFERENCES `dbsportsx`.`menus` (`id`)
                                                                ON DELETE CASCADE)
    ENGINE = InnoDB
    DEFAULT CHARACTER SET = utf8mb4
    COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `dbsportsx`.`migrations`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbsportsx`.`migrations` (
                                                        `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
                                                        `migration` VARCHAR(255) NOT NULL,
                                                        `batch` INT NOT NULL,
                                                        PRIMARY KEY (`id`))
    ENGINE = InnoDB
    DEFAULT CHARACTER SET = utf8mb4
    COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `dbsportsx`.`password_resets`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbsportsx`.`password_resets` (
                                                             `email` VARCHAR(255) NOT NULL,
                                                             `token` VARCHAR(255) NOT NULL,
                                                             `created_at` TIMESTAMP NULL DEFAULT NULL,
                                                             PRIMARY KEY (`email`))
    ENGINE = InnoDB
    DEFAULT CHARACTER SET = utf8mb4
    COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `dbsportsx`.`permissions`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbsportsx`.`permissions` (
                                                         `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
                                                         `key` VARCHAR(255) NOT NULL,
                                                         `table_name` VARCHAR(255) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NULL DEFAULT NULL,
                                                         `created_at` TIMESTAMP NULL DEFAULT NULL,
                                                         `updated_at` TIMESTAMP NULL DEFAULT NULL,
                                                         PRIMARY KEY (`id`),
                                                         INDEX `permissions_key_index` (`key` ASC) VISIBLE)
    ENGINE = InnoDB
    DEFAULT CHARACTER SET = utf8mb4
    COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `dbsportsx`.`permission_role`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbsportsx`.`permission_role` (
                                                             `permission_id` BIGINT UNSIGNED NOT NULL,
                                                             `role_id` BIGINT UNSIGNED NOT NULL,
                                                             PRIMARY KEY (`permission_id`, `role_id`),
                                                             INDEX `permission_role_permission_id_index` (`permission_id` ASC) VISIBLE,
                                                             INDEX `permission_role_role_id_index` (`role_id` ASC) VISIBLE,
                                                             CONSTRAINT `permission_role_permission_id_foreign`
                                                                 FOREIGN KEY (`permission_id`)
                                                                     REFERENCES `dbsportsx`.`permissions` (`id`)
                                                                     ON DELETE CASCADE,
                                                             CONSTRAINT `permission_role_role_id_foreign`
                                                                 FOREIGN KEY (`role_id`)
                                                                     REFERENCES `dbsportsx`.`roles` (`id`)
                                                                     ON DELETE CASCADE)
    ENGINE = InnoDB
    DEFAULT CHARACTER SET = utf8mb4
    COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `dbsportsx`.`personal_access_tokens`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbsportsx`.`personal_access_tokens` (
                                                                    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
                                                                    `tokenable_type` VARCHAR(255) NOT NULL,
                                                                    `tokenable_id` BIGINT UNSIGNED NOT NULL,
                                                                    `name` VARCHAR(255) NOT NULL,
                                                                    `token` VARCHAR(64) NOT NULL,
                                                                    `abilities` TEXT NULL DEFAULT NULL,
                                                                    `last_used_at` TIMESTAMP NULL DEFAULT NULL,
                                                                    `expires_at` TIMESTAMP NULL DEFAULT NULL,
                                                                    `created_at` TIMESTAMP NULL DEFAULT NULL,
                                                                    `updated_at` TIMESTAMP NULL DEFAULT NULL,
                                                                    PRIMARY KEY (`id`),
                                                                    UNIQUE INDEX `personal_access_tokens_token_unique` (`token` ASC) VISIBLE,
                                                                    INDEX `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type` ASC, `tokenable_id` ASC) VISIBLE)
    ENGINE = InnoDB
    DEFAULT CHARACTER SET = utf8mb4
    COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `dbsportsx`.`settings`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbsportsx`.`settings` (
                                                      `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
                                                      `key` VARCHAR(255) NOT NULL,
                                                      `display_name` VARCHAR(255) NOT NULL,
                                                      `value` TEXT CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NULL DEFAULT NULL,
                                                      `details` TEXT NULL DEFAULT NULL,
                                                      `type` VARCHAR(255) NOT NULL,
                                                      `order` INT NOT NULL DEFAULT '1',
                                                      `group` VARCHAR(255) NULL DEFAULT NULL,
                                                      PRIMARY KEY (`id`),
                                                      UNIQUE INDEX `settings_key_unique` (`key` ASC) VISIBLE)
    ENGINE = InnoDB
    DEFAULT CHARACTER SET = utf8mb4
    COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `dbsportsx`.`translations`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbsportsx`.`translations` (
                                                          `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
                                                          `table_name` VARCHAR(255) NOT NULL,
                                                          `column_name` VARCHAR(255) NOT NULL,
                                                          `foreign_key` INT UNSIGNED NOT NULL,
                                                          `locale` VARCHAR(255) NOT NULL,
                                                          `value` TEXT NOT NULL,
                                                          `created_at` TIMESTAMP NULL DEFAULT NULL,
                                                          `updated_at` TIMESTAMP NULL DEFAULT NULL,
                                                          PRIMARY KEY (`id`),
                                                          UNIQUE INDEX `translations_table_name_column_name_foreign_key_locale_unique` (`table_name` ASC, `column_name` ASC, `foreign_key` ASC, `locale` ASC) VISIBLE)
    ENGINE = InnoDB
    DEFAULT CHARACTER SET = utf8mb4
    COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `dbsportsx`.`user_roles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbsportsx`.`user_roles` (
                                                        `user_id` BIGINT UNSIGNED NOT NULL,
                                                        `role_id` BIGINT UNSIGNED NOT NULL,
                                                        PRIMARY KEY (`user_id`, `role_id`),
                                                        INDEX `user_roles_user_id_index` (`user_id` ASC) VISIBLE,
                                                        INDEX `user_roles_role_id_index` (`role_id` ASC) VISIBLE,
                                                        CONSTRAINT `user_roles_role_id_foreign`
                                                            FOREIGN KEY (`role_id`)
                                                                REFERENCES `dbsportsx`.`roles` (`id`)
                                                                ON DELETE CASCADE,
                                                        CONSTRAINT `user_roles_user_id_foreign`
                                                            FOREIGN KEY (`user_id`)
                                                                REFERENCES `dbsportsx`.`users` (`id`)
                                                                ON DELETE CASCADE)
    ENGINE = InnoDB
    DEFAULT CHARACTER SET = utf8mb4
    COLLATE = utf8mb4_unicode_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
