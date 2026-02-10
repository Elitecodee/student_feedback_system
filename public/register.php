<?php

declare(strict_types=1);

require_once __DIR__ . '/../app/config/database.php';
require_once __DIR__ . '/../app/helpers/auth.php';

if (isLoggedIn()) {
    redirect('dashboard.php');
}

$errors = [];
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $matricNo = trim($_POST['matric_no'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirm_password'] ?? '';

    if ($matricNo === '') {
        $errors[] = 'Matric number is required.';
    }
    if (strlen($password) < 8) {
        $errors[] = 'Password must be at least 8 characters.';
    }
    if ($password !== $confirmPassword) {
        $errors[] = 'Passwords do not match.';
    }

    if ($errors === []) {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        do {
            $anonymousId = generateAnonymousId();
            $check = $pdo->prepare('SELECT 1 FROM students WHERE anonymous_id = :anonymous_id');
            $check->execute(['anonymous_id' => $anonymousId]);
            $exists = (bool) $check->fetchColumn();
        } while ($exists);

        try {
            $stmt = $pdo->prepare(
                'INSERT INTO students (matric_no, password_hash, anonymous_id) VALUES (:matric_no, :password_hash, :anonymous_id)'
            );
            $stmt->execute([
                'matric_no' => $matricNo,
                'password_hash' => $passwordHash,
                'anonymous_id' => $anonymousId,
            ]);
            $success = 'Account created successfully. You can now log in.';
        } catch (PDOException $e) {
            if ((int) $e->getCode() === 23000) {
                $errors[] = 'This matric number is already registered.';
            } else {
                $errors[] = 'An unexpected database error occurred.';
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <h1 class="h4 mb-3">Create Student Account</h1>

                    <?php if ($errors !== []): ?>
                        <div class="alert alert-danger" role="alert">
                            <ul class="mb-0">
                                <?php foreach ($errors as $error): ?>
                                    <li><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <?php if ($success !== ''): ?>
                        <div class="alert alert-success" role="alert">
                            <?= htmlspecialchars($success, ENT_QUOTES, 'UTF-8') ?>
                        </div>
                    <?php endif; ?>

                    <form method="post" novalidate>
                        <div class="mb-3">
                            <label for="matric_no" class="form-label">Matric Number</label>
                            <input type="text" class="form-control" id="matric_no" name="matric_no" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="confirm_password" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Register</button>
                    </form>

                    <div class="mt-3 text-center">
                        <a href="login.php">Already have an account? Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
