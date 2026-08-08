<?php
require __DIR__ . '/config.php';
require_login();
?>
<!doctype html><html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>NexCircle — Membership</title>
<style>body{font-family:Arial;background:#f6f0e3;color:#15130e}.box{max-width:600px;margin:60px auto;padding:30px;background:#fffdf8;border:2px solid #15130e;box-shadow:6px 6px #15130e}.btn{padding:13px 20px;background:#15130e;color:#fff;border:0}a{color:#e24a1e}</style></head>
<body><div class="box"><h1>Premium Membership</h1><h2>KES <?=number_format(MEMBERSHIP_PRICE)?> / month</h2>
<p>Priority booking, tournament entry, workshop discounts, networking and partner discounts.</p>
<p><strong>Payment integration:</strong> this starter build keeps payment processing disabled until your Daraja application and business payment details are configured.</p>
<p><a href="https://developer.safaricom.co.ke/" target="_blank" rel="noopener">Open Safaricom Daraja</a></p>
<p><a href="member.php">← Member dashboard</a></p></div></body></html>
