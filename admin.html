<?php
require __DIR__ . '/config.php';
require_admin();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    check_csrf();
    $action = $_POST['action'] ?? '';
    if ($action === 'event') {
        $title=trim($_POST['title']); $date=$_POST['event_date']; $location=trim($_POST['location']); $desc=trim($_POST['description']);
        $stmt=db()->prepare('INSERT INTO events(title,event_date,location,description) VALUES(?,?,?,?)');
        $stmt->bind_param('ssss',$title,$date,$location,$desc); $stmt->execute();
    } elseif ($action === 'points') {
        $uid=(int)$_POST['user_id']; $pts=(int)$_POST['points'];
        $stmt=db()->prepare('UPDATE users SET passport_points=GREATEST(0,passport_points+?) WHERE id=?');
        $stmt->bind_param('ii',$pts,$uid); $stmt->execute();
    }
}
$users=db()->query('SELECT id,name,email,phone,membership_status,passport_points,created_at FROM users ORDER BY created_at DESC');
$events=db()->query('SELECT * FROM events ORDER BY event_date DESC');
?>
<!doctype html><html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>NexCircle — Admin</title>
<style>body{font-family:Arial;background:#f6f0e3;color:#15130e}.wrap{max-width:1100px;margin:30px auto;padding:0 20px}.card{background:#fffdf8;border:2px solid #15130e;padding:20px;margin:16px 0;box-shadow:5px 5px #15130e}input,textarea,button{padding:10px;margin:5px 0;box-sizing:border-box}input,textarea{width:100%}button{background:#15130e;color:#fff;border:0}.row{display:grid;grid-template-columns:repeat(auto-fit,minmax(180px,1fr));gap:10px}table{width:100%;border-collapse:collapse}td,th{border-bottom:1px solid #ccc;padding:8px;text-align:left}</style></head>
<body><div class="wrap"><p><a href="index.php">Website</a> · <a href="logout.php">Log out</a></p><h1>Admin dashboard</h1>
<div class="card"><h2>Create event</h2><form method="post"><input type="hidden" name="csrf" value="<?=e(csrf_token())?>"><input type="hidden" name="action" value="event"><div class="row"><input name="title" placeholder="Event title" required><input name="event_date" type="datetime-local" required><input name="location" placeholder="Location" required></div><textarea name="description" placeholder="Description"></textarea><button>Create event</button></form></div>
<div class="card"><h2>Members</h2><table><tr><th>Name</th><th>Email</th><th>Status</th><th>Points</th><th>Add points</th></tr>
<?php while($u=$users->fetch_assoc()): ?><tr><td><?=e($u['name'])?></td><td><?=e($u['email'])?></td><td><?=e($u['membership_status'])?></td><td><?=e((string)$u['passport_points'])?></td><td><form method="post"><input type="hidden" name="csrf" value="<?=e(csrf_token())?>"><input type="hidden" name="action" value="points"><input type="hidden" name="user_id" value="<?=$u['id']?>"><input type="number" name="points" value="1" style="width:70px"><button>Add</button></form></td></tr><?php endwhile; ?></table></div>
<div class="card"><h2>Events</h2><ul><?php while($ev=$events->fetch_assoc()): ?><li><?=e($ev['title'])?> — <?=e($ev['event_date'])?> — <?=e($ev['location'])?></li><?php endwhile; ?></ul></div>
</div></body></html>
