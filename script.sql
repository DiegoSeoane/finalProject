CREATE DATABASE hospital;
CREATE USER doctor@localhost IDENTIFIED BY 'abc123.';
GRANT ALL PRIVILEGES ON hospital.* TO doctor@localhost;