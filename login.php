<?php
require __DIR__ . '/config.php';
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = strtolower(trim($_POST['email'] ?? ''));
    $password = $_POST['password'] ?? '';
    $stmt = db()->prepare('SELECT id,name,password_hash,role FROM users WHERE email=? LIMIT 1');
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $user = $stmt->get_result()->fetch_assoc();
    if ($user && password_verify($password, $user['password_hash'])) {
        session_regenerate_id(true);
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['role'] = $user['role'];
        header('Location: ' . ($user['role'] === 'admin' ? 'admin.php' : 'member.php'));
        exit;
    }
    $error = 'Invalid email or password.';
}
?>
<!doctype html><html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>NexCircle — Login</title>
<style>body{font-family:Arial,sans-serif;background:#f6f0e3;color:#15130e;margin:0}.box{max-width:420px;margin:70px auto;padding:32px;background:#fffdf8;border:2px solid #15130e;box-shadow:6px 6px #15130e}input,button{width:100%;box-sizing:border-box;padding:14px;margin:8px 0;font-size:16px}button{background:#15130e;color:#f6f0e3;border:0;cursor:pointer}.err{color:#b00020}a{color:#e24a1e}</style></head>
<body><div class="box"><h1>NexCircle</h1><h2>Member login</h2>
<?php if($error): ?><p class="err"><?=e($error)?></p><?php endif; ?>
<form method="post"><input type="email" name="email" placeholder="Email" required><input type="password" name="password" placeholder="Password" required><button>Log in</button></form>
<p><a href="index.php">Back to website</a></p></div></body></html>
