-- Active: 1768475857509@@127.0.0.1@5432@postgres
CREATE DATABASE evolveAI;
CREATE TABLE Users(
    id SERIAL PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE User_Profile(
    id SERIAL PRIMARY KEY,
    user_id int NOT NULL,
    income_goal DECIMAL(10,2) NOT NULL,
    available_time int not NULL,
    FOREIGN KEY (user_id) REFERENCES Users(id)
);
CREATE TYPE opportunity_status AS ENUM (
    'active',
    'completed',
    'paused',
    'archived'
);

CREATE TABLE opportunities(
    id SERIAL PRIMARY KEY,
    user_id int NOT NULL,
    title VARCHAR(255) NOT null,
    description VARCHAR(255) NOT NULL,
    earning_estimate DECIMAL(10,2) NOT NULL,
    external_link VARCHAR(255) NOT NULL,
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
    generated_by_ai BOOLEAN DEFAULT FALSE,
    FOREIGN KEY (task_id) REFERENCES tasks(id)
);