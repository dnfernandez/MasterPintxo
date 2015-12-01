-- MySQL Workbench Forward Engineering-- MySQL Script generated by MySQL Workbench
-- vie 20 nov 2015 12:07:45 CET
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema G_31MasterPintxo
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `G_31MasterPintxo` ;

-- -----------------------------------------------------
-- Schema G_31MasterPintxo
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `G_31MasterPintxo` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `G_31MasterPintxo` ;

-- -----------------------------------------------------
-- Table `G_31MasterPintxo`.`Establecimiento`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `G_31MasterPintxo`.`Establecimiento` ;

CREATE TABLE IF NOT EXISTS `G_31MasterPintxo`.`Establecimiento` (
  `nombreE` VARCHAR(30) NOT NULL COMMENT '',
  `direccionE` VARCHAR(45) NOT NULL COMMENT '',
  `nif` VARCHAR(9) NOT NULL COMMENT '',
  `contrasenhaE` VARCHAR(45) NOT NULL COMMENT '',
  `telfE` VARCHAR(9) NOT NULL COMMENT '',
  PRIMARY KEY (`nif`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `G_31MasterPintxo`.`Pincho`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `G_31MasterPintxo`.`Pincho` ;

CREATE TABLE IF NOT EXISTS `G_31MasterPintxo`.`Pincho` (
  `idPincho` INT NOT NULL COMMENT '',
  `nombreP` VARCHAR(45) NOT NULL COMMENT '',
  `descripcionP` LONGTEXT NOT NULL COMMENT '',
  `precio` VARCHAR(4) NOT NULL COMMENT '',
  `concursante` TINYINT(1) NOT NULL DEFAULT 0 COMMENT '',
  `finalista` TINYINT(1) NOT NULL DEFAULT 0 COMMENT '',
  `Establecimiento_nif` VARCHAR(9) NOT NULL COMMENT '',
  `rutaImagen` VARCHAR(100) NULL COMMENT '',
  `confirmado` TINYINT(1) NOT NULL COMMENT '',
  PRIMARY KEY (`idPincho`)  COMMENT '',
  CONSTRAINT `fk_Pincho_Establecimiento1`
    FOREIGN KEY (`Establecimiento_nif`)
    REFERENCES `G_31MasterPintxo`.`Establecimiento` (`nif`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_Pincho_Establecimiento1_idx` ON `G_31MasterPintxo`.`Pincho` (`Establecimiento_nif` ASC)  COMMENT '';


-- -----------------------------------------------------
-- Table `G_31MasterPintxo`.`Concurso`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `G_31MasterPintxo`.`Concurso` ;

CREATE TABLE IF NOT EXISTS `G_31MasterPintxo`.`Concurso` (
  `nombreC` VARCHAR(45) NOT NULL COMMENT '',
  `descripcionC` LONGTEXT NOT NULL COMMENT '',
  PRIMARY KEY (`nombreC`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `G_31MasterPintxo`.`JuradoPopular`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `G_31MasterPintxo`.`JuradoPopular` ;

CREATE TABLE IF NOT EXISTS `G_31MasterPintxo`.`JuradoPopular` (
  `nombreJP` VARCHAR(20) NOT NULL COMMENT '',
  `dniJP` VARCHAR(9) NOT NULL COMMENT '',
  `direccion` VARCHAR(45) NOT NULL COMMENT '',
  `cp` INT NOT NULL COMMENT '',
  `contrasenhaJP` VARCHAR(45) NOT NULL COMMENT '',
  `apellidosJP` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`dniJP`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `G_31MasterPintxo`.`Premio`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `G_31MasterPintxo`.`Premio` ;

CREATE TABLE IF NOT EXISTS `G_31MasterPintxo`.`Premio` (
  `codigoPremio` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `tipoPremio` VARCHAR(45) NOT NULL COMMENT '',
  `nombrePremio` VARCHAR(45) NOT NULL COMMENT '',
  `descripcionPremio` LONGTEXT NOT NULL COMMENT '',
  `JuradoPopular_dniJP` VARCHAR(9) NULL COMMENT '',
  PRIMARY KEY (`codigoPremio`)  COMMENT '',
  CONSTRAINT `fk_Premio_JuradoPopular1`
    FOREIGN KEY (`JuradoPopular_dniJP`)
    REFERENCES `G_31MasterPintxo`.`JuradoPopular` (`dniJP`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_Premio_JuradoPopular1_idx` ON `G_31MasterPintxo`.`Premio` (`JuradoPopular_dniJP` ASC)  COMMENT '';

CREATE UNIQUE INDEX `nombrePremio_UNIQUE` ON `G_31MasterPintxo`.`Premio` (`nombrePremio` ASC)  COMMENT '';


-- -----------------------------------------------------
-- Table `G_31MasterPintxo`.`Codigo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `G_31MasterPintxo`.`Codigo` ;

CREATE TABLE IF NOT EXISTS `G_31MasterPintxo`.`Codigo` (
  `idCodigo` INT NOT NULL COMMENT '',
  `usado` TINYINT(1) NOT NULL DEFAULT 0 COMMENT '',
  `JuradoPopular_dniJP` VARCHAR(9) NOT NULL DEFAULT '000000000' COMMENT '',
  `Establecimiento_nif` VARCHAR(9) NOT NULL COMMENT '',
  PRIMARY KEY (`idCodigo`, `JuradoPopular_dniJP`, `Establecimiento_nif`)  COMMENT '',
  CONSTRAINT `fk_Codigo_JuradoPopular1`
    FOREIGN KEY (`JuradoPopular_dniJP`)
    REFERENCES `G_31MasterPintxo`.`JuradoPopular` (`dniJP`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Codigo_Establecimiento1`
    FOREIGN KEY (`Establecimiento_nif`)
    REFERENCES `G_31MasterPintxo`.`Establecimiento` (`nif`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_Codigo_JuradoPopular1_idx` ON `G_31MasterPintxo`.`Codigo` (`JuradoPopular_dniJP` ASC)  COMMENT '';

CREATE INDEX `fk_Codigo_Establecimiento1_idx` ON `G_31MasterPintxo`.`Codigo` (`Establecimiento_nif` ASC)  COMMENT '';


-- -----------------------------------------------------
-- Table `G_31MasterPintxo`.`JuradoProfesional`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `G_31MasterPintxo`.`JuradoProfesional` ;

CREATE TABLE IF NOT EXISTS `G_31MasterPintxo`.`JuradoProfesional` (
  `dniJPro` VARCHAR(9) NOT NULL COMMENT '',
  `contrasenhaJPro` VARCHAR(45) NOT NULL COMMENT '',
  `nombreJPro` VARCHAR(65) NOT NULL COMMENT '',
  `telefJPro` VARCHAR(9) NOT NULL COMMENT '',
  PRIMARY KEY (`dniJPro`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `G_31MasterPintxo`.`Organizador`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `G_31MasterPintxo`.`Organizador` ;

CREATE TABLE IF NOT EXISTS `G_31MasterPintxo`.`Organizador` (
  `idOrganizador` INT NOT NULL COMMENT '',
  `contrasenhaOrganizador` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`idOrganizador`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `G_31MasterPintxo`.`Premio_Entrega_Pincho`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `G_31MasterPintxo`.`Premio_Entrega_Pincho` ;

CREATE TABLE IF NOT EXISTS `G_31MasterPintxo`.`Premio_Entrega_Pincho` (
  `Premio_codigoPremio` INT NOT NULL COMMENT '',
  `Pincho_idPincho` INT NOT NULL COMMENT '',
  PRIMARY KEY (`Premio_codigoPremio`, `Pincho_idPincho`)  COMMENT '',
  CONSTRAINT `fk_Premio_has_Pincho_Premio`
    FOREIGN KEY (`Premio_codigoPremio`)
    REFERENCES `G_31MasterPintxo`.`Premio` (`codigoPremio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Premio_has_Pincho_Pincho1`
    FOREIGN KEY (`Pincho_idPincho`)
    REFERENCES `G_31MasterPintxo`.`Pincho` (`idPincho`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_Premio_has_Pincho_Pincho1_idx` ON `G_31MasterPintxo`.`Premio_Entrega_Pincho` (`Pincho_idPincho` ASC)  COMMENT '';

CREATE INDEX `fk_Premio_has_Pincho_Premio_idx` ON `G_31MasterPintxo`.`Premio_Entrega_Pincho` (`Premio_codigoPremio` ASC)  COMMENT '';


-- -----------------------------------------------------
-- Table `G_31MasterPintxo`.`JuradoPopular_Vota_Pincho`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `G_31MasterPintxo`.`JuradoPopular_Vota_Pincho` ;

CREATE TABLE IF NOT EXISTS `G_31MasterPintxo`.`JuradoPopular_Vota_Pincho` (
  `JuradoPopular_dniJP` VARCHAR(9) NOT NULL COMMENT '',
  `Pincho_idPincho` INT NOT NULL COMMENT '',
  `numVotos` INT NOT NULL DEFAULT 0 COMMENT '',
  PRIMARY KEY (`JuradoPopular_dniJP`, `Pincho_idPincho`)  COMMENT '',
  CONSTRAINT `fk_JuradoPopular_has_Pincho_JuradoPopular1`
    FOREIGN KEY (`JuradoPopular_dniJP`)
    REFERENCES `G_31MasterPintxo`.`JuradoPopular` (`dniJP`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_JuradoPopular_has_Pincho_Pincho1`
    FOREIGN KEY (`Pincho_idPincho`)
    REFERENCES `G_31MasterPintxo`.`Pincho` (`idPincho`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_JuradoPopular_has_Pincho_Pincho1_idx` ON `G_31MasterPintxo`.`JuradoPopular_Vota_Pincho` (`Pincho_idPincho` ASC)  COMMENT '';

CREATE INDEX `fk_JuradoPopular_has_Pincho_JuradoPopular1_idx` ON `G_31MasterPintxo`.`JuradoPopular_Vota_Pincho` (`JuradoPopular_dniJP` ASC)  COMMENT '';


-- -----------------------------------------------------
-- Table `G_31MasterPintxo`.`Pincho_Elegido_JP`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `G_31MasterPintxo`.`Pincho_Elegido_JP` ;

CREATE TABLE IF NOT EXISTS `G_31MasterPintxo`.`Pincho_Elegido_JP` (
  `Pincho_idPincho` INT NOT NULL COMMENT '',
  `JuradoProfesional_dniJPro` VARCHAR(9) NOT NULL COMMENT '',
  `valoracion` TINYINT(1) NOT NULL COMMENT '',
  PRIMARY KEY (`Pincho_idPincho`, `JuradoProfesional_dniJPro`)  COMMENT '',
  CONSTRAINT `fk_Pincho_has_JuradoProfesional_Pincho1`
    FOREIGN KEY (`Pincho_idPincho`)
    REFERENCES `G_31MasterPintxo`.`Pincho` (`idPincho`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Pincho_has_JuradoProfesional_JuradoProfesional1`
    FOREIGN KEY (`JuradoProfesional_dniJPro`)
    REFERENCES `G_31MasterPintxo`.`JuradoProfesional` (`dniJPro`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_Pincho_has_JuradoProfesional_JuradoProfesional1_idx` ON `G_31MasterPintxo`.`Pincho_Elegido_JP` (`JuradoProfesional_dniJPro` ASC)  COMMENT '';

CREATE INDEX `fk_Pincho_has_JuradoProfesional_Pincho1_idx` ON `G_31MasterPintxo`.`Pincho_Elegido_JP` (`Pincho_idPincho` ASC)  COMMENT '';


-- -----------------------------------------------------
-- Table `G_31MasterPintxo`.`Pincho_Finalista_JuradoProfesional`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `G_31MasterPintxo`.`Pincho_Finalista_JuradoProfesional` ;

CREATE TABLE IF NOT EXISTS `G_31MasterPintxo`.`Pincho_Finalista_JuradoProfesional` (
  `Pincho_idPincho` INT NOT NULL COMMENT '',
  `JuradoProfesional_dniJPro` VARCHAR(9) NOT NULL COMMENT '',
  `puntuacion` VARCHAR(200) NULL COMMENT '',
  PRIMARY KEY (`Pincho_idPincho`, `JuradoProfesional_dniJPro`)  COMMENT '',
  CONSTRAINT `fk_Pincho_has_JuradoProfesional_Pincho2`
    FOREIGN KEY (`Pincho_idPincho`)
    REFERENCES `G_31MasterPintxo`.`Pincho` (`idPincho`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Pincho_has_JuradoProfesional_JuradoProfesional2`
    FOREIGN KEY (`JuradoProfesional_dniJPro`)
    REFERENCES `G_31MasterPintxo`.`JuradoProfesional` (`dniJPro`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_Pincho_has_JuradoProfesional_JuradoProfesional2_idx` ON `G_31MasterPintxo`.`Pincho_Finalista_JuradoProfesional` (`JuradoProfesional_dniJPro` ASC)  COMMENT '';

CREATE INDEX `fk_Pincho_has_JuradoProfesional_Pincho2_idx` ON `G_31MasterPintxo`.`Pincho_Finalista_JuradoProfesional` (`Pincho_idPincho` ASC)  COMMENT '';

-- -----------------------------------------------------
-- Table `G_31MasterPintxo`.`Baneos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `G_31MasterPintxo`.`Baneos` ;

CREATE TABLE IF NOT EXISTS `G_31MasterPintxo`.`Baneos` (
  `idUsuario` VARCHAR(9) NOT NULL COMMENT '',
  PRIMARY KEY (`idUsuario`)  COMMENT '')
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `G_31MasterPintxo`.`Comentario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `G_31MasterPintxo`.`Comentario` ;

CREATE TABLE IF NOT EXISTS `G_31MasterPintxo`.`Comentario` (
  `idComentario` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `JuradoPopular_dniJP` VARCHAR(9) NOT NULL COMMENT '',
  `Pincho_idPincho` INT NOT NULL COMMENT '',
  `nombreJP` VARCHAR(20) NOT NULL COMMENT '',
  `comentario` TEXT NOT NULL COMMENT '',
  PRIMARY KEY (`idComentario`)  COMMENT '',
  CONSTRAINT `fk_JuradoPopular_has_Pincho_JuradoPopular2`
    FOREIGN KEY (`JuradoPopular_dniJP`)
    REFERENCES `G_31MasterPintxo`.`JuradoPopular` (`dniJP`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_JuradoPopular_has_Pincho_Pincho2`
    FOREIGN KEY (`Pincho_idPincho`)
    REFERENCES `G_31MasterPintxo`.`Pincho` (`idPincho`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_JuradoPopular_has_Pincho_Pincho2_idx` ON `G_31MasterPintxo`.`Comentario` (`Pincho_idPincho` ASC)  COMMENT '';

CREATE INDEX `fk_JuradoPopular_has_Pincho_JuradoPopular2_idx` ON `G_31MasterPintxo`.`Comentario` (`JuradoPopular_dniJP` ASC)  COMMENT '';




SET SQL_MODE = '';
GRANT USAGE ON *.* TO adminG31;
 DROP USER adminG31;
SET SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';
CREATE USER 'adminG31' IDENTIFIED BY 'abc123.';

GRANT ALL ON `G_31MasterPintxo`.* TO 'adminG31';

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

INSERT INTO `G_31MasterPintxo`.`Organizador` (`idOrganizador`, `contrasenhaOrganizador`) VALUES ('12345', 'abc123');

INSERT INTO `G_31MasterPintxo`.`Concurso` (`nombreC`, `descripcionC`) VALUES ('MasterPintxo', 'MasterPintxo es un concurso de pinchos cuyo objetivo es ayudar a los establecimientos locales a promocionarse presentando sus propuestas de pinchos, haciendo que voten los usuarios al probar eses pinchos, Son cosas que pasan. De repente un amigo tiene la feliz idea de organizar un concurso de pinchos en su casa y todos los miembros del grupo se ven obligados a llevar un plato si quieren unirse a la velada. ¡Horror! ¿Cómo presentarse con una propuesta digna sin ser un experto en cocina? ¿Qué hacer si queremos ganar?

Tranquilidad. Participar es muy fácil y ganar sin pasar demasiado tiempo entre fogones no resulta tan complicado. Basta con menos de media hora para preparar un pincho aparente con los que asegurarte el podio. Y si no te lo crees, sólo tienes que echar un vistazo a estas 23 propuestas de Cookpad. ');

INSERT INTO `G_31MasterPintxo`.`Establecimiento` (`nombreE`, `direccionE`, `nif`, `contrasenhaE`, `telfE`) VALUES ('Bar Manolo', 'C. Progreso, 32, Ourense', 'A41234567', 'abc123', '988000001');
INSERT INTO `G_31MasterPintxo`.`Establecimiento` (`nombreE`, `direccionE`, `nif`, `contrasenhaE`, `telfE`) VALUES ('Tasca Jose Luis', 'Praza do Correxidor, 12, Ourense', 'A41234568', 'abc123', '988000002');
INSERT INTO `G_31MasterPintxo`.`Establecimiento` (`nombreE`, `direccionE`, `nif`, `contrasenhaE`, `telfE`) VALUES ('La estación de Roman', 'Rua de San Mamede, 4, Ourense', 'A41234569', 'abc123', '988000003');
INSERT INTO `G_31MasterPintxo`.`Establecimiento` (`nombreE`, `direccionE`, `nif`, `contrasenhaE`, `telfE`) VALUES ('Portonovo', 'Praza das Mercedes, Ourense', 'A41234570', 'abc123', '988000004');
INSERT INTO `G_31MasterPintxo`.`Establecimiento` (`nombreE`, `direccionE`, `nif`, `contrasenhaE`, `telfE`) VALUES ('O comellon', 'Rua Lepanto, 16, Ourense', 'A41234571', 'abc123', '988000005');
INSERT INTO `G_31MasterPintxo`.`Establecimiento` (`nombreE`, `direccionE`, `nif`, `contrasenhaE`, `telfE`) VALUES ('La Gula', 'Rua Perna Corneira, 15, Ourense', 'A41234572', 'abc123', '988000006');
INSERT INTO `G_31MasterPintxo`.`Establecimiento` (`nombreE`, `direccionE`, `nif`, `contrasenhaE`, `telfE`) VALUES ('Bar Titanic', 'Avd. Marín, 23, Ourense', 'A41234573', 'abc123', '988000007');
INSERT INTO `G_31MasterPintxo`.`Establecimiento` (`nombreE`, `direccionE`, `nif`, `contrasenhaE`, `telfE`) VALUES ('Bar Cenas', 'Avd. de Portugal,17, Ourense', 'A41234574', 'abc123', '988000008');
INSERT INTO `G_31MasterPintxo`.`Establecimiento` (`nombreE`, `direccionE`, `nif`, `contrasenhaE`, `telfE`) VALUES ('El graduado', 'Avd. de Zamora, 46, Ourense', 'A41234575', 'abc123', '988000009');
INSERT INTO `G_31MasterPintxo`.`Establecimiento` (`nombreE`, `direccionE`, `nif`, `contrasenhaE`, `telfE`) VALUES ('Bar Simpson', 'Rua San Miguel, 10, Ourense', 'A41234576', 'abc123', '988000010');

INSERT INTO `G_31MasterPintxo`.`Establecimiento` (`nombreE`, `direccionE`, `nif`, `contrasenhaE`, `telfE`) VALUES ('Ataranza', 'C. Progreso 34, Ourense', 'A41234577', 'abc123', '988000011');
INSERT INTO `G_31MasterPintxo`.`Establecimiento` (`nombreE`, `direccionE`, `nif`, `contrasenhaE`, `telfE`) VALUES ('Barallete', 'Lepanto, 12, Ourense', 'A41234578', 'abc123', '988000012');
INSERT INTO `G_31MasterPintxo`.`Establecimiento` (`nombreE`, `direccionE`, `nif`, `contrasenhaE`, `telfE`) VALUES ('Bar Ideas', 'Rua de San Mamede, 20, Ourense', 'A41234579', 'abc123', '988000013');
INSERT INTO `G_31MasterPintxo`.`Establecimiento` (`nombreE`, `direccionE`, `nif`, `contrasenhaE`, `telfE`) VALUES ('Mata-o bicho', 'Praza das Mercedes, 7, Ourense' , 'A41234580', 'abc123', '988000014');
INSERT INTO `G_31MasterPintxo`.`Establecimiento` (`nombreE`, `direccionE`, `nif`, `contrasenhaE`, `telfE`) VALUES ('Serrano de Lepanto', 'Rua Lepanto, 15, Ourense', 'A41234581', 'abc123', '988000015');
INSERT INTO `G_31MasterPintxo`.`Establecimiento` (`nombreE`, `direccionE`, `nif`, `contrasenhaE`, `telfE`) VALUES ('Pincho mas', 'Rua Perna Corneira, 10, Ourense', 'A41234582', 'abc123', '988000016');
INSERT INTO `G_31MasterPintxo`.`Establecimiento` (`nombreE`, `direccionE`, `nif`, `contrasenhaE`, `telfE`) VALUES ('Tapería Monterrey', 'Avd. Marín, 27, Ourense', 'A41234583', 'abc123', '988000017');
INSERT INTO `G_31MasterPintxo`.`Establecimiento` (`nombreE`, `direccionE`, `nif`, `contrasenhaE`, `telfE`) VALUES ('Baccus XII', 'Avd. de Portugal,11, Ourense', 'A41234584', 'abc123', '988000018');
INSERT INTO `G_31MasterPintxo`.`Establecimiento` (`nombreE`, `direccionE`, `nif`, `contrasenhaE`, `telfE`) VALUES ('Cervexaría O Moucho', 'Avd. de Zamora, 23, Ourense', 'A41234585', 'abc123', '988000019');
INSERT INTO `G_31MasterPintxo`.`Establecimiento` (`nombreE`, `direccionE`, `nif`, `contrasenhaE`, `telfE`) VALUES ('Casa María Andrea', 'Rua San Miguel, 14, Ourense', 'A41234586', 'abc123', '988000020');




INSERT INTO `G_31MasterPintxo`.`Pincho` (`idPincho`, `nombreP`, `descripcionP`, `precio`, `concursante`, `finalista`, `Establecimiento_nif`, `rutaImagen`, `confirmado`) 
VALUES ('1', 'Chorizo de la casa', 'Pincho de chorizo sobre un crujiente de almendras ', '1', '0', '0', 'A41234574', './images-pinchos/pincho1.jpg', '0');

INSERT INTO `G_31MasterPintxo`.`Pincho` (`idPincho`, `nombreP`, `descripcionP`, `precio`, `concursante`, `finalista`, `Establecimiento_nif`, `rutaImagen`, `confirmado`) 
VALUES ('2', 'La gula', 'Tempura de makis con froitas de tempada e atún vermello con chuvia de sésamo tricolor e prebe de queixo de Arzúa. Come Ourense / Celíacos ', '2', '0', '0', 'A41234567', './images-pinchos/pincho2.jpg', '0');

INSERT INTO `G_31MasterPintxo`.`Pincho` (`idPincho`, `nombreP`, `descripcionP`, `precio`, `concursante`, `finalista`, `Establecimiento_nif`, `rutaImagen`, `confirmado`) 
VALUES ('3', 'El horno', 'Empanadilla enfornada de cogomelos, mestura de vexetais e queixo. Come Ourense ', '1.5', '1', '0', 'A41234568', './images-pinchos/pincho3.jpg', '0');

INSERT INTO `G_31MasterPintxo`.`Pincho` (`idPincho`, `nombreP`, `descripcionP`, `precio`, `concursante`, `finalista`, `Establecimiento_nif`, `rutaImagen`, `confirmado`) 
VALUES ('4', 'Duque', 'Pataca, gambas, cogomelos, ovo e queixo fundido. ', '2', '1', '0', 'A41234569', './images-pinchos/pincho4.jpg', '0');

INSERT INTO `G_31MasterPintxo`.`Pincho` (`idPincho`, `nombreP`, `descripcionP`, `precio`, `concursante`, `finalista`, `Establecimiento_nif`, `rutaImagen`, `confirmado`) 
VALUES ('5', 'Fuentefria', 'Cazoleta de pan con raxo e queixo con pemento de piquillo e flor de castaña. ', '1', '1', '1', 'A41234570', './images-pinchos/pincho5.jpg', '0');

INSERT INTO `G_31MasterPintxo`.`Pincho` (`idPincho`, `nombreP`, `descripcionP`, `precio`, `concursante`, `finalista`, `Establecimiento_nif`, `rutaImagen`, `confirmado`) 
VALUES ('6', 'O Pote', '
Tortiña de trigo á grella reenchida dun escalfado de cebola, allo porro, allo e pemento verde con champiñóns e un pouco de queixo.', '1.75', '1', '1', 'A41234571', './images-pinchos/pincho6.jpg', '0');

INSERT INTO `G_31MasterPintxo`.`Pincho` (`idPincho`, `nombreP`, `descripcionP`, `precio`, `concursante`, `finalista`, `Establecimiento_nif`, `rutaImagen`, `confirmado`) 
VALUES ('7', 'Merys', 'Picaña con crema de castaña, arroz salvaxe e cogomelos. ', '2', '0', '0', 'A41234572', './images-pinchos/pincho7.jpg', '1');

INSERT INTO `G_31MasterPintxo`.`Pincho` (`idPincho`, `nombreP`, `descripcionP`, `precio`, `concursante`, `finalista`, `Establecimiento_nif`, `rutaImagen`, `confirmado`) 
VALUES ('8', 'Serranito', 'Cogomelos variados e estofados con salchicha e un petisco de mostaza. ', '2', '0', '0', 'A41234573', './images-pinchos/pincho8.jpg', '1');

INSERT INTO `G_31MasterPintxo`.`Pincho` (`idPincho`, `nombreP`, `descripcionP`, `precio`, `concursante`, `finalista`, `Establecimiento_nif`, `rutaImagen`, `confirmado`) 
VALUES ('9', 'Rulo Silvestre', 'Rulo de carne galega sobre cama de berenxena, cuberto de crema de cogomelos silvestres e tortaleta reenchida de mixto de cogomelos e trigueiro. 
De 10.30 a 15.30 e de 19.30 a 24h', '2', '0', '0', 'A41234576', './images-pinchos/pincho9.jpg', '0');

INSERT INTO `G_31MasterPintxo`.`Pincho` (`idPincho`, `nombreP`, `descripcionP`, `precio`, `concursante`, `finalista`, `Establecimiento_nif`, `rutaImagen`, `confirmado`) 
VALUES ('10', 'Sobremesa de Gofres', 'Gofre feita con cervexa de trigo (apto para celíacos) cuberto de crema doce de castañas e labras de chocolate. 
Todo o día, excepto de 15 a 18 pechado. ', '2', '0', '0', 'A41234577', './images-pinchos/pincho10.jpg', '0');

INSERT INTO `G_31MasterPintxo`.`Pincho` (`idPincho`, `nombreP`, `descripcionP`, `precio`, `concursante`, `finalista`, `Establecimiento_nif`, `rutaImagen`, `confirmado`) 
VALUES ('11', 'Guiso de Outono', 'Tenreira con setas e castañas, graten de pataca e redución de mencía.
De 12 a 16 e de 20 a 2h.', '1.5', '1', '0', 'A41234578', './images-pinchos/pincho11.jpg', '0');

INSERT INTO `G_31MasterPintxo`.`Pincho` (`idPincho`, `nombreP`, `descripcionP`, `precio`, `concursante`, `finalista`, `Establecimiento_nif`, `rutaImagen`, `confirmado`) 
VALUES ('12', 'Del monte a la cazuela', 'Albóndegas de cervo con setas.
De 13 a 16h e de 20h a peche. Martes pechado', '2', '1', '0', 'A41234579', './images-pinchos/pincho12.jpg', '0');

INSERT INTO `G_31MasterPintxo`.`Pincho` (`idPincho`, `nombreP`, `descripcionP`, `precio`, `concursante`, `finalista`, `Establecimiento_nif`, `rutaImagen`, `confirmado`) 
VALUES ('13', 'Empanadilla Perez', 'Empanadilla reenchida de cogomelos con cebola acaramelada e queixo de cabra. 
De 9 a 16 e de 19 a peche. Martes pechado.', '1', '1', '1', 'A41234580', './images-pinchos/pincho13.jpg', '0');

INSERT INTO `G_31MasterPintxo`.`Pincho` (`idPincho`, `nombreP`, `descripcionP`, `precio`, `concursante`, `finalista`, `Establecimiento_nif`, `rutaImagen`, `confirmado`) 
VALUES ('14', 'Un buen Comienzo', 'Solombo con puré de castañas e cogomelos.
De 19 a peche.', '1.75', '1', '1', 'A41234581', './images-pinchos/pincho14.jpg', '0');

INSERT INTO `G_31MasterPintxo`.`Pincho` (`idPincho`, `nombreP`, `descripcionP`, `precio`, `concursante`, `finalista`, `Establecimiento_nif`, `rutaImagen`, `confirmado`) 
VALUES ('15', 'Chulas', 'Chula artesá con crema de boletus e sorpresa de crocante de cabaza.
De 19.30 a peche. Mércores pechado.', '2', '0', '0', 'A41234582', './images-pinchos/pincho15.jpg', '1');

INSERT INTO `G_31MasterPintxo`.`Pincho` (`idPincho`, `nombreP`, `descripcionP`, `precio`, `concursante`, `finalista`, `Establecimiento_nif`, `rutaImagen`, `confirmado`) 
VALUES ('16', 'Espetada Fuentefría', 'Espetada de solombo de boi con boletus e marmelada de tomate da casa.
De 13 a 15.30 e de 20 a peche. ', '2', '0', '0', 'A41234583', './images-pinchos/pincho16.jpg', '1');




INSERT INTO JuradoPopular (nombreJP,dniJP,direccion,cp,contrasenhaJP,apellidosJP) VALUES ("necesario","000000000","es necesario","3214","dfga32wsfs23","muy necesario");
INSERT INTO JuradoPopular (nombreJP,dniJP,direccion,cp,contrasenhaJP,apellidosJP) VALUES ("Bryar","44444444P","Apartado núm.: 580, 8368 Luctus Ctra.","86517","abc123","Bradley"),("Alea","44444445P","Apartado núm.: 369, 1608 Mauris ","89854","abc123","Scott"),("Bell","44444446P","Apartado núm.: 730, 2175 Lectus Ctra.","38174","abc123","Doyle"),("Zelda","44444447P","454-9565 Ut ","00314","abc123","Velasquez"),("Ora","44444448P","446-4973 Cras Avda.","80922","abc123","Soto"),("Vaughan","44444449P","415-671 Fringilla, Carretera","37852","abc123","Ruiz"),("Molly","44444450P","621-9130 Vehicula ","73494","abc123","Navarro"),("Davis","44444451P","Apdo.:690-542 Pede, Ctra.","60156","abc123","Sharpe"),("Fritz","44444452P","Apartado núm.: 430, 6033 Eget Carretera","74067","abc123","Sutton"),("Jack","44444453P","103-8685 Tincidunt Avenida","82604","abc123","Valencia");
INSERT INTO JuradoPopular (nombreJP,dniJP,direccion,cp,contrasenhaJP,apellidosJP) VALUES ("Maite","44444454P","Apdo.:459-572 Sed Avda.","04422","abc123","Barlow"),("Hillary","44444455P","136-3291 Posuere Av.","79291","abc123","Pollard"),("Jameson","44444456P","Apdo.:839-6018 Urna Avda.","87389","abc123","Ware"),("Hyatt","44444457P","Apartado núm.: 228, 138 Aliquet Ctra.","00042","abc123","Howell"),("Harrison","44444458P","Apdo.:395-4148 Eget C.","73152","abc123","Vasquez"),("Ray","44444459P","Apdo.:612-1347 Eu Av.","20345","abc123","Mckinney"),("Germane","44444460P","4294 Enim Calle","96614","abc123","Velez"),("Price","44444461P","3646 Sem, Avda.","59648","abc123","Foreman"),("Rogan","44444462P","341-5892 Nec Avda.","99244","abc123","Davidson"),("Malcolm","44444463P","566-9354 Risus. C/","21039","abc123","Glass");
INSERT INTO JuradoPopular (nombreJP,dniJP,direccion,cp,contrasenhaJP,apellidosJP) VALUES ("Alexander","44444464P","782 Augue Carretera","65965","abc123","Frye"),("Tara","44444465P","Apartado núm.: 404, 4287 Etiam C.","79516","abc123","Ramirez"),("Emerald","44444466P","Apartado núm.: 586, 8962 Gravida. C.","81890","abc123","Bird"),("Amaya","44444467P","516-697 Egestas Avenida","40736","abc123","Mckay"),("Fitzgerald","44444468P","Apartado núm.: 845, 5008 Velit ","22680","abc123","Erickson"),("Lance","44444469P","473-9708 Facilisis Avenida","14926","abc123","Salas"),("Daphne","44444470P","Apdo.:886-6767 Purus Av.","61852","abc123","Whitehead"),("Leonard","44444471P","Apdo.:624-7985 A Calle","25258","abc123","Saunders"),("Wang","44444472P","715-4512 Nulla Calle","00355","abc123","Obrien"),("Stacey","44444473P","Apdo.:533-9821 Quam. C/","09655","abc123","Hull");
INSERT INTO JuradoPopular (nombreJP,dniJP,direccion,cp,contrasenhaJP,apellidosJP) VALUES ("Christian","44444474P","2038 Diam. Carretera","73500","abc123","Carroll"),("Cheryl","44444475P","Apartado núm.: 891, 5937 Molestie Avenida","52107","abc123","Berg"),("Penelope","44444476P","4112 Est. Carretera","76347","abc123","Hurley"),("Lucian","44444477P","4616 Magna. Ctra.","89379","abc123","Wilkerson"),("Bruce","44444478P","Apartado núm.: 268, 7386 Nec, Avenida","26055","abc123","Meyer"),("Mufutau","44444479P","931-3009 Vehicula C.","27885","abc123","Knowles"),("Petra","44444480P","Apdo.:595-7857 Lacinia Avenida","71757","abc123","Hartman"),("Melyssa","44444481P","283-3988 Mauris ","92363","abc123","Haynes"),("Alan","44444482P","899-6311 Aptent ","05031","abc123","Paul"),("Martina","44444483P","974-5715 Tincidunt ","57686","abc123","Mcintosh");
INSERT INTO JuradoPopular (nombreJP,dniJP,direccion,cp,contrasenhaJP,apellidosJP) VALUES ("Ursa","44444484P","5792 At Avenida","50698","abc123","Best"),("Isabelle","44444485P","6822 Posuere Ctra.","88792","abc123","Dean"),("Austin","44444486P","Apartado núm.: 396, 709 Morbi Avda.","05284","abc123","Lindsay"),("Stephanie","44444487P","Apartado núm.: 252, 8389 Senectus Av.","55571","abc123","Noble"),("Irene","44444488P","Apdo.:479-1968 Feugiat Avenida","76014","abc123","Walters"),("Justine","44444489P","Apdo.:961-8608 Enim Ctra.","50196","abc123","Turner"),("Fleur","44444490P","Apdo.:993-9057 Dictum Avda.","11483","abc123","Gill"),("Alexis","44444491P","Apartado núm.: 844, 9830 Leo. Avenida","06202","abc123","Dean"),("Isadora","44444492P","3656 Nulla. Carretera","29039","abc123","Yang"),("Scarlet","44444493P","733 Luctus Ctra.","76173","abc123","Rocha");
INSERT INTO JuradoPopular (nombreJP,dniJP,direccion,cp,contrasenhaJP,apellidosJP) VALUES ("Jonas","44444494P","8180 Fusce C.","60604","abc123","Skinner"),("Neil","44444495P","Apdo.:537-2216 Pede. C.","58037","abc123","Sherman"),("Leilani","44444496P","Apdo.:279-951 Nostra, Avenida","83061","abc123","Hendricks"),("Lacy","44444497P","Apdo.:733-3609 Odio, Calle","17610","abc123","Skinner"),("Tamara","44444498P","937-4552 Egestas, C/","01736","abc123","Vance"),("Orlando","44444499P","Apdo.:362-2115 At, C.","02468","abc123","Mullins"),("Lilah","44444500P","Apdo.:595-5154 Mauris. Avenida","22020","abc123","Gould"),("Tasha","44444501P","Apartado núm.: 883, 3607 Mattis. Avda.","30991","abc123","Gilmore"),("Noelani","44444502P","660-6052 Pretium Carretera","66610","abc123","Fox"),("Tashya","44444503P","Apdo.:549-657 Fringilla Av.","65093","abc123","Herring");
INSERT INTO JuradoPopular (nombreJP,dniJP,direccion,cp,contrasenhaJP,apellidosJP) VALUES ("Ignatius","44444504P","4718 Velit. Carretera","79767","abc123","Roy"),("Kiara","44444505P","722 Auctor C.","04832","abc123","Henry"),("Jordan","44444506P","2604 Facilisis Calle","80707","abc123","Gonzalez"),("Jesse","44444507P","Apdo.:582-3073 Rhoncus. Carretera","30547","abc123","Welch"),("Elliott","44444508P","4970 Magna Avenida","25641","abc123","Huber"),("Louis","44444509P","Apdo.:899-3540 Nisl ","20723","abc123","Sampson"),("Porter","44444510P","765-5182 Lobortis Avenida","19181","abc123","Hobbs"),("Melanie","44444511P","2137 Ligula. Calle","85114","abc123","Morales"),("Burke","44444512P","Apdo.:858-1843 In Avenida","42660","abc123","Fields"),("Cailin","44444513P","3951 Sed Calle","72837","abc123","Clarke");
INSERT INTO JuradoPopular (nombreJP,dniJP,direccion,cp,contrasenhaJP,apellidosJP) VALUES ("Althea","44444514P","Apdo.:688-1530 Erat Avenida","28406","abc123","Nielsen"),("Sonya","44444515P","Apartado núm.: 332, 9056 Fusce Avenida","82189","abc123","Guzman"),("Halee","44444516P","7994 Sociis Avenida","03021","abc123","Carr"),("Kerry","44444517P","868-5706 Cras C.","58329","abc123","Floyd"),("Genevieve","44444518P","991-4179 Ridiculus Avda.","73564","abc123","Puckett"),("Heather","44444519P","7865 Dui C/","82637","abc123","Oliver"),("Steven","44444520P","9876 Montes, C.","00151","abc123","Vega"),("Shay","44444521P","440-1314 Sed C.","94210","abc123","Morris"),("Hannah","44444522P","Apdo.:546-4426 Id, ","47094","abc123","Stark"),("Francesca","44444523P","Apartado núm.: 116, 7834 Nibh ","79064","abc123","Head");
INSERT INTO JuradoPopular (nombreJP,dniJP,direccion,cp,contrasenhaJP,apellidosJP) VALUES ("Orson","44444524P","191-3719 Mollis ","38556","abc123","Noel"),("Perry","44444525P","Apdo.:261-8016 Sed C/","60780","abc123","Mcleod"),("Maia","44444526P","408-5960 Auctor Calle","65217","abc123","Kirby"),("Reece","44444527P","Apdo.:818-5605 Libero. Carretera","29300","abc123","Chan"),("Quincy","44444528P","285-1323 Non Calle","91492","abc123","Bass"),("Charde","44444529P","6993 In Avda.","99749","abc123","Stevenson"),("Brian","44444530P","423-1549 Purus. Ctra.","36944","abc123","Hensley"),("Rae","44444531P","Apdo.:593-1319 Turpis Calle","57863","abc123","Dean"),("Erin","44444532P","Apdo.:468-7229 Cum C/","82250","abc123","Odom"),("Anika","44444533P","Apartado núm.: 997, 8257 Tristique Avda.","25521","abc123","House");
INSERT INTO JuradoPopular (nombreJP,dniJP,direccion,cp,contrasenhaJP,apellidosJP) VALUES ("Joan","44444534P","9630 Egestas Calle","95709","abc123","Potter"),("Donovan","44444535P","8526 Id Avda.","17365","abc123","Owens"),("Tana","44444536P","Apartado núm.: 867, 362 Sed ","39972","abc123","Quinn"),("Martina","44444537P","470-3701 Molestie Av.","66528","abc123","Paul"),("Tamekah","44444538P","Apartado núm.: 508, 6680 Cursus. C.","19318","abc123","Blanchard"),("Chloe","44444539P","9261 Facilisis, C.","47571","abc123","Stark"),("Debra","44444540P","Apartado núm.: 646, 9773 Neque C/","44526","abc123","Lopez"),("Jana","44444541P","Apartado núm.: 387, 3850 Viverra. Avda.","90211","abc123","Kane"),("Darryl","44444542P","1251 Placerat Avda.","01313","abc123","Herman"),("Jack","44444543P","1739 Cursus C.","63999","abc123","Conway");



INSERT INTO JuradoProfesional (nombreJPro,dniJPro,telefJPro,contrasenhaJPro) VALUES ("Gannon Ratliff","44484444D","988309000","abc123"),("Donovan Stevenson","44484445D","988309001","abc123"),("Jeanette Velazquez","44484446D","988309002","abc123"),("Ariana Wiggins","44484447D","988309003","abc123");


INSERT INTO `G_31MasterPintxo`.`codigo` (`idCodigo`, `usado`, `JuradoPopular_dniJP`, `Establecimiento_nif`) VALUES ('111111111', '0', '000000000', 'A41234568');
INSERT INTO `G_31MasterPintxo`.`codigo` (`idCodigo`, `usado`, `JuradoPopular_dniJP`, `Establecimiento_nif`) VALUES ('111111112', '0', '000000000', 'A41234568');
INSERT INTO `G_31MasterPintxo`.`codigo` (`idCodigo`, `usado`, `JuradoPopular_dniJP`, `Establecimiento_nif`) VALUES ('111111113', '0', '000000000', 'A41234568');
INSERT INTO `G_31MasterPintxo`.`codigo` (`idCodigo`, `usado`, `JuradoPopular_dniJP`, `Establecimiento_nif`) VALUES ('111111114', '0', '000000000', 'A41234568');

INSERT INTO `G_31MasterPintxo`.`codigo` (`idCodigo`, `usado`, `JuradoPopular_dniJP`, `Establecimiento_nif`) VALUES ('222222221', '0', '000000000', 'A41234569');
INSERT INTO `G_31MasterPintxo`.`codigo` (`idCodigo`, `usado`, `JuradoPopular_dniJP`, `Establecimiento_nif`) VALUES ('222222222', '0', '000000000', 'A41234569');
INSERT INTO `G_31MasterPintxo`.`codigo` (`idCodigo`, `usado`, `JuradoPopular_dniJP`, `Establecimiento_nif`) VALUES ('222222223', '0', '000000000', 'A41234569');
INSERT INTO `G_31MasterPintxo`.`codigo` (`idCodigo`, `usado`, `JuradoPopular_dniJP`, `Establecimiento_nif`) VALUES ('222222224', '0', '000000000', 'A41234569');

INSERT INTO `G_31MasterPintxo`.`codigo` (`idCodigo`, `usado`, `JuradoPopular_dniJP`, `Establecimiento_nif`) VALUES ('333333331', '0', '000000000', 'A41234570');
INSERT INTO `G_31MasterPintxo`.`codigo` (`idCodigo`, `usado`, `JuradoPopular_dniJP`, `Establecimiento_nif`) VALUES ('333333332', '0', '000000000', 'A41234570');
INSERT INTO `G_31MasterPintxo`.`codigo` (`idCodigo`, `usado`, `JuradoPopular_dniJP`, `Establecimiento_nif`) VALUES ('333333333', '0', '000000000', 'A41234570');
INSERT INTO `G_31MasterPintxo`.`codigo` (`idCodigo`, `usado`, `JuradoPopular_dniJP`, `Establecimiento_nif`) VALUES ('333333334', '0', '000000000', 'A41234570');

INSERT INTO `G_31MasterPintxo`.`codigo` (`idCodigo`, `usado`, `JuradoPopular_dniJP`, `Establecimiento_nif`) VALUES ('444444441', '0', '000000000', 'A41234571');
INSERT INTO `G_31MasterPintxo`.`codigo` (`idCodigo`, `usado`, `JuradoPopular_dniJP`, `Establecimiento_nif`) VALUES ('444444442', '0', '000000000', 'A41234571');
INSERT INTO `G_31MasterPintxo`.`codigo` (`idCodigo`, `usado`, `JuradoPopular_dniJP`, `Establecimiento_nif`) VALUES ('444444443', '0', '000000000', 'A41234571');
INSERT INTO `G_31MasterPintxo`.`codigo` (`idCodigo`, `usado`, `JuradoPopular_dniJP`, `Establecimiento_nif`) VALUES ('444444444', '0', '000000000', 'A41234571');
