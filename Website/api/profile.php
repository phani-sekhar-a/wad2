<?php

declare(strict_types=1);

require_once __DIR__ . '/bootstrap.php';
require_once __DIR__ . '/config.php';

$pdo = get_pdo();
$userId = require_login('../pages/auth/login.php');
$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'POST') {
    $name = trim((string) ($_POST['name'] ?? ''));
    $course = trim((string) ($_POST['course'] ?? ''));
    $skills = trim((string) ($_POST['skills'] ?? ''));
    $phone = trim((string) ($_POST['phone'] ?? ''));

    if ($name === '') {
        redirect_with_flash('../pages/student/dashboard.html', 'error', 'Name is required.');
    }

    $stmt = $pdo->prepare('UPDATE users SET name = ?, course = ?, skills = ?, phone = ?, updated_at = NOW() WHERE id = ?');
    $stmt->execute([$name, $course, $skills, $phone, $userId]);

    redirect_with_flash('../pages/student/dashboard.html', 'success', 'Profile updated successfully.');
}

http_response_code(405);
exit('Unsupported request');
