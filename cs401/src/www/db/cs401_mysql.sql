CREATE TABLE users (
     name VARCHAR(64) NOT NULL,
     id INT AUTO_INCREMENT PRIMARY KEY,
     email VARCHAR(64) NOT NULL,
     phone INT(10),
     password VARCHAR(64) NOT NULL,
     access INTEGER(1),
     signup_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
     );

CREATE TABLE comments (
    comment_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    comment VARCHAR NOT NULL,
    comment_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );

CREATE TABLE contactOnlyUsers (
    name VARCHAR(64) NOT NULL,
    phone INTEGER(10),
    email VARCHAR(64) NOT NULL PRIMARY KEY,
    project_description VARCHAR,
    contact_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );
