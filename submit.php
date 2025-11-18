<?php
// submit.php — display submitted values (sanitized)
function e($s){ return htmlspecialchars(trim($s ?? ''), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); }

$first = e($_POST['first_name'] ?? '');
$middle = e($_POST['middle_name'] ?? '');
$last  = e($_POST['last_name'] ?? '');
$email = e($_POST['email'] ?? '');
$phone1 = e($_POST['phone1'] ?? '');
$phone2 = e($_POST['phone2'] ?? '');
$dob   = e($_POST['dob'] ?? '');
$gender = e($_POST['gender'] ?? '');
$course = e($_POST['course'] ?? '');
$address = nl2br(e($_POST['address'] ?? ''));

$errors = [];
if (!$first) $errors[] = "First name is required.";
if (!$email) $errors[] = "Email is required.";
if (!$phone1) $errors[] = "Primary phone is required.";
if (!$course) $errors[] = "Course selection is required.";
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Submission result</title>
  <link rel="stylesheet" href="styles.css" />
</head>
<body>
  <main class="page">
    <div class="container" style="grid-template-columns:1fr;max-width:720px">
      <div class="left" style="padding:22px;">
        <?php if (!empty($errors)): ?>
          <h2 style="color:#b91c1c">Submission error</h2>
          <ul>
            <?php foreach($errors as $err): ?>
              <li><?= e($err) ?></li>
            <?php endforeach; ?>
          </ul>
          <p><a href="index.html" class="btn ghost" style="margin-top:12px;display:inline-block">Back to form</a></p>
        <?php else: ?>
          <h1 style="margin-top:0;color:var(--accent)">Form submitted successfully</h1>

          <div class="kv"><b>Full name</b><span><?= $first . ($middle ? ' '.$middle : '') . ($last ? ' '.$last : '') ?></span></div>
          <div class="kv"><b>Email</b><span><?= $email ?></span></div>
          <div class="kv"><b>Phone (Primary)</b><span><?= $phone1 ?></span></div>
          <div class="kv"><b>Phone (Secondary)</b><span><?= $phone2 ?: '—' ?></span></div>
          <div class="kv"><b>Date of birth</b><span><?= $dob ?: '—' ?></span></div>
          <div class="kv"><b>Gender</b><span><?= $gender ?: '—' ?></span></div>
          <div class="kv"><b>Course / Program</b><span><?= $course ?: '—' ?></span></div>

          <div style="padding-top:10px"><b>Address</b>
            <div style="margin-top:8px;border:1px solid #eef2ff;padding:12px;border-radius:8px;background:#fbfdff"><?= $address ?: '—' ?></div>
          </div>

          <p style="margin-top:16px">
            <a href="index.html" class="btn primary" style="text-decoration:none">Fill Form Again</a>
            <a href="#" onclick="window.print();return false;" class="btn ghost" style="margin-left:8px">Print</a>
          </p>
        <?php endif; ?>
      </div>
    </div>
  </main>
</body>
</html>
