CREATE TABLE IF NOT EXISTS `rps` (
	`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	`nickname` VARCHAR(20) NOT NULL,
	`rounds` INT(2) NOT NULL,
	`games` INT(2) NOT NULL,
	`win` INT(2) NOT NULL,
	`loss` INT(2) NOT NULL,
	`equal` INT(2) NOT NULL,
	`winer` VARCHAR(10) NOT NULL,
	PRIMARY KEY (`id`)
)
COLLATE='utf8mb4_general_ci'
;
