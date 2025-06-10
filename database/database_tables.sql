DROP TABLE if EXISTS Edition;
DROP TABLE if EXISTS Releated_Boardgames;
DROP TABLE if EXISTS User_boardgame_interaction;
DROP TABLE if EXISTS COMMENT;
DROP TABLE if EXISTS File;
DROP TABLE if EXISTS Video;
DROP TABLE if EXISTS Forum;
DROP TABLE if EXISTS Video_Category;
DROP TABLE if EXISTS Forum_Category;
DROP TABLE if EXISTS Boardgame_Media;
DROP TABLE if EXISTS User_Microbadges;
DROP TABLE if EXISTS Microbadges;
DROP TABLE if EXISTS Boardgame_Publisher;
DROP TABLE if EXISTS Boardgame_Artist;
DROP TABLE if EXISTS Boardgame_Designer;
DROP TABLE if EXISTS Boardgame_Like;
DROP TABLE if EXISTS Boardgame_Categories;
DROP TABLE if EXISTS Boardgame_Awards;
DROP TABLE if EXISTS Awards;
DROP TABLE if EXISTS Boardgame_AlternativeNames;
DROP TABLE if EXISTS Boardgame;
DROP TABLE if EXISTS Boardgame_Category;
DROP TABLE if EXISTS User;
DROP TABLE if EXISTS Person;
DROP TABLE if EXISTS Country;
DROP TABLE if EXISTS Language;

CREATE TABLE Language (
	id INT PRIMARY KEY AUTO_INCREMENT,
	name VARCHAR(100) NOT NULL,
	code VARCHAR(10) NOT NULL
);

CREATE TABLE Country (
	id INT PRIMARY KEY AUTO_INCREMENT,
	name VARCHAR(100) NOT NULL
);


CREATE TABLE Person (
	id INT PRIMARY KEY AUTO_INCREMENT,
	name VARCHAR(255) NOT NULL,
	is_real_person BOOL NOT NULL,
	birth_date DATE,
	biography TEXT,
	country_id INT,
	FOREIGN KEY (country_id) REFERENCES Country(id)
);


CREATE TABLE User (
	id INT PRIMARY KEY AUTO_INCREMENT,
	username VARCHAR(50) NOT NULL,
	email VARCHAR(255) NOT NULL,
	password VARCHAR(255) NOT NULL,
	user_description VARCHAR(1000),
	first_name VARCHAR(100),
	last_name VARCHAR(100),
	registration_date VARCHAR(255),
	last_profile_update VARCHAR(255),
	last_login VARCHAR(255),
	website VARCHAR(255),
	avatar_url VARCHAR(500),
	country_id INT,
	n_published_media INT DEFAULT 0,
	FOREIGN KEY (country_id) REFERENCES Country(id)
);


CREATE TABLE Boardgame_Category (
	id INT PRIMARY KEY AUTO_INCREMENT,
	category_type VARCHAR(10),
	name VARCHAR(100) NOT NULL
);


CREATE TABLE Boardgame (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    year_published INT,
    small_description VARCHAR(255),
    min_players INT,
    max_players INT,
    playing_time INT,
    min_age INT,
    description TEXT,
    complexity_rating FLOAT,
    average_rating FLOAT,
    bgg_rank INT,
    num_ratings INT DEFAULT 0,
    num_comments INT DEFAULT 0,
    image_url VARCHAR(500),
    thumbnail_url VARCHAR(500),
    created_date VARCHAR(255),
    updated_date VARCHAR(255),
    official_link VARCHAR(255),
    official_link_alt VARCHAR(255),
    owners INT,
	n_likes INT DEFAULT 0,
	n_expansions INT DEFAULT 0,
	n_versions INT DEFAULT 0
);

CREATE TABLE Boardgame_AlternativeNames (
	boardgame_id INT,
	name VARCHAR(255) NOT NULL,
	PRIMARY KEY (boardgame_id, name),
	FOREIGN KEY (boardgame_id) REFERENCES Boardgame(id)
);

CREATE TABLE Awards (
	id INT PRIMARY KEY AUTO_INCREMENT,
	name VARCHAR(255) NOT NULL,
	award_year INT,
	description TEXT
);


CREATE TABLE Boardgame_Awards (
	boardgame_id INT,
	award_id INT,
	year_won INT,
	PRIMARY KEY (boardgame_id, award_id),
	FOREIGN KEY (boardgame_id) REFERENCES Boardgame(id),
	FOREIGN KEY (award_id) REFERENCES Awards(id)
);


CREATE TABLE Boardgame_Categories (
	boardgame_id INT,
	category_id INT,
	PRIMARY KEY (boardgame_id, category_id),
	FOREIGN KEY (boardgame_id) REFERENCES Boardgame(id),
	FOREIGN KEY (category_id) REFERENCES Boardgame_Category(id)
);

CREATE TABLE Boardgame_Like (
	boardgame_id INT,
	user_id INT,
	PRIMARY KEY (boardgame_id, user_id),
	FOREIGN KEY (boardgame_id) REFERENCES Boardgame(id),
	FOREIGN KEY (user_id) REFERENCES User(id)
);


CREATE TABLE Boardgame_Designer (
	boardgame_id INT,
	person_id INT,
	PRIMARY KEY (boardgame_id, person_id),
	FOREIGN KEY (boardgame_id) REFERENCES Boardgame(id),
	FOREIGN KEY (person_id) REFERENCES Person(id)
);


CREATE TABLE Boardgame_Artist (
	boardgame_id INT,
	person_id INT,
	PRIMARY KEY (boardgame_id, person_id),
	FOREIGN KEY (boardgame_id) REFERENCES Boardgame(id),
	FOREIGN KEY (person_id) REFERENCES Person(id)
);


CREATE TABLE Boardgame_Publisher (
	boardgame_id INT,
	person_id INT,
	PRIMARY KEY (boardgame_id, person_id),
	FOREIGN KEY (boardgame_id) REFERENCES Boardgame(id),
	FOREIGN KEY (person_id) REFERENCES Person(id)
);


CREATE TABLE Microbadges (
	id INT PRIMARY KEY AUTO_INCREMENT,
	name VARCHAR(100) NOT NULL,
	description VARCHAR(255),
	image_url VARCHAR(500)
);


CREATE TABLE User_Microbadges (
	user_id INT,
	microbadge_id INT,
	PRIMARY KEY (user_id, microbadge_id),
	FOREIGN KEY (user_id) REFERENCES User(id),
	FOREIGN KEY (microbadge_id) REFERENCES Microbadges(id)
);


CREATE TABLE Boardgame_Media (
	id INT PRIMARY KEY AUTO_INCREMENT,
	boardgame_id INT,
	title VARCHAR(1000),
	media_type VARCHAR(255),
	description TEXT,
	uri VARCHAR(500),
	upload_date VARCHAR(255),
	uploader_user_id INT,
	n_likes INT DEFAULT 0,
	n_comments INT DEFAULT 0,
	language_id INT NOT NULL,
	FOREIGN KEY (boardgame_id) REFERENCES Boardgame(id),
	FOREIGN KEY (uploader_user_id) REFERENCES User(id),
	FOREIGN KEY (language_id) REFERENCES Language(id)
);


CREATE TABLE Forum_Category (
	id INT PRIMARY KEY AUTO_INCREMENT,
	name VARCHAR(100) NOT NULL,
	description TEXT
);


CREATE TABLE Video_Category (
	id INT PRIMARY KEY AUTO_INCREMENT,
	name VARCHAR(100) NOT NULL,
	description TEXT
);


CREATE TABLE Forum (
	id INT PRIMARY KEY AUTO_INCREMENT,
	media_id INT,
	forum_category_id INT,
	FOREIGN KEY (media_id) REFERENCES Boardgame_Media(id),
	FOREIGN KEY (forum_category_id) REFERENCES Forum_Category(id)
);


CREATE TABLE Video (
	id INT PRIMARY KEY AUTO_INCREMENT,
	media_id INT,
	video_category_id INT,
	thumbnail_url VARCHAR(500),
	FOREIGN KEY (media_id) REFERENCES Boardgame_Media(id),
	FOREIGN KEY (video_category_id) REFERENCES Video_Category(id)
);

CREATE TABLE File (
	id INT PRIMARY KEY AUTO_INCREMENT,
	media_id INT,
	file_size INT,
	extension VARCHAR(10),
	FOREIGN KEY (media_id) REFERENCES Boardgame_Media(id)
);


CREATE TABLE Comment (
	id INT PRIMARY KEY AUTO_INCREMENT,
	boardgameMedia_id INT,
	user_id INT,
	text_comment TEXT NOT NULL,
	last_update_date VARCHAR(255),
	FOREIGN KEY (boardgameMedia_id) REFERENCES Boardgame_Media(id),
	FOREIGN KEY (user_id) REFERENCES User(id)
);


CREATE TABLE User_boardgame_interaction (
	user_id INT,
	boardgame_id INT,
	owns BOOLEAN DEFAULT FALSE,
	rating INT,
	added_date VARCHAR(255),
	PRIMARY KEY (user_id, boardgame_id),
	FOREIGN KEY (user_id) REFERENCES User(id),
	FOREIGN KEY (boardgame_id) REFERENCES Boardgame(id)
);

CREATE TABLE Releated_Boardgames (
	main_boardgame_id INT,
	related_boardgame_id INT,
	PRIMARY KEY (main_boardgame_id, related_boardgame_id),
	FOREIGN KEY (main_boardgame_id) REFERENCES Boardgame(id),
	FOREIGN KEY (related_boardgame_id) REFERENCES Boardgame(id)
);


CREATE TABLE Edition (
	edition_boardgame_id INT,
	base_boardgame_id INT,
	edition_type VARCHAR(255),
	PRIMARY KEY (edition_boardgame_id, base_boardgame_id),
	FOREIGN KEY (edition_boardgame_id) REFERENCES Boardgame(id),
	FOREIGN KEY (base_boardgame_id) REFERENCES Boardgame(id)
);

