SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';


-- -----------------------------------------------------
-- Table `eventosDB`.`Tipo_usuario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `eventosDB`.`Tipo_usuario` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `descripcion` VARCHAR(50) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;

CREATE UNIQUE INDEX `id_UNIQUE` ON `eventosDB`.`Tipo_usuario` (`id` ASC) ;


-- -----------------------------------------------------
-- Table `eventosDB`.`Usuario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `eventosDB`.`Usuario` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nickname` VARCHAR(20) NOT NULL ,
  `imagen` LONGBLOB NOT NULL ,
  `tipo` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `tipo`
    FOREIGN KEY (`tipo` )
    REFERENCES `eventosDB`.`Tipo_usuario` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE UNIQUE INDEX `id_UNIQUE` ON `eventosDB`.`Usuario` (`id` ASC) ;

CREATE INDEX `tipo_idx` ON `eventosDB`.`Usuario` (`tipo` ASC) ;


-- -----------------------------------------------------
-- Table `eventosDB`.`Estado_Evento`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `eventosDB`.`Estado_Evento` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `descripcion` INT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;

CREATE UNIQUE INDEX `id_UNIQUE` ON `eventosDB`.`Estado_Evento` (`id` ASC) ;


-- -----------------------------------------------------
-- Table `eventosDB`.`DIsqus`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `eventosDB`.`DIsqus` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `thread_id` VARCHAR(20) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;

CREATE UNIQUE INDEX `id_UNIQUE` ON `eventosDB`.`DIsqus` (`id` ASC) ;


-- -----------------------------------------------------
-- Table `eventosDB`.`Categoria`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `eventosDB`.`Categoria` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `descripcion` VARCHAR(64) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;

CREATE UNIQUE INDEX `id_categoria_UNIQUE` ON `eventosDB`.`Categoria` (`id` ASC) ;


-- -----------------------------------------------------
-- Table `eventosDB`.`Evento`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `eventosDB`.`Evento` (
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
    REFERENCES `eventosDB`.`Usuario` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Evento_Estado_Evento1`
    FOREIGN KEY (`estado` )
    REFERENCES `eventosDB`.`Estado_Evento` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Evento_DIsqus1`
    FOREIGN KEY (`disqus` )
    REFERENCES `eventosDB`.`DIsqus` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Evento_Categoria1`
    FOREIGN KEY (`categoria` )
    REFERENCES `eventosDB`.`Categoria` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_Evento_Usuario1_idx` ON `eventosDB`.`Evento` (`usuario` ASC) ;

CREATE INDEX `fk_Evento_Estado_Evento1_idx` ON `eventosDB`.`Evento` (`estado` ASC) ;

CREATE UNIQUE INDEX `id_UNIQUE` ON `eventosDB`.`Evento` (`id` ASC) ;

CREATE INDEX `fk_Evento_DIsqus1_idx` ON `eventosDB`.`Evento` (`disqus` ASC) ;

CREATE INDEX `fk_Evento_Categoria1_idx` ON `eventosDB`.`Evento` (`categoria` ASC) ;


-- -----------------------------------------------------
-- Table `eventosDB`.`Evento_Categoria`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `eventosDB`.`Evento_Categoria` (
  `id_evento` INT NOT NULL ,
  `id_categoria` VARCHAR(45) NULL ,
  CONSTRAINT `fk_Evento_Categoria_Evento1`
    FOREIGN KEY (`id_evento` )
    REFERENCES `eventosDB`.`Evento` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Evento_Categoria_Categoria1`
    FOREIGN KEY (`id_categoria` )
    REFERENCES `eventosDB`.`Categoria` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_Evento_Categoria_Evento1_idx` ON `eventosDB`.`Evento_Categoria` (`id_evento` ASC) ;

CREATE INDEX `fk_Evento_Categoria_Categoria1_idx` ON `eventosDB`.`Evento_Categoria` (`id_categoria` ASC) ;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
