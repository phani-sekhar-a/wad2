<?php

declare(strict_types=1);

require_once __DIR__ . '/bootstrap.php';
require_once __DIR__ . '/config.php';

$pdo = get_pdo();
$method = $_SERVER['REQUEST_METHOD'];
$action = $_POST['action'] ?? '';

if ($method === 'POST' && $action === 'register') {
    $name = trim((string) ($_POST['name'] ?? ''));
    $email = strtolower(trim((string) ($_POST['email'] ?? '')));
    $password = (string) ($_POST['password'] ?? '');
    $role = $_POST['role'] ?? 'student';
    $course = trim((string) ($_POST['course'] ?? ''));
    $skills = trim((string) ($_POST['skills'] ?? ''));

    if ($name === '' || $email === '' || $password === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        redirect_with_flash('../pages/student/signup-student.php', 'error', 'Name, valid email, and password are required.');
    }

    $stmt = $pdo->prepare('SELECT id FROM users WHERE email = ?');
    $stmt->execute([$email]);
    if ($stmt->fetch()) {
        redirect_with_flash('../pages/student/signup-student.php', 'error', 'Email already registered.');
    }

    $hash = password_hash($password, PASSWORD_BCRYPT);
    $insert = $pdo->prepare('INSERT INTO users (name, email, password_hash, role, course, skills) VALUES (?, ?, ?, ?, ?, ?)');
    $insert->execute([$name, $email, $hash, $role, $course, $skills]);

    redirect_with_flash('../pages/auth/login.php', 'success', 'Registration successful. Please log in.');
}

if ($method === 'POST' && $action === 'login') {
    $email = strtolower(trim((string) ($_POST['email'] ?? '')));
    $password = (string) ($_POST['password'] ?? '');
    $role = $_POST['role'] ?? 'student';

    $stmt = $pdo->prepare('SELECT id, password_hash, role, name FROM users WHERE email = ? LIMIT 1');
    $stmt->execute([$email]);
    $user = $stmt->fetch();
    if (!$user || !password_verify($password, $user['password_hash'])) {
        redirect_with_flash('../pages/auth/login.php', 'error', 'Invalid credentials.');
    }

    $_SESSION['user_id'] = (int) $user['id'];
    $_SESSION['role'] = $user['role'];

    $redirect = '../pages/student/dashboard.html';
    if ($role === 'employer') {
        $redirect = '../pages/employer/profile.html';
    } elseif ($role === 'admin') {
        $redirect = '../pages/admin/dashboard.html';
    }

    redirect_with_flash($redirect, 'success', 'Login successful.');
}

if ($method === 'POST' && $action === 'logout') {
    session_destroy();
    redirect_with_flash('../pages/auth/login.php', 'success', 'Logged out successfully.');
}

http_response_code(405);
exit('Unsupported request');
