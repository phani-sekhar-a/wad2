<?php
// Shared bootstrap for API endpoints

declare(strict_types=1);

session_start([
    'cookie_httponly' => true,
    'cookie_secure' => isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off',
    'cookie_samesite' => 'Lax',
]);

function redirect_with_flash(string $location, string $type, string $message): void
{
    $_SESSION['flash'][$type] = $message;
    header('Location: ' . $location);
    exit;
}

function flash(?string $type): ?string
{
    if ($type === null || !isset($_SESSION['flash'][$type])) {
        return null;
    }

    $message = $_SESSION['flash'][$type];
    unset($_SESSION['flash'][$type]);
    return $message;
}

function require_login(?string $redirect = null): int
{
    if (!isset($_SESSION['user_id'])) {
        if ($redirect) {
            redirect_with_flash($redirect, 'error', 'Please log in to continue.');
        }
        http_response_code(401);
        exit('Authentication required');
    }

    return (int) $_SESSION['user_id'];
}
