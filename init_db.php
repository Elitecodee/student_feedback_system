<?php

declare(strict_types=1);

require_once __DIR__ . '/config.php';

$pdo->exec(
    'CREATE TABLE IF NOT EXISTS students (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        matric_no TEXT NOT NULL UNIQUE,
        password_hash TEXT NOT NULL,
        anonymous_id TEXT NOT NULL UNIQUE,
        created_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP
    )'
);

echo 'Database initialized successfully.';
