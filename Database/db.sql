-- Active: 1769116929061@@127.0.0.1@5432@evolveai
CREATE DATABASE evolveai;
CREATE TABLE users(
    id SERIAL PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TYPE age_interval AS ENUM (
    '18-24',
    '25-34',
    '35-44',
    '45+'
);

CREATE TYPE work_rhythm AS ENUM (
    'Horaire classique (9h–17h)',
    'Travail de nuit',
    'Horaires flexibles',
    'Je suis à la retraite'
);

CREATE TYPE work_hours AS ENUM (
    'Moins de 4 heures',
    '4 à 6 heures',
    '6 à 8 heures',
    'Plus de 8 heures'
);

CREATE TYPE financial_situation AS ENUM (
    'Je suis financièrement stable',
    'Je m en sors, mais c est serré',
    'J ai du mal à suivre'
);

CREATE TYPE device AS ENUM (
    'Téléphone',
    'Ordinateur',
    'Tablette',
    'Plusieurs appareils'
);

CREATE TYPE lesson_format AS ENUM (
    'Texte',
    'Vidéo',
    'Leçons interactives',
    'Peu importe'
);

CREATE TABLE user_profiles (
    id SERIAL PRIMARY KEY,
    user_id int NOT NULL,
    age_interval age_interval NOT NULL,
    work_rhythm work_rhythm NOT NULL,
    work_hours work_hours NOT NULL,
    financial_situation financial_situation NOT NULL,
    device device NOT NULL,
    lesson_format lesson_format NOT NULL,
    FOREIGN KEY (user_id) REFERENCES Users(id)
);

CREATE TYPE opportunity_status AS ENUM (
    'active',
    'completed'
);

CREATE TABLE opportunities(
    id SERIAL PRIMARY KEY,
    user_id int NOT NULL,
    title VARCHAR(255) NOT null,
    description TEXT NOT NULL,
    earning_estimate VARCHAR(255) NOT NULL,
    status opportunity_status NOT NULL DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES Users(id)
);

CREATE TABLE tasks (
    id SERIAL PRIMARY KEY,
    opportunity_id INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    deadline DATE,
    order_index INT,
    target_skill VARCHAR(100),
    FOREIGN KEY (opportunity_id) REFERENCES opportunities(id)
);

CREATE TABLE task_progress (
    id SERIAL PRIMARY KEY,
    task_id INT NOT NULL UNIQUE,
    completed BOOLEAN DEFAULT FALSE,
    submitted_result TEXT,
    ai_feedback TEXT,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (task_id) REFERENCES tasks(id)
);

CREATE TABLE resources (
    id SERIAL PRIMARY KEY,
    task_id INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    type VARCHAR(50) NOT NULL,  
    link VARCHAR(500),
    generated_by_ai VARCHAR(255) DEFAULT FALSE,
    FOREIGN KEY (task_id) REFERENCES tasks(id)
);