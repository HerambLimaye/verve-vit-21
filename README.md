# verve-vit


CREATE TABLE users ( id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT, name varchar(30) NOT NULL, email varchar(50) NOT NULL, username varchar(30) NOT NULL UNIQUE, password varchar(255) NOT NULL, council varchar(40) NOT NULL, created_at datetime DEFAULT CURRENT_TIMESTAMP );

CREATE TABLE events ( event_id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT, event_name varchar(100) NOT NULL UNIQUE, description text NOT NULL, date_of_event varchar(50) NOT NULL, time varchar(50) NOT NULL, venue varchar(50) NOT NULL, contact_numbers varchar(255) NOT NULL, questions text NOT NULL, event_poster varchar(50) NOT NULL, form_name text NOT NULL, council varchar(40) NOT NULL, registrations varchar(6) NOT NULL, delete_e varchar(6) NOT NULL, user_id int(11) NOT NULL );

CREATE TABLE contact ( contact_id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT, name varchar(30) NOT NULL, email varchar(50) NOT NULL, phone varchar(15) NOT NULL, message text, created_at datetime DEFAULT CURRENT_TIMESTAMP );
