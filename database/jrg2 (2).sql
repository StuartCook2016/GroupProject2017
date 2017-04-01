-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 01, 2017 at 04:53 PM
-- Server version: 5.7.11
-- PHP Version: 5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jrg2`
--

-- --------------------------------------------------------

--
-- Table structure for table `accdetails`
--

CREATE TABLE `accdetails` (
  `username` varchar(20) NOT NULL,
  `passwd` varchar(25) NOT NULL,
  `position` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accdetails`
--

INSERT INTO `accdetails` (`username`, `passwd`, `position`) VALUES
('2Max345', 'Maxxy12', 'Staff'),
('AB123', 'Mama121164', 'Admin'),
('ADX5930', '45454545', 'Staff'),
('AndyY21', '120123', 'Staff'),
('AX14', 'adg357', 'Staff'),
('BBrode102', 'a', 'Admin'),
('Bethy16', 'a', 'Manager'),
('Bina1842', 'gh55r3', 'Staff'),
('BKainer74', 'Kain1234', 'Manager'),
('Brown294', 'dfg887', 'Manager'),
('Carton29', '55grape1', 'Staff'),
('CClark5666', '120asda', 'Staff'),
('Chad42', 'ben123', 'Staff'),
('DaisyFlow', 'Rogue1', 'Manager'),
('DanKetch', 'Ketcher', 'Manager'),
('DPrince8192', 'Diana66', 'Manager'),
('Dugas210', '330gogo', 'Staff'),
('ET1203', '4fit45', 'Staff'),
('FinaK23', '1212drone', 'Staff'),
('ght5', 'A', 'Manager'),
('Harper020R', 'Finalnd002', 'Staff'),
('Jaccky2', 'jack1234', 'Manager'),
('Juri2910', 'Bond007', 'Staff'),
('JWatt', 'reiufh', 'Staff'),
('KenM0192', '561wef', 'Staff'),
('KevIt', 'erg54', 'Staff'),
('LB164', 'Burnie12', 'Manager'),
('LG16', '654refg', 'Staff'),
('Lmy12', 'great123', 'Staff'),
('Moria19203', 'lolalola', 'Admin'),
('MurMuz09', '12des1', 'Staff'),
('MurrayC009', 'beetlejuice', 'Staff'),
('MWright30', '45188', 'Staff'),
('NathL96', 'juicy22', 'Staff'),
('Noble1004', 'zxcvbnm', 'Staff'),
('OliverLLL', '123456789', 'Staff'),
('PeterR192', '00220022', 'Staff'),
('Plug699', 'aeiou123', 'Staff'),
('Presto35', 'lopolop', 'Staff'),
('Really4950', '649731', 'Staff'),
('rp10', 'humble31', 'Staff'),
('RSmith', 'memeking', 'Staff'),
('RW1995', 'e6r51g4', 'Staff'),
('SarahCo', '321rgee', 'Admin'),
('SB34', 'qwerty12', 'Manager'),
('Seany16', 'seanboy12', 'Staff'),
('SloanR', 'house65doc', 'Staff'),
('Spring10', 'Springfield', 'Staff'),
('SS28', 'TwentyEight', 'Manager'),
('Trump218', 'President', 'Staff'),
('WillHills', 'Bettingman', 'Staff');

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `jobID` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `status` enum('Accepted','Pending','Unsuccessful') DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`jobID`, `username`, `status`) VALUES
(10001, 'BBrode102', 'Accepted'),
(10009, 'BBrode102', 'Accepted'),
(10010, 'ght5', 'Pending'),
(10011, 'BBrode102', 'Pending'),
(10019, 'ght5', 'Unsuccessful'),
(10023, 'ght5', 'Accepted'),
(10024, 'BBrode102', 'Pending'),
(10024, 'ET1203', 'Pending'),
(10024, 'KevIt', 'Pending'),
(10025, 'DaisyFlow', 'Pending'),
(10039, 'BBrode102', 'Unsuccessful'),
(10044, 'ght5', 'Accepted');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `username` varchar(20) NOT NULL,
  `firstName` varchar(35) NOT NULL,
  `lastName` varchar(35) NOT NULL,
  `emailAddress` varchar(254) NOT NULL,
  `contactNumber` varchar(20) NOT NULL,
  `doorNumber` varchar(8) NOT NULL,
  `streetName` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `postcode` varchar(15) NOT NULL,
  `country` varchar(30) NOT NULL,
  `rangeOfWork` int(11) NOT NULL,
  `willingToRelocate` enum('Y','N') DEFAULT 'N',
  `additionalInfo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`username`, `firstName`, `lastName`, `emailAddress`, `contactNumber`, `doorNumber`, `streetName`, `city`, `postcode`, `country`, `rangeOfWork`, `willingToRelocate`, `additionalInfo`) VALUES
('2Max345', 'Max', 'Massa', 'MassaMax@me.com', '07903859432', '22', 'Upper Park Road', 'Salford', 'M14 5RH', 'England', 40, 'Y', 'Only willing to relocate if the project takes place within Scotland'),
('AB123', 'Ashley', 'Banks', 'ABanks123@Hotmail.com', '078403859543', '101', 'Ravenhill Road', 'Belfast', 'BT6 8QD', 'Ireland', 20, 'N', ''),
('ADX5930', 'Adam', 'Lester', 'AdamX@yahoo.com', '079403895094', '21', 'Shaftesbury Square', 'Belfast', 'BT2 7DB', 'Ireland', 30, 'Y', 'Actively looking to relocate '),
('AndyY21', 'Andrew', 'Young', 'YoungA5839@hotmail.com', '0783985839', '258', 'Pentoville Road', 'London', 'N1 9JY', 'England', 35, 'Y', ''),
('AX14', 'Alexander', 'O\'Donnel ', 'Zandero@gmail.com', '07832907783', '18', 'High Street', 'Dalkeith', 'Eh22 1AW', 'Scotland', 80, 'Y', 'Freshly out of university so lacks experience'),
('BBrode102', 'Ben', 'Brode', 'BBrodeRED@hotmail.com', '075930294892', '159', 'Lothian Road', 'Edinburgh', 'EH3 9AA', 'Scotland', 20, 'Y', ''),
('Bethy16', 'Beth', 'Sparrow', 'BirdyBeth@googlemail.com', '012948923049', '25', 'Bedford Street', 'New York', '10014', 'United States', 20, 'N', ''),
('Bina1842', 'Clark', 'Kent', 'Binary18@gmail.co.uk', '079506758554', '124a', 'John Street', 'Penicuik', 'eh24 8ng', 'Scotland', 15, 'N', ''),
('BKainer74', 'Brian', 'Kinard', 'BKB92039@gmail.com', '07850383049', '11', 'Templemore Avenue', 'Belfast', 'BT5 4FP', 'Ireland', 15, 'Y', ''),
('Brown294', 'Andrew', 'Brown', 'brown_andy@hotmail.com', '07908706659', '4', 'Angle Park', 'Edinburgh', 'eh4 828', 'Scotland', 10, 'Y', ''),
('Carton29', 'Carol', 'Tony', 'Carton29@hotmail.co.uk', '01930 678492', '10', 'Strong Lane', 'Edinburgh ', 'eh36 829', 'Scotland', 24, 'N', ''),
('CClark5666', 'Calum', 'Clark', 'CClarkCom@gmail.com', '078493859395', '45', 'New Oxford Street', 'London', 'WC1A 1BH', 'England ', 70, 'Y', ''),
('Chad42', 'Chad', 'Johnson', 'BigChad@hotmail.com', '07714512200', '14/7', 'Greenwood', 'Los Angeles', '90032', 'USA', 50, 'Y', 'Recently promoted to manager and looking to undertake first project in charge'),
('DaisyFlow', 'Daisy ', 'Barren', 'Daisyflow46@hotmail.com', '079403928', '43', 'Glover Avenue', 'Manchester', 'MN4 2010', 'England', 98, 'Y', ''),
('DanKetch', 'Daniel', 'Ketch', 'Ghost16@hotmail.com', '084726193748', '22', 'rue du Grenier-Saint-Lazare', 'Paris', '75003', 'France', 40, 'Y', 'Fluent in french, english and german'),
('DPrince8192', 'Diana ', 'Prince', 'CSPrince@Yahoo.com', '07950398291', '24', 'Kirk Street', 'Edinburgh', 'Eh6 5ez', 'Scotland', 15, 'Y', ''),
('Dugas210', 'Matthew', 'Dugas', 'MDatthew@aol.com', '07483985939', '190', 'Morningside Road', 'Edinburgh', 'EH10 4PU', 'Scotland', 25, 'Y', ''),
('ET1203', 'Ellen', 'Thompson ', 'Thompson1203@hotmail.com', '07958392981', '16', 'Drum Brae Drive', 'Edinburgh', 'EH4 7SH', 'Scotland', 10, 'N', 'Cannot Drive'),
('FinaK23', 'Finley', 'King', 'KingFin@gmail.com', '0789483929', '18', 'Elm Row', 'Edinburgh', 'EH7 4AA', 'Scotland', 70, 'Y', ''),
('ght5', 'Greg', 'Todd', 'toddy233@hotmail.com', '01314446655', '3', 'Newgrange Road', 'Edinburgh', 'EH14 5TG', 'Scotland', 80, 'Y', 'I have experience in a variety of Object-Oriented Languages such as Java. I\'ve also had experience in Database Design and Implementation'),
('Harper020R', 'Roy', 'Harper', 'RHRYMO@aol.com', '0786957483948', '237', 'Gorgie Road', 'Edinburgh', 'Eh11 1TU', 'Scotland', 25, 'Y', ''),
('Jaccky2', 'Jack', 'Cold', 'Jaccky54@hotmail.com', '079593086940', '14', 'Sunbury Avenue', 'Edinburgh', 'eh4 3by', 'Scotland', 50, 'Y', ''),
('Juri2910', 'Juri', 'Gellen', 'GelenPR@hotmail.com', '07950486049', '5', 'Avenue Anatole', 'Paris', '75007', 'France', 20, 'Y', ''),
('JWatt', 'Jay', 'Watt', 'JJWatt@hotmail.com', '07855265480', '30', 'Longstone Green', 'New York', '51121', 'USA', 50, 'N', ''),
('KenM0192', 'Ken', 'Masters', 'MastersLK@hotmail.com', '0768497829284', '2', 'Hanover Buildings', 'Edinburgh', 'EH2 2NN', 'Scotland', 10, 'Y', ''),
('KevIt', 'Kevin', 'Louden', 'Loudenmail@aol.com', '07950496042', '131/4', 'WillowBrae Road', 'Edinburgh', 'EH8 7HW', 'Scotland', 15, 'N', ''),
('LB164', 'Lauren', 'Bickmore', 'BickmoreIT@google.com', '0785938292', '16', 'Ardencote Road', 'Birmingham', 'B13 0RN', 'England', 20, 'N', 'Recently finished a project abroad so would rather not relocate at this time.'),
('LG16', 'Liam', 'Gold', 'LGold@yahoo.com', '01612252624', '122', 'Market Street', 'Manchester', 'M1 1FR', 'England', 50, 'N', ''),
('Lmy12', 'Liam', 'Mccathie ', 'RoversBil@hotmail.co.uk', '07986876554', '11', 'High Street', 'Bonnyrigg', 'eh19 2da', 'Scotland', 20, 'N', ''),
('Moria19203', 'Moria', 'Braggart ', 'BraggM@Gmail.com', '079404850988', '60', 'York Road', 'Belfast', 'BT15  3HE', 'Ireland', 20, 'Y', 'Would relocate to England but not Scotland '),
('MurMuz09', 'Murray', 'Mckenzie ', 'MurrayMck@gmail.com', '0789604932', '13', 'St Ninans Road', 'Stirling', 'FK8 2HD', 'Scotland', 100, 'Y', ''),
('MurrayC009', 'Craig', 'Murray', 'CMurray@gmail.com', '078948684933', '125', 'Lower Marsh', 'London', 'SE1 7AE', 'England', 40, 'Y', ''),
('MWright30', 'Megan', 'Wright', 'WrightAll@yahoo.com', '070483928932', '35', 'South Bridge ', 'Edinburgh', 'EH1 1LL', 'Scotland', 60, 'Y', ''),
('NathL96', 'Nathan', 'Lyell', 'Nathlyell@aol.com', '079049308503', '1-7', 'Provence-Alps-Cote d`Azur', 'France', '83300', 'France', 30, 'N', ''),
('Noble1004', 'Laura', 'Noble', 'Noble1004@aol.com', '07382948292', '1/7', 'Sunbury Place', 'Edinburgh', 'EH4 3BY', 'Scotland', 50, 'N', 'Will consider relocating if project is long term.'),
('OliverLLL', 'Oliver', 'Brolly', 'OlliBrolly@gmail.com', '07950493920', '11', 'Bothwell Street', 'Edinburgh', 'EH7 5PR', 'Scotland', 25, 'Y', ''),
('PeterR192', 'Peter', 'Parker', 'SpiderIT@gmail.com', '078402892334', '3', 'Rolls Crescent', 'Manchester', 'M15 5FP', 'England', 30, 'Y', ''),
('Plug699', 'Stuart', 'Denholm', 'plug1889@aol.com', '0789403895030', '26', 'Curzon Street', 'London', 'W1J 7TQ', 'England', 29, 'N', ''),
('Presto35', 'Abbie', 'Preston', 'Prestor21@hotmail.com', '07948395847', '60', 'Shepherds Bush', 'London', 'W6 7PH', 'England', 20, 'Y', ''),
('Really4950', 'Reily', 'Carter', 'ReallyR3820@yahoo.com', '0759384939202', '89', 'Boucher Road', 'Belfast', 'BT12 6HR', 'Ireland', 120, 'Y', ''),
('rp10', 'Ryan', 'Porteous', 'porteous1003@yahoo.com', '0793678212', '5', 'Grove Street', 'Stirling', 'S12 3HF', 'Scotland', 90, 'N', 'hello'),
('RSmith', 'Rachael', 'Smith', 'rachaelS@outlook.co.uk', '07748115211', '14', 'Dedridge Drive', 'Liverpool', 'L15 6TY', 'England', 50, 'Y', ''),
('RW1995', 'Ryan', 'Watson', 'rw2@hotmail.co.uk', '07950706687', '108b', 'Grove Street', 'Edinburgh', 'EH3 8AA', 'Scotland', 40, 'Y', ''),
('SarahCo', 'Sarah', 'O\'connor', 'Saraho@gmail.com', '0748209284032', '279', 'Newtownards Road', 'Belfast', 'BT4 1AG', 'Ireland', 20, 'N', ''),
('SB34', 'Sally', 'Smith', 'Sally34@outlook.com', '07781223511', '25', 'Hammersrow Drive', 'New York', '90033', 'USA', 50, 'N', ''),
('Seany16', 'Sean', 'Kitching', 'Seany1602@hotmail.co.uk', '0798754367', '121', 'Eskhill', 'Penicuik', 'eh26 8de', 'Scotland', 30, 'Y', ''),
('SloanR', 'Ryan', 'Sloan', 'SloanyR12@gmail.com', '0795093832', '19', 'West Preston Street', 'Edinburgh', 'EH8 9PU', 'Scotland', 50, 'Y', ''),
('Spring10', 'Stuart', 'Hayes', 'StuartH@hotmail.com', '0794085694', '1', 'Rodney Street', 'Edinburgh', 'EH7 4EN', 'Scotland', 200, 'Y', ''),
('SS28', 'Steph', 'Smith', 'SmithS@hotmail.co.uk', '0780565705', '8', 'Castlelaw Court', 'Penicuik', 'eh26 8bs', 'Scotland', 20, 'N', 'Recently became a father so does not want to travel far for work'),
('Trump218', 'Jeff', 'Shih', 'TrumpY892@yahoo.com', '079868968667', '54', 'Castlereagh', 'Belfast', 'BT5 4NF', 'Ireland', 30, 'N', ''),
('WillHills', 'William', 'Hill', 'WilliamHillBM@Yahoo.com', '078593829485', '1', 'John Street', 'Penicuik', 'EH26 8HN', 'Scotland', 40, 'Y', '');

-- --------------------------------------------------------

--
-- Table structure for table `employeeskills`
--

CREATE TABLE `employeeskills` (
  `skillName` varchar(25) NOT NULL,
  `username` varchar(20) NOT NULL,
  `yearsOfXP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employeeskills`
--

INSERT INTO `employeeskills` (`skillName`, `username`, `yearsOfXP`) VALUES
('C# Programmer', 'Bethy16', 4),
('Client-side Programming', 'BBrode102', 5),
('Client-side Programming', 'ght5', 1),
('Database Design', 'ght5', 3),
('HTML Specialist', 'ght5', 3),
('Java Developer', 'BBrode102', 4),
('Java Developer', 'ght5', 4),
('Object-Oriented Language', 'ght5', 5),
('PHP', 'BBrode102', 2),
('PHP', 'Dugas210', 6),
('Procedure Planning ', 'AndyY21', 3),
('Procedure Planning ', 'AX14', 2),
('Python Developer', 'ght5', 3),
('Software Engineering', 'ADX5930', 5),
('SQL', 'ght5', 3),
('Web Design', 'BBrode102', 6),
('Web Development', 'DaisyFlow', 4);

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `jobID` int(11) NOT NULL,
  `projID` int(11) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `title` varchar(50) NOT NULL,
  `contractType` enum('Part-Time','Full-Time') DEFAULT 'Full-Time',
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `salary` decimal(19,0) NOT NULL,
  `details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`jobID`, `projID`, `username`, `title`, `contractType`, `startDate`, `endDate`, `salary`, `details`) VALUES
(10001, 1004, 'Trump218', 'Senior Systems Analyst', 'Full-Time', '2017-03-01', '2017-05-31', '4500', 'The Senior Systems Analyst position requires strong business skills and would be responsible for\r\nreviewing, analyzing and occasionally modifying systems including encoding, testing, debugging and\r\ninstalling to support application systems.\r\n'),
(10002, 1004, 'BKainer74', 'Project Manager', 'Full-Time', '2017-03-01', '2017-05-31', '37000', ''),
(10007, 9090, 'Carton29', 'Planning consultant', 'Full-Time', '2017-04-01', '2017-09-28', '120', 'Working with both project team and construction team to ensure everything runs smoothly '),
(10008, 10001, 'ght5', 'Project Manager', 'Full-Time', '2017-06-02', '2017-10-03', '18', ''),
(10009, 10001, 'BBrode102', 'Systems Analyst ', 'Full-Time', '2017-06-02', '2017-10-03', '7', ''),
(10010, 10001, 'Brown294', 'Software Engineer', 'Full-Time', '2017-06-02', '2017-10-03', '10', ''),
(10011, 10001, 'ET1203', 'Systems Tester', 'Part-Time', '2017-09-03', '2017-10-03', '5000', ''),
(10012, 10001, NULL, 'C++ Software Engineer', 'Part-Time', '2017-06-02', '2017-09-14', '9000', ''),
(10013, 10001, 'Noble1004', 'Back End Developer ', 'Full-Time', '2017-06-02', '2017-10-03', '18000', ''),
(10014, 10001, 'Spring10', 'Professional liaison', 'Full-Time', '2017-06-02', '2017-10-03', '6000', 'Go between within development team and Nasa'),
(10015, 10001, 'OliverLLL', 'Application Specialist ', 'Full-Time', '2017-06-02', '2017-10-03', '13', ''),
(10016, 10001, 'FinaK23', 'Account manager ', 'Full-Time', '2017-06-02', '2017-09-30', '7', ''),
(10017, 10001, 'Harper020R', 'Content Strategist', 'Full-Time', '2017-06-02', '2017-10-03', '10', ''),
(10018, 10001, 'KenM0192', 'User Interface Designer ', 'Part-Time', '2017-07-03', '2017-08-15', '0', ''),
(10019, 14145, 'ght5', 'Project Manager', 'Full-Time', '2016-10-31', '2017-02-28', '18', ''),
(10020, 14145, 'Dugas210', 'User Interface Designer', 'Part-Time', '2016-11-30', '2017-02-28', '7000', ''),
(10021, 14145, 'SloanR', 'Senior Software Engineer', 'Full-Time', '2016-11-30', '2017-02-28', '17000', ''),
(10022, 14145, 'Harper020R', 'Application Specialist ', 'Full-Time', '2016-11-30', '2017-02-28', '6000', ''),
(10023, 211, 'ght5', 'Full stack developer', 'Full-Time', '2017-04-03', '2017-07-31', '26000', 'Full stack developer on Project Tiger'),
(10024, 211, NULL, 'Java Developer', 'Full-Time', '2017-06-04', '2017-07-31', '23000', 'As part of our development team you will be working on projects throughout the whole product life cycle, from gathering requirements with customers, designing and developing software, through to testing, deployment and maintenance.'),
(10025, 211, NULL, 'Java Developer', 'Full-Time', '2017-04-03', '2017-06-28', '27000', 'Senior Java Developer'),
(10026, 211, NULL, 'Data Analyst', 'Full-Time', '2017-06-11', '2017-07-27', '30000', ''),
(10027, 10293, 'Brown294', 'Java Deleoper', 'Full-Time', '2016-11-01', '2016-11-30', '20000', ''),
(10028, 10293, 'Dugas210', 'Web programmer', 'Full-Time', '2016-10-02', '2016-11-30', '23000', ''),
(10029, 18450, 'ght5', 'Project Manager', 'Full-Time', '2016-09-29', '2017-03-14', '16000', ''),
(10030, 10293, 'ght5', 'Project Manager', 'Full-Time', '2016-09-29', '2016-11-30', '40000', ''),
(10031, 18450, 'KenM0192', 'Interaction Designer', 'Full-Time', '2016-09-29', '2017-03-14', '9000', ''),
(10032, 10293, 'NathL96', 'Interaction Designer', 'Full-Time', '2016-10-03', '2016-11-16', '21000', ''),
(10033, 10293, 'Presto35', 'Front End Designer', 'Full-Time', '2016-08-29', '2016-11-28', '21000', ''),
(10034, 18450, 'MurrayC009', 'Mobile Developer', 'Full-Time', '2016-09-29', '2017-03-14', '15000', ''),
(10035, 10001, NULL, 'Front End Designer', 'Full-Time', '2016-12-06', '2017-04-13', '25000', ''),
(10036, 10001, NULL, 'Web designer', 'Full-Time', '2017-01-01', '2017-03-31', '25000', ''),
(10037, 18450, 'rp10', 'Wordpress Developer ', 'Full-Time', '2016-09-29', '2017-03-14', '5000', ''),
(10038, 18450, 'Presto35', 'Framework Specialist', 'Full-Time', '2016-09-29', '2017-03-14', '7000', ''),
(10039, 10293, 'BBrode102', 'Java Developer', 'Full-Time', '2016-08-08', '2016-10-26', '23000', ''),
(10044, 9444, NULL, 'Java Developer', 'Full-Time', '2017-01-01', '2017-03-24', '28000', ''),
(10045, 10293, NULL, 'Java Developer', 'Full-Time', '2017-03-22', '2017-06-08', '21000', ''),
(10046, 20127, NULL, 'Games Programming', 'Full-Time', '2017-03-13', '2017-04-28', '12000', ''),
(10047, 20128, NULL, 'Java Developer', 'Full-Time', '2017-03-15', '2017-04-26', '20000', '');

-- --------------------------------------------------------

--
-- Table structure for table `jobskills`
--

CREATE TABLE `jobskills` (
  `skillName` varchar(25) NOT NULL,
  `jobID` int(11) NOT NULL,
  `yearsOfXP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobskills`
--

INSERT INTO `jobskills` (`skillName`, `jobID`, `yearsOfXP`) VALUES
('Android Development', 10001, 3),
('Android Development', 10002, 4),
('Attention to detail ', 10016, 6),
('Attention to detail ', 10044, 3),
('C# Programmer', 10007, 3),
('C# Programmer', 10015, 3),
('C# Programmer', 10030, 3),
('C# Programmer', 10031, 4),
('C# Programmer', 10036, 4),
('Client-side Programming', 10008, 3),
('Client-side Programming', 10011, 3),
('Client-side Programming', 10026, 3),
('Client-side Programming', 10029, 4),
('Client-side Programming', 10037, 4),
('HTML Specialist', 10009, 4),
('HTML Specialist', 10021, 2),
('HTML Specialist', 10023, 2),
('HTML Specialist', 10032, 2),
('HTML Specialist', 10034, 3),
('HTML Specialist', 10045, 3),
('Java Developer', 10012, 2),
('Java Developer', 10024, 3),
('Java Developer', 10025, 5),
('Java Developer', 10035, 3),
('Java Developer', 10036, 2),
('Java Developer', 10044, 3),
('PHP', 10021, 5),
('PHP', 10024, 2),
('PHP', 10025, 3),
('Problem Solving', 10023, 3),
('Problem Solving', 10031, 2),
('Problem Solving', 10032, 2),
('Procedure Planning ', 10001, 4),
('Procedure Planning ', 10010, 3),
('Procedure Planning ', 10014, 5),
('Procedure Planning ', 10022, 1),
('Procedure Planning ', 10025, 4),
('Python Developer', 10013, 7),
('Python Developer', 10026, 3),
('Python Developer', 10044, 3),
('Server-side Programming', 10008, 4),
('Server-side Programming', 10025, 3),
('Server-side Programming', 10039, 5),
('SQL', 10024, 4),
('Statistics Understanding', 10001, 4),
('Statistics Understanding', 10011, 3),
('Statistics Understanding', 10038, 3),
('Web Design', 10012, 3),
('Web Design', 10020, 5),
('Web Design', 10026, 4);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `messageID` int(11) NOT NULL,
  `senderUsername` varchar(20) NOT NULL,
  `receiverUsername` varchar(20) NOT NULL,
  `message` text NOT NULL,
  `dateSent` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`messageID`, `senderUsername`, `receiverUsername`, `message`, `dateSent`) VALUES
(1, 'ght5', 'BBrode102', 'We have a new member of staff starting on Monday called Sarah.', '2017-03-31'),
(2, 'ght5', 'Brown294', 'We have a new member of staff starting on Monday called Sarah.', '2017-03-31'),
(3, 'ght5', 'Dugas210', 'We have a new member of staff starting on Monday called Sarah.', '2017-03-31'),
(4, 'ght5', 'ght5', 'We have a new member of staff starting on Monday called Sarah.', '2017-03-31'),
(5, 'ght5', 'NathL96', 'We have a new member of staff starting on Monday called Sarah.', '2017-03-31'),
(6, 'ght5', 'Presto35', 'We have a new member of staff starting on Monday called Sarah.', '2017-03-31');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `projID` int(11) NOT NULL,
  `managerUsername` varchar(20) NOT NULL,
  `projName` varchar(50) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `finished` enum('Y','N') DEFAULT 'N',
  `doorNumber` varchar(8) NOT NULL,
  `street` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `postcode` varchar(15) NOT NULL,
  `country` varchar(30) NOT NULL,
  `details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`projID`, `managerUsername`, `projName`, `startDate`, `endDate`, `finished`, `doorNumber`, `street`, `city`, `postcode`, `country`, `details`) VALUES
(211, 'Bethy16', 'Project Tiger', '2017-04-03', '2017-09-16', 'N', '25', 'Bedford Street', 'New York', '10014', 'USA', 'Information on project restricted'),
(1004, 'BKainer74', 'BelfastTelecom', '2017-03-01', '2017-05-31', 'N', '1', 'University Road', 'Belfast', 'BT7 1NN', 'Northern Ireland', 'Upgrading of telecoms in Belfast'),
(4110, 'LB164', 'Birmingham Library', '2017-01-01', '2017-05-20', 'N', '1', 'Broad Street', 'Birmingham', 'B1 2ND', 'England', 'Installation of new fibre optic in library'),
(5547, 'DanKetch', 'Paris underground', '2017-01-01', '2017-12-01', 'N', '22', 'rue du Grenier-Saint-Lazare', 'Paris', '75003', 'France', 'Updating signals in Paris underground'),
(7894, 'DaisyFlow', 'Manchester satellite', '2017-03-14', '2017-10-18', 'N', '14', 'Lloyd Street', 'Manchester', 'M2 5ND', 'England', 'Setting up of new Manchester Satellite offices'),
(9090, 'DPrince8192', 'Bay Bridge', '2017-04-01', '2017-09-28', 'N', '1/3', 'Coates Crescent', 'Edinburgh', 'EH3 7AA', 'Scotland', 'Analysis and design of new bridge'),
(9444, 'Bethy16', 'Marketing Website', '2016-09-01', '2016-12-31', 'Y', '1', 'Chambers Street', 'Edinburgh', 'EH1 3NW', 'Scotland', 'Development of a website for a marketing organisation'),
(10001, 'ght5', 'NASA Rover', '2017-02-06', '2017-03-10', 'Y', '1', 'Princes Street', 'Edinburgh', 'EH1 1TH', 'Scotland', 'Development of technology to be used in accordance with the NASA Rover'),
(10293, 'ght5', 'Snowdonia Security ', '2016-09-19', '2016-11-30', 'Y', '43', 'Library Avenue', 'Edinburgh', 'eh26 872', 'Scotland', 'Creating a new network security system in snowdonia '),
(14145, 'ght5', 'Implementation of Test taking system', '2016-11-30', '2017-02-28', 'Y', '15', 'Lauriston Place', 'Edinburgh', 'EH3 9EN', 'Scotland', 'Designing and implementing a exam taking system for high schools in the local area '),
(18450, 'ght5', 'Re implementation of Vision', '2016-09-29', '2017-03-14', 'Y', '13', 'Watt Avenue', 'Edinburgh', 'eh3 3YG', 'Scotland', 'Working with Heriot Watt University in order to redesign and implement the vision virtual system online. '),
(20125, 'SB34', 'Finnies', '2017-01-09', '2017-04-28', 'N', '13', '5th Avenue', 'New York', '90010', 'USA', 'Implementation of new IT infrastructure throughout building'),
(20126, 'ght5', 'Project Testing', '2015-03-14', '2019-03-25', 'N', '12', 'Green Gardens', 'Glasgow', 'GL1 5HG', 'Scotland', ''),
(20127, 'ght5', 'Mobile Game', '2007-01-25', '2018-01-10', 'N', '21', 'Palace Garden', 'London', 'EHLA 25', 'England', 'Develop a mobile game to be released across multiple platforms.'),
(20128, 'ght5', 'Project Test', '2012-03-12', '2015-04-16', 'N', '12', 'Dove Street', 'Glasgow', 'GL1 25G', 'Scotland', '');

-- --------------------------------------------------------

--
-- Table structure for table `projemplink`
--

CREATE TABLE `projemplink` (
  `username` varchar(20) NOT NULL,
  `projID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projemplink`
--

INSERT INTO `projemplink` (`username`, `projID`) VALUES
('Bethy16', 211),
('BKainer74', 1004),
('LB164', 4110),
('DanKetch', 5547),
('DaisyFlow', 7894),
('DPrince8192', 9090),
('ght5', 10001),
('ght5', 10293),
('ght5', 14145),
('ght5', 18450),
('SB34', 20125);

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `skillName` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`skillName`) VALUES
('Android Development'),
('Attention to detail '),
('C# Programmer'),
('Client-side Programming'),
('Database Design'),
('HTML Specialist'),
('Java Developer'),
('Object-Oriented Language'),
('PHP'),
('Problem Solving'),
('Procedure Planning '),
('Python Developer'),
('Server-side Programming'),
('Software Engineering'),
('SQL'),
('Statistics Understanding'),
('Web Design'),
('Web Development');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accdetails`
--
ALTER TABLE `accdetails`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`jobID`,`username`),
  ADD KEY `fk_username` (`username`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `userName` (`username`);

--
-- Indexes for table `employeeskills`
--
ALTER TABLE `employeeskills`
  ADD PRIMARY KEY (`skillName`,`username`),
  ADD KEY `fk_usersName` (`username`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`jobID`,`projID`),
  ADD KEY `projID` (`projID`,`username`),
  ADD KEY `fkEmpUsername` (`username`);

--
-- Indexes for table `jobskills`
--
ALTER TABLE `jobskills`
  ADD PRIMARY KEY (`skillName`,`jobID`),
  ADD KEY `fk_jobsID` (`jobID`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`messageID`,`receiverUsername`,`senderUsername`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`projID`),
  ADD KEY `managerUsername` (`managerUsername`);

--
-- Indexes for table `projemplink`
--
ALTER TABLE `projemplink`
  ADD PRIMARY KEY (`username`,`projID`),
  ADD KEY `FKprojID` (`projID`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`skillName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `jobID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10048;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `messageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `projID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20129;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `accdetails`
--
ALTER TABLE `accdetails`
  ADD CONSTRAINT `FKAccUsername` FOREIGN KEY (`username`) REFERENCES `employee` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `fk_job_ID` FOREIGN KEY (`jobID`) REFERENCES `job` (`jobID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_username` FOREIGN KEY (`username`) REFERENCES `employee` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employeeskills`
--
ALTER TABLE `employeeskills`
  ADD CONSTRAINT `fk_skillname` FOREIGN KEY (`skillName`) REFERENCES `skills` (`skillName`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_usersName` FOREIGN KEY (`username`) REFERENCES `employee` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `job`
--
ALTER TABLE `job`
  ADD CONSTRAINT `fkEmpUsername` FOREIGN KEY (`username`) REFERENCES `employee` (`username`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_projectID` FOREIGN KEY (`projID`) REFERENCES `projects` (`projID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `jobskills`
--
ALTER TABLE `jobskills`
  ADD CONSTRAINT `fk_jobsID` FOREIGN KEY (`jobID`) REFERENCES `job` (`jobID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_skillsname` FOREIGN KEY (`skillName`) REFERENCES `skills` (`skillName`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `fk_managerUsername` FOREIGN KEY (`managerUsername`) REFERENCES `employee` (`username`);

--
-- Constraints for table `projemplink`
--
ALTER TABLE `projemplink`
  ADD CONSTRAINT `FKprojID` FOREIGN KEY (`projID`) REFERENCES `projects` (`projID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FKusername` FOREIGN KEY (`username`) REFERENCES `employee` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
