<?php

declare(strict_types=1);

require_once __DIR__ . '/bootstrap.php';
require_once __DIR__ . '/config.php';

$pdo = get_pdo();
$userId = require_login('../pages/auth/login.php');
$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'POST') {
    $title = trim((string) ($_POST['internship'] ?? ''));
    $date = trim((string) ($_POST['date'] ?? ''));
    $time = trim((string) ($_POST['time'] ?? ''));
    $reminder = !empty($_POST['reminder']) ? 1 : 0;

    if ($title === '' || $date === '' || $time === '') {
        redirect_with_flash('../pages/student/schedule.php', 'error', 'Internship, date, and time are required.');
    }

    $conflict = $pdo->prepare('SELECT COUNT(*) FROM interviews WHERE user_id = ? AND interview_date = ? AND interview_time = ?');
    $conflict->execute([$userId, $date, $time]);
    if ($conflict->fetchColumn() > 0) {
        redirect_with_flash('../pages/student/schedule.php', 'error', 'You already have an interview at this time.');
    }

    $insert = $pdo->prepare('INSERT INTO interviews (user_id, internship_title, interview_date, interview_time, send_reminder) VALUES (?, ?, ?, ?, ?)');
    $insert->execute([$userId, $title, $date, $time, $reminder]);

    redirect_with_flash('../pages/student/schedule.php', 'success', 'Interview scheduled successfully.');
}

http_response_code(405);
exit('Unsupported request');
