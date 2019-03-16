-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema blogsite
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema blogsite
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `blogsite`;
USE `blogsite` ;

-- -----------------------------------------------------
-- Table `blogsite`.`Posts`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `blogsite`.`Posts` ;

CREATE TABLE IF NOT EXISTS `blogsite`.`Posts` (
  `Post_Id` INT(11) NOT NULL AUTO_INCREMENT,
  `Post_Title` VARCHAR(45) NOT NULL,
  `Category_Id` VARCHAR(45) NULL DEFAULT NULL,
  `Post_Body` VARCHAR(250) NOT NULL,
  `Post_Date` DATE NULL DEFAULT NULL,
  `Author` VARCHAR(45) NOT NULL,
  `Updated_Date` DATE NULL DEFAULT NULL,
  `Updated_Author` VARCHAR(45) NULL DEFAULT NULL,
  `Deleted_Flag` VARCHAR(1) NULL DEFAULT 'N',
  PRIMARY KEY (`Post_Id`))
ENGINE = InnoDB
AUTO_INCREMENT = 22;

CREATE UNIQUE INDEX `Post_Title_UNIQUE` ON `blogsite`.`Posts` (`Post_Title` ASC);


-- -----------------------------------------------------
-- Table `blogsite`.`Users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `blogsite`.`Users` ;

CREATE TABLE IF NOT EXISTS `blogsite`.`Users` (
  `User_Id` INT(11) NOT NULL AUTO_INCREMENT,
  `User_Name` VARCHAR(45) NOT NULL,
  `First_Name` VARCHAR(45) NOT NULL,
  `Last_Name` VARCHAR(45) NOT NULL,
  `Email` VARCHAR(45) NOT NULL,
  `Password` VARCHAR(45) NOT NULL,
  `User_Role` VARCHAR(45) NOT NULL,
  `Address1` VARCHAR(45) NULL DEFAULT NULL,
  `Address2` VARCHAR(45) NULL DEFAULT NULL,
  `City` VARCHAR(45) NULL DEFAULT NULL,
  `State` VARCHAR(45) NULL DEFAULT NULL,
  `Zipcode` VARCHAR(45) NULL DEFAULT NULL,
  `Country` VARCHAR(45) NULL DEFAULT NULL,
  `User_Banned` VARCHAR(1) NULL DEFAULT 'N',
  `User_Deleted` VARCHAR(1) NULL DEFAULT 'N',
  PRIMARY KEY (`User_Id`))
ENGINE = InnoDB
AUTO_INCREMENT = 13;

CREATE UNIQUE INDEX `User_name_UNIQUE` ON `blogsite`.`Users` (`User_Name` ASC);

CREATE UNIQUE INDEX `Email_UNIQUE` ON `blogsite`.`Users` (`Email` ASC);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
