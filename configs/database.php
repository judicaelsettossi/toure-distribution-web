<?php

// Database configuration - adjust via environment variables if present
$DB_DRIVER = getenv('DB_DRIVER') ?: 'mysql';
$DB_HOST = getenv('DB_HOST') ?: '127.0.0.1';
$DB_PORT = getenv('DB_PORT') ?: ($DB_DRIVER === 'pgsql' ? '5432' : '3306');
$DB_NAME = getenv('DB_NAME') ?: 'erp_db';
$DB_USER = getenv('DB_USER') ?: 'erp_user';
$DB_PASSWORD = getenv('DB_PASSWORD') ?: 'secret';
$DB_CHARSET = getenv('DB_CHARSET') ?: 'utf8mb4';

function get_pdo(): PDO {
    global $DB_DRIVER, $DB_HOST, $DB_PORT, $DB_NAME, $DB_USER, $DB_PASSWORD, $DB_CHARSET;

    static $pdo = null;
    if ($pdo instanceof PDO) {
        return $pdo;
    }

    if ($DB_DRIVER === 'mysql') {
        $dsn = "mysql:host={$DB_HOST};port={$DB_PORT};dbname={$DB_NAME};charset={$DB_CHARSET}";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];
        $pdo = new PDO($dsn, $DB_USER, $DB_PASSWORD, $options);
        // Ensure strict mode for MySQL
        try {
            $pdo->exec("SET sql_mode = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION'");
        } catch (Throwable $e) {}
        return $pdo;
    }

    if ($DB_DRIVER === 'pgsql') {
        $dsn = "pgsql:host={$DB_HOST};port={$DB_PORT};dbname={$DB_NAME}";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];
        $pdo = new PDO($dsn, $DB_USER, $DB_PASSWORD, $options);
        return $pdo;
    }

    if ($DB_DRIVER === 'sqlite') {
        $path = $DB_NAME ?: ':memory:';
        $dsn = "sqlite:" . $path;
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];
        $pdo = new PDO($dsn, null, null, $options);
        return $pdo;
    }

    throw new RuntimeException('Unsupported DB_DRIVER: ' . $DB_DRIVER);
}

