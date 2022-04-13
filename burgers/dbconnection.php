<?php

class DBConnection {

    const DB_NAME = 'php-course';
    const HOST = 'localhost';
    const USER = 'php-course';
    const PASSWORD = 'Password';

    protected static $instance;

    protected function __construct() {
        
    }

    public static function getInstance() {

        if (empty(self::$instance)) {
            try {
                $dsn = sprintf('mysql:host=%s;port=%s;dbname=%s', self::HOST, 3306, self::DB_NAME);
                self::$instance = new PDO($dsn, self::USER, self::PASSWORD);
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
                self::setEncodings();
                self::createUsers();
                self::createOrders();
            } catch (PDOException $error) {
                echo $error->getMessage();
            }
        }

        return self::$instance;
    }

    private static function setEncodings() {
        self::$instance->exec(
                "SET NAMES 'utf8';
			SET character_set_connection=utf8;
			SET character_set_client=utf8;
			SET character_set_results=utf8");
    }

    private static function createUsers() {
        self::$instance->exec("CREATE TABLE IF NOT EXISTS `users` (
                `id` INT AUTO_INCREMENT NOT NULL,
                `name` varchar(200) NOT NULL,
                `phone` varchar(20) NOT NULL,
                `email` varchar(200) NOT NULL,
                PRIMARY KEY (`id`)) 
                CHARACTER SET utf8 COLLATE utf8_general_ci"
        );
    }

    private static function createOrders() {
        self::$instance->exec("CREATE TABLE IF NOT EXISTS `orders` (
                `id` INT AUTO_INCREMENT NOT NULL,
                `date` DATETIME NOT NULL  DEFAULT CURRENT_TIMESTAMP,
                `user_id` tinyint(10) NOT NULL,
                `street` varchar(200) NOT NULL,
                `house` varchar(20) NOT NULL,
                `corpus` varchar(200),
                `apart` varchar(20),
                `floor` varchar(20),
                `comment` TEXT,
                PRIMARY KEY (`id`)) 
                CHARACTER SET utf8 COLLATE utf8_general_ci"
        );
    }

}
