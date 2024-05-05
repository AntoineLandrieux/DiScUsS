
DROP TABLE IF EXISTS `chat`;

CREATE TABLE IF NOT EXISTS `chat` (
    `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `ip` varchar(255) NOT NULL,
    `user` varchar(255) NOT NULL,
    `msg` text NOT NULL,
    `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
);
