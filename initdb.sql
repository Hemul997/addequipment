CREATE DATABASE `equipment_schema`;
USE `equipment_schema`;

CREATE TABLE `equipment_type`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `type` VARCHAR(20) COLLATE utf8mb4_0900_as_cs NOT NULL,
    `sn_mask` VARCHAR(10) COLLATE utf8mb4_0900_as_cs NOT NULL,
    PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_0900_as_cs;


CREATE TABLE `equipment`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `type_id` INT UNSIGNED NOT NULL,
    `serial_number` VARCHAR(10) NOT NULL,
    UNIQUE KEY `serial_number` (`serial_number`),
    PRIMARY KEY (`id`),
    FOREIGN KEY (`type_id`) REFERENCES `equipment_type` (`id`)
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_0900_as_cs;


INSERT INTO `equipment_type`(`type`, `sn_mask`) 
VALUES ("TP-Link TL-WR74", "XXAAAAAXAA"), 
       ("D-Link DIR-300", "NXXAAXZXaa"),
       ("D-Link DIR-300 S", "NXXAAXZXXX");
