-- MySQL Script generated by MySQL Workbench
-- Thu Jul  8 19:24:52 2021
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema api_rest
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema api_rest
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `api_rest` DEFAULT CHARACTER SET utf8 ;
USE `api_rest` ;

-- -----------------------------------------------------
-- Table `api_rest`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `api_rest`.`user` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(20) NOT NULL,
  `pass` CHAR(32) NOT NULL,
  `permission` TINYINT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `name_UNIQUE` (`name` ASC))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;