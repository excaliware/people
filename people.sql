-- Initialization. Create the table and populate it with sample data.

USE people;

DROP TABLE IF EXISTS `person`;

CREATE TABLE `person` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`first_name` VARCHAR(45) NULL,
	`last_name` VARCHAR(45) NULL,
	`email` VARCHAR(45) NULL,
	PRIMARY KEY (`id`));

INSERT INTO `person` (`first_name`, `last_name`, `email`)
	VALUES('John', 'Smith', 'john@localhost');
INSERT INTO `person` (`first_name`, `last_name`, `email`)
	VALUES('Mary', 'Doe', 'mary@localhost');
INSERT INTO `person` (`first_name`, `last_name`, `email`)
	VALUES('Georgi', 'Facello', 'georgi@localhost');
INSERT INTO `person` (`first_name`, `last_name`, `email`)
	VALUES('Bezalel', 'Simmel', 'bezalel@localhost');
INSERT INTO `person` (`first_name`, `last_name`, `email`)
	VALUES('Parto', 'Bamford', 'parto@localhost');
INSERT INTO `person` (`first_name`, `last_name`, `email`)
	VALUES('Chirstian', 'Koblick', 'chirstian@localhost');
