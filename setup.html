<?php
// Run this once after importing database/schema.sql. Then DELETE this file.
require __DIR__ . '/config.php';
$msg='';
if ($_SERVER['REQUEST_METHOD']==='POST') {
    $name=trim($_POST['name']); $email=strtolower(trim($_POST['email'])); $password=$_POST['password'];
    if ($name && filter_var($email,FILTER_VALIDATE_EMAIL) && strlen($password)>=10) {
        $hash=password_hash($password,PASSWORD_DEFAULT);
        $stmt=db()->prepare("INSERT INTO users(name,email,password_hash,role,membership_status) VALUES(?,?,?,'admin','admin')");
        $stmt->bind_param('sss',$name,$email,$hash);
        if ($stmt->execute()) { $msg='Admin created. Delete setup.php now.'; }
        else { $msg='Could not create admin. The email may already exist.'; }
    } else $msg='Use a valid email and a password of at least 10 characters.';
}
?>
<!doctype html><html><body style="font-family:Arial;max-width:500px;margin:60px auto"><h1>NexCircle setup</h1><p><?=e($msg)?></p><form method="post"><input name="name" placeholder="Admin name" required style="width:100%;padding:10px"><br><br><input name="email" type="email" placeholder="Admin email" required style="width:100%;padding:10px"><br><br><input name="password" type="password" placeholder="Password (10+ chars)" required style="width:100%;padding:10px"><br><br><button style="padding:12px">Create admin</button></form></body></html>
