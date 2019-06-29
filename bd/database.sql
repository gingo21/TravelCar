

DROP TABLE IF EXISTS airport;
CREATE TABLE IF NOT EXISTS airport (
  acronym  varchar(3) NOT NULL,
  city varchar(30) NOT NULL,
  name_airport varchar(50) NOT NULL,
  PRIMARY KEY (acronym)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO airport (acronym, city, name_airport) VALUES
('CDG', 'Paris', 'Paris-Charles De Gaulle'),
('HEL', 'Helsinki', 'Helsinki Airport'),
('LCY', 'Londres', 'London City Airport'),
('LHR', 'Londres', 'Heathrow Airport'),
('ORY', 'Paris', 'Paris Orly Airport'),
('FRA', 'Frankfurt', 'Frankfurt am Main Airport'),
('PVG', 'Shanghai', 'Shanghai Pudong International Airport'),
('SHA', 'Shanghai', 'Shanghai Hongqiao Airport');




DROP TABLE IF EXISTS parking;
CREATE TABLE IF NOT EXISTS parking (
  label varchar(30) NOT NULL,
  airport varchar(3) NOT NULL,
  day_price int(11) NOT NULL,
  number_max int(11) NOT NULL,
  PRIMARY KEY (label),
  FOREIGN KEY (airport) REFERENCES airport(acronym)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ;



INSERT INTO parking (label, airport, day_price, number_max) VALUES
('Parking 2 CDG', 'CDG', 20, 400),
('Parking Roissy', 'CDG', 40, 500);

DROP TABLE IF EXISTS car;
CREATE TABLE IF NOT EXISTS car (
	plate_id VARCHAR(15),
	brand VARCHAR(15),
	modele varchar(15),
	color_car ENUM("blue","red","green","grey"),
	PRIMARY KEY(plate_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ;

INSERT INTO car (plate_id, brand, modele, color_car) VALUES
('Z0PP56KT','TESLA','Modele S', 'red'),
('IEFUOFEN','Renaud','TWINGO','grey');


DROP TABLE IF EXISTS user;
CREATE TABLE IF NOT EXISTS user (
  id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(30) NOT NULL,
  firstname varchar(30) NOT NULL,
  telephone int(13) NOT NULL,
  password varchar(50) NOT NULL,
  email varchar(50) NOT NULL,
  type ENUM("client","admin"),
  PRIMARY KEY (id, email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ;

INSERT INTO user (name, firstname, telephone, password, email,type) VALUES
('Reymond','François','0652457895','motdepassecomplique','francois.reymond@utt.fr','admin');

DROP TABLE IF EXISTS car_owner;
CREATE TABLE IF NOT EXISTS car_owner (
  plate_id VARCHAR(15)  NOT NULL,
  car_owner_id int(11)  NOT NULL,
  date_start date NOT NULL,
  date_end date,
  PRIMARY KEY(plate_id, car_owner_id),
  FOREIGN KEY(plate_id) REFERENCES car(plate_id),
  FOREIGN KEY(car_owner_id) REFERENCES user(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ;

INSERT INTO car_owner (plate_id, car_owner_id, date_start, date_end) VALUES
('Z0PP56KT',1,'2019-05-25',NULL),
('IEFUOFEN',3,'2019-05-31',NULL);

DROP TABLE IF EXISTS rent;
CREATE TABLE IF NOT EXISTS rent (
  rent_id int(11) NOT NULL AUTO_INCREMENT,
  plate_id varchar(15) NOT NULL,
  renter_id int(11) NOT NULL,
  label_parking varchar(30) NOT NULL,
  date_start datetime NOT NULL,
  date_end datetime NOT NULL,
  PRIMARY KEY (rent_id),
  FOREIGN KEY (renter_id) REFERENCES user(id),
  FOREIGN KEY (label_parking) REFERENCES parking(label),
  FOREIGN KEY (plate_id) REFERENCES car_owner(plate_id)
)  ENGINE=InnoDB DEFAULT CHARSET=utf8 ;



DROP TABLE IF EXISTS park;
CREATE TABLE IF NOT EXISTS park (
  park_id int(11) NOT NULL AUTO_INCREMENT,
  plate_id  VARCHAR(15) NOT NULL,
  label_parking VARCHAR(30) NOT NULL,
  car_owner_id int(11) NOT NULL,
  date_debut date NOT NULL,
  date_fin date NOT NULL,
  price int(11) NOT NULL,
  PRIMARY KEY (park_id),
  CONSTRAINT fk_plate_id FOREIGN KEY  (plate_id) REFERENCES car(plate_id),
  CONSTRAINT fk_label_parking FOREIGN KEY  (label_parking) REFERENCES parking(label),
  CONSTRAINT  fk_car_owner FOREIGN KEY (car_owner_id) REFERENCES car_owner(car_owner_id)
)  ENGINE=InnoDB DEFAULT CHARSET=utf8 ;



INSERT INTO park (plate_id, label_parking, car_owner_id, date_debut, date_fin,price) VALUES
('Z0PP56KT', 'Parking Roissy',1,'2019-05-25', '2019-05-26',12);


DROP TRIGGER IF EXISTS increment_places_parking;
DELIMITER $$
CREATE TRIGGER increment_places_parking BEFORE INSERT ON park FOR EACH ROW UPDATE parking SET parking.number_max = parking.number_max - 1
where parking.label = new.label_parking
$$
DELIMITER ;