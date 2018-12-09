CREATE TABLE users
(
	id            SERIAL,
	email         VARCHAR(255) NOT NULL,
	password_hash CHAR(32)     NOT NULL,
	PRIMARY KEY (id),
	UNIQUE (email)
);

CREATE TABLE tours
(
	id                SERIAL,
	name              VARCHAR(255) NOT NULL,
	cost_per_customer MONEY        NOT NULL CHECK ( cost_per_customer > 0::MONEY ),
	days_in_space     SMALLINT     NOT NULL CHECK ( days_in_space > 0 ),
	days_on_earth     SMALLINT     NOT NULL CHECK ( days_on_earth > 0 ),
	PRIMARY KEY (id),
	UNIQUE (name)
);

ALTER TABLE tours
	ADD COLUMN short_description VARCHAR(255) NOT NULL,
	ADD COLUMN full_description TEXT NOT NULL;

ALTER TABLE tours
	ADD COLUMN link VARCHAR(20) NOT NULL;

CREATE TABLE tours_schedule
(
	id        SERIAL,
	id_tour   INT,
	starts_at DATE NOT NULL,
	PRIMARY KEY (id),
	FOREIGN KEY (id_tour) REFERENCES tours (id)
);

CREATE TABLE orders
(
	id               SERIAL,
	id_user          INT   NOT NULL,
	id_tour_schedule INT   NOT NULL,
	created_at       DATE  NOT NULL DEFAULT CURRENT_DATE,
	total_cost       MONEY NOT NULL CHECK ( total_cost > 0::MONEY ),
	PRIMARY KEY (id),
	FOREIGN KEY (id_user) REFERENCES users (id),
	FOREIGN KEY (id_tour_schedule) REFERENCES tours_schedule (id)
);

CREATE TABLE participants
(
	id                SERIAL,
	id_order          INT          NOT NULL,
	full_name         VARCHAR(255) NOT NULL,
	src_personal_card VARCHAR(255) NOT NULL,
	src_medical_card  VARCHAR(255) NOT NULL,
	PRIMARY KEY (id),
	FOREIGN KEY (id_order) REFERENCES orders (id)
);