SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `cc409_pekes_tote` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci ;
USE `cc409_pekes_tote` ;

-- -----------------------------------------------------
-- Table `cc409_pekes_tote`.`Tipo_usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cc409_pekes_tote`.`Tipo_usuario` ;

CREATE  TABLE IF NOT EXISTS `cc409_pekes_tote`.`Tipo_usuario` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `descripcion` VARCHAR(50) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;

CREATE UNIQUE INDEX `id_UNIQUE` ON `cc409_pekes_tote`.`Tipo_usuario` (`id` ASC) ;


-- -----------------------------------------------------
-- Table `cc409_pekes_tote`.`Usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cc409_pekes_tote`.`Usuario` ;

CREATE  TABLE IF NOT EXISTS `cc409_pekes_tote`.`Usuario` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nickname` VARCHAR(20) NOT NULL ,
  `imagen` VARCHAR(100) NOT NULL ,
  `tipo` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `tipo`
    FOREIGN KEY (`tipo` )
    REFERENCES `cc409_pekes_tote`.`Tipo_usuario` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE UNIQUE INDEX `id_UNIQUE` ON `cc409_pekes_tote`.`Usuario` (`id` ASC) ;

CREATE INDEX `tipo_idx` ON `cc409_pekes_tote`.`Usuario` (`tipo` ASC) ;


-- -----------------------------------------------------
-- Table `cc409_pekes_tote`.`Estado_Evento`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cc409_pekes_tote`.`Estado_Evento` ;

CREATE  TABLE IF NOT EXISTS `cc409_pekes_tote`.`Estado_Evento` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `descripcion` VARCHAR(50) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;

CREATE UNIQUE INDEX `id_UNIQUE` ON `cc409_pekes_tote`.`Estado_Evento` (`id` ASC) ;


-- -----------------------------------------------------
-- Table `cc409_pekes_tote`.`Categoria`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cc409_pekes_tote`.`Categoria` ;

CREATE  TABLE IF NOT EXISTS `cc409_pekes_tote`.`Categoria` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `descripcion` VARCHAR(64) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;

CREATE UNIQUE INDEX `id_categoria_UNIQUE` ON `cc409_pekes_tote`.`Categoria` (`id` ASC) ;


-- -----------------------------------------------------
-- Table `cc409_pekes_tote`.`Evento`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cc409_pekes_tote`.`Evento` ;

CREATE  TABLE IF NOT EXISTS `cc409_pekes_tote`.`Evento` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(25) NOT NULL ,
  `imagen` VARCHAR(128) NOT NULL ,
  `descripcion` VARCHAR(255) NOT NULL ,
  `precio` FLOAT NOT NULL ,
  `categoria` INT NOT NULL ,
  `capacidad` VARCHAR(10) NOT NULL ,
  `fecha_evento` DATE NOT NULL ,
  `fecha_creacion` DATE NOT NULL ,
  `coment_admin` TEXT NULL ,
  `estado` INT NOT NULL ,
  `usuario` INT NOT NULL ,
  `disqus` INT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_Evento_Usuario1`
    FOREIGN KEY (`usuario` )
    REFERENCES `cc409_pekes_tote`.`Usuario` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Evento_Estado_Evento1`
    FOREIGN KEY (`estado` )
    REFERENCES `cc409_pekes_tote`.`Estado_Evento` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Evento_Categoria1`
    FOREIGN KEY (`categoria` )
    REFERENCES `cc409_pekes_tote`.`Categoria` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_Evento_Usuario1_idx` ON `cc409_pekes_tote`.`Evento` (`usuario` ASC) ;

CREATE INDEX `fk_Evento_Estado_Evento1_idx` ON `cc409_pekes_tote`.`Evento` (`estado` ASC) ;

CREATE UNIQUE INDEX `id_UNIQUE` ON `cc409_pekes_tote`.`Evento` (`id` ASC) ;

CREATE INDEX `fk_Evento_Categoria1_idx` ON `cc409_pekes_tote`.`Evento` (`categoria` ASC) ;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
