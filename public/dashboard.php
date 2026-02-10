<?php

declare(strict_types=1);

require_once __DIR__ . '/../app/config/database.php';
require_once __DIR__ . '/../app/helpers/auth.php';

requireAuth();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4 p-md-5">
                    <h1 class="h3 mb-3">Welcome to Your Feedback Dashboard</h1>
                    <p class="mb-2">
                        You are authenticated. Your anonymous evaluation identifier is:
                        <span class="badge text-bg-secondary"><?= htmlspecialchars($_SESSION['anonymous_id'], ENT_QUOTES, 'UTF-8') ?></span>
                    </p>
                    <p class="text-secondary">
                        Next step: we can now build each evaluation page separately while preserving anonymous submissions.
                    </p>
                    <a href="logout.php" class="btn btn-outline-danger">Logout</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
