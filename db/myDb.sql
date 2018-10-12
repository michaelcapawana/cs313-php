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

INSERT INTO users (username, password) VALUES ('mcapawana', 'password123');
INSERT INTO users (username, password) VALUES ('acapawana', '123password');

INSERT INTO business (name) VALUES ('Chanchos');
INSERT INTO business (name) VALUES ('Ohana Hut');
INSERT INTO business (name) VALUES ('Doughlicious');
INSERT INTO business (name) VALUES ('ParadICE');
INSERT INTO business (name) VALUES ('Treeline');
INSERT INTO business (name) VALUES ('Stick Out');

INSERT INTO reviews (rating, description, user_id, business) VALUES ('5', 'Perfect and Cold!', 1, 4);
INSERT INTO reviews (rating, description, user_id, business) VALUES ('5', 'Great Mexican Food!', 2, 1);
