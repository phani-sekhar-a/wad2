<?php
// Database configuration and connection helper
// Uses environment variables to avoid storing credentials in source control.
// Expected env vars: DB_HOST, DB_NAME, DB_USER, DB_PASS, DB_PORT (optional)

declare(strict_types=1);

function get_pdo(): PDO {
    $host = getenv('DB_HOST') ?: 'localhost';
    $db   = getenv('DB_NAME') ?: 'wad2';
    $user = getenv('DB_USER') ?: 'wad2_user';
    $pass = getenv('DB_PASS') ?: '';
    $port = getenv('DB_PORT') ?: '3306';

    $dsn = "mysql:host={$host};port={$port};dbname={$db};charset=utf8mb4";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];

    return new PDO($dsn, $user, $pass, $options);
}
