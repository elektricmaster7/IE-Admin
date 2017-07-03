CREATE TABLE `table_translations` (
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`locale` VARCHAR(6) NOT NULL,
	`model` VARCHAR(255) NOT NULL,
	`foreign_key` INT(10) NOT NULL,
	`field` VARCHAR(255) NOT NULL,
	`content` TEXT NULL,
	PRIMARY KEY (`id`),
	INDEX `locale` (`locale`),
	INDEX `model` (`model`),
	INDEX `row_id` (`foreign_key`),
	INDEX `field` (`field`)
)COLLATE='utf8_general_ci' ENGINE=InnoDB;
