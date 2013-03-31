SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `imobiliaria` ;
CREATE SCHEMA IF NOT EXISTS `imobiliaria` ;
USE `imobiliaria` ;

-- -----------------------------------------------------
-- Table `imobiliaria`.`endereco`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `imobiliaria`.`endereco` ;

CREATE  TABLE IF NOT EXISTS `imobiliaria`.`endereco` (
  `idendereco` INT NOT NULL AUTO_INCREMENT ,
  `descricao` VARCHAR(255) NOT NULL ,
  PRIMARY KEY (`idendereco`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `imobiliaria`.`tipo_imovel`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `imobiliaria`.`tipo_imovel` ;

CREATE  TABLE IF NOT EXISTS `imobiliaria`.`tipo_imovel` (
  `idtipo_imovel` INT NOT NULL AUTO_INCREMENT ,
  `descricao_tipo_imovel` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`idtipo_imovel`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `imobiliaria`.`tipo_negocio`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `imobiliaria`.`tipo_negocio` ;

CREATE  TABLE IF NOT EXISTS `imobiliaria`.`tipo_negocio` (
  `idtipo_negocio` INT NOT NULL AUTO_INCREMENT ,
  `descricao_tipo_negocio` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`idtipo_negocio`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `imobiliaria`.`imagem`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `imobiliaria`.`imagem` ;

CREATE  TABLE IF NOT EXISTS `imobiliaria`.`imagem` (
  `idimagem` INT NOT NULL AUTO_INCREMENT ,
  `descricao` VARCHAR(200) NULL ,
  `url` VARCHAR(200) NOT NULL ,
  PRIMARY KEY (`idimagem`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `imobiliaria`.`imovel`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `imobiliaria`.`imovel` ;

CREATE  TABLE IF NOT EXISTS `imobiliaria`.`imovel` (
  `idimoveis` INT NOT NULL AUTO_INCREMENT ,
  `endereco_idendereco` INT NOT NULL ,
  `valor` INT NOT NULL ,
  `descricao` VARCHAR(1000) NOT NULL ,
  `tipo_imovel_idtipo_imovel` INT NOT NULL ,
  `tipo_negocio_idtipo_negocio` INT NOT NULL ,
  `imagem_idimagem` INT NOT NULL ,
  `status` TINYINT(1) NOT NULL ,
  PRIMARY KEY (`idimoveis`) ,
  INDEX `fk_imovel_endereco1_idx` (`endereco_idendereco` ASC) ,
  INDEX `fk_imovel_tipo_imovel1_idx` (`tipo_imovel_idtipo_imovel` ASC) ,
  INDEX `fk_imovel_tipo_negocio1_idx` (`tipo_negocio_idtipo_negocio` ASC) ,
  INDEX `fk_imovel_imagem1_idx` (`imagem_idimagem` ASC) ,
  CONSTRAINT `fk_imovel_endereco1`
    FOREIGN KEY (`endereco_idendereco` )
    REFERENCES `imobiliaria`.`endereco` (`idendereco` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_imovel_tipo_imovel1`
    FOREIGN KEY (`tipo_imovel_idtipo_imovel` )
    REFERENCES `imobiliaria`.`tipo_imovel` (`idtipo_imovel` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_imovel_tipo_negocio1`
    FOREIGN KEY (`tipo_negocio_idtipo_negocio` )
    REFERENCES `imobiliaria`.`tipo_negocio` (`idtipo_negocio` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_imovel_imagem1`
    FOREIGN KEY (`imagem_idimagem` )
    REFERENCES `imobiliaria`.`imagem` (`idimagem` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `imobiliaria`.`proprietario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `imobiliaria`.`proprietario` ;

CREATE  TABLE IF NOT EXISTS `imobiliaria`.`proprietario` (
  `idproprietario` INT NOT NULL AUTO_INCREMENT ,
  `endereco_idendereco` INT NOT NULL ,
  `nome` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`idproprietario`) ,
  INDEX `fk_proprietario_endereco1_idx` (`endereco_idendereco` ASC) ,
  CONSTRAINT `fk_proprietario_endereco1`
    FOREIGN KEY (`endereco_idendereco` )
    REFERENCES `imobiliaria`.`endereco` (`idendereco` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `imobiliaria`.`imovel_possui_proprietario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `imobiliaria`.`imovel_possui_proprietario` ;

CREATE  TABLE IF NOT EXISTS `imobiliaria`.`imovel_possui_proprietario` (
  `imovel_idimoveis` INT NOT NULL ,
  `proprietario_idproprietario` INT NOT NULL ,
  `status` TINYINT(1) NULL ,
  PRIMARY KEY (`imovel_idimoveis`, `proprietario_idproprietario`) ,
  INDEX `fk_imovel_has_proprietario_proprietario1_idx` (`proprietario_idproprietario` ASC) ,
  INDEX `fk_imovel_has_proprietario_imovel1_idx` (`imovel_idimoveis` ASC) ,
  CONSTRAINT `fk_imovel_has_proprietario_imovel1`
    FOREIGN KEY (`imovel_idimoveis` )
    REFERENCES `imobiliaria`.`imovel` (`idimoveis` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_imovel_has_proprietario_proprietario1`
    FOREIGN KEY (`proprietario_idproprietario` )
    REFERENCES `imobiliaria`.`proprietario` (`idproprietario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `imobiliaria`.`contato`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `imobiliaria`.`contato` ;

CREATE  TABLE IF NOT EXISTS `imobiliaria`.`contato` (
  `idcontato` INT NOT NULL AUTO_INCREMENT ,
  `numero` VARCHAR(45) NULL ,
  `status` TINYINT(1) NULL ,
  PRIMARY KEY (`idcontato`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `imobiliaria`.`proprietario_possui_contato`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `imobiliaria`.`proprietario_possui_contato` ;

CREATE  TABLE IF NOT EXISTS `imobiliaria`.`proprietario_possui_contato` (
  `proprietario_idproprietario` INT NOT NULL ,
  `contato_idcontato` INT NOT NULL ,
  PRIMARY KEY (`proprietario_idproprietario`, `contato_idcontato`) ,
  INDEX `fk_proprietario_has_contato_contato1_idx` (`contato_idcontato` ASC) ,
  INDEX `fk_proprietario_has_contato_proprietario1_idx` (`proprietario_idproprietario` ASC) ,
  CONSTRAINT `fk_proprietario_has_contato_proprietario1`
    FOREIGN KEY (`proprietario_idproprietario` )
    REFERENCES `imobiliaria`.`proprietario` (`idproprietario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_proprietario_has_contato_contato1`
    FOREIGN KEY (`contato_idcontato` )
    REFERENCES `imobiliaria`.`contato` (`idcontato` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `imobiliaria`.`estado`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `imobiliaria`.`estado` ;

CREATE  TABLE IF NOT EXISTS `imobiliaria`.`estado` (
  `idestados` INT NOT NULL AUTO_INCREMENT ,
  `nome_estado` VARCHAR(45) NOT NULL ,
  `sigla` VARCHAR(2) NOT NULL ,
  `capital` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`idestados`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `imobiliaria`.`estado_possui_endereco`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `imobiliaria`.`estado_possui_endereco` ;

CREATE  TABLE IF NOT EXISTS `imobiliaria`.`estado_possui_endereco` (
  `estados_idestados` INT NOT NULL ,
  `endereco_idendereco` INT NOT NULL ,
  PRIMARY KEY (`estados_idestados`, `endereco_idendereco`) ,
  INDEX `fk_estados_has_endereco_endereco1_idx` (`endereco_idendereco` ASC) ,
  INDEX `fk_estados_has_endereco_estados1_idx` (`estados_idestados` ASC) ,
  CONSTRAINT `fk_estados_has_endereco_estados1`
    FOREIGN KEY (`estados_idestados` )
    REFERENCES `imobiliaria`.`estado` (`idestados` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_estados_has_endereco_endereco1`
    FOREIGN KEY (`endereco_idendereco` )
    REFERENCES `imobiliaria`.`endereco` (`idendereco` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `imobiliaria` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `imobiliaria`.`tipo_imovel`
-- -----------------------------------------------------
START TRANSACTION;
USE `imobiliaria`;
INSERT INTO `imobiliaria`.`tipo_imovel` (`idtipo_imovel`, `descricao_tipo_imovel`) VALUES (1, 'casa');
INSERT INTO `imobiliaria`.`tipo_imovel` (`idtipo_imovel`, `descricao_tipo_imovel`) VALUES (2, 'apartamento');
INSERT INTO `imobiliaria`.`tipo_imovel` (`idtipo_imovel`, `descricao_tipo_imovel`) VALUES (3, 'kitnet');
INSERT INTO `imobiliaria`.`tipo_imovel` (`idtipo_imovel`, `descricao_tipo_imovel`) VALUES (4, 'sala comercial');

COMMIT;

-- -----------------------------------------------------
-- Data for table `imobiliaria`.`tipo_negocio`
-- -----------------------------------------------------
START TRANSACTION;
USE `imobiliaria`;
INSERT INTO `imobiliaria`.`tipo_negocio` (`idtipo_negocio`, `descricao_tipo_negocio`) VALUES (1, 'venda');
INSERT INTO `imobiliaria`.`tipo_negocio` (`idtipo_negocio`, `descricao_tipo_negocio`) VALUES (2, 'locacao');

COMMIT;

-- -----------------------------------------------------
-- Data for table `imobiliaria`.`estado`
-- -----------------------------------------------------
START TRANSACTION;
USE `imobiliaria`;
INSERT INTO `imobiliaria`.`estado` (`idestados`, `nome_estado`, `sigla`, `capital`) VALUES (1, 'Acre', 'AC', 'Rio Branco');
INSERT INTO `imobiliaria`.`estado` (`idestados`, `nome_estado`, `sigla`, `capital`) VALUES (2, 'Alagoas', 'AL', 'Maceió');
INSERT INTO `imobiliaria`.`estado` (`idestados`, `nome_estado`, `sigla`, `capital`) VALUES (3, 'Amapá', 'AP', 'Macapá');
INSERT INTO `imobiliaria`.`estado` (`idestados`, `nome_estado`, `sigla`, `capital`) VALUES (4, 'Amazonas', 'AM', 'Manaus');
INSERT INTO `imobiliaria`.`estado` (`idestados`, `nome_estado`, `sigla`, `capital`) VALUES (5, 'Bahia', 'BA', 'Salvador');
INSERT INTO `imobiliaria`.`estado` (`idestados`, `nome_estado`, `sigla`, `capital`) VALUES (6, 'Ceará', 'CE', 'Fortaleza');
INSERT INTO `imobiliaria`.`estado` (`idestados`, `nome_estado`, `sigla`, `capital`) VALUES (7, 'Distrito Federal', 'DF', 'Brasília');
INSERT INTO `imobiliaria`.`estado` (`idestados`, `nome_estado`, `sigla`, `capital`) VALUES (8, 'Espírito Santo', 'ES', 'Vitória');
INSERT INTO `imobiliaria`.`estado` (`idestados`, `nome_estado`, `sigla`, `capital`) VALUES (9, 'Goiás', 'GO', 'Goiânia');
INSERT INTO `imobiliaria`.`estado` (`idestados`, `nome_estado`, `sigla`, `capital`) VALUES (10, 'Maranhão', 'MA', 'São Luís');
INSERT INTO `imobiliaria`.`estado` (`idestados`, `nome_estado`, `sigla`, `capital`) VALUES (11, 'Mato Grosso', 'MT', 'Cuiabá');
INSERT INTO `imobiliaria`.`estado` (`idestados`, `nome_estado`, `sigla`, `capital`) VALUES (12, 'Mato Grosso do Sul', 'MS', 'Campo Grande');
INSERT INTO `imobiliaria`.`estado` (`idestados`, `nome_estado`, `sigla`, `capital`) VALUES (13, 'Minas Gerais', 'MG', 'Belo Horizonte');
INSERT INTO `imobiliaria`.`estado` (`idestados`, `nome_estado`, `sigla`, `capital`) VALUES (14, 'Pará', 'PA', 'Belém');
INSERT INTO `imobiliaria`.`estado` (`idestados`, `nome_estado`, `sigla`, `capital`) VALUES (15, 'Paraíba', 'PB', 'João Pessoa');
INSERT INTO `imobiliaria`.`estado` (`idestados`, `nome_estado`, `sigla`, `capital`) VALUES (16, 'Paraná', 'PR', 'Curitiba');
INSERT INTO `imobiliaria`.`estado` (`idestados`, `nome_estado`, `sigla`, `capital`) VALUES (17, 'Pernambuco', 'PE', 'Recife');
INSERT INTO `imobiliaria`.`estado` (`idestados`, `nome_estado`, `sigla`, `capital`) VALUES (18, 'Piauí', 'PI', 'Teresina');
INSERT INTO `imobiliaria`.`estado` (`idestados`, `nome_estado`, `sigla`, `capital`) VALUES (19, 'Rio de Janeiro', 'RJ', 'Rio de Janeiro');
INSERT INTO `imobiliaria`.`estado` (`idestados`, `nome_estado`, `sigla`, `capital`) VALUES (20, 'Rio Grande do Norte', 'RN', 'Natal');
INSERT INTO `imobiliaria`.`estado` (`idestados`, `nome_estado`, `sigla`, `capital`) VALUES (21, 'Rio Grande do Sul', 'RS', 'Porto Alegre');
INSERT INTO `imobiliaria`.`estado` (`idestados`, `nome_estado`, `sigla`, `capital`) VALUES (22, 'Rondônia', 'RO', 'Porto Velho');
INSERT INTO `imobiliaria`.`estado` (`idestados`, `nome_estado`, `sigla`, `capital`) VALUES (23, 'Roraima', 'RR', 'Boa Vista');
INSERT INTO `imobiliaria`.`estado` (`idestados`, `nome_estado`, `sigla`, `capital`) VALUES (24, 'Santa Catarina', 'SC', 'Florianópolis');
INSERT INTO `imobiliaria`.`estado` (`idestados`, `nome_estado`, `sigla`, `capital`) VALUES (25, 'São Paulo', 'SP', 'São Paulo');
INSERT INTO `imobiliaria`.`estado` (`idestados`, `nome_estado`, `sigla`, `capital`) VALUES (26, 'Sergipe', 'SE', 'Aracaju');
INSERT INTO `imobiliaria`.`estado` (`idestados`, `nome_estado`, `sigla`, `capital`) VALUES (27, 'Tocantins', 'TO', 'Palmas');

COMMIT;
