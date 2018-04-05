<?php

CREATE DATABASE company;

CREATE TABLE users (
  id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  first_name VARCHAR(50) NOT NULL,
  last_name VARCHAR(50) NOT NULL,
  email VARCHAR(100) NOT NULL UNIQUE,
  password VARCHAR(50) NOT NULL,
  role VARCHAR(30) NOT NULL DEFAULT 'user',
  address VARCHAR(150) NULL,
  phone VARCHAR(20) NULL,
  gender VARCHAR(20) NOT NULL,
  dob DATE NULL,
  biography TEXT(1000) NULL,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
    
    
);

CREATE TABLE courses (
    id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    course_name VARCHAR(100) NOT NULL,
    description TEXT NULL,
    admin_id INT UNSIGNED NOT NULL ,FOREIGN KEY REFERENCES users(id),
    start_at DATETIME NULL,
    end_at DATETIME,
    total_hours INTEGER(1000) UNSIGNED ,
    hours_per_session TINYTEXT UNSIGNED
    
);

CREATE TABLE sessions (
  id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  session_name VARCHAR(50) NOT NULL,
  course_id INT UNSIGNED NOT NULL, FOREIGN KEY REFERENCES courses(id),
  instructor_id INT UNSIGNED NOT NULL, FOREIGN KEY REFERENCES course_instructor(instructor_id),
  start_at DATETIME NULL,
  end_at DATETIME NULL,
  assignments text null,
  note text null 
);

CREATE TABLE course_instructors (
    id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    user_id int UNSIGNED NOT NULL ,FOREIGN KEY(user_id) REFERENCES users (id) ,
    course_id INT UNSIGNED NOT NULL FOREIGN KEY REFERENCES courses(id),
    hourly_rate INT(500) NOT NULL,
    note TEXT NULL 
);


CREATE TABLE salaries (
  id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  user_id INT UNSIGNED NOT NULL, FOREIGN KEY REFERENCES users(id),
  from1 DATETIME NULL,
  to1 DATETIME NULL,
  amount INT UNSIGNED NOT NULL,
  note TEXT NULL 
    
);

CREATE TABLE student_payments(
  id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  student_id INT UNSIGNED NOT NULL, FOREIGN KEY REFERENCES users(id) WHERE role = student,
  paid_at DATETIME NOT NULL,
  amount INT NOT NULL,
  note TEXT NULL
);

CREATE TABLE course_students(
  id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  course_id INT UNSIGNED NOT NULL, FOREIGN KEY REFERENCES courses(id),
  student_id INT UNSIGNED NOT NULL, FOREIGN KEY REFERENCES users(id) WHERE role = student,
  joined_at DATETIME NOT NULL,
  to_be_paid INT NULL,
  deposit INT NULL,
  note TEXT NULL
);

CREATE TABLE session_attendance(
  id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  session_id INT UNSIGNED NOT NULL, FOREIGN KEY REFERENCES sessions(id),
  student_id INT UNSIGNED NOT NULL, FOREIGN KEY REFERENCES users(id) WHERE role = student,
  came_at DATE TIME NULL,
  left_at DATE TIME NULL,
  session_progress INT(100) NULL,
  assigns_grade INT(100) NULL,
  note TEXT NULL
    
    
);

?>