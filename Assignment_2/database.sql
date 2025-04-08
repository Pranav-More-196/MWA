CREATE DATABASE event_registration;

USE event_registration;

CREATE TABLE registrations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    phone VARCHAR(20) NOT NULL,
    event_name VARCHAR(100) NOT NULL,
    attendee_type VARCHAR(50) NOT NULL,
    upload_id VARCHAR(255) NOT NULL, 
    registered_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);