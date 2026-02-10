<?php

declare(strict_types=1);

function generateAnonymousId(): string
{
    return 'ANON-' . strtoupper(bin2hex(random_bytes(6)));
}

function redirect(string $path): void
{
    header('Location: ' . $path);
    exit;
}

function isLoggedIn(): bool
{
    return isset($_SESSION['student_id'], $_SESSION['anonymous_id']);
}

function requireAuth(): void
{
    if (!isLoggedIn()) {
        redirect('login.php');
    }
}
