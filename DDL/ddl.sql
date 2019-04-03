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
CREATE SCHEMA IF NOT EXISTS `blogsite` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci ;
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
AUTO_INCREMENT = 17
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;

CREATE UNIQUE INDEX `Category_Name_UNIQUE` ON `blogsite`.`Categories` (`Category_Name` ASC);


-- -----------------------------------------------------
-- Table `blogsite`.`Comments`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `blogsite`.`Comments` ;

CREATE TABLE IF NOT EXISTS `blogsite`.`Comments` (
  `Comment_Id` INT(11) NOT NULL AUTO_INCREMENT,
  `Body` VARCHAR(120) NULL DEFAULT NULL,
  `Author_Id` INT(11) NULL DEFAULT NULL,
  `Rating_Id` INT(11) NULL DEFAULT NULL,
  `Post_Id` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`Comment_Id`),
  CONSTRAINT `fk_author_id`
    FOREIGN KEY (`Author_Id`)
    REFERENCES `blogsite`.`users` (`User_Id`),
  CONSTRAINT `fk_rating_id`
    FOREIGN KEY (`Rating_Id`)
    REFERENCES `blogsite`.`ratings` (`Rating_Id`))
ENGINE = InnoDB
AUTO_INCREMENT = 12
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;

CREATE INDEX `fk_author_id_idx` ON `blogsite`.`Comments` (`Author_Id` ASC);

CREATE INDEX `fk_rating_id_idx` ON `blogsite`.`Comments` (`Rating_Id` ASC);

CREATE INDEX `fk_post_id_idx` ON `blogsite`.`Comments` (`Post_Id` ASC);


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
AUTO_INCREMENT = 35
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;

CREATE UNIQUE INDEX `Post_Title_UNIQUE` ON `blogsite`.`Posts` (`Post_Title` ASC);

CREATE INDEX `Category_Id_idx` ON `blogsite`.`Posts` (`Category_Id` ASC);

CREATE INDEX `fk_author_idx` ON `blogsite`.`Posts` (`Author` ASC);

CREATE INDEX `fk_updated_author_idx` ON `blogsite`.`Posts` (`Updated_Author` ASC);


-- -----------------------------------------------------
-- Table `blogsite`.`Ratings`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `blogsite`.`Ratings` ;

CREATE TABLE IF NOT EXISTS `blogsite`.`Ratings` (
  `Rating_Id` INT(11) NOT NULL AUTO_INCREMENT,
  `Post_Id` INT(11) NOT NULL,
  `Author_Id` INT(11) NULL DEFAULT NULL,
  `Stars` INT(11) NULL DEFAULT '0',
  PRIMARY KEY (`Rating_Id`),
  CONSTRAINT `fk_post_id`
    FOREIGN KEY (`Post_Id`)
    REFERENCES `blogsite`.`posts` (`Post_Id`))
ENGINE = InnoDB
AUTO_INCREMENT = 8
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;

CREATE INDEX `fk_post_id_idx` ON `blogsite`.`Ratings` (`Post_Id` ASC);


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
AUTO_INCREMENT = 23
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;

CREATE UNIQUE INDEX `User_name_UNIQUE` ON `blogsite`.`Users` (`User_Name` ASC);

CREATE UNIQUE INDEX `Email_UNIQUE` ON `blogsite`.`Users` (`Email` ASC);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
