-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema plateria
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema plateria
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `plateria` DEFAULT CHARACTER SET utf8 ;
USE `plateria` ;

-- -----------------------------------------------------
-- Table `plateria`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `plateria`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(60) NOT NULL,
  `email` VARCHAR(100) NULL,
  `password` VARCHAR(100) NOT NULL,
  `token` VARCHAR(100) NULL,
  `remember_token` VARCHAR(100) NULL,
  `activo` TINYINT(2) NULL DEFAULT '1',
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `plateria`.`proveedores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `plateria`.`proveedores` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(60) NOT NULL,
  `imagen_contacto` VARCHAR(150) NULL,
  `activo` TINYINT(2) NULL DEFAULT 1,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  `user_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_proveedores_users1_idx` (`user_id` ASC),
  CONSTRAINT `fk_proveedores_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `plateria`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `plateria`.`productos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `plateria`.`productos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(60) NOT NULL,
  `descripcion` VARCHAR(250) NULL,
  `inventario` INT NULL,
  `precio` DECIMAL(10,2) NOT NULL,
  `activo` TINYINT(2) NULL DEFAULT 1,
  `created_at` TIMESTAMP NULL,
  `update_at` TIMESTAMP NULL,
  `proveedor_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_productos_proveedores_idx` (`proveedor_id` ASC),
  CONSTRAINT `fk_productos_proveedores`
    FOREIGN KEY (`proveedor_id`)
    REFERENCES `plateria`.`proveedores` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `plateria`.`compradores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `plateria`.`compradores` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `customer_id` VARCHAR(45) NOT NULL,
  `activo` TINYINT(2) NULL DEFAULT '1',
  `user_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_comprador_users1_idx` (`user_id` ASC),
  CONSTRAINT `fk_comprador_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `plateria`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `plateria`.`compras`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `plateria`.`compras` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `fecha` TIMESTAMP NULL,
  `cantidad` INT NULL,
  `total` DECIMAL(10,2) NULL,
  `user_id` INT NOT NULL,
  `producto_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_compras_users1_idx` (`user_id` ASC),
  INDEX `fk_compras_productos1_idx` (`producto_id` ASC),
  CONSTRAINT `fk_compras_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `plateria`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_compras_productos1`
    FOREIGN KEY (`producto_id`)
    REFERENCES `plateria`.`productos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `plateria`.`envios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `plateria`.`envios` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `calle` VARCHAR(60) NOT NULL,
  `colonia` VARCHAR(45) NOT NULL,
  `numero_exterior` VARCHAR(45) NOT NULL,
  `numero_interior` VARCHAR(45) NULL,
  `ciudad` VARCHAR(40) NOT NULL,
  `país` VARCHAR(60) NOT NULL,
  `compras_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_envios_compras1_idx` (`compras_id` ASC),
  CONSTRAINT `fk_envios_compras1`
    FOREIGN KEY (`compras_id`)
    REFERENCES `plateria`.`compras` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
