/* Create table for Accessories */
DROP TABLE IF EXISTS `accessory`;
CREATE TABLE `accessory` (
    `id` int NOT NULL AUTO_INCREMENT,
    `name` varchar(255) DEFAULT NULL,
    `url` varchar(255) DEFAULT NULL,
    PRIMARY KEY (`id`)
);
INSERT INTO `accessory` VALUES (1,'cherry','http://images.innoveduc.fr/php_parcours/cp2/cherry.png');

/* Create table for Cucakes */
DROP TABLE IF EXISTS `cupcake`;
CREATE TABLE `cupcake` (
    `id` int NOT NULL AUTO_INCREMENT,
    `name` varchar(255) DEFAULT NULL,
    `color1` char(7) DEFAULT NULL,
    `color2` char(7) DEFAULT NULL,
    `color3` char(7) DEFAULT NULL,
    `accessory_id` int DEFAULT NULL,
    `created_at` datetime DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `C2` (`accessory_id`),
    CONSTRAINT `C2` FOREIGN KEY (`accessory_id`) REFERENCES `accessory` (`id`)
);
INSERT INTO `cupcake` VALUES (1,'Cherry on the cake','#d81313','#ecdfdf','#d58181',1,NULL);
