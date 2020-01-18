-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema web_project
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema web_project
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `web_project` DEFAULT CHARACTER SET utf8 ;
USE `web_project` ;

-- -----------------------------------------------------
-- Table `web_project`.`courses`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `web_project`.`courses` (
  `course_id` INT(11) NOT NULL,
  `course` INT(11) NOT NULL,
  PRIMARY KEY (`course_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `web_project`.`groups`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `web_project`.`groups` (
  `group_id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`group_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `web_project`.`titles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `web_project`.`titles` (
  `title_id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`title_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `web_project`.`lecturers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `web_project`.`lecturers` (
  `lecturer_id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `title_id` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`lecturer_id`),
  INDEX `fk_lecturers_titles_idx` (`title_id` ASC),
  CONSTRAINT `fk_lecturers_titles`
    FOREIGN KEY (`title_id`)
    REFERENCES `web_project`.`titles` (`title_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `web_project`.`majors`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `web_project`.`majors` (
  `major_id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`major_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `web_project`.`types`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `web_project`.`types` (
  `type_id` INT(11) NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`type_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `web_project`.`subject`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `web_project`.`subject` (
  `subject_id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(80) NOT NULL,
  `credits` DOUBLE NOT NULL,
  `group_id` INT(11) NULL DEFAULT NULL,
  `type_id` INT(11) NOT NULL,
  PRIMARY KEY (`subject_id`),
  INDEX `fk_subject_groups1_idx` (`group_id` ASC),
  INDEX `fk_subject_types1_idx` (`type_id` ASC),
  CONSTRAINT `fk_subject_groups1`
    FOREIGN KEY (`group_id`)
    REFERENCES `web_project`.`groups` (`group_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_subject_types1`
    FOREIGN KEY (`type_id`)
    REFERENCES `web_project`.`types` (`type_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `web_project`.`subject_has_lecturers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `web_project`.`subject_has_lecturers` (
  `subject_id` INT(11) NOT NULL,
  `lecturer_id` INT(11) NOT NULL,
  PRIMARY KEY (`subject_id`, `lecturer_id`),
  INDEX `fk_subject_has_lecturers_lecturers1_idx` (`lecturer_id` ASC),
  INDEX `fk_subject_has_lecturers_subject1_idx` (`subject_id` ASC),
  CONSTRAINT `fk_subject_has_lecturers_lecturers1`
    FOREIGN KEY (`lecturer_id`)
    REFERENCES `web_project`.`lecturers` (`lecturer_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_subject_has_lecturers_subject1`
    FOREIGN KEY (`subject_id`)
    REFERENCES `web_project`.`subject` (`subject_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `web_project`.`subject_has_majors`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `web_project`.`subject_has_majors` (
  `subject_id` INT(11) NOT NULL,
  `major_id` INT(11) NOT NULL,
  `min_course_id` INT(11) NULL DEFAULT NULL,
  `only_course_id` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`subject_id`, `major_id`),
  INDEX `fk_subject_has_majors_majors1_idx` (`major_id` ASC),
  INDEX `fk_subject_has_majors_subject1_idx` (`subject_id` ASC),
  INDEX `fk_subject_has_majors_courses1_idx` (`min_course_id` ASC),
  INDEX `fk_subject_has_majors_courses2_idx` (`only_course_id` ASC),
  CONSTRAINT `fk_subject_has_majors_courses1`
    FOREIGN KEY (`min_course_id`)
    REFERENCES `web_project`.`courses` (`course_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_subject_has_majors_courses2`
    FOREIGN KEY (`only_course_id`)
    REFERENCES `web_project`.`courses` (`course_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_subject_has_majors_majors1`
    FOREIGN KEY (`major_id`)
    REFERENCES `web_project`.`majors` (`major_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_subject_has_majors_subject1`
    FOREIGN KEY (`subject_id`)
    REFERENCES `web_project`.`subject` (`subject_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `web_project`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `web_project`.`users` (
  `user_id` INT(11) NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(45) NOT NULL,
  `last_name` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `is_admin` TINYINT(4) NULL DEFAULT '0',
  `password` VARCHAR(45) NOT NULL,
  `type_id` INT(11) NOT NULL,
  PRIMARY KEY (`user_id`),
  INDEX `fk_users_types1_idx` (`type_id` ASC),
  CONSTRAINT `fk_users_types1`
    FOREIGN KEY (`type_id`)
    REFERENCES `web_project`.`types` (`type_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `web_project`.`workloads`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `web_project`.`workloads` (
  `workload_id` INT(11) NOT NULL AUTO_INCREMENT,
  `lectures` INT(11) NOT NULL,
  `seminars` INT(11) NOT NULL,
  `practices` INT(11) NOT NULL,
  `subject_id` INT(11) NOT NULL,
  PRIMARY KEY (`workload_id`, `subject_id`),
  INDEX `fk_workloads_subject1_idx` (`subject_id` ASC),
  CONSTRAINT `fk_workloads_subject1`
    FOREIGN KEY (`subject_id`)
    REFERENCES `web_project`.`subject` (`subject_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
