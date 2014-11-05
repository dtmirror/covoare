CREATE TABLE `despre` (
    `despre_id` int(11) NOT NULL AUTO_INCREMENT,
    `despre_text` text NOT NULL,
    PRIMARY KEY (`despre_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `galerie_poze` (
    `poza_id` int(11) NOT NULL AUTO_INCREMENT,
    `poza_title` varchar(200) DEFAULT NULL,
    `poza_text` text NOT NULL,
    `poza_data` INT NOT NULL,
    `poza_name` varchar(200) DEFAULT NULL,
    PRIMARY KEY (`poza_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `oferte` (
    `oferta_id` int(11) NOT NULL AUTO_INCREMENT,
    `oferta_title` varchar(200) DEFAULT NULL,
    `oferta_text` text NOT NULL,
    `oferta_poza` varchar(200) DEFAULT NULL,
    `oferta_data` INT NOT NULL,
    `oferta_status` INT(1) NOT NULL,
    PRIMARY KEY (`oferta_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `testimonial` (
    `testimonial_id` int(11) NOT NULL AUTO_INCREMENT,
    `testimonial_client` varchar(45) DEFAULT NULL,
    `testimonial_text` text NOT NULL,
    `testimonial_data` INT NOT NULL,
    `testimonial_status` INT(1) NOT NULL,
    PRIMARY KEY (`testimonial_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;