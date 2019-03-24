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
CREATE SCHEMA IF NOT EXISTS `blogsite';
USE `blogsite` ;

-- -----------------------------------------------------
-- Table `blogsite`.`Categories`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `blogsite`.`Categories` ;

CREATE TABLE IF NOT EXISTS `blogsite`.`Categories` (
  `Category_Id` INT(11) NOT NULL AUTO_INCREMENT,
  `Category_Name` VARCHAR(45) NOT NULL,
  `Created_Date` DATE NULL DEFAULT NULL,
  `Active_Flag` VARCHAR(1) NULL DEFAULT 'Y',
  PRIMARY KEY (`Category_Id`))
ENGINE = InnoDB
AUTO_INCREMENT = 17;

CREATE UNIQUE INDEX `Category_Name_UNIQUE` ON `blogsite`.`Categories` (`Category_Name` ASC);


-- -----------------------------------------------------
-- Table `blogsite`.`Posts`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `blogsite`.`Posts` ;

CREATE TABLE IF NOT EXISTS `blogsite`.`Posts` (
  `Post_Id` INT(11) NOT NULL AUTO_INCREMENT,
  `Post_Title` VARCHAR(45) NOT NULL,
  `Category_Id` INT(11) NULL DEFAULT NULL,
  `Post_Body` VARCHAR(250) NOT NULL,
  `Post_Date` DATE NULL DEFAULT NULL,
  `Author` VARCHAR(45) NOT NULL,
  `Updated_Date` DATE NULL DEFAULT NULL,
  `Updated_Author` VARCHAR(45) NULL DEFAULT NULL,
  `Deleted_Flag` VARCHAR(1) NULL DEFAULT 'N',
  PRIMARY KEY (`Post_Id`),
  CONSTRAINT `Category_Id`
    FOREIGN KEY (`Category_Id`)
    REFERENCES `blogsite`.`categories` (`Category_Id`),
  CONSTRAINT `fk_author`
    FOREIGN KEY (`Author`)
    REFERENCES `blogsite`.`users` (`User_Name`),
  CONSTRAINT `fk_updated_author`
    FOREIGN KEY (`Updated_Author`)
    REFERENCES `blogsite`.`users` (`User_Name`))
ENGINE = InnoDB
AUTO_INCREMENT = 35;

CREATE UNIQUE INDEX `Post_Title_UNIQUE` ON `blogsite`.`Posts` (`Post_Title` ASC);

CREATE INDEX `Category_Id_idx` ON `blogsite`.`Posts` (`Category_Id` ASC);

CREATE INDEX `Author_idx` ON `blogsite`.`Posts` (`Author` ASC);

CREATE INDEX `Updated_Author_idx` ON `blogsite`.`Posts` (`Updated_Author` ASC);


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
AUTO_INCREMENT = 21;

CREATE UNIQUE INDEX `User_name_UNIQUE` ON `blogsite`.`Users` (`User_Name` ASC);

CREATE UNIQUE INDEX `Email_UNIQUE` ON `blogsite`.`Users` (`Email` ASC);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
