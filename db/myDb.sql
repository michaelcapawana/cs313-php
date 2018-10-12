CREATE TABLE users 
(
    id SERIAL PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL, 
    password VARCHAR(50) NOT NULL
);

CREATE TABLE reviews
(
    id SERIAL PRIMARY KEY,
    rating SMALLINT NOT NULL,
    description TEXT,
    user_id INT NOT NULL REFERENCES users(id),
    business INT NOT NULL REFERENCES business(id)
);

CREATE TABLE business
(
    id SERIAL PRIMARY KEY,
    name VARCHAR(100) UNIQUE NOT NULL
);