-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`cliente` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL,
  `endereco` VARCHAR(100) NULL,
  `telefone` INT NULL,
  `rg` INT NULL,
  `cpf` INT NULL,
  `email` VARCHAR(60) NULL,
  `username` VARCHAR(45) NULL,
  `senha` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
  ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`proprietario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`proprietario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL,
  `endereco` VARCHAR(100) NULL,
  `telefone` INT NULL,
  `rg` INT NULL,
  `cpf` INT NULL,
  `email` VARCHAR(60) NULL,
  `username` VARCHAR(45) NULL,
  `senha` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
  ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`imovel`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`imovel` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `proprietario_id` INT NOT NULL,
  `endereco` VARCHAR(150) NULL,
  `bairro` VARCHAR(45) NULL,
  `cep` VARCHAR(45) NULL,
  `valor_aluguel` DECIMAL(12,1) NULL,
  `descricao` VARCHAR(200) NULL,
  `qtd_quartos` INT NULL,
  `area_total` INT NULL,
  `tipo` VARCHAR(60) NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_imovel_proprietario1_idx` (`proprietario_id` ASC))
  ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`tipo_de_pagamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`tipo_de_pagamento` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome_do_tipo_pagto` VARCHAR(45) NULL,
  `ativo` BIT(1) NULL,
  `data_pagto` DATETIME NULL,
  PRIMARY KEY (`id`))
  ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`aluguel`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`aluguel` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `imovel_id` INT NOT NULL,
  `tipo_de_pagamento_id` INT NOT NULL,
  `cliente_id` INT NOT NULL,
  `aval_imovel` INT NULL,
  `aval_cliente` INT NULL,
  `data_inicio` DATE NULL,
  `data_final` DATE NULL,
  `valor` DECIMAL(10,2) NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_aluguel_imovel1_idx` (`imovel_id` ASC),
  INDEX `fk_aluguel_tipo_de_pagamento1_idx` (`tipo_de_pagamento_id` ASC),
  INDEX `fk_aluguel_cliente1_idx` (`cliente_id` ASC))
  ENGINE = InnoDB
  COMMENT = '				';


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
