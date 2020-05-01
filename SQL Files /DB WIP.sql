-- MySQL Script generated by MySQL Workbench
-- Mon Mar 30 22:44:15 2020
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema ProjectDB2
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `ProjectDB2` ;

-- -----------------------------------------------------
-- Schema ProjectDB2
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `ProjectDB2` DEFAULT CHARACTER SET utf8 ;
USE `ProjectDB2` ;

-- -----------------------------------------------------
-- Table `ProjectDB2`.`Patient`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ProjectDB2`.`Patient` ;

CREATE TABLE IF NOT EXISTS `ProjectDB2`.`Patient` (
  `patient_ID` VARCHAR(45) NULL,
  `first_name` VARCHAR(45) NULL,
  `second_name` VARCHAR(45) NULL,
  `birth` VARCHAR(15) NULL,
  `address1` VARCHAR(45) NULL,
  `address2` VARCHAR(45) NULL,
  `city` VARCHAR(45) NULL,
  `county` VARCHAR(45) NULL,
  `post_code` VARCHAR(10) NULL,
  `email` VARCHAR(45) NULL,
  `userPass` VARCHAR(200) NULL,
  PRIMARY KEY (`patient_ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ProjectDB2`.`HPV`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ProjectDB2`.`HPV` ;

CREATE TABLE IF NOT EXISTS `ProjectDB2`.`HPV` (
  `patient_ID` VARCHAR(45) NOT NULL,
  `dose1` VARCHAR(40) NULL,
  `dose2` VARCHAR(40) NULL,
  `dose2` VARCHAR(40) NULL,
  `next_dose` VARCHAR(45) NULL,
  `severity` INT NULL,
  PRIMARY KEY (`patient_ID`),
  CONSTRAINT `fk_HPV_Vaccination_Patient1`
    FOREIGN KEY (`patient_ID`)
    REFERENCES `ProjectDB2`.`Patient` (`patient_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ProjectDB2`.`HEP`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ProjectDB2`.`HEP` ;

CREATE TABLE IF NOT EXISTS `ProjectDB2`.`HEP` (
  `patient_ID` VARCHAR(45) NOT NULL,
  `dose1` VARCHAR(40) NULL,
  `dose2` VARCHAR(40) NULL,
  `dose3` VARCHAR(40) NULL,
  `next_dose` VARCHAR(40) NULL,
  `severity` INT NULL,
  PRIMARY KEY (`patient_ID`),
  CONSTRAINT `fk_HEP_AB_Vaccination_Patient1`
    FOREIGN KEY (`patient_ID`)
    REFERENCES `ProjectDB2`.`Patient` (`patient_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ProjectDB2`.`Screening`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ProjectDB2`.`Screening` ;

CREATE TABLE IF NOT EXISTS `ProjectDB2`.`Screening` (
  `screening_ID` INT NOT NULL AUTO_INCREMENT,
  `patient_ID` VARCHAR(45) NOT NULL,
  `date_tested` VARCHAR(45) NULL,
  `latest_test` TINYINT NULL,
  `Gonnorhea` VARCHAR(45) NULL,
  `Chlamydia` VARCHAR(45) NULL,
  `Syphilis` VARCHAR(45) NULL,
  `HIV` VARCHAR(45) NULL,
  PRIMARY KEY (`screening_ID`),
  INDEX `fk_STI_Test_Patient1_idx` (`patient_ID` ASC) VISIBLE,
  CONSTRAINT `fk_STI_Test_Patient1`
    FOREIGN KEY (`patient_ID`)
    REFERENCES `ProjectDB2`.`Patient` (`patient_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ProjectDB2`.`Patient_rersources`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ProjectDB2`.`Patient_rersources` ;

CREATE TABLE IF NOT EXISTS `ProjectDB2`.`Patient_rersources` (
  `resource_ID` INT NOT NULL AUTO_INCREMENT,
  `category` VARCHAR(45) NULL,
  `activity` VARCHAR(45) NULL,
  `url` VARCHAR(45) NULL,
  PRIMARY KEY (`resource_ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ProjectDB2`.`STI_email_reminder`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ProjectDB2`.`STI_email_reminder` ;

CREATE TABLE IF NOT EXISTS `ProjectDB2`.`STI_email_reminder` (
  `severity` VARCHAR(45) NULL,
  `date_created` VARCHAR(45) NULL,
  `completed` VARCHAR(45) NULL,
  `patient_ID` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`patient_ID`),
  CONSTRAINT `fk_STI_email_reminder_Patient1`
    FOREIGN KEY (`patient_ID`)
    REFERENCES `ProjectDB2`.`Patient` (`patient_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ProjectDB2`.`Interview`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ProjectDB2`.`Interview` ;

CREATE TABLE IF NOT EXISTS `ProjectDB2`.`Interview` (
  `happy` TINYINT NULL,
  `p_out` TINYINT NULL,
  `cut_drink` TINYINT NULL,
  `felt_guilty` TINYINT NULL,
  `drink_morning` TINYINT NULL,
  `club_drugs` TINYINT NULL,
  `smoker` TINYINT NULL,
  `excercise` TINYINT NULL,
  `annoyed` TINYINT NULL,
  `patient_ID` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`patient_ID`),
  CONSTRAINT `fk_Interview_Patient`
    FOREIGN KEY (`patient_ID`)
    REFERENCES `ProjectDB2`.`Patient` (`patient_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;