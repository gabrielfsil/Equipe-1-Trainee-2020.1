--
-- Database: felizlandia_park
--

CREATE DATABASE felizlandia_park;

-- --------------------------------------------------------

--
-- Table structure for table category
--

CREATE TABLE felizlandia_park.category (
  id int AUTO_INCREMENT NOT NULL,
  name varchar(80) NOT NULL,
  PRIMARY KEY(id)
);

-- --------------------------------------------------------

--
-- Table structure for table atracoes
--

CREATE TABLE felizlandia_park.atracoes (
  id int AUTO_INCREMENT NOT NULL,
  nome varchar(100) NOT NULL,
  valor decimal(10,2) NOT NULL,
  descricao varchar(1500) NOT NULL,
  foto varchar(300) NOT NULL,
  categoria_id int NOT NULL,
  PRIMARY KEY(id),
  FOREIGN KEY (categoria_id) REFERENCES category(id)
);

-- --------------------------------------------------------

--
-- Table structure for table person
--

CREATE TABLE felizlandia_park.person (
  id int AUTO_INCREMENT NOT NULL,
  name varchar(350) NOT NULL,
  email varchar(350) NOT NULL,
  password varchar(50) NOT NULL,
  PRIMARY KEY(id)
);