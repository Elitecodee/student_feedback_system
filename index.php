<?php

declare(strict_types=1);

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/functions.php';

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
                    <h1 class="h3 mb-3">Student Feedback & Lecturer Evaluation System</h1>
                    <p class="text-secondary">
                        A privacy-first platform for collecting authentic student feedback.
                        Students authenticate to access the system, while submitted evaluations
                        are designed to remain anonymous.
                    </p>
                    <div class="d-flex gap-2 flex-wrap mt-4">
                        <a class="btn btn-primary" href="register.php">Create Student Account</a>
                        <a class="btn btn-outline-primary" href="login.php">Student Login</a>
                    </div>
                    <hr class="my-4">
                    <p class="small text-muted mb-0">
                        Phase 1 complete: Authentication foundation with anonymity-safe student identity mapping.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
