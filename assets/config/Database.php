<?php

    abstract class Database
    {
        
        public static function conectar()
        {
            try {
                $dns="mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . " ;charset=utf8";
                $options=[
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_EMULATE_PREPARES => false
                ];
                $conn = new PDO($dns,DB_USERNAME,DB_PASSWORD,$options);
                return $conn;
            } catch (Exception $e) {
                echo "ERROR: " . $e->getMessage() . '<br>';
                exit;
            }
        }

    } 