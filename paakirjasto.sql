CREATE TABLE `Kirjailijat` (
  `KirjailijaID` int NOT NULL AUTO_INCREMENT,
  `KirjailijaName` varchar(100) NOT NULL,
  PRIMARY KEY (`KirjailijaID`)
);

CREATE TABLE `Genret` (
  `GenreID` int NOT NULL AUTO_INCREMENT,
  `Genret` varchar(50) NOT NULL,
  PRIMARY KEY (`GenreID`)
);

CREATE TABLE `Kirjat` (
  `KirjaID` int NOT NULL AUTO_INCREMENT,
  `KirjaName` varchar(255) NOT NULL,
  `KirjailijaID` int NOT NULL,
  `GenreID` int NOT NULL,
  `Kopioita` int NOT NULL DEFAULT 1,
  PRIMARY KEY (`KirjaID`)
);

CREATE TABLE `Lainat` (
  `LainaID` int NOT NULL AUTO_INCREMENT,
  `KirjaID` int NOT NULL,
  `Lainaaja` varchar(100) NOT NULL,
  `LainaPvm` date DEFAULT CURRENT_DATE,
  `Palautettu` tinyint DEFAULT 0,
  PRIMARY KEY (`LainaID`)
);

INSERT INTO `Kirjailijat` (`KirjailijaName`) VALUES
  ('Miguel de Cervantes'),
  ('Lewis Carroll'),
  ('Mark Twain'),
  ('Robert Louis Stevenson');

INSERT INTO `Genret` (`Genret`) VALUES
  ('romaani'),
  ('fiktio'),
  ('lasten kirjallisuus'),
  ('seikkailufiktio');

INSERT INTO `Kirjat` (`KirjaName`, `KirjailijaID`, `GenreID`, `Kopioita`) VALUES
  ('Don Quixote', 1, 1, 4),
  ('Alices Adventures in Wonderland', 2, 3, 3),
  ('The Adventures of Huckleberry Finn', 3, 2, 3),
  ('The Adventures of Tom Sawyer', 3, 2, 2),
  ('Treasure Island', 4, 4, 4);
