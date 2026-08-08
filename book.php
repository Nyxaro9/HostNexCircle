<?php
require __DIR__ . '/config.php';
require_login();
$id = (int)($_GET['id'] ?? 0);
$stmt = db()->prepare('SELECT id,title FROM events WHERE id=?');
$stmt->bind_param('i',$id); $stmt->execute();
$event = $stmt->get_result()->fetch_assoc();
if (!$event) exit('Event not found.');

$stmt = db()->prepare('SELECT id FROM bookings WHERE user_id=? AND event_id=?');
$stmt->bind_param('ii',$_SESSION['user_id'],$id); $stmt->execute();
if ($stmt->get_result()->fetch_assoc()) exit('You have already booked this event. <a href="member.php">Return to dashboard</a>.');

$stmt = db()->prepare('INSERT INTO bookings(user_id,event_id) VALUES(?,?)');
$stmt->bind_param('ii',$_SESSION['user_id'],$id); $stmt->execute();

$stmt = db()->prepare('UPDATE users SET passport_points=passport_points+1 WHERE id=?');
$stmt->bind_param('i',$_SESSION['user_id']); $stmt->execute();

header('Location: member.php'); exit;
