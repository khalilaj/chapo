CREATE TABLE `chapos` (
  `chapo_id` int(11) NOT NULL AUTO_INCREMENT,
  `chapo_name` varchar(45) DEFAULT NULL,
  `chapo_value` INT(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`chapo_id`)
) ENGINE=InnoDB;
