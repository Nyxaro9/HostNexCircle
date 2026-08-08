<?php
require __DIR__ . '/config.php';
require_login();

$stmt = db()->prepare('SELECT id,name,email,phone,membership_status,membership_expires,passport_points FROM users WHERE id=?');
$stmt->bind_param('i', $_SESSION['user_id']); $stmt->execute();
$user = $stmt->get_result()->fetch_assoc();

$events = db()->query("SELECT id,title,event_date,location,description FROM events WHERE event_date >= NOW() ORDER BY event_date ASC LIMIT 10");
?>
<!doctype html><html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>NexCircle — Member</title>
<style>body{font-family:Arial,sans-serif;background:#f6f0e3;color:#15130e;margin:0}.wrap{max-width:1000px;margin:30px auto;padding:0 20px}.card{background:#fffdf8;border:2px solid #15130e;padding:22px;margin:15px 0;box-shadow:5px 5px #15130e}.btn{display:inline-block;padding:11px 16px;background:#15130e;color:#fff;text-decoration:none;margin:5px}.accent{color:#e24a1e}.grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:15px}</style></head>
<body><div class="wrap"><p><a href="index.php">← Website</a> · <a href="logout.php">Log out</a></p>
<h1>Welcome, <?=e($user['name'])?></h1>
<div class="grid"><div class="card"><h2><?=e((string)$user['passport_points'])?></h2><p>Passport points</p></div>
<div class="card"><h2><?=e($user['membership_status'])?></h2><p>Membership status</p></div>
<div class="card"><h2>KES <?=number_format(MEMBERSHIP_PRICE)?></h2><p>Monthly membership</p><a class="btn" href="membership.php">Membership</a></div></div>
<div class="card"><h2>Your profile</h2><p><?=e($user['email'])?><br><?=e($user['phone'])?></p></div>
<div class="card"><h2>Upcoming events</h2>
<?php while($ev=$events->fetch_assoc()): ?>
<article><h3><?=e($ev['title'])?></h3><p><?=e(date('D, d M Y H:i',strtotime($ev['event_date'])))?> · <?=e($ev['location'])?></p><p><?=e($ev['description'])?></p><a class="btn" href="book.php?id=<?=$ev['id']?>">Book event</a></article><hr>
<?php endwhile; ?></div></div></body></html>
