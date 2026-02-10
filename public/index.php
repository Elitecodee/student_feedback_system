<?php

declare(strict_types=1);

require_once __DIR__ . '/../app/config/database.php';
require_once __DIR__ . '/../app/helpers/auth.php';

if (isLoggedIn()) {
    redirect('dashboard.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Feedback System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4 p-md-5">
                    <h1 class="h3 mb-3">Student Feedback &amp; Lecturer Evaluation System</h1>
                    <p class="text-secondary">
                        Privacy-first platform for collecting and analyzing academic feedback.
                        Students authenticate, but lecturer evaluations remain anonymous.
                    </p>
                    <div class="d-flex gap-2 flex-wrap mt-4">
                        <a class="btn btn-primary" href="register.php">Create Student Account</a>
                        <a class="btn btn-outline-primary" href="login.php">Student Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
