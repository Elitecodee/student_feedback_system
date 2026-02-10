CREATE DATABASE IF NOT EXISTS student_feedback_system
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE student_feedback_system;

CREATE TABLE IF NOT EXISTS students (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    matric_no VARCHAR(50) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    anonymous_id VARCHAR(50) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;
