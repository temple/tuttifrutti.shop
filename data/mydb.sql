-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `mydb` ;

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`Usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Usuario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(45) NULL,
  `mail` TINYTEXT NULL,
  `Pass` VARCHAR(15) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Contacto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Contacto` (
  `mail` VARCHAR(25) NULL,
  `id` INT NOT NULL,
  `Usuario_id` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_contacto_Usuario1_idx` (`Usuario_id` ASC) VISIBLE,
  CONSTRAINT `fk_contacto_Usuario1`
    FOREIGN KEY (`Usuario_id`)
    REFERENCES `mydb`.`Usuario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Mensaje`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Mensaje` (
  `id` INT NOT NULL,
  `Mensaje` TEXT(500) NULL,
  `Asunto` VARCHAR(45) NULL,
  `Contacto_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Mensaje_contacto_idx` (`Contacto_id` ASC) VISIBLE,
  CONSTRAINT `fk_Mensaje_contacto`
    FOREIGN KEY (`Contacto_id`)
    REFERENCES `mydb`.`Contacto` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Company`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Company` (
  `id` INT NOT NULL,
  `Text` VARCHAR(45) NULL,
  `Imagen` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Politica`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Politica` (
  `id` INT NOT NULL,
  `Textolegal` LONGTEXT NULL,
  `Company_id` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Politica_Company1_idx` (`Company_id` ASC) VISIBLE,
  CONSTRAINT `fk_Politica_Company1`
    FOREIGN KEY (`Company_id`)
    REFERENCES `mydb`.`Company` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Cuentas RRSS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Cuentas RRSS` (
  `id` INT NOT NULL,
  `url` VARCHAR(45) NULL,
  `imagen` VARCHAR(45) NULL,
  `Company_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Cuentas RRSS_Company1_idx` (`Company_id` ASC) VISIBLE,
  CONSTRAINT `fk_Cuentas RRSS_Company1`
    FOREIGN KEY (`Company_id`)
    REFERENCES `mydb`.`Company` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Season`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Season` (
  `id` INT NOT NULL,
  `Slogan` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Familia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Familia` (
  `id` INT NOT NULL,
  `Titulo` VARCHAR(45) NULL,
  `Season_id` INT NOT NULL,
  PRIMARY KEY (`id`, `Season_id`),
  INDEX `fk_Familia_Season1_idx` (`Season_id` ASC) VISIBLE,
  CONSTRAINT `fk_Familia_Season1`
    FOREIGN KEY (`Season_id`)
    REFERENCES `mydb`.`Season` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Producto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Producto` (
  `id` INT NOT NULL,
  `Nombre` VARCHAR(45) NULL,
  `Descripción` TEXT(150) NULL,
  `Price` DECIMAL(2) NULL,
  `Imagen` TEXT(150) NULL,
  `Familia_id` INT NOT NULL,
  PRIMARY KEY (`id`, `Familia_id`),
  INDEX `fk_Producto_Familia1_idx` (`Familia_id` ASC) VISIBLE,
  CONSTRAINT `fk_Producto_Familia1`
    FOREIGN KEY (`Familia_id`)
    REFERENCES `mydb`.`Familia` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
