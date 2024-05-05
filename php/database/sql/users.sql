
DROP TABLE IF EXISTS `users`;

CREATE TABLE IF NOT EXISTS `users` (
    `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `uuid` varchar(255) NOT NULL UNIQUE,
    `pseudo` varchar(255) NOT NULL UNIQUE,
    `password` varchar(255) NOT NULL,
    `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
);
