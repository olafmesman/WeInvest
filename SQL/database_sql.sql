-- MySQL Script generated by MySQL Workbench
-- Sat Apr  7 04:44:08 2018
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema WeInvest
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema WeInvest
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `WeInvest` DEFAULT CHARACTER SET utf8 ;
USE `WeInvest` ;

-- -----------------------------------------------------
-- Table `WeInvest`.`investors`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `WeInvest`.`investors` ;

CREATE TABLE IF NOT EXISTS `WeInvest`.`investors` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `first_name` VARCHAR(50) NOT NULL,
  `last_name` VARCHAR(50) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NOW(),
  `validated` TINYINT NULL DEFAULT 0,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `WeInvest`.`entrepreneur_profiles`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `WeInvest`.`entrepreneur_profiles` ;

CREATE TABLE IF NOT EXISTS `WeInvest`.`entrepreneur_profiles` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `description` TEXT NULL,
  `profile_picture_url` VARCHAR(255) NULL,
  `pitch_url` VARCHAR(255) NULL,
  `logo_url` VARCHAR(255) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `WeInvest`.`entrepreneurs`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `WeInvest`.`entrepreneurs` ;

CREATE TABLE IF NOT EXISTS `WeInvest`.`entrepreneurs` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `first_name` VARCHAR(50) NOT NULL,
  `last_name` VARCHAR(50) NOT NULL,
  `validated` TINYINT NULL DEFAULT 0,
  `created_at` TIMESTAMP NULL DEFAULT NOW(),
  `entrepreneur_profiles_id` INT NOT NULL,
  PRIMARY KEY (`id`, `entrepreneur_profiles_id`),
  INDEX `fk_entrepreneurs_entrepreneur_profiles1_idx` (`entrepreneur_profiles_id` ASC),
  CONSTRAINT `fk_entrepreneurs_entrepreneur_profiles1`
    FOREIGN KEY (`entrepreneur_profiles_id`)
    REFERENCES `WeInvest`.`entrepreneur_profiles` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `WeInvest`.`investors_has_investors`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `WeInvest`.`investors_has_investors` ;

CREATE TABLE IF NOT EXISTS `WeInvest`.`investors_has_investors` (
  `investors_id` INT NOT NULL,
  `investors_id1` INT NOT NULL,
  PRIMARY KEY (`investors_id`, `investors_id1`),
  INDEX `fk_investors_has_investors_investors1_idx` (`investors_id1` ASC),
  INDEX `fk_investors_has_investors_investors_idx` (`investors_id` ASC),
  CONSTRAINT `fk_investors_has_investors_investors`
    FOREIGN KEY (`investors_id`)
    REFERENCES `WeInvest`.`investors` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_investors_has_investors_investors1`
    FOREIGN KEY (`investors_id1`)
    REFERENCES `WeInvest`.`investors` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `WeInvest`.`matches`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `WeInvest`.`matches` ;

CREATE TABLE IF NOT EXISTS `WeInvest`.`matches` (
  `investors_id` INT NOT NULL,
  `entrepreneurs_id` INT NOT NULL,
  `status` TINYINT NULL DEFAULT 0,
  PRIMARY KEY (`investors_id`, `entrepreneurs_id`),
  INDEX `fk_investors_has_entrepreneurs_entrepreneurs1_idx` (`entrepreneurs_id` ASC),
  INDEX `fk_investors_has_entrepreneurs_investors1_idx` (`investors_id` ASC),
  CONSTRAINT `fk_investors_has_entrepreneurs_investors1`
    FOREIGN KEY (`investors_id`)
    REFERENCES `WeInvest`.`investors` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_investors_has_entrepreneurs_entrepreneurs1`
    FOREIGN KEY (`entrepreneurs_id`)
    REFERENCES `WeInvest`.`entrepreneurs` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `WeInvest`.`posts`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `WeInvest`.`posts` ;

CREATE TABLE IF NOT EXISTS `WeInvest`.`posts` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `content` TEXT NOT NULL,
  `image_url` VARCHAR(255) NULL,
  `entrepreneurs_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_posts_entrepreneurs1_idx` (`entrepreneurs_id` ASC),
  CONSTRAINT `fk_posts_entrepreneurs1`
    FOREIGN KEY (`entrepreneurs_id`)
    REFERENCES `WeInvest`.`entrepreneurs` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
