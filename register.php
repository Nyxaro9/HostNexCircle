<?php
require __DIR__ . '/config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php#join'); exit;
}
$name = trim($_POST['name'] ?? '');
$email = strtolower(trim($_POST['email'] ?? ''));
$phone = trim($_POST['phone'] ?? '');
$password = $_POST['password'] ?? '';

if ($name === '' || !filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($password) < 8) {
    exit('Please provide a valid name, email and password of at least 8 characters.');
}

$stmt = db()->prepare('SELECT id FROM users WHERE email=? LIMIT 1');
$stmt->bind_param('s', $email);
$stmt->execute();
if ($stmt->get_result()->fetch_assoc()) {
    exit('An account with that email already exists. <a href="login.php">Log in</a>.');
}

$hash = password_hash($password, PASSWORD_DEFAULT);
$stmt = db()->prepare('INSERT INTO users (name,email,phone,password_hash) VALUES (?,?,?,?)');
$stmt->bind_param('ssss', $name, $email, $phone, $hash);
$stmt->execute();

$_SESSION['user_id'] = db()->insert_id;
$_SESSION['role'] = 'member';
$_SESSION['name'] = $name;
header('Location: member.php?welcome=1');
exit;
