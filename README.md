# Student Feedback and Lecturer Evaluation System

PHP + HTML + Bootstrap project for collecting and analyzing student feedback with anonymity-first evaluation workflows.

## Project Structure

```text
student_feedback_system/
├── app/
│   ├── config/
│   │   └── database.php
│   └── helpers/
│       └── auth.php
├── database/
│   ├── init_db.php
│   └── schema.sql
├── public/
│   ├── index.php
│   ├── register.php
│   ├── login.php
│   ├── dashboard.php
│   └── logout.php
├── .env.example
├── .gitignore
├── index.php
└── README.md
```

## MySQL Setup

1. Configure your environment variables using `.env.example` values.
2. Run:

```bash
php database/init_db.php
```

This creates:
- `student_feedback_system` database
- `students` table with unique `matric_no` and `anonymous_id`

## Run Locally

```bash
php -S 0.0.0.0:8000
```

Then open `http://127.0.0.1:8000/`.
